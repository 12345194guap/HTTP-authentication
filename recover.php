<?php
    session_start();
    require_once 'php/messages.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/forms.css">
    <title>Recovery</title>
</head>
<body>
    <form class="header__form" action="php/recovery.php" method="post">
        <h3 class="header__title">Recovery</h3>
        <?php
            if (!isset($_SESSION['expire'])) {
                echo '<input autofocus class="header__input" name="login" type="text" placeholder="Enter login...">';
                echo '<input class="header__input" name="secret" type="text" placeholder="Enter secret word...">';
            }
            echo '<input autofocus class="header__input" name="pass" type="password" placeholder="Enter a new password...">';
            echo '<input class="header__input" name="pass_conf" type="password" placeholder="Confirm new password...">';
        ?>
        <div class="header__actions">
            <button class="button" type="submit">Apply</button>
            <a class="link_cancel" href="index.php">Cancel</a>
        </div>
        <?php message();?>
     </form>
</body>
</html>
