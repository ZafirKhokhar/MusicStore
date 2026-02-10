<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
    <h2>Download Page</h2>
    <form action="download.php" method="GET">
    <input type="number" id="sid" name="sid">
    <input type="submit" value="Submit">
    </form>
    </center>
    <script>
        // let dsid = document.getElementById('hi');
        
    </script>
</body>
</html>
<?php
    session_start();
    include_once "config.php";
    
    // $sid = mysqli_real_escape_string($conn,$_POST["sid"]);
    $dsid = mysqli_real_escape_string($conn,$_GET["sid"]);
    if(isset($_SESSION['uid']) && $dsid != "")
    {
        // $dsid = mysqli_real_escape_string($conn,$_POST["dsid"]);
        // $sname = $_GET['sid'];
        // if(isset($dsid)){
            
          $dquery = "SELECT * FROM song WHERE sid = {$dsid}";
          $dsql = mysqli_query($conn, $dquery);
          $output = "";
          if(mysqli_num_rows($dsql) > 0){
              $drow = mysqli_fetch_assoc($dsql);
    
              $changename = $drow['sname'].'.mp3';
              $fileName = $drow['ssong'].'.mp3';
              $filePath = '../Tracks/';
              $file = $filePath.$fileName;
    
              if (!file_exists($file)) {
                  http_response_code(404);
                  die();
              }
    
              header("Cache-Control: private");
              header("Content-type: audio/mpeg");
              header("Content-Transfer-Encoding: binary");
              header("Content-Disposition: attachment; filename=".$changename);
              //So the browser can display the download progress
              header("Content-Length: ".filesize($file));
    
              readfile($file);
              echo '<!DOCTYPE html>
              <html lang="en">
              <head>
                  <meta charset="UTF-8">
                  <meta http-equiv="X-UA-Compatible" content="IE=edge">
                  <meta name="viewport" content="width=device-width, initial-scale=1.0">
                  <title>Document</title>
              </head>
              <body>
                  <?php header("location:../play.php");?>
              </body>
              </html>';
              exit();
              $output = "Successfully Downloaded";
              echo $output;
          }
        // }
        else{
            echo "This File Does not Exist.";
        }
        echo $output;
    }
    else{
        echo "error";
    }
?>


<!-- style="width: 350px; height: 350px; margin-left: 10vw; opacity: 0.5;" -->