<?php
require_once("../../database/db_conn.php");

if (!isset($_POST['id']) || empty($_POST['id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Model ID is required']);
    exit();
}

$id = (int) $_POST['id'];

$stmt = $con->prepare("SELECT COUNT(*) FROM models WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();

if ($count == 0) {
    echo json_encode(['status' => 'error', 'message' => 'Model not found']);
    exit();
}

$stmt = $con->prepare("DELETE FROM models WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Model deleted successfully']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to delete model']);
}

$stmt->close();
$con->close();
?>
