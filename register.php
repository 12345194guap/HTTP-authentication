<?php
    ini_set("session.cookie_lifetime", 60 * 2);
    session_start();
    require_once 'php/messages.php';
    $s_name = session_name();
    if(isset($_COOKIE[$s_name])) setcookie($s_name, $_COOKIE[$s_name], time() + 60 * 2, '/' );
    else {
        session_destroy();
        header('Location: register.php');
        exit();
    }
    if(isset($_SESSION['user'])) {
        header('Location: profile.php');
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/forms.css">
    <title>Registration</title>
</head>
<body>
    <form class="header__form" action="php/sign_up.php" method="post">
        <h3 class="header__title">Registration</h3>
        <input autofocus class="header__input" name="user_name" type="text" placeholder="Enter first and last name..."
        value="<?php if(isset($_SESSION['register'])) echo $_SESSION['register']['user_name']?>">

        <input class="header__input" name="email" type="text" placeholder="Enter e-mail..."
        value="<?php if(isset($_SESSION['register'])) echo $_SESSION['register']['email']?>">

        <input class="header__input" name="secret" type="text" placeholder="Secret word for password recovery..."
        value="<?php if(isset($_SESSION['register'])) echo $_SESSION['register']['secret']?>">

        <input class="header__input" name="login" type="text" placeholder="Enter login..."
        value="<?php if(isset($_SESSION['register'])) echo $_SESSION['register']['login']?>">

        <input class="header__input" name="pass" type="password" placeholder="Enter password...">
        <input class="header__input" name="pass_conf" type="password" placeholder="Confirm the password...">
        <div class="header__actions">
            <button class="button" type="submit">Sign Up</button>
            <a class="link_to_login" href="index.php">Do you already<br> have an account?</a>
        </div>
        <?php message();?>
    </form>
</body>
</html>
