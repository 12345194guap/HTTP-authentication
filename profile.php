<?php
    ini_set("session.cookie_lifetime", 3600);
    session_start();
    if(isset($_SESSION['expire'])) unset($_SESSION['expire']);
    if(!$_SESSION['user']['auth']) {
        session_destroy();
        header('Location: index.php');
        exit();
    }
    $s_name = session_name();
    if(isset($_COOKIE[$s_name])) setcookie($s_name, $_COOKIE[$s_name], time() + 3600, '/' );
    else {
        session_destroy();
        header('Location: index.php');
        exit();
    }
    require_once 'php/messages.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/profile.css">
    <title>Profile</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header_title">
                <h2><?=$_SESSION['user']['user_name']?></h2>
                <button class="btn_exit" type="button" onclick="window.location.href = 'php/logout.php';">Exit</button>
            </div>
            <div class="content">
                <p class="form_title">Change password</p>
                <p class="header_email">E-mail: <?= $_SESSION['user']['email'] ?></p>
                <form class="header_form" action="php/change_pass.php" method="post">
                    <input type="password" name="old_pass" placeholder="Current password...">
                    <input type="password" name="new_pass" placeholder="New password...">
                    <input type="password" name="new_conf_pass" placeholder="Confirm new password...">
                    <div class="content_footer">
                        <button class="btn_change" type="submit">Change</button>
                        <?php message();?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
