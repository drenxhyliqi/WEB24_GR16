<?php
require_once("../../database/db_conn.php");

if (isset($_POST['update']) && $_POST['update'] == "updateModel") {
    if (empty($_POST['id']) || empty($_POST['model'])) {
        echo json_encode(['status' => 'error', 'message' => 'Model ID and Name are required']);
        exit();
    }

    $id = (int) $_POST['id'];
    $model = trim($_POST['model']);

    // Validate the model name
    if (!preg_match("/^[a-zA-Z0-9 ]+$/", $model)) {
        echo json_encode(['status' => 'error', 'message' => 'Model name must only contain letters, numbers, and spaces']);
        exit();
    }

    // Update the model
    $stmt = $con->prepare("UPDATE models SET model = ? WHERE id = ?");
    $stmt->bind_param("si", $model, $id);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Model updated successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update model']);
    }

    $stmt->close();
    $con->close();
}
?>
