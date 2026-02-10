<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Store - Home</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4dda9c99ff.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="genre.css">
</head>

<body>
    <?php
    session_start();
    include_once "php/config.php";
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
              echo '<a href="php/logout.php"><i class="fas fa-sign-out-alt"></i></a> ';
            }
            // else{
            //   echo '<a href="logout.php"><i class="fas fa-sign-out-alt"></i></a> ';
              
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
                    <li class="active"><a href="genre.php"><i class="fas fa-record-vinyl"></i>Genre</a></li>
                    <?php
                    if($_SESSION['uid'] == "")
                    {
                      echo '<li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-stream"></i>Playlist</a></li>';
                    }
                    else {
                      echo '<li><a href="Playlist.php"><i class="fas fa-stream"></i>Playlist</a></li>';
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
                    <li data-bs-toggle="tooltip" data-bs-placement="right" title="Home"><a href="home.php"><i
                                class="fas fa-home"></i></a></li>
                    <?php
                    if($_SESSION['uid'] == "")
                    {
                      echo '<li data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-toggle="tooltip" data-bs-placement="right" title="Favourite"><a href="#"><i class="fas fa-heart"></i></a></li>';
                    }
                    else {
                      echo '<li data-bs-toggle="tooltip" data-bs-placement="right" title="Favourite"><a href="favourite.php"><i class="fas fa-heart"></i></a></li>';
                    }
                  ?>
                    <li data-bs-toggle="tooltip" data-bs-placement="right" title="Search"><a href="search.php"><i
                                class="fas fa-search"></i></a></li>
                    <li data-bs-toggle="tooltip" data-bs-placement="right" title="Artists"><a href="artists.php"><i
                                class="fas fa-user"></i></a></li>
                    <li class="active" data-bs-toggle="tooltip" data-bs-placement="right" title="genre"><a
                            href="genre.php"><i class="fas fa-record-vinyl"></i></a></li>
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
                        <h5 class="modal-title" id="staticBackdropLabel">Enjoy more Features by Logging in</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mt-3 mb-3">
                        <h5>Need to Signup or Login to use this Feature</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">Not Now</button>
                        <a href="signup-in.php" class="btn fw-bold">SignUp/Login</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->

        <div class="right-container">
            <!-- <div class="search">
            <form action="#">
                <button><i class="fas fa-search"></i></button>
                <input type="text" placeholder="Search Albums">
            </form>
          </div> -->

            <h3 class="mt-1 b-2">Genres</h3>
            <div class="container album-list">
                <div class="row row-cols-1 m-1 row-cols-md-4 g-4">
                    <div class="col" onclick="genrecall('Electronic')">
                        <div class="card h-100">
                            <img src="image/Genre/electronic.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Electronic</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col" onclick="genrecall('Sad')">
                        <div class="card h-100">
                            <img src="image/Genre/sad.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Sad</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col" onclick="genrecall('Rock')">
                        <div class="card h-100">
                            <img src="image/Genre/rock.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Rock</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col" onclick="genrecall('Dance')">
                        <div class="card h-100">
                            <img src="image/Genre/dance.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Dance</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col" onclick="genrecall('Pop')">
                        <div class="card h-100">
                            <img src="image/Genre/pop.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">POP</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col" onclick="genrecall('Romentic')">
                        <div class="card h-100">
                            <img src="image/Genre/romantic.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Romentic</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="Search_genre" id="search_data">

                </div>
            </div>


        </div>

    </div>
    <br><br>
    <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
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
                            Let the Music Speak! Life is a song, love is the music. Like music to my ears. Love is my
                            weapon, music is my religion, peace is in my soul.
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

    <script>
    // var searchsong = document.getElementById("ssearch");
    function genrecall(searchsong) {
        let searchTerm = searchsong;
        const search_data = document.getElementById("search_data");
        if (searchTerm != "") {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "php/genrelist.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onload = () => {
                if (xhr.status === 200) {
                    search_data.innerHTML = xhr.responseText;
                } else {
                    console.error('genrelist.php returned', xhr.status, xhr.responseText);
                    search_data.innerHTML =
                        "<h4 class='text-muted' style='text-align: center;'>Error loading genre data</h4>";
                }
            };
            xhr.onerror = () => {
                console.error('Network error while requesting genrelist.php');
                search_data.innerHTML = "<h4 class='text-muted' style='text-align: center;'>Network error</h4>";
            };
            xhr.send("searchTerm=" + encodeURIComponent(searchTerm));
        } else {
            search_data.innerHTML =
                "<h4 class='text-muted' style='text-align: center;'>No Data available for this genre</h4>";
        }
    }
    </script>
</body>

</html>