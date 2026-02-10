<?php
    session_start();
    include_once "config.php";
    
    $search_value = mysqli_real_escape_string($conn,$_POST["uid"]);
    if(isset($_SESSION['uid']))
    {
        $query = "SELECT * FROM playlist WHERE uid = {$search_value}";
        $sql = mysqli_query($conn, $query);
        $output = "";
        if(mysqli_num_rows($sql) > 0){
            $output .= '<optgroup label="Playlist"><li></li></optgroup>';
            while($row = mysqli_fetch_assoc($sql))
            {
                $output .= '<li><a class="dropdown-item" href="#" onclick="addtoPlaylist('.$row['plid'].')">'.$row['plname'].'</a></li>';
            }
            $output .= '<li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="playlist.php">Create new playlist</a></li>';            
        }
        else{
            $output = '<br><br><h4 class="disabled text-muted" style="text-align: center;">You do not have any songs in Favourite <br><br><i style="font-size: 100px;" class="far fa-heart"></i> &nbsp &nbsp <i style="font-size: 100px;" class="fas fa-heart"></i><h5>';
        }
        echo $output;
    }
    else{
        echo "error";
    }
?>

<!-- style="width: 350px; height: 350px; margin-left: 10vw; opacity: 0.5;" -->