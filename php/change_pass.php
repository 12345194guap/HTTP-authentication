<?php
    if (isset($_SERVER['HTTP_REFERER']) != "http://site/profile.php") {
        http_response_code(403);
        exit();
    }
    session_start();
    require_once 'connect_db.php';
    require_once 'check_data.php';

    $email = $_SESSION['user']['email'];
    $old_pass = htmlspecialchars(trim($_POST['old_pass']));
    $new_pass = htmlspecialchars(trim($_POST['new_pass']));
    $new_conf_pass = htmlspecialchars(trim($_POST['new_conf_pass']));

    if (!$old_pass || !$new_pass || !$new_conf_pass) {
        $_SESSION['error'] = "Check the fields!";
        header('Location: ../profile.php');
        exit();
    }
    else if(!check_pass($new_pass)) {
        header('Location: ../profile.php');
        exit();
    }
    else if ($new_pass != $new_conf_pass) {
        $_SESSION['error'] = "Passwords do not match!";
        header('Location: ../profile.php');
        exit();
    }
    else if ($new_pass == $old_pass) {
        $_SESSION['error'] = "The old password matches the new one!";
        header('Location: ../profile.php');
        exit();
    }

    $pass_hash = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `pass` FROM `users` WHERE `email` = '$email'"))['pass'];

    if (password_verify($old_pass, $pass_hash)) {
        $new_conf_pass = password_hash($new_pass, PASSWORD_BCRYPT);
        $expire_pass = time() + 3600 * 168;
        if(mysqli_query($conn, "UPDATE `users` SET `pass` = '$new_conf_pass', `expire_pass` = '$expire_pass' WHERE `email` = '$email'")) {
            $conn->close();
            $_SESSION['success'] = "Successfully!";
            header('Location: ../profile.php');
            exit();
        }
        else {
            $_SESSION['error'] = "An error has occurred...";
            header('Location: ../profile.php');
            exit();
        }
    }
    else {
        $_SESSION['error'] = "Wrong current password!";
        header('Location: ../profile.php');
    }
