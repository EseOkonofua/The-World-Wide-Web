
<?php
     include "MVC.php";
     $f_name = $_GET['firstname'];
     $l_name= $_GET['lastname'];
     $movieRoles = getMovieRoles($f_name,$l_name);
     if(count($movieRoles) > 0){
          print "<table>";
          print "<tr> <th> Movie Name </th> <th> Role </th> <th> Date </th> </tr>";
          foreach($movieRoles as $value){
             print "<tr> <td>".$value->moviename."</td> <td>".$value->role."</td> <td>".$value->year."</td> </tr>";
          }
          print "</table>";
     }
    else{
        print "<center> <div style = 'font-size:1.5em' class ='error'> Cannot find any information on '".$f_name." ".$l_name."' </div> </center>";
    }
?>

