<?php
    session_start();
    include_once "php/config.php";
    if(isset($_SESSION['uid'])){
      header('location:home.php');
    }
    if($_SESSION['adminid'] == ""){
      header('location:home.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Store - Home</title>

    <link href = "https://fonts.googleapis.com/icon?family=Material+Icons" rel = "stylesheet">
    <script src="https://kit.fontawesome.com/4dda9c99ff.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,300&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="MSadmin.css">
</head>
<body>
  <?php
    error_reporting(0);
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE uid = '{$_SESSION['adminid']}'");
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
              echo '<a href="php/logout.php"><i class="fas fa-sign-out-alt"></i></a> ';
            }
            // else{
            //   echo '<a href="logout.php"><i class="fas fa-sign-out-alt"></i></a> ';
              
            // }
          ?>
            <!-- <a>SignUp</a> / <a> Login</a>  -->
        </div>
    </div>

            <!-- modal start -->
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog mode modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Song</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body h-100 mt-3 mb-3">
                <form class="space" id="myForm">
                  <p class="error-txt"></p>

                  <label class="form-label">Song Name</label>
                  <input type="text" id="sname" name="sname" class="form-control" placeholder="Song Name...">
                  <label class="form-label">Artist Name</label>
                  <input type="text" id="sartist" name="sartist" class="form-control" placeholder="Artist Name...">
                  <label class="form-label">Song Genre</label>
                  <!-- <input type="text" id="sgenre" class="form-control" placeholder="Song Genre..."> -->
                  <select id="sgenre" name="sgenre" class="form-select" aria-label="Default select example">
                    <option selected value="">Song Genre...</option>
                    <option value="Electronic">Electronic</option>
                    <option value="Sad">Sad</option>
                    <option value="Rock">Rock</option>
                    <option value="Dance">Dance</option>
                    <option value="Pop">Pop</option>
                  </select>
                  <label class="form-label">Song (mp3)</label>
                  <input type="file" id="ssong" name="ssong" class="form-control" placeholder="File...">
                  <label class="form-label">Song Image (jpg)</label>
                  <input type="file" id="simage" name="simage" class="form-control" placeholder="File...">
                  <label class="form-label">Artist Image File (jpg)</label>
                  <input type="file" id="saimage" name="saimage" class="form-control" placeholder="File...">
                  <button type="submit" class="btn btn-secondary fw-bold mt-3" data-bs-dismiss="modal">Add</button>
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

    <div class="main">
        <div class="admin-container container">
          <div class="options">
            <div class="opt addsong"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Song</button></div>
            <div class="opt updatesong"><button onclick="location.href = 'MSadminRequest.php'" type="button">Requests for Song</button></div>
          </div>
          <div class="search-list">
            <ul id="search_data">
              
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
              <a href="#!" class="text-reset">Genre</a>
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
        var search_data = document.getElementById("search_data");
    window.onload = function(){
      let userid = <?php echo $_SESSION['adminid']?>;
      if(userid != ""){
          // searchsong.classList.add("active");
          let xhr = new XMLHttpRequest();
          xhr.open("POST","php/getsonglist.php",true);
          xhr.onload = ()=>{
              if(xhr.readyState === XMLHttpRequest.DONE){
                  if(xhr.status === 200){
                      let data = xhr.response;
                      search_data.innerHTML = data;
                  }
              }
          }
          xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhr.send("searchTerm=" + userid);
      }
    }

    function deletesong(removesong){
      let songid = removesong;
        if(songid != ""){
            // searchsong.classList.add("active");
            let xhr = new XMLHttpRequest();
            xhr.open("POST","php/delsong.php",true);
            xhr.onload = ()=>{
                if(xhr.readyState === XMLHttpRequest.DONE){
                    if(xhr.status === 200){
                        let data = xhr.response;
                        search_data.innerHTML = data;
                    }
                }
            }
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("Term=" + songid);
        }
    }


    var form1 = document.getElementById("myForm");
      function handleForm(event) { 
        event.preventDefault(); } 
      form1.addEventListener('submit', handleForm);


      // var sname = document.getElementById("sname");
      // var sartist = document.getElementById("sartist");
      // var  sgenre = document.getElementById("sgenre");
      // var  ssong = document.getElementById("ssong");
      // var  simage = document.getElementById("simage");
      // var  saimage = document.getElementById("saimage");
      const form = document.querySelector(".modal-body form"),
      AddBtn = form.querySelector(".space button");
      errorText = form.querySelector(".error-txt");

      function handleForm(event) { 
        event.preventDefault(); } 
      form.addEventListener('submit', handleForm);

     
      // var search_data2 = document.getElementById("search_data");
      // var pList = document.getElementById("plist");

      AddBtn.onclick = ()=> {
        let xhr2 = new XMLHttpRequest();
        xhr2.open("POST","php/Add-SongDB.php",true);
        xhr2.onload = ()=>{
            if(xhr2.readyState === XMLHttpRequest.DONE){
                if(xhr2.status === 200){
                    let data = xhr2.response;
                    if(data == "Success") {
                    errorText.textContent = "SuccessFully Song Added";
                    // location.href = "";
                    form.reset();
                  } else {
                      errorText.textContent = data;
                      errorText.style.display = "block";
                  }
                }
            }
        }
        // xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        // xhr2.send("searchTerm=" + searchTerm);
        let formData = new FormData(form); 
        xhr2.send(formData);
      };
    </script>
</body>
</html>