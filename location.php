<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if (isset($_GET['search'])){
		$result= ($_GET['search']);      
	}
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <style>
    body {
        background: #152238 }
    section {
        background: black;
        color: white;
        border-radius: 1em;
        padding: 1em;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%) }
    </style>
        <section>
        <h1>ISS LOCATION</h1>
        <hr>
        <br>
        <?php
        $tanda='----------------------';
        $timestart = strtotime ($result.'-70 minutes');
        $timeend = strtotime ($result.'+50 minutes');
        while ($timestart <= $timeend){

            $timestamp = strtotime('+10 minutes',$timestart);
            $timestamp2 = strtotime('+10 minutes',$timestamp);

            $position = file_get_contents('https://api.wheretheiss.at/v1/satellites/25544/positions?timestamps='.$timestamp.',' .$timestamp2.'&units=miles');
            $arr = json_decode($position, true);
            $longitude = $arr[0]['longitude'];
            $latitude = $arr[0]['latitude'];

            $location = file_get_contents('https://api.wheretheiss.at/v1/coordinates/'.$latitude.','.$longitude);  
            $arr2 = json_decode($location, true);
            $country = $arr2['country_code'];

            echo date('d/m/Y H:i:s',$timestamp); 
            echo " (UTC +0)---------------".$country."<br>";
            $timestart = $timestamp;

         } ?>
         </section>
    </body>
</html>