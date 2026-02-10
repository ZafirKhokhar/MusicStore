<?php
    session_start();
    include_once "config.php";
    
    $search_value = mysqli_real_escape_string($conn,$_POST["searchTerm"]);
    if(isset($_SESSION['uid']) && $search_value != "")
    {
        $check = "SELECT * FROM favourite WHERE uid = '{$_SESSION['uid']}' AND sid = '{$search_value}' ";
        $sqlcheck = mysqli_query($conn, $check);
        if(mysqli_num_rows($sqlcheck) > 0){
            echo 'This song is Already in Your Favourit List ';
        }
        else {
            $query = "INSERT INTO favourite (uid,sid) VALUES('{$_SESSION['uid']}','{$search_value}')";
            $sql = mysqli_query($conn, $query);
            if($sql){
                echo "Song Added to your Favourite list";
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