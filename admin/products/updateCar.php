<?php
require_once("../../database/db_conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_car'])) {
    $required_fields = ['id', 'car_name', 'model_id', 'relased_year', 'price', 'location', 'km', 'fuel', 'transmission', 'status'];
    foreach ($required_fields as $field) {
        if (!isset($_POST[$field]) || $_POST[$field] === '') {
            echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
            exit();
        }
    }

    $stmt = $con->prepare("UPDATE cars 
        SET car_name=?, model_id=?, relased_year=?, price=?, location=?, km=?, fuel=?, transmission=?, description=?, status=?
        WHERE id=?");

    $stmt->bind_param(
        "siidsdssssi",
        $_POST['car_name'],
        $_POST['model_id'],
        $_POST['relased_year'],
        $_POST['price'],
        $_POST['location'],
        $_POST['km'],
        $_POST['fuel'],
        $_POST['transmission'],
        $_POST['description'],
        $_POST['status'],
        $_POST['id']
    );

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Car updated successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update car']);
    }

    $stmt->close();
    $con->close();
}
?>
