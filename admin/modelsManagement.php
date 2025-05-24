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

    <nav class="navbar navbar-expand-lg shadow-sm border-bottom">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a href="../admin/index.php">
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
                        <input type="text" name="model" class="form-control form-control-sm py-2 shadow-none" placeholder="Add new model..." autofocus required/>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-plus-circle-fill"></i> Add
                        </button>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>Model Name</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($models as $row): ?>
                        <tr>
                            <td><?= $row['model'] ?></td>
                            <td class="text-end">
                                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id'] ?>">
                                    <i class="bi bi-pencil"></i> Edit
                                </button>
                                <a href="models/deleteModel.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">
                                    <i class="bi bi-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Edit Modals -->
    <?php foreach ($models as $row): ?>
        <div class="modal fade" id="editModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="editModal<?= $row['id'] ?>Label" aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="models/updateModel.php">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Model</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" class="form-control shadow-none" name="id" value="<?= $row['id'] ?>" />
                            <div class="mb-3">
                                <label for="modalModelName<?= $row['id'] ?>" class="form-label">Model Name</label>
                                <input type="text" value="<?= $row['model'] ?>" class="form-control shadow-none" name="model" id="modalModelName<?= $row['id'] ?>" required/>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php endforeach; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
