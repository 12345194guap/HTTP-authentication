<?php
    if (isset($_SERVER['HTTP_REFERER']) != "http://site/register.php") {
        http_response_code(403);
        exit();
    }
    session_start();
    require_once 'connect_db.php';
    require_once 'check_data.php';

    $user_name = htmlspecialchars(trim($_POST['user_name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $secret = htmlspecialchars(trim($_POST['secret']));
    $login = htmlspecialchars(trim($_POST['login']));
    $pass = htmlspecialchars(trim($_POST['pass']));
    $pass_conf = htmlspecialchars(trim($_POST['pass_conf']));

    $_SESSION['register'] = [
        'user_name' => $user_name,
        'email' => $email,
        'secret' => $secret,
        'login' => $login
    ];

    $login = mysqli_real_escape_string($conn, $login);
    $check_user = mysqli_query($conn, "SELECT * FROM `users` WHERE `login` = '$login'");
    if (mysqli_num_rows($check_user) > 0) {
        $_SESSION['error'] = "This login is already in use!";
        header('Location: ../register.php');
        exit();
    }
    else if (!$login || !$email || !$pass || !$pass_conf || !$secret) {
        $_SESSION['error'] = "Check the fields!";
        header('Location: ../register.php');
        exit();
    }
    else if (!check_email($email)) {
        header('Location: ../register.php');
        exit();
    }
    else if (!check_pass($pass)) {
        header('Location: ../register.php');
        exit();
    }
    else if ($pass != $pass_conf) {
        $_SESSION['error'] = "Passwords do not match!";
        header('Location: ../register.php');
        exit();
    }

    $pass = password_hash($pass, PASSWORD_BCRYPT);
    $expire_pass = time() + 3600 * 168;
    $secret = md5($secret."salt159242");
    $user_name = mysqli_real_escape_string($conn, $user_name);
    $email = mysqli_real_escape_string($conn, $email);

    $result = mysqli_query($conn, "INSERT INTO `users` (`user_name`, `secret_word`, `login`, `email`, `pass`, `expire_pass`)
    VALUES ('$user_name', '$secret', '$login', '$email', '$pass', '$expire_pass')");

    if($result) {
        $conn->close();
        $_SESSION['success'] = "Are you registered!";
        header('Location: ../index.php');
    }
    else {
        $_SESSION['error'] = "Failed to register...";
        header('Location: ../register.php');
    }
