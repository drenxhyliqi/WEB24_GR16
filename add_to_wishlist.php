<?php
session_start();

// Collect data from the form
$carId = $_POST['car_id'] ?? null;
$carName = $_POST['car_name'] ?? null;
$carPrice = $_POST['car_price'] ?? null;
$coverImg = $_POST['cover_img'] ?? null;

if ($carId && $carName && $carPrice && $coverImg) {
    $wishlist = isset($_COOKIE['wishlist']) ? json_decode($_COOKIE['wishlist'], true) : [];

    $exists = false;
    foreach ($wishlist as $item) {
        if ($item['id'] == $carId) {
            $exists = true;
            break;
        }
    }

    if (!$exists) {
        $wishlist[] = [
            'id' => $carId,
            'name' => $carName,
            'price' => $carPrice,
            'cover_img' => $coverImg
        ];
    }
    setcookie('wishlist', json_encode($wishlist), time() + 86400, '/');
}

header("Location: favorite.php");
exit;
