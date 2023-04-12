<?php
$host = 'localhost';
$database = 'publications';
$user = 'root';
$password = 'QWEasd123';
$mysqli = mysqli_connect($host, $user, $password, $database);
mysqli_set_charset($mysqli, "utf8mb4");
if(!$mysqli){
    echo 'Не удалось подключиться к MySQL: ' . mysqli_connect_error();
}