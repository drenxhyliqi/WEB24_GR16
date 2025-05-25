<?php
require_once("../../database/db_conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['car_name'])) {
    $car_name = $_POST['car_name'];
    $model_id = $_POST['model_id'];
    $relased_year = $_POST['relased_year'];
    $price = $_POST['price'];
    $location = $_POST['location'];
    $km = $_POST['km'];
    $fuel = $_POST['fuel'];
    $transmission = $_POST['transmission'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    $cover_img_path = '';
    if (!empty($_FILES['cover_img']['name'])) {
        $cover_img_name = time() . '_' . basename($_FILES['cover_img']['name']);
        $cover_img_path = 'uploads/' . $cover_img_name;
        move_uploaded_file($_FILES['cover_img']['tmp_name'], '../../' . $cover_img_path);
    }

    $gallery_images = [];
    if (!empty($_FILES['images']['name'][0])) {
        foreach ($_FILES['images']['name'] as $key => $name) {
            $filename = time() . '_' . basename($name);
            $path = 'uploads/' . $filename;
            if (move_uploaded_file($_FILES['images']['tmp_name'][$key], '../../' . $path)) {
                $gallery_images[] = $path;
            }
        }
    }

    $images_json = json_encode($gallery_images);

    $stmt = $con->prepare("INSERT INTO cars (car_name, model_id, relased_year, price, location, km, fuel, transmission, description, cover_img, images, status)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("siidsdssssss", $car_name, $model_id, $relased_year, $price, $location, $km, $fuel, $transmission, $description, $cover_img_path, $images_json, $status);


    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Car added successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => $stmt->error]);
    }

    $stmt->close();
    $con->close();
}
?>
