<?php
    session_start();
    include_once "config.php";
    
        $query = "SELECT * FROM song ORDER BY RAND() LIMIT 4 ";
        $sql = mysqli_query($conn, $query);
        $output = "";
        if(mysqli_num_rows($sql) > 0){
            while($row = mysqli_fetch_assoc($sql))
            {
                $output .= '<a href="play.php?ssid='.$row['sid'].'">
                            <div class="col h-100 col-sm-4 m">
                                <div class="card h-100 p-2">
                                    <img src="image/'.$row['simage'].'.jpg" class="card-img-top rounded-3" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">'.$row['sname'].'</h5>
                                        <h6 class="card-text text-muted fw-bold">'.$row['sartist'].'</h6>
                                    </div>
                                </div>
                            </div></a>';
            }            
        }
        else{
            $output = '<br><br><h4 class="text-muted" style="text-align: center;">Error <br><br><i style="font-size: 100px;" class="far fa-heart"></i> &nbsp &nbsp <i style="font-size: 100px;" class="fas fa-heart"></i><h5>';
        }
        echo $output;
?>

<!-- style="width: 350px; height: 350px; margin-left: 10vw; opacity: 0.5;" -->