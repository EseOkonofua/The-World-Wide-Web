<?php
    include 'MVC.php';
    $genres = getGenres();

    $get_info = "?status=success";
    if ($_POST) {
   // Execute code (such as database updates) here.
    if (!empty($_POST['rating']) && isset($_POST['rating'])){
        echo "YAASSSSSSSSSSS";
        $rating = $_POST['rating'];
        $username = $_POST['username'];
      
        $ratingArray = explode("-",$rating);
        $movie_id = $ratingArray[0];
        $movie_rating = $ratingArray[1];
        insertRating($movie_id,$username,$movie_rating);
    }

   // Redirect to this page.
    header("Location: " . $_SERVER['REQUEST_URI'].$get_info);
    exit();
    }

    
    

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Reel Movies</title>
        <link rel="icon" href="Images/reel.ico">
        <link rel="stylesheet" href="ReelMovies.css">

        <link href="https://fonts.googleapis.com/css?family=Exo" rel="stylesheet" type="text/css">
        <script src="SceneScript.js"></script>
    </head>
    <body onload="showMovieRatings()">
        <div id="container">
            <div id="header">
                <div id="headerReel">
                    <div id="headerReelFirst">
                        <img class="headerImage" alt="Avatar" src="Images/avatarPoster.jpg" />
                        <img class="headerImage" alt="Kill Bill" src="Images/killBillPoster.jpg" />
                        <img class="headerImage" alt="Les Miserables" src="Images/lesMisPoster.jpg" />
                        <img class="headerImage" alt="Silence of the Lamb" src="Images/silencePoster.jpg" />
                        <img class="headerImage" alt="Dear John" src="Images/dearJohnPoster.jpg" />
                        <img class="headerImage" alt="Avatar" src="Images/avatarPoster.jpg" />
                        <img class="headerImage" alt="Kill Bill" src="Images/killBillPoster.jpg" />
                        <img class="headerImage" alt="Les Miserables" src="Images/lesMisPoster.jpg" />
                        <img class="headerImage" alt="Silence of the Lamb" src="Images/silencePoster.jpg" />
                        <img class="headerImage" alt="Dear John" src="Images/dearJohnPoster.jpg" />
                    </div>
                    <div id="webTitle">
                        REEL MOVIES
                        <div>Keeping it real with movies.</div>
                    </div>
                </div>
            </div>
            <div id="mainBody">
                <div class="bodyFunction">
                    <div class="functionContainer actors">
                        <div class="functionTitle">Find Actors and their roles in various movies...</div>
                        <form>
                            <center>
                                <input onkeydown="document.getElementById('actorError').innerHTML = ''" id="first_name" class="movieText" autocomplete="off" placeholder="Actor First name" type="text" />
                                <input onkeydown="document.getElementById('actorError').innerHTML = ''" id="last_name" class="movieText lastname" autocomplete="off" placeholder="Actor Last name" type="text" />
                                <div class="buttonContainer">
                                    <input onclick="showActor()" type="button" value="Search" class="movieButton" />
                                </div>
                                <div class="error" id="actorError">
                                </div>
                            </center>
                        </form>
                        <div id="actorRoles" class="popup">
                            <div class="listing">
                                <div class="listOverflowWrapper">

                                    <div id="actorPopUpHeader" class="popUpHeader">

                                    </div>
                                    <div id="actorPopUpBody">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="functionContainer movies">
                        <div class="functionTitle">Search for movies by genre...</div>
                        <form>
                            <center>
                                <select id="movieGenre" class="movieSelect" onchange="document.getElementById('movieError').innerHTML = ''">
                                    <option value="">Genre select</option>
                                    <?php
                                        
                                        foreach($genres as $genre)    
                                            print "<option value = '$genre'> $genre</option>";
                                    ?>
                                </select>

                                <div class="buttonContainer">
                                    <input type="button" onclick="showMovies()" value="Search" class="movieButton" />
                                </div>
                                <div class="error" id="movieError">
                                </div>
                            </center>

                        </form>
                        <div id="movieByGenre" class="popup">
                            <div class="listing">
                                <div class="listOverflowWrapper">

                                    <div id="moviePopUpHeader" class="popUpHeader">

                                    </div>
                                    <div id="moviePopUpBody">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="ratings" class="bodyFunction">
                    <div class="functionContainer rate">
                        <div id="starBanner">
                            <center>
                                <img src="Images/filledstarbig.png" alt="star" />
                                <img src="Images/filledstarbig.png" alt="star" />
                                <img src="Images/filledstarbig.png" alt="star" />
                                <img src="Images/filledstarbig.png" alt="star" />
                                <img src="Images/filledstarbig.png" alt="star" />
                            </center>

                        </div>
                        <div class="functionTitle">Enter a username to view and give movie ratings...</div>
                        <?php if (!empty($_GET['status']) && isset($_GET['status'])){
                                print "<div id ='successSubmit'> &#9733 Rating submitted </div>";
                                unset($_GET['status']); 
                              }                            
                        ?>
                        <form action="<?php print $_SERVER['PHP_SELF'];?>" method="post">
                        <div class="userInput"> 
                            <div style="float:left">Username:</div>
                            <input type="text" onkeyup="updateUserRateError()" required name="username" class="movieText" id="username" autocomplete="off" />  <div id="userRateError" class="error" >Must enter a user name to rate movies!</div>
                            <input type="text"  onkeyup="showMovieRatings()" class="movieText" id="movieFilter" autocomplete="off" placeholder="Filter Movies"/>
                        </div>
                            <div id="movieRatings">
                        
                    </div>                        
                        </form>
                    </div>
                    
                </div>
                
            </div>

        </div>
    </body>
</html>
