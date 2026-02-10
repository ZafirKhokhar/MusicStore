<?php 
    session_start();
    include_once "config.php";
    $uemail = mysqli_real_escape_string($conn, $_POST['uemail']);
    $upass = mysqli_real_escape_string($conn, $_POST['upass']);
    
    if(!empty($uemail) && !empty($upass)) {
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE uemail = '{$uemail}' AND upass = '{$upass}'");
        if(mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
            if($row['uemail'] == 'admin@ms.com'){
                $_SESSION['adminid'] = $row['uid'];
                echo "Success";
                header("Location: ../MSadmin.php");                
            }
            else{
                $_SESSION['uid'] = $row['uid'];
                echo "Success";
                header("Location: ../home.php");
            }
        } else {
            $message = "Invalid Email or Password!!";
            header("Location: ../signup-in.php?msg={$message}");
        }
    } else {
        $message = "All input fields are required!!";
        header("Location: ../signup-in.php?msg={$message}");
    }


?>