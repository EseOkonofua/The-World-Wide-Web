<?php
    include 'MVC.php';
    $filter = $_GET['filter'];
    $movies = getMoviesByName($filter);
    if(count($movies) == 0){
        print "<center> <div class ='error' style ='font-size:1.5em'>No information on movie '".$filter."'</div> </center>";
    }
    else{
        foreach($movies as $value){
        print "<div class ='ratingRow' id = '".$value->id."'> <div class = 'ratingRowTop'> <span class='movieTitle'>".$value->name."</span> <img alt = 'star' class ='genrestar' src = 'Images/filledstarsmall.png'/> ";
        if($value->avgrating >0)
            print $value->avgrating;
        else
            print "-";             
        print " </div>";
        print "<div class ='ratingRowBottom'> Your rating: <div class ='ratingButtonGroup'>";
        print "<button name ='rating' value ='".$value->id."-1' type ='submit' class = 'rateButton' ></button><button onmouseover ='starLight2(this)' onmouseout= 'starUnLight2(this)' name ='rating' value ='".$value->id."-2' type ='sumbit' class = 'rateButton' /></button><button onmouseover = 'starLight3(this)' onmouseout ='starUnLight3(this)' name ='rating' value ='".$value->id."-3' type ='submit' class = 'rateButton' ></button><button onmouseover ='starLight4(this)' onmouseout='starUnLight4(this)' name ='rating' type ='submit' value ='".$value->id."-4' class = 'rateButton' ></button><button onmouseover= 'starLight5(this)' onmouseout = 'starUnLight5(this)' name ='rating' type ='submit' value ='".$value->id."-5' class = 'rateButton' ></button><div class ='labels'>1</div><div class ='labels'>2</div> <div class ='labels'>3</div> <div class ='labels'>4</div><div class ='labels'>5</div>    ";
        print "</div> /5 <input class ='ratingsExpand' onclick = 'expandView(this.name);updateButton(this.name)' value = 'View Ratings' type ='button' name = '".$value->id."'   /> </div>";
    
        print "</div>";
    
    
    
    }
    }
    
?>