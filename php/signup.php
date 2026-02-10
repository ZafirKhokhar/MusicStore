<?php 
    session_start();
    include_once "config.php";
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $uemail = mysqli_real_escape_string($conn, $_POST['uemail']);
    $upass = mysqli_real_escape_string($conn, $_POST['upass']);

    if(!empty($uname) && !empty($uemail) && !empty($upass) ) {
        if(filter_var($uemail, FILTER_VALIDATE_EMAIL)) {
            //Check email is already exits or not..
            $sql = mysqli_query($conn, "SELECT uemail FROM users WHERE uemail = '{$uemail}'");
            if(mysqli_num_rows($sql)>0) {
                $message2 = "$uemail - already exists!!!";
                header("Location: ../signup-in.php?msg2={$message2}");
            } else {
                //insert all data in table
                $sql2 = mysqli_query($conn, "INSERT INTO users (uname, uemail, upass)
                                    VALUES('{$uname}', '{$uemail}', '{$upass}')");
                if($sql2) {
                    $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE uemail = '{$uemail}'");
                    if(mysqli_num_rows($sql3)>0) {
                        $row = mysqli_fetch_assoc($sql3);
                        $_SESSION['uid'] = $row['uid'];
                        echo "Success";
                        header("Location: ../home.php");
                    }
                    else{
                        $message2 = "Something went wrong ERROR!";
                        header("Location: signup-in.php?msg2={$message2}");
                    }
                } else {
                    $message2 = "Something went wrong!";
                    header("Location: signup-in.php?msg2={$message2}");
                }
            }
        } else {
            $message2 = "$uemail - This is not a valid email";
            header("Location: ../signup-in.php?msg2={$message2}");
        } 
    }
    else {
        $message2 = "All input field are required";
        header("Location: ../signup-in.php?msg2={$message2}");
    }
?>