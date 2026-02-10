<?php
    session_start();
    include_once 'config.php';

    $query = "SELECT * FROM requests WHERE uid = {$_SESSION['uid']}";
    $sql = mysqli_query($conn,$query);
    $output = "";
    if(mysqli_num_rows($sql) > 0 ){
        $output .= '<h5>Requests</h5>';
        while ($row = mysqli_fetch_assoc($sql)) {
            if($row['status'] == 'Pending'){
                $output .= '<li>
                                <div class="s-row">
                                <div class="song-info">
                                    <div class="image-data">
                                    <img src="image/pending.jpg" alt="">
                                    </div>
                                    <div class="song-detail">
                                    <span class="name">'.$row['rsong'].'</span>
                                    </div>
                                </div>
                                <div class="more">
                                    <!-- <audio class="song1" src="Tracks/.mp3"></audio> -->
                                    <!-- <span id="song1" class="audio-duration">3:40 </span> -->
                                    <a>Pending</a>
                                </div>
                                </div>
                            </li>';
            }
            elseif ($row['status'] == 'Done') {
                $output .= '<li>
                                <div class="s-row">
                                <div class="song-info">
                                    <div class="image-data">
                                    <img src="image/done2.svg" alt="">
                                    </div>
                                    <div class="song-detail">
                                    <span class="name">'.$row['rsong'].'</span>
                                    <!-- <p class="artist">Artist</p> -->
                                    </div>
                                </div>
                                <div class="more">
                                    <a><i id="done" class="material-icons-outlined">done</i></a>
                                </div>
                                </div>
                            </li>';
            }
        }
    }
    else {
        $output = '<br><br><h4 class="text-muted" style="text-align: center;">Happy to see no Songs Requests <br><br> If you need any Song then request Us <br><br>  We are happy to help you <br><br> <i style="font-size: 100px; opacity: 0.7;" class="fas fa-inbox"></i> <h5>';
    }
    echo $output;

?>