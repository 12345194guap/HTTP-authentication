<?php
    if (isset($_SERVER['HTTP_REFERER']) != "http://site/recover.php") {
        http_response_code(403);
        exit();
    }
    session_start();
    require_once 'connect_db.php';
    require_once 'check_data.php';

    $expire_pass = time() + 3600 * 168;
    if (isset($_SESSION['expire'])) {
        $pass = htmlspecialchars(trim($_POST['pass']));
        $pass_conf = htmlspecialchars(trim($_POST['pass_conf']));
        $login = $_SESSION['login'];
        if(!$pass || !$pass_conf) {
            $_SESSION['error'] = "Check the fields!";
            header('Location: ../recover.php');
            exit();
        }
        else if (!check_pass($pass)) {
            header('Location: ../recover.php');
            exit();
        }
        else if ($pass != $pass_conf) {
            $_SESSION['error'] = "Passwords do not match!";
            header('Location: ../recover.php');
            exit();
        }

        $pass_conf = password_hash($pass_conf, PASSWORD_BCRYPT);
        if (mysqli_query($conn, "UPDATE `users` SET `pass` = '$pass_conf', `expire_pass` = '$expire_pass' WHERE `login` = '$login'")) {
            $conn->close();
            $_SESSION['success'] = "Password updated";
            unset($_SESSION['expire']);
            header('Location: ../index.php');
            exit();
        }
        else {
            $_SESSION['error'] = "An error has occurred...";
            header('Location: ../recover.php');
            exit();
        }
    }
    else {
        $login = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['login'])));
        $secret = htmlspecialchars(trim($_POST['secret']));
        $pass = htmlspecialchars(trim($_POST['pass']));
        $pass_conf = htmlspecialchars(trim($_POST['pass_conf']));
        if(!$login || !$secret || !$pass || !$pass_conf) {
            $_SESSION['error'] = "Check the fields!";
            header('Location: ../recover.php');
            exit();
        }

        $secret = md5($secret."salt159242");
        $check_secret = mysqli_query($conn, "SELECT * FROM `users` WHERE `secret_word` = '$secret' AND `login` = '$login'");
        if (mysqli_num_rows($check_secret) == 0) {
            $_SESSION['error'] = "Wrong secret word or login!";
            header('Location: ../recover.php');
            exit();
        }
        else if (!check_pass($pass)) {
            header('Location: ../recover.php');
            exit();
        }
        else if ($pass != $pass_conf) {
            $_SESSION['error'] = "Passwords do not match!";
            header('Location: ../recover.php');
            exit();
        }

        $pass_conf = password_hash($pass_conf, PASSWORD_BCRYPT);
        mysqli_query($conn, "UPDATE `users` SET `pass` = '$pass_conf', `expire_pass` = '$expire_pass' WHERE `secret_word` = '$secret'");
        $conn->close();
        $_SESSION['success'] = "Password restored!";
        header('Location: ../index.php');
    }
