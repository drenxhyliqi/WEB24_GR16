<?php
session_start();
require_once("../../database/db_conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_password'])) {
    $errors = [];
    $email = $_SESSION['user_email'];
    $current = trim($_POST['current_password'] ?? '');
    $new = trim($_POST['new_password'] ?? '');
    $confirm = trim($_POST['confirm_password'] ?? '');

    if (!$current) $errors[] = "Fjalëkalimi aktual duhet të plotësohet.";
    if (!$new) $errors[] = "Fjalëkalimi i ri duhet të plotësohet.";
    if (strlen($new) < 6) $errors[] = "Fjalëkalimi i ri duhet të ketë të paktën 6 karaktere.";
    if ($new !== $confirm) $errors[] = "Fjalëkalimet e reja nuk përputhen.";

    if (!$errors) {
        $stmt = $con->prepare("SELECT password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();
        $stmt->close();

        if (!password_verify($current, $hashedPassword)) {
            $errors[] = "Fjalëkalimi aktual nuk është i saktë.";
        } else {
            $newHashed = password_hash($new, PASSWORD_DEFAULT);
            $stmt = $con->prepare("UPDATE users SET password = ? WHERE email = ?");
            $stmt->bind_param("ss", $newHashed, $email);
            if ($stmt->execute()) {
                $_SESSION['success_msg'] = "Fjalëkalimi u ndryshua me sukses.";
            } else {
                $errors[] = "Gabim gjatë ndryshimit të fjalëkalimit.";
            }
            $stmt->close();
        }
    }

    if ($errors) {
        $_SESSION['error_msg'] = implode('<br>', $errors);
    }

    // Redirect prapa në profil
    header("Location: ../../myProfile.php");
    exit;
} else {
    header("Location: ../../myProfile.php");
    exit;
}
?>
