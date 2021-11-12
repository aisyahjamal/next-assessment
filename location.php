<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if (isset($_GET['search'])){
		$result= ($_GET['search']);
        // $result2= ($_GET['search']) + 10 ;
        $timestamp = strtotime ($result);
        $timestamp2 = $timestamp + 10;
        
	}
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Lets Go </h1>
        <?php
        // $position = file_get_contents('https://api.wheretheiss.at/v1/satellites/25544/positions?timestamps=1436029892,1436029902&units=miles');
        // echo $position;
        $position = file_get_contents('https://api.wheretheiss.at/v1/satellites/25544/positions?timestamps='.$timestamp.',' .$timestamp2.'&units=miles');
        $arr = json_decode($position, true);
        $longitude = $arr[0]['longitude'];
        $latitude = $arr[0]['latitude'];
    
        $location = file_get_contents('https://api.wheretheiss.at/v1/coordinates/'.$longitude.','.$latitude);  
        $arr2 = json_decode($location, true);
        $country = $arr2['country_code'];
        echo $country;  
        ?>
    </body>

</html>