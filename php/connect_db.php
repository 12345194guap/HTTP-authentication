<?php
	if (isset($_SERVER['HTTP_REFERER']) != "http://site/sign_in.php" || isset($_SERVER['HTTP_REFERER']) != "http://site/sign_up.php"
	|| isset($_SERVER['HTTP_REFERER']) != "http://site/change_pass.php" || isset($_SERVER['HTTP_REFERER']) != "http://site/recovery.php") {
		http_response_code(403);
        exit();
	}
	$db_name = 'register_db';
	$conn = mysqli_connect('127.0.0.1', 'root', 'root');
	
	mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS $db_name");
	$conn = mysqli_connect('127.0.0.1', 'root', 'root', $db_name);

	mysqli_query($conn, "CREATE TABLE IF NOT EXISTS users(
    id INT NOT NULL UNIQUE PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(100) NOT NULL,
	secret_word VARCHAR(32) NOT NULL,
    login VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    pass VARCHAR(60) NOT NULL,
	expire_pass INT NOT NULL
)");
