<?php
$v = fopen("hometowns.txt","r") or die("Unable to read file!");

$homeTownArray = array();
fgets($v);
while(!feof($v)){
    array_push($homeTownArray,fgets($v));
}

fclose($v);

//Key array function 
function generateKeyArray($homeTownList){
    $countryKeys = array();
    foreach($homeTownList as $string){
        $splitString = explode("|",$string);
        if(array_key_exists($splitString[1],$countryKeys)){
            array_push($countryKeys[$splitString[1]],$splitString[2]);
        }else{
            $countryKeys[$splitString[1]] = array($splitString[2]);
        }
    }
    ksort($countryKeys);
    return $countryKeys;
}
//Key array
$countryKeys = generateKeyArray($homeTownArray);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Travel Guide</title>
    <link rel="stylesheet" href="prettyHub.css" />
    <link href='https://fonts.googleapis.com/css?family=Josefin+Slab:400,700' rel='stylesheet' type='text/css' />
    <link rel ="icon" href="favicon.ico"/>
</head>
<body>
    <div class="container">
        <div id="headerContainer">
            <div id="header">
                <span>Travel Guide</span>
            </div>
        </div>
        
        <div id="mainPage">           
            <div id="guideBody">
                  <?php 
                  foreach($countryKeys as $town => $urls){
                      $count = 1;
                      print "<div class = 'homeTownBox'>";
                      if(count($urls) > 1 ){
                          print "<div class = 'townLabel'>";
                          print $town;
                          print "</div>";
                          print "<hr/>";
                          foreach($urls as $url){
                              print "<a target = '_blank' href ='".$url."'>"."Page ".$count."</a>";
                              $count++;
                          }                  
                      }else{
                          print "<a class = 'singleLink' target = '_blank' href ='".$urls[0]."'>".$town."</a>";
                      }                         
                      print "</div><br/>";
                  }
                  ?>
                <div class="footer">Ese Okonofua @ Queen's University </div>
            </div>
             
        </div>
    </div>
</body>
</html>
