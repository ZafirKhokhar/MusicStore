<?php
    session_start();
    if(isset($_SESSION['uid']) || isset($_SESSION['adminid'])) {
        session_unset();
        session_destroy();
        header("location: ../home.php");
    }
    else {
        header("location: ../home.php");
    }
 

?>