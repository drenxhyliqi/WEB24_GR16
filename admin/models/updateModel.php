<?php
require_once("../../db_conn.php");


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];
    $model = trim($_POST['model']);

    if (!empty($id) && !empty($model)) {
        $stmt = $con->prepare("UPDATE models SET model = ? WHERE id = ?");
        $stmt->bind_param("si", $model, $id);
        $stmt->execute();
    }

    header("Location: ../modelsManagement.php");
    exit;
}
?>
