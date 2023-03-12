<?php 
    include("db.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Presidential School</title>

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
                        <div class="col-12 col-sm-8 col-lg-6 d-none d-md-flex flex-wrap justify-content-center justify-content-lg-start mb-3 mb-lg-0 marg">
                            <div class="header-bar-email d-flex align-items-center">
                                <i class="fa fa-envelope"></i><a href="#">mtmu_9@gmail.com</a>
                            </div><!-- .header-bar-email -->

                            <div class="header-bar-text lg-flex align-items-center">
                                <p><i class="fa fa-phone"></i>92-752-04-12</p>
                            </div><!-- .header-bar-text -->
                        </div><!-- .col -->
                        <div class="col-12 col-sm-3 col-lg-6 d-flex flex-wrap justify-content-center justify-content-lg-end align-items-center">
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
                                    <h1 class="site-title"><a href="index.php" rel="home">Мактаби <span> Президентӣ</span></a></h1>
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
                                    <h1 style="color: #fff;">Регистрация</h1>
                                <div class="input-one"><i class="fa fa-user"></i> <input type="text" name="name" required="" placeholder="Ном"></div>
                                <div class="input-one"><i class="fa fa-user"></i> <input type="text" required="" placeholder="Насаб" name="surname"></div>
                                <div class="input-one"><i class="fa fa-envelope"></i> <input type="email" required="" placeholder="e-mail" name="email"></div>
                                <div class="input-one"><i class="fa fa-users"></i> 
                                    <center>
                                        <select name="who">
                                            <option value="pupils">Талаба</option>
                                            <option value="parents">Волидайн</option>
                                            <option value="teacher">Муаллим</option>
                                        </select>
                                    </center>
                                </div>
                                 <div class="input-one"><input type="date" class="date" required="" name="date"></div>

                                <button type="submit" name="add">Регистрация</button>
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
    if (isset($_POST['add'])) {
        

          function getIp() {
              $keys = [
                'HTTP_CLIENT_IP',
                'HTTP_X_FORWARDED_FOR',
                'REMOTE_ADDR'
              ];
              foreach ($keys as $key) {
                if (!empty($_SERVER[$key])) {
                  $ip = trim(end(explode(',', $_SERVER[$key])));
                  if (filter_var($ip, FILTER_VALIDATE_IP)) {
                    return $ip;
                  }
                }
              }
            }
             $ip = getIp();

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $who = $_POST['who'];
        $email = $_POST['email'];     
        $date = $_POST['date'];
        $date_regist = date(Y.m.d);
			$select = "select * from ".$who." order by id DESC";
			$run = mysqli_fetch_array(mysqli_query($con,$select));
			$id = $run['id'];
		$prelogin = $id + 1;
		switch($who){
			case 'parents': $login = 'pr_'.$prelogin; break;
			case 'pupils': $login = 'pl_'.$prelogin; break;
			case 'teacher': $login = 'tr_'.$prelogin; break;
		}
        $password = rand(0,9999);

            /* ABOUT SMS MAIL */
            
            $select_check_email = "select * from ".$who." where email='$email'";
            
            $run_select_check_email = mysqli_query($con,$select_check_email);
            
            $count = mysqli_num_rows($run_select_check_email);
            
            if($count==1){
                
                echo "<p>Email уже зарегистрирован !</p>";
                
            }else{

            $insert = "insert into ".$who." (name, surname, email, login, password, date_birth, date_regist, img, phone) values ('$name', '$surname', '$email', '$login', '$password', '$date', '$date_regist', '1.jpg', '920000000')";
            $run = mysqli_query($con, $insert);
             if ($run){
              echo "<script>alert('Марҳамат намоед ! Логину паролро ба Е-mail-атон фиристодем')</script>";
              $_SESSION['login'] = $login;
              $_SESSION['password'] = $password;
              $_SESSION['who'] = $who;
            }
            ini_set('display_errors',1);
            error_reporting(E_ALL);
            
            $test = "/(content-type|bcc:|cc:|to:)/i";
            foreach ($_POST as $key => $val) {
                if (preg_match($test, $val)) {
                    exit;
                }
            }
            $contact_name = 'school9.com';
            $to = $email; //кому
            $subject = 'Привет '.$name.'.Вашы логин и пароль!'; //Загаловок сообщения
            $email = 'maktabiprezidenti.com';
            $from = 'mtmu_9@gmail.com';
            
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            
            $headers .= 'From: '.$from."\r\n".
                'Reply-To: '.$from."\r\n" .
                'X-Mailer: PHP/' . phpversion();
                
            $message = '
                        <html>
                            <head>
                                <meta charset="utf-8">
                                <title>'.$subject.'</title>
                            </head>
                            <body> 
                                <p>Для входа в личний кабинет school9.com</p>
                                <p>Логин: ' . $login . '</p>                  
                                <p>Пароль: ' . $password . '</p>
                                <br>
                                <p>Благодарим за регистрацию !</p>
                            </body>
                        </html>'; 
            
            if(mail($to, $subject, $message, $headers)){
                     echo "<script>window.open('".$who."/cabinet.php','_self')</script>";
            }else{
              echo "<script>alert('Невозможно регистрироватся !')</script>";
            }
        }
    }
?>