<?php
    include "MVC.php";
    
    $genreee =  $_GET['genre'];
    $genreList = getMoviesByGenre($genreee);    
    foreach($genreList as $value){
        print "<div class = 'listRow'>";
        print $value->name.", <b>".$value->year."</b> <img alt = 'star' class ='genrestar' src = 'Images/filledstarsmall.png'/>";
        if($value->avgrating > 0)
            print $value->avgrating;
        else
            print "-";
        print "<br/>";
        print "</div>";
        print "<hr/>";
    }
    
?>

