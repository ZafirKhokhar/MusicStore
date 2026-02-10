<?php
    session_start();
    include_once "config.php";
    
    $plist = mysqli_real_escape_string($conn,$_POST["plid"]);
    if(isset($_SESSION['uid']) && $plist != "")
    {
        $query = "SELECT * FROM songpl JOIN song WHERE uid = {$_SESSION['uid']} AND plid = {$plist} AND song.sid = songpl.sid";
        $sql = mysqli_query($conn, $query);
        $output = "";
        if(mysqli_num_rows($sql) > 0){
            while($row = mysqli_fetch_assoc($sql))
            {
                $output .= '<a href="listpl.php?plid='.$row['plid'].'">
                                <li>
                                <div class="s-row ">
                                <div class="song-info">
                                    <div class="image-data">
                                        <img src="image/'.$row['simage'].'.jpg" alt="">
                                    </div>
                                    <div class="song-detail">
                                        <span class="name">'.$row['sname'].'</span>
                                        <p class="artist">'.$row['sartist'].'</p>
                                    </div>
                                </div></a>
                                <div class="more">
                                    <!-- <span id="song1" class="audio-duration">3:40 </span> -->
                                    <a href="play.php?ssid='.$row['sid'].'"><i id="Play" class="material-icons">play_arrow</i></a>    
                                    <a onclick="removePLS('.$row['sid'].','.$row['plid'].')"><i id="close" class="material-icons">close</i></a>
                                </div>
                                </div>
                            </li>';
            }            
        }
        else{
            $output = '<br><br><h4 class="text-muted" style="text-align: center;">You do not have any songs in this Playlist <br><br><img style="opacity:0.3; width: 150px; height:150px;" src="image/nolist.png"><h5>';
        }
        echo $output;
    }
    else{
        echo "error";
    }
?>

<!-- style="width: 350px; height: 350px; margin-left: 10vw; opacity: 0.5;" -->