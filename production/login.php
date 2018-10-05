<?php
/*
   +----------------------------------------------------------------------+
   | Mateusz Lipecki - LOGIN skrypt                                       |
   +----------------------------------------------------------------------+
   | Peter-Lacke Polska                                                   |
   +----------------------------------------------------------------------+
   | Version: 1.3.1                                                       |
   +----------------------------------------------------------------------+
*/

require 'includes/config.php';
require 'includes/header.php';

// Zabezpiecz zmienne odebrane z formularza, przed atakami SQL Injection
$login = $db->real_escape_string(htmlspecialchars(trim($_POST['login'])));
$password = $_POST['password'];

if ($_POST) {
    // Podstawowa walidacja formularza
    $errors = array();

    if (empty($login) || empty($password)) {
        $errors[] = 'Wypełnij wszystkie pola';
    }

    $auth = $user->auth($login, $password);
    var_dump($auth);
    if (!$auth) {
        $errors[] = 'Użytkownik o podanym loginie i haśle nie istnieje';
    }

    if (empty($errors)) {
        // Jeżeli nie ma błędów to przechodzimy dalej
        // Zapisujemy ID użytkownika do sesji i tym samym oznaczamy go jako zalogowanego
        $_SESSION['user_id'] = $auth;
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Peter Lacke</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="fonts/iconic/css/material-design-iconic-font.min.css" />
    <link rel="stylesheet" href="assets/css/util.css" />
    <link rel="stylesheet" href="assets/css/main.css" />

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <form action="login.php" method="post">
    <video autoplay muted loop id="myVideo">
        <source src="images/background.mp4" type="video/mp4">
    </video>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <span class="login100-form-logo">
                     <i><img src="images/mainLogo.png" width="200" height="100" style="margin-left: 10px;"></i>
                </span>

                <span class="login100-form-title p-b-34 p-t-27">
            Localshipping
          </span>
               <span class="error-msg">
                    <?php if (!empty($errors)) { ?>
                        <br>
                        <?php 
                            foreach ($errors as $error) {
                                echo '<div class="error-msg" style="color: red;">'.$error.'</div>';
                            }
                        }
                        ?>
                        <br>
                </span> 
                
                <div class="wrap-input100 validate-input" data-validate="Wprowadź nazwę użytkownika">
                    <input type="text" class="input100" id="username" name="login" value=""
                           required="required" autocomplete="username"/>
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Wprowadź Hasło">
                    <input type="password" class="input100" id="password" name="password" required="required"
                           autocomplete="current-password"/>
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>
                
                <div class="text-center p-t-90">
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" id="_submit" name="_submit">
                            Zaloguj
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
  </body>
</html>
