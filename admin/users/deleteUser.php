<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("../../database/db_conn.php"); 

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: ../clientsManagement.php?error=ID i pavlefshëm");
    exit();
}

$id = (int)$_GET['id'];

$stmt = $con->prepare("SELECT COUNT(*) FROM users WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();

if ($count == 0) {
    header("Location: ../clientsManagement.php?error=Përdoruesi nuk u gjet");
    exit();
}

$stmt = $con->prepare("DELETE FROM users WHERE id = ?");
$stmt->bind_param("i", $id);
if (!$stmt->execute()) {
    die("Gabim gjatë fshirjes së përdoruesit: " . $stmt->error);
}
$stmt->close();

header("Location: ../clientsManagement.php?success=Përdoruesi u fshi me sukses");
exit();
