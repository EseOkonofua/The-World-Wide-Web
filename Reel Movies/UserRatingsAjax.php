<?php
    include 'MVC.php';
    $movie_id= $_GET['movieid'];
    $ratings = getUserRatings($movie_id);
    if(count($ratings) > 0){
        print "<div class ='ratingsExpanded'>";
        foreach($ratings as $value){
            print "<div class = 'userRating'>".$value->username." - ' ".$value->rating."<img style ='position:relative;top:5px' alt = 'star' src = 'Images/filledstarsmall.png'/> '</div>";
        }
        print "</div>";
    }
    else 
        print "<div class ='ratingsExpanded'> <center> <div class = 'error' style ='font-size :1.5em'>This movie has not been rated yet! </div> </center> </div>";
?>

