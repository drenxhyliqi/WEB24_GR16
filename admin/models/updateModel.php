<?php
require_once("../../database/db_conn.php");

if(isset($_POST['update']) && $_POST['update']=="updateModel"){

if (!isset($_POST['id']) || empty($_POST['id']) || !isset($_POST['model']) || empty(trim($_POST['model']))) {
    echo json_encode(['status' => 'error', 'message' => 'Model ID and Model name are required']);
    exit();
}

$id = (int) $_POST['id'];
$model = trim($_POST['model']);

if (!preg_match("/^[a-zA-Z0-9]+$/", $model)) {
    echo json_encode(['status' => 'error', 'message' => 'Model name must only contain letters and numbers']);
    exit();
}

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

$stmt = $con->prepare("UPDATE models SET model = ? WHERE id = ?");
if ($stmt === false) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to prepare SQL statement']);
    exit();
}

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
