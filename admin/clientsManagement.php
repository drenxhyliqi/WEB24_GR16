<?php
session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

require_once("../database/db_conn.php");
$users = [];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Carme | Clients Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="adminassets/admin.css">
    <link rel="stylesheet" href="../assets/style/style.css">
</head>

<body class="bg-light">

    <!-- Navbar and Sidebar -->
    <nav class="navbar navbar-expand-lg shadow-sm border-bottom">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a href="dashboard.php">
                <img src="../assets/img/company_logo.png" alt="logo" width="140" />
            </a>
            <button type="button" class="btn btn-default border-0" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"><i class="bi bi-grid h3"></i></button>
        </div>
    </nav>

    <div class="offcanvas offcanvas-start" id="offcanvasExample" tabindex="-1">
        <div class="offcanvas-header shadow">
            <h5 class="offcanvas-title"><i class="bi bi-person-circle me-2"></i> <?= $_SESSION['user_name']; ?></h5>
            <button class="btn-close costum shadow-none" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <div class="custom-button-group">
                <a href="dashboard.php" class="btn-custom"><i class="bi bi-grid-fill"></i><span>Dashboard</span></a>
                <a href="productsManagement.php" class="btn-custom"><i class="bi bi-car-front-fill"></i><span>Cars</span></a>
                <a href="clientsManagement.php" class="btn-custom"><i class="bi bi-caret-right me-2"></i><i class="bi bi-people-fill"></i><span>Clients</span></a>
                <a href="modelsManagement.php" class="btn-custom"><i class="bi bi-list-nested"></i><span>Models</span></a>
                <a href="../logout.php" class="btn-custom"><i class="bi bi-box-arrow-left"></i><span>Log Out</span></a>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="container-fluid p-4">
            <div class="mb-4">
                <h2 class="fw-bold"><i class="bi bi-caret-right"></i>Clients Management</h2>
                <p class="text-muted">Manage your customers' data and their actions.</p>
            </div>

            <div class="card shadow-sm p-4">
                <div class="table-responsive">
                    <table class="table align-middle" id="users-table">
                        <thead>
                            <tr>
                                <th>Client</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {

            // Fetch users
            function fetchUsers() {
                $.ajax({
                    url: "users/fetchUsers.php",
                    method: "POST",
                    data: { fetch: "fetchUsers" },
                    success: function (data) {
                        $('#users-table tbody').html(data);
                    }
                });
            }

            fetchUsers();

            // Delete user
            $(document).on('click', '.delete-btn', function () {
                var userId = $(this).data('id');

                if (confirm('Are you sure you want to delete this user?')) {
                    $.ajax({
                        url: "users/deleteUser.php",
                        method: "POST",
                        data: { id: userId },
                        success: function (data) {
                            var response = JSON.parse(data);
                            if (response.status === 'success') {
                                alert(response.message);
                                fetchUsers();
                            } else {
                                alert(response.message);
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
