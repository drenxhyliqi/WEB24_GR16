<?php
session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

require_once("../database/db_conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Carme | Models Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="adminassets/admin.css" />
    <link rel="stylesheet" href="../assets/style/style.css" />
</head>
<body class="bg-light">

    <!-- Navbar and Sidebar -->
    <nav class="navbar navbar-expand-lg shadow-sm border-bottom">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a href="dashboard.php">
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
        <div class="offcanvas-header shadow">
            <h5 class="offcanvas-title"><i class="bi bi-person-circle me-2"></i> <?= $_SESSION['user_name']; ?></h5>
            <button class="btn-close costum shadow-none" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <div class="custom-button-group">
                <a href="dashboard.php" class="btn-custom"><i class="bi bi-grid-fill"></i><span>Dashboard</span></a>
                <a href="productsManagement.php" class="btn-custom"><i class="bi bi-car-front-fill"></i><span>Cars</span></a>
                <a href="clientsManagement.php" class="btn-custom"><i class="bi bi-people-fill"></i><span>Clients</span></a>
                <a href="modelsManagement.php" class="btn-custom"><i class="bi bi-caret-right me-2"></i><i class="bi bi-list-nested"></i><span>Models</span></a>
                <a href="../logout.php" class="btn-custom"><i class="bi bi-box-arrow-left"></i><span>Log Out</span></a>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="container-fluid">
        <div class="mt-4 mb-4">
            <h3 class="fw-bold"><i class="bi bi-caret-right"></i>Model Management</h3>
            <p class="text-muted">Manage and update vehicle model information.</p>

            <div class="card shadow-sm p-5">
                <!-- Add Model Form -->
                <form id="addModelForm">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
                            <input type="text" id="model" class="form-control form-control-sm py-2 shadow-none mb-2" placeholder="Enter model name" autofocus required/>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-plus-circle-fill"></i> Add Model</button>
                        </div>
                    </div>
                </form>
                <hr>

                <!-- Model Table -->
                <div id="model-table-container"></div>
            </div>
        </div>
    </div>

    <!-- Edit Model Modal -->
    <div class="modal fade" id="editModelModal" tabindex="-1" aria-labelledby="editModelModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModelModalLabel">Edit Model</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_model_id" />
                    <input type="text" id="edit_model_name" class="form-control form-control-sm py-2 shadow-none" placeholder="Model name" required />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="save_model" class="btn btn-success">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            function clearFields(){
                $('#model').val('');
            }

            function fetchModels() {
                $.ajax({
                    url: "models/fetchModels.php",
                    method: "POST",
                    data: { fetch: "fetchModels" },
                    success: function (response) {
                        $('#model-table-container').html(response);
                    }
                });
            }

            // Add Model (Create)
            $('#addModelForm').submit(function (e) {
                e.preventDefault();
                var model = $('#model').val();

                $.ajax({
                    url: "models/addModel.php",
                    method: "POST",
                    data: {
                        insert: "insertModel",
                        model: model
                    },
                    success: function (data) {
                        var response = JSON.parse(data);
                        if (response.status === 'success') {
                            alert(response.message);
                            fetchModels(); // Refresh the table
                            clearFields();
                        } else {
                            alert(response.message);
                        }
                    }
                });
            });

            // Edit Model (Open Modal)
            $(document).on('click', '.edit-btn', function () {
                var id = $(this).data('id');
                var name = $(this).data('name');

                $('#edit_model_id').val(id);
                $('#edit_model_name').val(name);

                $('#editModelModal').modal('show');
            });

            // Save Model (Update)
            $('#save_model').click(function () {
                var id = $('#edit_model_id').val();
                var modelName = $('#edit_model_name').val();

                $.ajax({
                    url: "models/updateModel.php",
                    method: "POST",
                    data: {
                        update: "updateModel",
                        id: id,
                        model: modelName
                    },
                    success: function (data) {
                        var response = JSON.parse(data);
                        if (response.status === 'success') {
                            alert(response.message);
                            fetchModels();
                            $('#editModelModal').modal('hide');
                        } else {
                            alert(response.message);
                        }
                    }
                });
            });

            // Delete Model
            $(document).on('click', '.delete-btn', function () {
                var id = $(this).data('id');

                if (confirm('Are you sure you want to delete this model?')) {
                    $.ajax({
                        url: "models/deleteModel.php",
                        method: "POST",
                        data: { id: id },
                        success: function (data) {
                            var response = JSON.parse(data);
                            if (response.status === 'success') {
                                alert(response.message);
                                fetchModels(); // Refresh the table
                            } else {
                                alert(response.message);
                            }
                        }
                    });
                }
            });

            // Initial fetch of models
            fetchModels();
        });
    </script>
</body>
</html>
