<?php
    session_start();
    require_once 'php/messages.php';
    if (isset($_SESSION['user']['auth'])) {
        header('Location: profile.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/forms.css">
    <title>Authorization</title>
</head>
<body>
    <form class="header__form" action="php/sign_in.php" method="post">
        <h3 class="header__title">Authorization</h3>
        <input class="header__input" name="login" type="text" placeholder="Enter login..."
        value="<?php if(isset($_SESSION['register']['login'])) echo $_SESSION['register']['login']?>">
        <input class="header__input" name="pass" type="password" placeholder="Enter password...">
        <a class="recover_link" href="recover.php">Forgot your password?</a>
        <div class="header__actions">
            <button class="button" type="submit">Sign In</button>
            <a class="link_to_register" href="register.php">Don't have<br>an account?</a>
        </div>
        <?php message();?>
     </form>
</body>
</html>
