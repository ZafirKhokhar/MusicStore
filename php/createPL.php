<?php
    session_start();
    include_once "config.php";
    
    $search_value = mysqli_real_escape_string($conn,$_POST["searchTerm"]);
    if(isset($_SESSION['uid']) && $search_value != "")
    {
        $check = "SELECT * FROM playlist WHERE uid = '{$_SESSION['uid']}' AND plname = '{$search_value}' ";
        $sqlcheck = mysqli_query($conn, $check);
        if(mysqli_num_rows($sqlcheck) > 0){
            echo 'Playlist of this Name Already Exist ';
        }
        else {
            $query = "INSERT INTO playlist (plname,uid) VALUES('{$search_value}','{$_SESSION['uid']}')";
            $sql = mysqli_query($conn, $query);
            if($sql){
                $query = "SELECT * FROM playlist WHERE uid = '{$_SESSION['uid']}'";
                $sql = mysqli_query($conn, $query);
                $output = "";
                if(mysqli_num_rows($sql) > 0){
                    while($row = mysqli_fetch_assoc($sql))
                    {
                        $output .= '<a href="listpl.php?plid='.$row['plid'].'">
                                        <li>
                                        <div class="s-row ">
                                        <div class="song-info">
                                            <div class="song-detail">
                                            <span class="name">'.$row['plname'].'</span>
                                            </div>
                                        </div></a>
                                        <div class="more">
                                            <!-- <span id="song1" class="audio-duration">3:40 </span> -->
                                            <a href="playsong.php?list='.$row['plid'].'"><i id="Play" class="material-icons">play_arrow</i></a>    
                                            <a onclick="removePL('.$row['plid'].')"><i id="close" class="material-icons">close</i></a>
                                        </div>
                                        </div>
                                    </li>';
                    }            
                }
                else{
                    $output = '<br><br><h4 class="text-muted" style="text-align: center;">You do not have any Playlist <br><br><i style="font-size: 100px;" class="far fa-heart"></i> &nbsp &nbsp <i style="font-size: 100px;" class="fas fa-heart"></i><h5>';
                }
                echo $output;
            }
            else {
                echo "Some Error ";
            }
        }
    }
    else{
        echo "no value set";
    }
?>