<?php
    session_start();
    include_once "config.php";
    
    $search_value = mysqli_real_escape_string($conn,$_POST["uid"]);
    if(isset($_SESSION['uid']))
    {
        $query = "SELECT * FROM playlist WHERE uid = '{$search_value}'";
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
    else{
        echo "error";
    }
?>

<!-- style="width: 350px; height: 350px; margin-left: 10vw; opacity: 0.5;" -->