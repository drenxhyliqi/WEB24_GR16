<?php
require_once("../../database/db_conn.php");

if(isset($_POST['insert']) && $_POST['insert']=="insertModel"){
    if (!isset($_POST['model']) || empty(trim($_POST['model']))) {
        echo json_encode(['status' => 'error', 'message' => 'Model name cannot be empty']);
        exit();
    }

    $model = trim($_POST['model']);

    if (!preg_match("/^[a-zA-Z0-9]+$/", $model)) {
        echo json_encode(['status' => 'error', 'message' => 'Model name must only contain letters and numbers']);
        exit();
    }

    $stmt = $con->prepare("INSERT INTO models (model) VALUES (?)");

    if ($stmt === false) {
        echo json_encode(['status' => 'error', 'message' => 'Failed to prepare SQL statement']);
        exit();
    }

    $stmt->bind_param("s", $model);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Model added successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to add model']);
    }

    $stmt->close();
    $con->close();
}
?>
