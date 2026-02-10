<!DOCTYPE html>
<html>
<head>
<title>Weather API</title>
</head>
<body>
<?php
    if(isset($_GET['city'])){
        $apiKey = "ae2baf47071839accbb2cecbfefe499c";
        $cityId = $_GET['city'];
        $googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?q=" . $cityId .",IN&APPID=" . $apiKey;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        $data = var_dump(json_decode($response));
        // echo $data;
        $jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';

$abc = var_dump(json_decode($jsonobj));
echo $abc;
    }
?>
<!-- <?php $test1 = '1'; ?>
<script type="text/javascript">
  var carnr;        
  carnr = "<?php print($response); ?>"
  console.log(carnr);
</script> -->
<!-- <script> 
    var test = "'. {$response} .'";
    console.log(test);
</script> -->
<div style="text-align: center;">
<h1>WEATHER ONLINE</h1>
<form method="GET" action='apitest.php'>
City name: <input type="text" name="city">
<input type="submit" name="city_submit">

</form>
<?php
if (isset($_GET['city_submit'])) {
    if(!isset(($data->message))){
        echo "
        <h2>". $data->name ." Weather Status</h2>
        <h2>Wind: ". $data->wind->speed ." km/h</h2>
        <h2>Sky: ". $data->weather[0]->description ." </h2>
        <h2>Humidity:". $data->main->humidity ." %</h2>
        <h2>Temperature: ". ($data->main->temp)." °C</h2>
        ";
    }
    else{
        echo "<h2>City Not Found. Please Check City Name Again</h2>";
    }
}
?>
</div>
</body>
</html>
