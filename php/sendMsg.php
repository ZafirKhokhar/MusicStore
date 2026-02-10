<?php
    session_start(); include_once 'config.php';
    $reqmsg = mysqli_real_escape_string($conn,$_POST['reqmsg']);

    if($reqmsg != ""){
        $query = "INSERT INTO requests (uid, rsong, status) VALUES({$_SESSION['uid']}, '$reqmsg','Pending' )";
        $sql = mysqli_query($conn,$query);
        if($sql){
            echo "Success";
        }
        else{
            echo "Fail";
        }
    }
    else{
        echo "Null Message";
    }
?>