<?php
require_once("../../db_conn.php");

$model = trim($_POST['model']);

if (empty($model)) {
    header("Location: ../modelsManagement.php?error=Model name cannot be empty");
    exit();
}

if (!preg_match("/^[a-zA-Z0-9]+$/", $model)) {
    header("Location: ../modelsManagement.php?error=Model name must only contain letters and numbers");
    exit();
}

$stmt = $con->prepare("INSERT INTO models (model) VALUES (?)");
$stmt->bind_param("s", $model);
$stmt->execute();

header("Location: ../modelsManagement.php?success=Model added successfully");
exit();
?>
