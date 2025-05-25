<?php
require_once("../../database/db_conn.php");

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $carId = intval($_POST['id']);

    $stmt = $con->prepare("DELETE FROM cars WHERE id = ?");
    $stmt->bind_param("i", $carId);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Car deleted successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete car']);
    }

    $stmt->close();
    $con->close();
}
?>
