<?php
    session_start();
    include_once "php/config.php";
    error_reporting(0);
    $sql = mysqli_query($conn, "SELECT * FROM songs WHERE sid = 1");
    if(mysqli_num_rows($sql) > 0){
      $row = mysqli_fetch_assoc($sql);
    }
    echo "song name = ".$row['sname'] . "<br>"; 
    echo "song artist = ".$row['sartist']. "<br>";
    echo "song gener = ".$row['sgenre']. "<br>";
    
    echo '<audio controls preload="metadata" autoplay>';
      echo    '<source src="data:audio/mp3;base64, ' .base64_encode($row['sfile']).'">';
    echo '</audio>';
    echo '<img src="data:image/jpg;base64, ' .base64_encode($row['simage']).'" alt="">';
    echo $json_array;
    $td = 'data:audio/mp3;base64, ' .base64_encode($row['sfile']);
    echo $td.duration;

    

  ?>
