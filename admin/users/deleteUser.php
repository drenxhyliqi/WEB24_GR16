<?php
require_once("../../database/db_conn.php"); 

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];

    // Check if the user exists
    $stmt = $con->prepare("SELECT COUNT(*) FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count == 0) {
        echo json_encode(['status' => 'error', 'message' => 'User not found']);
        exit();
    }

    // Delete
    $stmt = $con->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'User deleted successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete user']);
    }

    $stmt->close();
    $con->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'User ID is required']);
}
?>
