<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Hi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
</head>
<style>
.offcanvas {
    background-color: #000615;
    box-shadow: 4px 0 12px rgba(0, 0, 0, 0.15);
    width: 280px;
}

.offcanvas-header {
    background-color: #007bff;
    color: white;
    border-bottom: 1px solid rgba(255,255,255,0.2);
}

.offcanvas-title {
    font-weight: 600;
    font-size: 1.25rem;
}

.offcanvas-body .list-group-item {
    border: none;
    padding: 0.75rem 1.5rem;
    font-weight: 500;
    transition: 0.3s ease;
}

.offcanvas-body .list-group-item a {
    color: #333;
    text-decoration: none;
    display: block;
}


.offcanvas-header .btn-close {
    filter: brightness(0) invert(1);
    opacity: 1;
    font-size: 1.4rem;
}

button.btn.btn-transparent i.bi-list {
    color: #007bff;
    cursor: pointer;
    transition: color 0.3s ease;
}

button.btn.btn-transparent i.bi-list:hover {
    color: #0056b3;
}
.offcanvas-body .list-group-item {
    background-color: #000615; 
    border: none;
    padding: 0.75rem 1.5rem;
    font-weight: 500;
    transition: background-color 0.3s ease;
}

.offcanvas-body .list-group-item a {
    color: white; 
    text-decoration: none;
    display: block;
}

.offcanvas-body .list-group-item:hover, 
.offcanvas-body .list-group-item:focus {
    background-color:#f0f8ff; 
}
.offcanvas-body .list-group-item:hover a, 
.offcanvas-body .list-group-item:focus a {
    color: #000; 
}
</style>

<body>
    <h1>Hi</h1>
</body>
</html>
