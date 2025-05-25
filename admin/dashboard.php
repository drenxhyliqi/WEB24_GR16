<?php
session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

require_once("../database/db_conn.php");

// Total cars
$result = $con->query("SELECT COUNT(*) as totalCars FROM cars");
$cars = 0;
while ($row = $result->fetch_assoc()) {
    $cars = $row['totalCars'];
}

// Total clients
$result = $con->query("SELECT COUNT(*) as totalClients FROM users WHERE role='client'");
$clients = 0;
while ($row = $result->fetch_assoc()) {
    $clients = $row['totalClients'];
}

// Total models
$result = $con->query("SELECT COUNT(*) as totalModels FROM models");
$models = 0;
while ($row = $result->fetch_assoc()) {
    $models = $row['totalModels'];
}

// Cars for table
$result = $con->query("SELECT t01.id, t01.car_name, t02.model, t01.price, t01.status FROM cars t01 INNER JOIN models t02 on t01.model_id=t02.id ORDER BY t01.price DESC LIMIT 10");
$tableCars = [];
while ($row = $result->fetch_assoc()) {
    $tableCars[] = $row;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Carme | Dashboard</title>
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
                <a href="dashboard.php" class="btn-custom"><i class="bi bi-caret-right me-2"></i><i class="bi bi-grid-fill"></i><span>Dashboard</span></a>
                <a href="productsManagement.php" class="btn-custom"><i class="bi bi-car-front-fill"></i><span>Cars</span></a>
                <a href="clientsManagement.php" class="btn-custom"><i class="bi bi-people-fill"></i><span>Clients</span></a>
                <a href="modelsManagement.php" class="btn-custom"><i class="bi bi-list-nested"></i><span>Models</span></a>
                <a href="../logout.php" class="btn-custom"><i class="bi bi-box-arrow-left"></i><span>Log Out</span></a>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="container-fluid p-4">
            <div class="mb-4">
                <h2 class="fw-bold"><i class="bi bi-caret-right me-2"></i>Dashboard</h2>
                <p class="text-muted">Monitor and manage all aspects of your car dealership.</p>
            </div>

            <!-- Row: Cards -->
            <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <div class="card shadow-sm p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted">Total Cars</h6>
                                <h3 class="fw-bold"><?= $cars ?></h3>
                                <a href="productsManagement.php" class="text-primary text-decoration-none small">View Cars →</a>
                            </div>
                            <i class="bi bi-car-front-fill fs-1 text-primary"></i>
                        </div>
                        <div class="progress mt-2" style="height: 5px;">
                            <div class="progress-bar bg-primary" style="width: <?= $cars ?>%"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted">Active Clients</h6>
                                <h3 class="fw-bold"><?= $clients ?></h3>
                                <a href="clientsManagement.php" class="text-primary text-decoration-none small">View Clients →</a>
                            </div>
                            <i class="bi bi-people-fill fs-1 text-primary"></i>
                        </div>
                        <div class="progress mt-2" style="height: 5px;">
                            <div class="progress-bar bg-primary" style="width: <?= $clients ?>%"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted">Available Models</h6>
                                <h3 class="fw-bold"><?= $models ?></h3>
                                <a href="modelsManagement.php" class="text-primary text-decoration-none small">View Models →</a>
                            </div>
                            <i class="bi bi-ui-checks fs-1 text-primary"></i>
                        </div>
                        <div class="progress mt-2" style="height: 5px;">
                            <div class="progress-bar bg-primary" style="width: <?= $models ?>%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Best cars -->
            <div class="card shadow-sm p-3 h-100">
                <h6 class="fw-bold mb-2">📈 Top Performing Models</h6>
                <p class="text-muted small">Most viewed car models this month</p>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Car Name</th>
                                <th>Model</th>
                                <th>Price</th>
                                <th class="text-end">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($tableCars)>0){ ?>
                                <?php foreach ($tableCars as $tableCar): ?>
                                    <tr>
                                        <td><?= $tableCar['car_name'] ?></td>
                                        <td><?= $tableCar['model'] ?></td>
                                        <td><?= $tableCar['price'] ?></td>
                                        <td class="text-end text-capitalize"><?= $tableCar['status'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php }else{?>
                                <tr class="text-center">
                                    <td colspan="4">0 Results</td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap JS bundle (popper + bootstrap.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>