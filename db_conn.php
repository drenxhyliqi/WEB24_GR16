<?php
include_once 'error_handler.php';
    $servername = "localhost";
    $username = "root";
    // $password = "";
    $password = "2711";
    // $password = "610913";
    $dbname = "carme";

    try {
    $con = mysqli_connect($servername, $username, $password, $dbname);
    if (!$con) {
        throw new Exception("Database connection failed: " . mysqli_connect_error());
    }
    } catch (Exception $e) {
    throw  $e; 
     }    

?>