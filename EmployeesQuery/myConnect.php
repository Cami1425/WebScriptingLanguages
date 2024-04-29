<?php // myConnect.php
const DB_HOST = '127.0.0.1' ;
const DB_NAME = 'employees' ;
const DB_USER = 'root' ;
const DB_PASSWORD = 'Kamila.14' ;
$chrs = 'utf8mb4' ;
$attr = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=$chrs";
$opts =
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
?>



