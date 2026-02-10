<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="signup-in.css">
</head>

<body>
    <?php
        session_start();
            include_once "php/config.php";
            error_reporting(0);
            $msg = mysqli_real_escape_string($conn, $_GET['msg']);
            $msg2 = mysqli_real_escape_string($conn, $_GET['msg2']);
            if($msg2 != ""){
                $_SESSION['flag'] = 1;
            }
            else{
                $_SESSION['flag'] = 0;
            }
        ?>
    <div class="cont">
        <div class="form sign-in" style="padding-top: 80px;">
            <h2>Welcome back,</h2>
            <p id="message"><?php echo $msg ?></p>
            <form action="php/login.php" method="POST">
                <label>
                    <span>Email</span>
                    <input type="email" name="uemail" />
                </label>
                <label>
                    <span>Password</span>
                    <input type="password" name="upass" />
                </label>
                <button type="submit" class="submit">Sign In</button>
            </form>
            <div class="wavebox" style="margin-top: 134px;">
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
                <!--10 -->
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
                <!--20-->
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
                <!--30-->
            </div>
        </div>
        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">
                    <h2>New here?</h2>
                    <p>Sign up and Experience great varity of Muisc!</p>
                </div>
                <div class="img__text m--in">
                    <h2>One of us?</h2>
                    <p>If you already has an account, just sign in. We've missed you!</p>
                </div>
                <div class="img__btn">
                    <span class="m--up">Sign Up</span>
                    <span class="m--in">Sign In</span>
                </div>
            </div>
            <div class="form sign-up">
                <h2>Time to feel the Music,</h2>
                <p id="message"><?php echo $msg2 ?></p>
                <form action="php/signup.php" method="POST">
                    <label>
                        <span>Name</span>
                        <input type="text" name="uname" />
                    </label>
                    <label>
                        <span>Email</span>
                        <input type="email" name="uemail" />
                    </label>
                    <label>
                        <span>Password</span>
                        <input type="password" name="upass" />
                    </label>
                    <button type="submit" class="submit">Sign Up</button>
                </form>
                <div class="wavebox">
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <!--10 -->
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <!--20-->
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <!--30-->
                </div>
            </div>
        </div>
    </div>

    <script>
    document.querySelector('.img__btn').addEventListener('click', function() {
        document.querySelector('.cont').classList.toggle('s--signup');
    });
    // var flag = $_SESSION['flag'];
    // alert($_SESSION['flag']);
    // if(flag == 1){
    //     document.querySelector('.cont').classList.toggle('s--signup');
    // }
    </script>
</body>

</html>