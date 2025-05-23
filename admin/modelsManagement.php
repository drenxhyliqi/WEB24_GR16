<?php
require_once("../db_conn.php");
$models = $con->query("SELECT * FROM models");
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
<body>

<nav class="navbar navbar-expand-lg">
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

<div class="container-fluid justify-content-between align-items-center">
    <div class="mb-4">
        <h2 class="fw-bold">Model Management</h2>
        <p class="text-muted">Manage and update vehicle model information.</p>
    </div>

    <div class="card shadow-sm px-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-semibold">Model List</h5>
        </div>

        <form method="POST" action="models/addModel.php" class="mb-3 d-flex gap-2">
            <input type="text" name="model" class="form-control form-control-sm" placeholder="Add new model..." required />
            <button type="submit" class="btn btn-primary btn-sm d-flex align-items-center">
                <i class="bi bi-plus-circle-fill me-1"></i> Add
            </button>
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
                    <?php while ($row = $models->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['model'], ENT_QUOTES) ?></td>
                            <td class="text-end">
                                <button type="button" class="btn btn-sm btn-success edit-btn"
                                        data-id="<?= $row['id'] ?>"
                                        data-model="<?= htmlspecialchars($row['model'], ENT_QUOTES) ?>">
                                    <i class="bi bi-pencil"></i> Edit
                                </button>
                                <a href="models/deleteModel.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">
                                    <i class="bi bi-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="editModelModal" tabindex="-1" aria-labelledby="editModelModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="models/updateModel.php" id="editModelForm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Model</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="modalModelId" />
                    <div class="mb-3">
                        <label for="modalModelName" class="form-label">Model Name</label>
                        <input type="text" class="form-control" name="model" id="modalModelName" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', () => {
            document.getElementById('modalModelId').value = button.dataset.id;
            document.getElementById('modalModelName').value = button.dataset.model;

            const modal = new bootstrap.Modal(document.getElementById('editModelModal'));
            modal.show();
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
