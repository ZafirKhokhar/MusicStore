<?php
    include_once "config.php";
    // include_once "artistSearch.php";
    $search_value = mysqli_real_escape_string($conn,$_POST["searchTerm"]);

        $query = "SELECT * FROM song WHERE sartist LIKE '%{$search_value}%' ";
        $sql = mysqli_query($conn, $query);
        $outputimg = "";
    
    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
        $outputimg = '<img src="Aimage/'.$row['saimage'].'.jpg" alt="">
                        <div style="z-index: 1;" class="card-img-overlay d-flex justify-content-end align-items-end">
                        <h1 class="card-title"><b>'.$row['sartist'].'</b></h1>
                        </div>';
    }
    else{
        $outputimg = '<img src="Aimage/NoArtist.jpg" alt="">
                        <div style="z-index: 1;" class="card-img-overlay d-flex justify-content-end align-items-end">
                        <h1 class="card-title"><b></b></h1>
                        </div>';
    }
    echo $outputimg;
?>