<?php
require_once("../../db_conn.php");

$model = $_POST['model'];
$stmt = $con->prepare("INSERT INTO models (model) VALUES (?)");
$stmt->bind_param("s", $model);
$stmt->execute();
header("Location: ../modelsManagement.php");
?>
