<?php 
session_start();

if($_SESSION['active'] == true){
    session_unset();
    session_destroy();
    header('Location: index.php');
}else{
    header('Location: index.php');
}
?>