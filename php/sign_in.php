<?php
    if (isset($_SERVER['HTTP_REFERER']) != "http://site/index.php") {
        http_response_code(403);
        exit();
    }
    session_start();
    require_once 'connect_db.php';

    $login = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['login'])));
    $pass = htmlspecialchars(trim($_POST['pass']));

    if (!$login || !$pass) {
        $_SESSION['error'] = "Check the fields!";
        header('Location: ../index.php');
        exit();
    }

    $pass_hash = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `pass` FROM `users` WHERE `login` = '$login'"))['pass'];
    if (password_verify($pass, $pass_hash)) {
        $cur_time = time();
        $expire_pass = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `expire_pass` FROM `users` WHERE `login` = '$login'"))['expire_pass'];
        if ($cur_time > $expire_pass) {
            $_SESSION['login'] = $login;
            $_SESSION['expire'] = "The password has expired!";
            header('Location: ../recover.php');
            exit();
        }
        if($check_user = mysqli_query($conn, "SELECT * FROM `users` WHERE `login` = '$login'")) {
            $user = mysqli_fetch_assoc($check_user);
            $_SESSION['user'] = [
                "user_name" => $user['user_name'],
                "email" => $user['email'],
                "auth" => true
            ];
            header('Location: ../profile.php');
            $conn->close();
            exit();
        }
        else {
            $_SESSION['error'] = "An error has occurred...";
            header('Location: ../index.php');
            exit();
        }
    }
    else {
        $_SESSION['error'] = "Incorrect login or password!";
        header('Location: ../index.php');
    }
