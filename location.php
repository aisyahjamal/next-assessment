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
        
        <?php
        // echo $result;
        $tanda='----------------------';
        $timestart = strtotime ($result.'-70 minutes');
        $timeend = strtotime ($result.'+50 minutes');
        $input= $timestart;

        while ($timestart <= $timeend){
            $input = strtotime('+10 minutes',$timestart);
            $timestamp = strtotime ($input);
            $timestamp2 = $timestamp + 10;

            $position = file_get_contents('https://api.wheretheiss.at/v1/satellites/25544/positions?timestamps='.$timestamp.',' .$timestamp2.'&units=miles');

            // var_dump(json_decode($position));
            $arr = json_decode($position, true);
            $longitude = $arr[0]['longitude'];
            $latitude = $arr[0]['latitude'];

            $location = file_get_contents('https://api.wheretheiss.at/v1/coordinates/'.$longitude.','.$latitude);  
            $arr2 = json_decode($location, true);
            $country = $arr2['country_code'];
            $timestart = $input;
        }
        ?>
        <section>
            <h1> ISS LOCATION  </h1>
            <hr>
            <br>
            <p><?php echo date('d/m/Y H:i:s',$input); ?> (UTC +0)--- <?php echo $country; ?> </p>
            <br>
        </section>

    </body>

</html>