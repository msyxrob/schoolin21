
<?php 
    include("db.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Школа №9</title>

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
    
    
    <link rel="stylesheet" href="css/media.css">

    <!-- Styles -->
    <link rel="stylesheet" href="style.css">
</head>
<body id="body">
    <div class="hero-content">
        <header class="site-header">
            <div class="top-header-bar">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-sm-8 col-lg-6 d-none d-md-flex flex-wrap justify-content-center justify-content-lg-start mb-3 mb-lg-0 marg">
                            <div class="header-bar-email d-flex align-items-center">
                                <i class="fa fa-envelope"></i><a href="#">******@gmail.com</a>
                            </div><!-- .header-bar-email -->

                            <div class="header-bar-text lg-flex align-items-center">
                                <p><i class="fa fa-phone"></i>*********</p>
                            </div><!-- .header-bar-text -->
                        </div><!-- .col -->
                        <div class="col-12 col-sm-3 col-lg-6 d-flex flex-wrap justify-content-center justify-content-lg-end align-items-center">

                            <div class="header-bar-menu">
                                <ul class="flex justify-content-center align-items-center py-2 pt-md-0">
                                    <li><a href="login.php" class="color2">Даромадан ба ҳуҷраи хусусӣ</a></li>
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
                                    <h1 class="site-title"><a href="index.php" rel="home">Мактаби<span>Президентӣ</span></a></h1>
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
                        <div class="hero-content-wrap flex flex-column justify-content-center align-items-start">
                            <header class="entry-header">
                                <h4>Мактаби Президентӣ<b></b></h4>
                                <h1>Яке аз беҳтарин муассисаҳо<br/>дар Хуҷанд</h1>
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                 <h5>Мактаби Президентии шаҳри Бӯстон аз соли **** инҷониб фаъолити худро давом дода истодааст.</h5>
                            </div><!-- .entry-content -->
                        </div><!-- .hero-content-wrap -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .hero-content-hero-content-overlay -->
    </div><!-- .hero-content -->

    <div class="icon-boxes">
        <div class="container-fluid">
            <div class="flex flex-wrap align-items-stretch">
                <div class="icon-box">
                    <div class="icon">
                        <span class="ti-user"></span>
                    </div><!-- .icon -->

                    <header class="entry-header">
                        <h2 class="entry-title">Ҳуҷраи шахсӣ</h2>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <p>Регистрация кунеду соҳиби ҳyҷраи шахсӣ (личный кабинет) шуда бо баҳоҳои фарзандатон шинос шавед.</p>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer read-more">
                        <a href="login.php">Муфассалтар<i class="fa fa-long-arrow-right"></i></a>
                    </footer><!-- .entry-footer -->
                </div><!-- .icon-box -->

                <div class="icon-box">
                    <div class="icon">
                        <span class="ti-folder"></span>
                    </div><!-- .icon -->

                    <header class="entry-header">
                        <h2 class="entry-title">Маълумот оиди муаллимон</h2>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <p>Шиносоӣ бо муаллимони мактаб ва фарзандонатон</p>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer read-more">
                        <a href="teachers.php">Муфассалтар<i class="fa fa-long-arrow-right"></i></a>
                    </footer><!-- .entry-footer -->
                </div><!-- .icon-box -->

                <div class="icon-box">
                    <div class="icon">
                        <span class="ti-book"></span>
                    </div><!-- .icon -->

                    <header class="entry-header">
                        <h2 class="entry-title">Журнали синфӣ</h2>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <p>Журнали синфии солҳои муайян барои шиносоӣ бо баҳоҳову нимсолаҳо</p>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer read-more">
                        <a href="#">Муфассалтар<i class="fa fa-long-arrow-right"></i></a>
                    </footer><!-- .entry-footer -->
                </div><!-- .icon-box -->

                <div class="icon-box">
                    <div class="icon">
                        <span class="ti-world"></span>
                    </div><!-- .icon -->

                    <header class="entry-header">
                        <h2 class="entry-title">Боз дар муассиса</h2>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <ul>
                            <li>Регистратсия</li>
                            <li>Даромадан ба ҳуҷраи шахсӣ</li>
                            <li>Маълумот оиди баҳоҳо ва чорабиниҳо дар "Хабарҳо"</li>
                        </ul>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer read-more">
                        <a href="#">Муфассалтар<i class="fa fa-long-arrow-right"></i></a>
                    </footer><!-- .entry-footer -->
                </div><!-- .icon-box -->
            </div><!-- .row -->
        </div><!-- .container-fluid -->
    </div><!-- .icon-boxes -->
  <section class="featured-courses horizontal-column courses-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="heading flex justify-content-between align-items-center lesssons_index">
                        <big class="h2_index">Дарсҳо - Расписания</big>

                        <a class="btn mt-4 mt-sm-0 but" href="#">Муфассалтар</a>
                    </header><!-- .heading -->
                </div><!-- .col -->

                <div class="col-12 col-lg-6">
                    <div class="course-content flex flex-wrap justify-content-between align-content-lg-stretch">
                        <figure class="course-thumbnail">
                            <a href="#"><img src="images/1.jpg" alt=""></a>
                        </figure><!-- .course-thumbnail -->

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="#">Математика</a></h2>

                                <div class="entry-meta flex flex-wrap align-items-center">
                                    <div class="course-author"><a href="#">Мансурова</a></div>

                                </div><!-- .course-date -->
                            </header><!-- .entry-header -->

                            <footer class="entry-footer flex justify-content-between align-items-center">
                                <div class="course-cost">
                                </div><!-- .course-cost -->
                            </footer><!-- .entry-footer -->
                        </div><!-- .course-content-wrap -->
                    </div><!-- .course-content -->
                </div><!-- .col -->

                <div class="col-12 col-lg-6">
                    <div class="course-content flex flex-wrap justify-content-between align-content-lg-stretch">
                        <figure class="course-thumbnail">
                            <a href="#"><img src="images/2.jpg" alt=""></a>
                        </figure><!-- .course-thumbnail -->

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="#">Биология</a></h2>

                                <div class="entry-meta flex flex-wrap align-items-center">
                                    <div class="course-author"><a href="#">Нуров МЭЛС</a></div>

                                </div><!-- .course-date -->
                            </header><!-- .entry-header -->

                            <footer class="entry-footer flex justify-content-between align-items-center">
                                <div class="course-cost">
                                </div><!-- .course-cost -->
                            </footer><!-- .entry-footer -->
                        </div><!-- .course-content-wrap -->
                    </div><!-- .course-content -->
                </div><!-- .col -->
                 <div class="col-12 col-lg-6">
                    <div class="course-content flex flex-wrap justify-content-between align-content-lg-stretch">
                        <figure class="course-thumbnail">
                            <a href="#"><img src="images/1.jpg" alt=""></a>
                        </figure><!-- .course-thumbnail -->

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="#">Технологияи иттилоотӣ</a></h2>

                                <div class="entry-meta flex flex-wrap align-items-center">
                                    <div class="course-author"><a href="#">Соҳибназаров</a></div>

                                </div><!-- .course-date -->
                            </header><!-- .entry-header -->

                            <footer class="entry-footer flex justify-content-between align-items-center">
                                <div class="course-cost">
                                </div><!-- .course-cost -->
                            </footer><!-- .entry-footer -->
                        </div><!-- .course-content-wrap -->
                    </div><!-- .course-content -->
                </div><!-- .col -->
                 <div class="col-12 col-lg-6">
                    <div class="course-content flex flex-wrap justify-content-between align-content-lg-stretch">
                        <figure class="course-thumbnail">
                            <a href="#"><img src="images/1.jpg" alt=""></a>
                        </figure><!-- .course-thumbnail -->

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="#">Забони модарӣ</a></h2>

                                <div class="entry-meta flex flex-wrap align-items-center">
                                    <div class="course-author"><a href="#">Шокирова</a></div>

                                </div><!-- .course-date -->
                            </header><!-- .entry-header -->

                            <footer class="entry-footer flex justify-content-between align-items-center">
                                <div class="course-cost">
                                </div><!-- .course-cost -->
                            </footer><!-- .entry-footer -->
                        </div><!-- .course-content-wrap -->
                    </div><!-- .course-content -->
                </div><!-- .col -->

            </div><!-- .row -->
        </div><!-- .container -->
    </section><!-- .courses-wrap -->

    <section class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 align-content-lg-stretch">
                    <header class="heading">
                        <h2 class="entry-title">Дар бораи мо</h2>

                        <p>Мактаби Президентии шаҳри Бӯстон аз соли **** инҷониб фаъолити худро давом дода истодааст.</p>
                    </header><!-- .heading -->

                    <div class="entry-content ezuca-stats">
                        <div class="stats-wrap flex flex-wrap justify-content-lg-between">
                            <div class="stats-count col-xs-6">
                                1<span>K +</span>
                                <p>Талабагон</p>
                            </div><!-- .stats-count -->

                            <div class="stats-count col-xs-6">
                                40<span>+</span>
                                <p>Фанҳо</p>
                            </div><!-- .stats-count -->

                            <div class="stats-count col-xs-6">
                                60<span>+</span>
                                <p>Муаллимон</p>
                            </div><!-- .stats-count -->

                            <div class="stats-count col-xs-6">
                                50<span>+</span>
                                <p>синфҳо</p>
                            </div><!-- .stats-count -->
                        </div><!-- .stats-wrap -->
                    </div><!-- .ezuca-stats -->
                </div><!-- .col -->

                <div class="col-12 col-lg-6 flex align-content-center mt-5 mt-lg-0">
                    <div class="ezuca-video position-relative">
                        <div class="video-play-btn position-absolute">
                            <img src="images/video-icon.png" alt="Video Play">
                        </div><!-- .video-play-btn -->

                        <img src="images/video-screenshot.png" alt="">
                    </div><!-- .ezuca-video -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </section><!-- .about-section -->

    <footer class="site-footer">
        <div class="footer-widgets">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="foot-about">
                            <h1 class="site-title"><a href="index.php" rel="home" style="color: #000;">Мактаби<span> Президентӣ</span></a></h1>
                            <p class="footer-copyright"> Мактаби Президентӣ &copy; <script>document.write(new Date().getFullYear());</script> | Аз тарафи <big>Саломов Акобир ва Азимҷон Маюсупов</big> сохта шудааст.</p>
                        </div><!-- .foot-about -->
                    </div><!-- .col -->

                    <div class="col-12 col-md-6 col-lg-3 mt-5 mt-md-0">
                        <div class="foot-contact">
                            <h2>Тамос бо мо</h2>

                            <ul>
                                <li>Email: </li>
                                <li>Телефон: </li>
                                <li>Суроға:</li>
                            </ul>
                        </div><!-- .foot-contact -->
                    </div><!-- .col -->

                    <div class="col-12 col-md-6 col-lg-3 mt-5 mt-lg-0">
                        <div class="quick-links flex flex-wrap">
                            <h2 class="w-100">Гузаришҳо</h2>

                            <ul class="w-50">
                                <li><a href="teachers.php">Муаллимон </a></li>
                                <li><a href="news.php">Хабарҳо</a></li>
                            </ul>

                           
                        </div><!-- .quick-links -->
                    </div><!-- .col -->

                    <div class="col-12 col-md-6 col-lg-3 mt-5 mt-lg-0">
                        <div class="follow-us">
                            <h2>Пайвастшавӣ</h2>

                            <ul class="follow-us flex flex-wrap align-items-center">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-phone" style="background-color: #18C77F;"></i></a></li>
                                
                            </ul>
                        </div><!-- .quick-links -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .footer-widgets -->
    </footer><!-- .site-footer -->

    <div id="top-btn">
        <button class="top-btn1" onclick="topFunction()" id="myBtn">
            <em class="fa fa-arrow-up"></em>
        </button>
    </div>
<script type='text/javascript' src='js.js'></script>
<script type='text/javascript' src='js.html'></script>
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/swiper.min.js'></script>
<script type='text/javascript' src='js/masonry.pkgd.min.js'></script>
<script type='text/javascript' src='js/jquery.collapsible.min.js'></script>
<script type='text/javascript' src='js/custom.js'></script>

</body>
</html>