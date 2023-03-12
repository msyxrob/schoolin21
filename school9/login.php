<?php 
    session_start();
    include("db.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Мактаби Президентӣ</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- ElegantFonts CSS -->
    <link rel="stylesheet" href="css/elegant-fonts.css">

    <!-- themify-icons CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="hero-content">
        <header class="site-header">
            <div class="top-header-bar">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-lg-6 d-none d-md-flex flex-wrap justify-content-center justify-content-lg-start mb-3 mb-lg-0">
                            <div class="header-bar-email d-flex align-items-center">
                                <i class="fa fa-envelope"></i><a href="#">********@gmail.com</a>
                            </div><!-- .header-bar-email -->

                            <div class="header-bar-text lg-flex align-items-center">
                                <p><i class="fa fa-phone"></i>***********</p>
                            </div><!-- .header-bar-text -->
                        </div><!-- .col -->

                        <div class="col-12 col-lg-6 d-flex flex-wrap justify-content-center justify-content-lg-end align-items-center">

                            <div class="header-bar-menu">
                                <ul class="flex justify-content-center align-items-center py-2 pt-md-0">
                                </ul>
                            </div><!-- .header-bar-menu -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .container-fluid -->
            </div><!-- .top-header-bar -->

            <div class="nav-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div>
                                <center>
                                    <h1 class="site-title"><a href="index.php" rel="home">Мактаби<span style="margin-left: 10px;">Президентӣ</span></a></h1>
                                </center>
                            </div><!-- .site-branding -->
                        </div><!-- .col -->
                  </div><!-- .row -->
                </div><!-- .container -->
            </div><!-- .nav-bar -->
        </header><!-- .site-header -->

        <div class="hero-content-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                     <div class="wrapper">
                        <div class="form-area">
                            <div class="form-text">
                                <form method="post">
                                    <h1>Логин</h1>
                                    <style type="text/css">
                                        input, select, button{
                                            margin-top: 35px !important;
                                            height: 50px !important;
                                        }
                                        i{
                                            top: 17px !important;
                                        }
                                    </style>
                                <div class="input-one"><i class="fa fa-user"></i> <input type="text" name="login" required="" placeholder="Login"></div>
                                <div class="input-one"><i class="fa fa-unlock-alt"></i> <input type="password" required="" placeholder="Пароль" name="password"></div>
                                <div class="input-one"><i class="fa fa-users"></i> 
                                    <center>
                                        <select name="who">
                                            <option value="pupils">Талаба</option>
                                            <option value="parents">Волидайн</option>
											<option value="teacher">Муаллим</option>
                                        </select>
                                    </center>
                                </div>
                                <button type="submit" name="check">Дохил шудан</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .hero-content-hero-content-overlay -->
    </div><!-- .hero-content -->

</body>
</html>
<?php 
    if (isset($_POST['check'])) {
        $login = $_POST['login'];
        $who = $_POST['who'];
        $password = $_POST['password'];
            $select = "select * from ".$who." where login = '$login' and password = '$password'";
            $count = mysqli_num_rows(mysqli_query($con, $select));    
            if ( $count == 1 ) {
                $_SESSION['who'] = $who;
                $_SESSION['login'] = $login;
                $_SESSION['password'] = $password;  
                 echo "<script>alert('Марҳамат намоед!')</script>";
                 if($who == "pupils" or $who == "parents"){
                     echo "<script>window.open('user/index.php?dashboard', '_self')</script>";
                }else{
                     echo "<script>window.open('".$who."/index.php?dashboard', '_self')</script>";
                }
            }else{
                echo "<script>alert('Аввал регистрация кунед!')</script>";
            }
    }
 ?>