<?php
    session_start();
    include_once 'config.php';

    $query = "SELECT * FROM requests JOIN users WHERE requests.uid = users.uid ";
    $sql = mysqli_query($conn,$query);
    $output1 = "";
    $output2 = "";
    $output = "";

    $count = 0;
    $output1 .= "<h5>Requests</h5>";
    $output2 .= "<h5>Responded</h5>";
    if (mysqli_num_rows($sql) > 0 ) {
        while ($row = mysqli_fetch_assoc($sql)) {
            if ($row['status'] == "Pending") {
                $output1 .= '<li>
                                <div class="s-row">
                                <div class="song-info">
                                    <div class="image-data">
                                    <img src="image/pending.jpg" alt="">
                                    </div>
                                    <div class="song-detail">
                                    <span class="name">'.$row['rsong'].'</span>
                                    <p class="artist">User : '.$row['uname'].'</p>
                                    </div>
                                </div>
                                <div class="more">
                                    <a onclick="setrid('.$row['rid'].')" data-bs-toggle="modal" data-bs-target="#exampleModal"><i id="add" class="material-icons-outlined">add_box</i></a>
                                </div>
                                </div>
                            </li>';   
                            $count++;
            }
            if ($row['status'] == "Done") {
                $output2 .= '<li>
                                <div class="s-row">
                                <div class="song-info">
                                    <div class="image-data">
                                    <img src="image/done2.svg" alt="">
                                    </div>
                                    <div class="song-detail">
                                    <span class="name">'.$row['rsong'].'</span>
                                    <p class="artist">User : '.$row['uname'].'</p>
                                    </div>
                                </div>
                                <div class="more">
                                    <a><i id="done" class="material-icons-outlined">done</i></a>
                                </div>
                                </div>
                            </li>';
            }
            // else {
            //     $output2 .= '<br><br><h4 class="text-muted" style="text-align: center;">No Responces for Users <br><br> <i style="font-size: 50px; opacity: 0.7;" class="fas fa-inbox"></i> <h5>';
            // }
        }
        if ($count == 0) {
            $output1 .= '<br><h4 class="text-muted" style="text-align: center;">Currently No Requests from Users <br><br> <i style="font-size: 50px; opacity: 0.7;" class="fas fa-inbox"></i> <h5>';
        }
    }
    else {
        $output = '<br><br><h4 class="text-muted" style="text-align: center;">No Requests from Users <br><br> <i style="font-size: 100px;" class="fas fa-inbox"></i> <h5>';
    }
    $output = $output1;
    $output .= $output2;
    echo $output;
?>