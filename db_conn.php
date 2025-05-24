<?php
    $servername = "localhost";
    $username = "root";
    // $password = "";
    $password = "2711";
    // $password = "610913";
    $dbname = "carme";

    $con = mysqli_connect($servername , $username, $password , $dbname);

    if(!$con){
        echo "Db connection error..." . mysqli_connect_error();
    }      
?>