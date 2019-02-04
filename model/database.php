<?php
    $dsn = 'mysql:host=localhost;dbname=D00202405';
    $username = 'D00202405';
    $password = 'K2unt#kp';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>