<?php
    session_start();
    include_once "config.php";
        $search_value = mysqli_real_escape_string($conn,$_POST["searchTerm"]);

        $query = "SELECT * FROM song WHERE sgenre = '{$search_value}' ";
        $sql = mysqli_query($conn, $query);
        $output = "";
        $output .= '<br>
        <h4>Gener - '.$search_value.'</h4>
        <div class="search-list">
        <ul>';
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
                                    <audio class="song1" src="Tracks/'.$row['ssong'].'.mp3"></audio>
                                    <span id="song1" class="audio-duration"> </span>
                                </div>
                            </li>
                            </a>';
            }
        }
        else{
            $output .= '<br><br><h4 class="text-muted" style="text-align: center;">No match found for - " '.$search_value.' "<h5>';
        }
        $output .= '</ul>
        </div>';
        echo $output;


?>

<!-- echo '<h4 class="text-muted" style="text-align: center;">Search by Song Name, Artist Or Genre<h5>'; -->

<!-- <script>
                                let audioduration=document.getElementById("audio-d").duration;
                                let tminutes = Math.floor(audioduration / 60);
                                let tseconds = Math.floor(audioduration % 60);
                                if(tseconds < 10)
                                {
                                    tseconds =`0${tseconds}`;
                                }
                                document.getElementById("song-d").innerHTML = `${tminutes}:${tseconds}`;
                                </script> -->