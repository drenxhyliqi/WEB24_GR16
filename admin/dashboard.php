<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <nav class="shadow">
        <div class="container">
            <div class="nav justify-content-between">
                <div>
                    <a class="nav-link" href="#">
                        <img src="../assets/img/webicon.png" alt="Logo">
                    </a>
                </div>
                <div class="d-inline-flex align-items-center gap-2">
                    <span class="nav-link p-0"><i class="bi bi-person-circle fs-4"></i></span>
                    <span class="nav-link p-0 active"><i class="bi bi-list fs-4"></i></span>
                </div>
            </div>
        </div>
        <h1><?= $_SESSION['user_name']; ?></h1>
    </nav>
</body>
</html>