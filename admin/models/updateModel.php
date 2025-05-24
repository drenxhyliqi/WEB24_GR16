<?php
require_once("../../database/db_conn.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];
    $model = trim($_POST['model']);

    if (empty($model)) {
        header("Location: ../modelsManagement.php?error=Model name cannot be empty");
        exit();
    }

    if (!preg_match("/^[a-zA-Z0-9]+$/", $model)) {
        header("Location: ../modelsManagement.php?error=Model name must only contain letters and numbers");
        exit();
    }

    if (!empty($id) && !empty($model) && preg_match("/^[a-zA-Z0-9]+$/", $model)) {
        $stmt = $con->prepare("UPDATE models SET model = ? WHERE id = ?");
        $stmt->bind_param("si", $model, $id);
        $stmt->execute();
    }

    header("Location: ../modelsManagement.php?success=Model updated successfully");
    exit;
}
?>
