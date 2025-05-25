<?php
require_once("../../database/db_conn.php");

if (isset($_POST['insert']) && $_POST['insert'] == "insertModel") {
    if (empty($_POST['model'])) {
        echo json_encode(['status' => 'error', 'message' => 'Model name cannot be empty']);
        exit();
    }

    $model = $_POST['model'];

    // Check if the model name is alphanumeric
    if (!preg_match("/^[a-zA-Z0-9 ]+$/", $model)) {
        echo json_encode(['status' => 'error', 'message' => 'Model name must only contain letters, numbers, and spaces']);
        exit();
    }

    // Prepare and execute query
    $stmt = $con->prepare("INSERT INTO models (model) VALUES (?)");
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
