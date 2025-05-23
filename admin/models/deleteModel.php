<?php
require_once("../../db_conn.php");

$id = $_GET['id'];
$stmt = $con->prepare("DELETE FROM models WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
header("Location: ../modelsManagement.php");
?>
