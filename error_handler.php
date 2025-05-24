<?php
function error_handler($errno, $errstr, $errfile, $errline) {
    $error_types = [
        E_ERROR => 'GABIM FATAL',
        E_WARNING => 'PARALAJMËRIM',
        E_NOTICE => 'NJOFTIM',
        E_USER_ERROR => 'GABIM I PËRDORUESIT',
        E_USER_WARNING => 'PARALAJMËRIM I PËRDORUESIT',
        E_USER_NOTICE => 'NJOFTIM I PËRDORUESIT'
    ];

    $type = $error_types[$errno] ?? 'GABIM I PANJOHUR';

    $message = "<div style='border:1px solid red; padding:10px; margin:10px;'>";
    $message .= "<strong>$type</strong>: $errstr<br>";
    $message .= "Skedari: <strong>$errfile</strong> (Rreshti: $errline)<br>";
    $message .= "</div>";

    echo $message;

    if ($errno === E_USER_ERROR) {
        die();
    }


    return true;
}
set_error_handler("error_handler");
error_reporting(E_ALL);

function exception_handler($exception) {
    error_handler(
        E_USER_ERROR,
        "Përjashtim: " . $exception->getMessage(),
        $exception->getFile(),
        $exception->getLine()
    );
}
set_exception_handler('exception_handler');

/*
// 1. E_NOTICE
echo $undefined_variable;

// 2. E_WARNING
fopen('file0.txt', 'r');

// 3.  E_USER_ERROR 
trigger_error("Gabim perdoruesi", E_USER_ERROR);

// 4. Exception
throw new Exception("Perjashtim testues");

// 5. Database connection error
mysqli_connect('localhost', 'invalid_user', 'invalid_pass', 'invalid_db');
*/
?>