<?php
    $dsn = 'mysql:host=localhost;dbname=D00236258';
    $username = 'D00236258';
    $password = 'kQTGtUS0';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>