<?php
$server = 'localhost';
$dbname = 'kuliahweb';
$user = 'root';
$password = '';
$connect = "mysql:host={$server};dbname={$dbname}";

$connection = null;
try {
    $connection = new PDO($connect, $user, $password);
}
catch (Exception $e) {
    die("Error : ".$e -> getMessage());
}