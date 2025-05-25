<?php
require_once("../../database/db_conn.php");

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];

    // Prepare the delete query
    $stmt = $con->prepare("DELETE FROM models WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Model deleted successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete model']);
    }

    $stmt->close();
    $con->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Model ID is required']);
}
?>
