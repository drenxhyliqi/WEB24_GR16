<?php
session_start();

setcookie('wishlist', '', time() - 3600, '/');

header('Location: index.php');
exit;