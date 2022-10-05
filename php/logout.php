<?php
    if (isset($_SERVER['HTTP_REFERER']) != "http://site/profile.php") {
        http_response_code(403);
        exit();
    }
    session_start();
    session_destroy();
    header('Location: ../index.php');
