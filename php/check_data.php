<?php
    if (isset($_SERVER['HTTP_REFERER']) != "http://site/sign_in.php" || isset($_SERVER['HTTP_REFERER']) != "http://site/sign_up.php"
    || isset($_SERVER['HTTP_REFERER']) != "http://site/recovery.php" || isset($_SERVER['HTTP_REFERER']) != "http://site/change_pass.php") {
        http_response_code(403);
        exit();
    }
    session_start();

    function check_pass($val) {
        if (strlen($val) < 8) {
            $_SESSION['error'] = "Password less than 8 characters!";
            return false;
        }
        else if (!preg_match("#[0-9]+#", $val)) {
            $_SESSION['error'] = "Password must include at least one number!";
            return false;
        }
        else if (!preg_match("#[a-zA-Zа-яА-Я]+#", $val)) {
            $_SESSION['error'] = "Password must include at least one letter!";
            return false;
        }
        return true;
    }

    function check_email($val) {
        if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "Incorrect e-mail!";
            return false;
        }
        return true;
    }
