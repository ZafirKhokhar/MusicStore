<?php
    session_start();
    include_once "php/config.php";
    $plist = $_GET["plid"];
    error_reporting(0);
    $sql2 = mysqli_query($conn, "SELECT * FROM playlist WHERE plid = '{$plist}'");
    if(mysqli_num_rows($sql2) > 0){
    $row2 = mysqli_fetch_assoc($sql2);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Store - Playlist</title>

    <link href = "https://fonts.googleapis.com/icon?family=Material+Icons" rel = "stylesheet">
    <script src="https://kit.fontawesome.com/4dda9c99ff.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,300&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="listpl.css">
</head>
<body>
  <?php
    error_reporting(0);
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE uid = '{$_SESSION['uid']}'");
    if(mysqli_num_rows($sql) > 0){
      $row = mysqli_fetch_assoc($sql);
    }
  ?>
    <div class="nav-bar">
        <div class="logo">
            <img src="image/logo.png" alt="">
        </div>
        <div class="search">
            <form action="#">
                <button><i class="fas fa-search"></i></button>
                <input type="text" placeholder="Search Songs">
            </form>
        </div>
        <div class="sign_up_in">
          <?php
            if($row['uemail'] == "")
            {
              echo '<a href="signup-in.php">SignUp/Login</a> ';
            }
            else{
              echo '<a><i class="far fa-user-circle"></i><b>'.$row['uname']. '<b></a> ';
            }
          ?>
            <!-- <a>SignUp</a> / <a> Login</a>  -->
        </div>
        <div class="sign_out">
          <?php
            if($row['uemail'] != "")
            {
              echo '<a href="php/logout.php"><i class="fas fa-sign-out-alt"></i></a=> ';
            }
            // else{
            //   echo '<a href="logout.php"><i class="fas fa-sign-out-alt"></i></a=> ';
              
            // }
          ?>
            <!-- <a>SignUp</a> / <a> Login</a>  -->
        </div>
    </div>

    <div class="main">
        <div class="left-container">
          <div class="sidebar">
              <ul>
                  <li><a href="home.php"><i class="fas fa-home"></i>Home</a></li>
                  <?php
                    if($_SESSION['uid'] == "")
                    {
                      echo '<li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-heart"></i>Favourite</a></li>';
                    }
                    else {
                      echo '<li><a href="favourite.php"><i class="fas fa-heart"></i>Favourite</a></li>';
                    }
                  ?>
                  <!-- <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-heart"></i>Favourite</a></li> -->
                  <li><a href="search.php"><i class="fas fa-search"></i>Search</a></li>
                  <li><a href="artists.php"><i class="fas fa-user"></i>Artists</a></li>
                  <li><a href="genre.php"><i class="fas fa-record-vinyl"></i>Genre</a></li>
                  <?php
                    if($_SESSION['uid'] == "")
                    {
                      echo '<li class="active"><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-stream"></i>Playlist</a></li>';
                    }
                    else {
                      echo '<li class="active"><a href="playlist.php"><i class="fas fa-stream"></i>Playlist</a></li>';
                    }
                  ?>

                  <?php
                    if($_SESSION['uid'] == "")
                    {
                      echo '<li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-sliders-h"></i>Library</a></li>';
                    }
                    else {
                      echo '<li><a href="library.php"><i class="fas fa-sliders-h"></i>Library</a></li>';
                    }
                  ?>
              </ul>
          </div>
          <div class="sidebarSmall">
            <ul>
                <li data-bs-toggle="tooltip" data-bs-placement="right" title="Home"><a href="home.php"><i class="fas fa-home"></i></a></li>
                <?php
                    if($_SESSION['uid'] == "")
                    {
                      echo '<li class="active" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-toggle="tooltip" data-bs-placement="right" title="Favourite"><a href="#"><i class="fas fa-heart"></i></a></li>';
                    }
                    else {
                      echo '<li class="active" data-bs-toggle="tooltip" data-bs-placement="right" title="Favourite"><a href="favourite.php"><i class="fas fa-heart"></i></a></li>';
                    }
                  ?>
                <li data-bs-toggle="tooltip" data-bs-placement="right" title="Search"><a href="search.php"><i class="fas fa-search"></i></a></li>
                <li data-bs-toggle="tooltip" data-bs-placement="right" title="Artists"><a href="artists.php"><i class="fas fa-user"></i></a></li>
                <li data-bs-toggle="tooltip" data-bs-placement="right" title="genre"><a href="genre.php"><i class="fas fa-record-vinyl"></i></a></li>
                <?php
                    if($_SESSION['uid'] == "")
                    {
                      echo '<li data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-toggle="tooltip" data-bs-toggle="tooltip" data-bs-placement="right" title="Playlist"><a href="#"><i class="fas fa-stream"></i></a></li>';
                    }
                    else {
                      echo '<li data-bs-toggle="tooltip" data-bs-placement="right" title="Playlist"><a href="Playlist.php"><i class="fas fa-stream"></i></a></li>';
                    }
                  ?>

                <?php
                    if($_SESSION['uid'] == "")
                    {
                      echo '<li data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-toggle="tooltip" data-bs-placement="right" title="Library"><a href="#"><i class="fas fa-sliders-h"></i></a></li>';
                    }
                    else {
                      echo '<li data-bs-toggle="tooltip" data-bs-placement="right" title="Library"><a href="library.php"><i class="fas fa-sliders-h"></i></a></li>';
                    }
                  ?>
            </ul>
          </div>
        </div>

        <!-- modal start -->
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog mode modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Create Playlist</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body h-100 mt-3 mb-3">
                <form id="myForm" onsubmit="createPL()">
                  <label class="form-label">Playlist Name</label>
                  <input type="text" id="cplaylist" class="form-control" placeholder="Type Playlist Name...">
                  <button type="submit" class="btn btn-secondary fw-bold mt-3" data-bs-dismiss="modal">Create</button>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">Cancle</button>
                <!-- <a href="signup-in.php" class="btn fw-bold">SignUp/Login</a> -->
              </div>
            </div>
          </div>
        </div>
        <!-- modal end -->
    
        <div class="right-container">
          <div class="heading">
            <h4><b>My Playlist</b></h4>
          </div>

          <div class="search-list">
              <div class="list_heading">
                <div class="listname"><h4><b><?php echo $row2['plname']; ?></b></h4></div>
                <div class="playbtn"><a href="playsong.php?list=<?php echo $row2['plid']; ?>"><i id="Play" class="material-icons">play_arrow</i></a></div>
              </div>
              <p id="search_data"></p>
              <ul id="plist">

                
              </ul>
            </div>
          </div>
        

    </div>
<br><br>
    <!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">
    <!-- Section: Social media -->
    <section
      class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
    >
      <!-- Left -->
      <div class="me-5 d-none d-lg-block">
        <span>Get connected with us on social networks:</span>
      </div>
      <!-- Left -->
  
      <!-- Right -->
      <div>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-google"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-linkedin"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-github"></i>
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->
  
    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              <img src="image/logo.png" style="height: 200px;" class="fas fa-gem me-3"></img>
            </h6>
            <p>
                Let the Music Speak! Life is a song, love is the music. Like music to my ears. Love is my weapon, music is my religion, peace is in my soul.
            </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Pages
            </h6>
            <p>
              <a href="#!" class="text-reset">Albums</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Artists</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Search</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Library</a>
            </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Useful links
            </h6>
            <p>
              <a href="#!" class="text-reset">Feedback</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Settings</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Download</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Help</a>
            </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Contact
            </h6>
            <p><i class="fas fa-home me-3"></i> Rajkot, INDIA</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              musicstore@gmail.com
            </p>
            <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
            <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->
  
    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2021 Copyright:
      <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MusicStore.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->


    <script>
      var form = document.getElementById("myForm");
      function handleForm(event) { 
        event.preventDefault(); } 
      form.addEventListener('submit', handleForm);


      var cPlaylist = document.getElementById("cplaylist");
      var search_data2 = document.getElementById("search_data");
      var pList = document.getElementById("plist");

      function removePLS(songid, songlist) {
          let removeTerm = songid;
          let spl = songlist;
            if(removeTerm != ""){
              alert("It takes the value");
                // cPlaylist.classList.add("active");
                let xhr2 = new XMLHttpRequest();
                xhr2.open("POST","php/removePLS.php",true);
                xhr2.onload = ()=>{
                    if(xhr2.readyState === XMLHttpRequest.DONE){
                        if(xhr2.status === 200){
                            let data = xhr2.response;
                            pList.innerHTML = data;
                        }
                    }
                }
                xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr2.send("sid=" + removeTerm + "&plid=" + spl);
        }
        else {
                search_data2.innerHTML = "<h4 class='text-muted' style='text-align: center;'>Not Input name</h4>";
            }
      };

      window.onload = function(){
        let plid = <?php echo $plist?>;
        if(plid != ""){
            // searchsong.classList.add("active");
            let xhr = new XMLHttpRequest();
            xhr.open("POST","php/getplaylistsong.php",true);
            xhr.onload = ()=>{
                if(xhr.readyState === XMLHttpRequest.DONE){
                    if(xhr.status === 200){
                        let data = xhr.response;
                        data =
                        pList.innerHTML = data;
                    }
                }
            }
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("plid=" + plid);
        }
        else {
            pList.innerHTML = "Need to login";
        }
    }
    </script>
</body>
</html>