<?php
    session_start();
    include_once "config.php";
    $rid = mysqli_real_escape_string($conn, $_POST['rid']);
    $sname = mysqli_real_escape_string($conn, $_POST['sname']);
    $sartist = mysqli_real_escape_string($conn, $_POST['sartist']);
    $sgenre = mysqli_real_escape_string($conn, $_POST['sgenre']);

    if($sname != "" && $sartist != "" && $sgenre != ""){
        if(!empty($_FILES['ssong']['name']) && !empty($_FILES['simage']['name']) && !empty($_FILES['saimage']['name'])) {
            $sfile_name = $_FILES['ssong']['name'];
            $sfile_type = $_FILES['ssong']['type'];
            $sfile_tname = $_FILES['ssong']['tmp_name'];

            $sfile_expload = explode('.',$sfile_name);
            $sfile_ext = end($sfile_expload);


            $simgfile_name = $_FILES['simage']['name'];
            $simgfile_type = $_FILES['simage']['type'];
            $simgfile_tname = $_FILES['simage']['tmp_name'];

            $simgfile_expload = explode('.',$simgfile_name);
            $simgfile_ext = end($simgfile_expload);

            $saimgfile_name = $_FILES['saimage']['name'];
            $saimgfile_type = $_FILES['saimage']['type'];
            $saimgfile_tname = $_FILES['saimage']['tmp_name'];
            
            $saimgfile_expload = explode('.',$saimgfile_name);
            $saimgfile_ext = end($saimgfile_expload);


            $audio_extension = ['mp3'];
            $image_extension = ['jpg'];

            if(in_array($sfile_ext, $audio_extension) === true) {
                if(in_array($simgfile_ext, $image_extension) === true) {
                    if(in_array($simgfile_ext, $image_extension) === true) {
                        if(move_uploaded_file($sfile_tname, "../Tracks/".$sfile_name) && move_uploaded_file($simgfile_tname, "../image/".$simgfile_name) && move_uploaded_file($saimgfile_tname, "../Aimage/".$saimgfile_name)){
                            $query = "INSERT INTO  song (sname, sartist, sgenre, ssong, simage, saimage) VALUES('{$sname}', '{$sartist}', '{$sgenre}', '{$sfile_expload[0]}', '{$simgfile_expload[0]}', '{$saimgfile_expload[0]}')";
                            $sql = mysqli_query($conn,$query);
                            if($sql){
                                if($rid != ""){
                                    $requpdate = "UPDATE requests SET status = 'Done' WHERE  rid = '{$rid}'";
                                    $rsql = mysqli_query($conn,$requpdate);
                                    if($rsql){
                                        echo "Success";
                                    }
                                }
                                echo "Success";
                            }
                            else{
                                echo "Some Error occured";
                            }
                        }
                        else{
                            echo "Some Error in uploading file to the Location";
                        }
                    }
                    else{
                        echo "Please select the Image file in Artist - jpg";
                    }
                }
                else{
                    echo "Please select the Image file in Song - jpg";
                }
            }
            else{
                echo "Please select the Audio file - mp3";
            }
        }
        else{
            echo "No FILE found";
        }
        // echo "Success";
    }
    else{
        echo "All the fields are required   ";
    }
?>