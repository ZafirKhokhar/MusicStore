<?php
    session_start();
    include_once "config.php";
    
    $search_value = mysqli_real_escape_string($conn,$_POST["searchTerm"]);
    if(isset($_SESSION['uid']))
    {
        $query = "SELECT * FROM favourite JOIN song WHERE favourite.sid = song.sid AND uid = '{$search_value}'";
        $sql = mysqli_query($conn, $query);
        $output = "";
        if(mysqli_num_rows($sql) > 0){
            while($row = mysqli_fetch_assoc($sql))
            {
                $output .= '<a href="play.php?ssid='.$row['sid'].'">
                            <li>
                                <div class="s-row">
                                <div class="song-info">
                                    <div class="image-data">
                                    <img src="image/'.$row['simage'].'.jpg" alt="">
                                    </div>
                                    <div class="song-detail">
                                    <span class="name">'.$row['sname'].'</span>
                                    <p class="artist">'.$row['sartist'].'</p>
                                    </div>
                                </div>
                                <div class="more">
                                    <audio class="song1" src="Tracks/'.$row['ssong'].'.mp3"></audio>
                                    <!-- <span id="song1" class="audio-duration">3:40 </span> -->
                                    <i id="favorite-tick" class="material-icons">favorite</i></a>
                                    <a onclick="removeFav('.$row['sid'].')"><i id="close" class="material-icons">close</i></a>
                                </div>
                                </div>
                            </li>';
            }            
        }
        else{
            $output = '<br><br><h4 class="text-muted" style="text-align: center;">You do not have any songs in Favourite <br><br><i style="font-size: 100px;" class="far fa-heart"></i> &nbsp &nbsp <i style="font-size: 100px;" class="fas fa-heart"></i><h5>';
        }
        echo $output;
    }
    else{
        echo "error";
    }
?>

<!-- style="width: 350px; height: 350px; margin-left: 10vw; opacity: 0.5;" -->