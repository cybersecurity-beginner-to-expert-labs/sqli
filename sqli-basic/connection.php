<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$connection = mysqli_connect('127.0.0.1', 'root', 'rootpass', 'labdb');
if (!$connection){
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>
