<?php
require_once("../../db_conn.php");

$id = $_GET['id'];

$stmt = $con->prepare("SELECT COUNT(*) FROM models WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();

if ($count == 0) {
    header("Location: ../modelsManagement.php?error=Model not found");
    exit();
}

$stmt = $con->prepare("DELETE FROM models WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: ../modelsManagement.php?success=Model deleted successfully");
exit();
?>
