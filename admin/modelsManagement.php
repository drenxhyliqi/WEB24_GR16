<?php
session_start();

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

require_once("../database/db_conn.php");

// Reading all models
$result = $con->query("SELECT * FROM models");
$models = [];
while ($row = $result->fetch_assoc()) {
    $models[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Model Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="adminassets/admin.css" />
    <link rel="stylesheet" href="../assets/style/style.css" />
</head>
<body class="bg-light">

    <!-- Navbar and Sidebar -->
    <nav class="navbar navbar-expand-lg shadow-sm border-bottom">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a href="../index.php">
                <img src="../assets/img/company_logo.png" alt="logo" width="140" />
            </a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="bi bi-list fs-2"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample">
                            <i class="bi bi-list fs-4"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="offcanvas offcanvas-start" id="offcanvasExample" tabindex="-1">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title"><i class="bi bi-person-circle fs-3"></i> Admin Dynamic</h5>
            <button class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <div class="custom-button-group">
                <a href="dashboard.php" class="btn-custom"><i class="bi bi-grid-fill"></i><span>Dashboard</span></a>
                <a href="productsManagement.php" class="btn-custom"><i class="bi bi-car-front-fill"></i><span>Cars</span></a>
                <a href="clientsManagement.php" class="btn-custom"><i class="bi bi-people-fill"></i><span>Clients</span></a>
                <a href="#" class="btn-custom"><i class="bi bi-list-nested"></i><span>Models</span></a>
                <a href="#" class="btn-custom"><i class="bi bi-box-arrow-left"></i><span>Log Out</span></a>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="mt-4 mb-4">
            <h3 class="fw-bold"><i class="bi bi-caret-right"></i>Model Management</h3>
            <p class="text-muted">Manage and update vehicle model information.</p>
        </div>

        <div class="card border shadow-sm p-5">
            <h5 class="fw-semibold">Model List</h5>

            <form method="POST" action="models/addModel.php" class="mb-3">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
                        <input type="text" id="model" name="model" class="form-control form-control-sm py-2 shadow-none" placeholder="Add new model..." autofocus required/>
                    </div>
                    <div class="mb-3">
                        <button type="button" id="insert_model" name="insert_model" class="btn btn-primary">
                            <i class="bi bi-plus-circle-fill"></i> Add
                        </button>
                    </div>
                </div>
            </form>

            
            <div class="table-responsive">
                <!-- This is where the table will be inserted -->
                <div id="model-table-container">
                    <!-- Table will be loaded here dynamically -->
                </div>
            </div>

            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            function clearFields() {
                $("#model").val('');
            }

            // Insert Model (Create)
            $('#insert_model').click(function () {
                var model = $("#model").val();

                if (model === "") {
                    alert("Model name cannot be empty!");
                    return;
                }

                $.ajax({
                    url: "models/addModel.php",
                    method: "POST",
                    data: {
                        insert: "insertModel",
                        model: model
                    },

                    success: function (data) {
                        fetchModels();
                        clearFields();
                    },
                    error: function (data) {
                        alert('Error: ' + data.message);
                    }
                });
            });

            // Update Model
            $('#update_model').click(function () {
                var modelId = $("#model_id").val();
                var modelName = $("#modalModelName").val();

                if (modelName === "") {
                    alert("Model name cannot be empty!");
                    return;
                }

                $.ajax({
                    url: "models/updateModel.php",
                    method: "POST",
                    data: { 
                        update: "updateModel",
                        id: modelId,
                        model: modelName
                    },

                    success: function (data) {
                        fetchModels();
                        clearFields();
                    },
                    error: function (data) {
                        alert('Error: ' + data.message);
                    }
                });
            });

            // Delete Model
            $('#delete_model').click(function () {
                var modelId = $(this).data('id');

                if (confirm('Are you sure you want to delete this model?')) {
                    $.ajax({
                        url: "models/deleteModel.php",
                        method: "POST",
                        data: { id: modelId },

                        success: function (data) {
                            alert('Deleted.');
                            fetchModels();
                            clearFields();
                        },
                        error: function (data) {
                            alert('Error: ' + data.message);
                        }
                    });
                }
            });

            // Fetch all models (Read)
            function fetchModels() {
                $.ajax({
                    url: "models/fetchModels.php",
                    method: "POST",
                    data: { fetch: 'fetchModels' },
                    success: function(response) {
                        $('#model-table-container').html(response);
                    },
                    error: function() {
                        alert('An error occurred while fetching models.');
                    }
                });
            };
        });
    </script>
</body>
</html>
