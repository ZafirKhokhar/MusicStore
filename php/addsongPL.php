<?php
    session_start();
    include_once "config.php";
    
    $songid = mysqli_real_escape_string($conn,$_POST["sid"]);
    $plid = mysqli_real_escape_string($conn,$_POST["plid"]);
    if(isset($_SESSION['uid']) && $songid != "" && $plid != "")
    {
        $check = "SELECT * FROM songpl WHERE uid = '{$_SESSION['uid']}' AND plid = '{$plid}' AND sid = '{$songid}' ";
        $sqlcheck = mysqli_query($conn, $check);
        if(mysqli_num_rows($sqlcheck) > 0){
            echo 'This song is Already in Your Playlist List ';
        }
        else {
            $query = "INSERT INTO songpl (plid,sid,uid) VALUES('{$plid}','{$songid}','{$_SESSION['uid']}')";
            $sql = mysqli_query($conn, $query);
            if($sql){
                echo "Song Added to your Playlist";
            }
            else {
                echo "some error ";
            }
        }
    }
    else{
        echo "";
    }
?>