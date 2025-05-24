<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="adminassets/admin.css">
    <link rel="stylesheet" href="../assets/style/style.css">
</head>
<body>
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid d-flex align-items-center justify-content-between">
    <a href="../index.php">
        <img src="../assets/img/company_logo.png" alt="logo" width="140px">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="bi bi-list fs-2"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto d-flex align-items-left gap-1 py-2">
            <li class="nav-item"><a class="nav-link" href="#"></a></li>
            <li class="nav-item"><a class="nav-link" href="#"></a></li>
            <li class="nav-item"><a class="nav-link" href="#"></a></li>
            <li class="nav-item"><a class="nav-link" href="#"></a></li>
        </ul>
        <ul class="navbar-nav d-flex align-items-right flex-row py-1">
            <li class="nav-item"><a class="# " data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample"><i class="bi bi-list fs-4"></i>
        </a>
        </li>
        </ul>
    </div>
    </div>
</nav>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel"><i class="bi bi-person-circle fs-3"> Admin Dynamic</i></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
    <div class="custom-button-group">
        <a href="#" class="btn-custom">
        <i class="bi bi-grid-fill"></i>
        <span>Dashboard</span>
        </a>
        <a href="productsManagement.php" class="btn-custom">
        <i class="bi bi-car-front-fill"></i>
        <span>Cars</span>
        </a>
        <a href="clientsManagement.php" class="btn-custom">
        <i class="bi bi-people-fill"></i>
        <span>Clients</span>
        </a>
        <a href="modelsManagement.php" class="btn-custom">
        <i class="bi bi-list-nested"></i>
        <span>Models</span>
        </a>
        <a href="#" class="btn-custom">
        <i class="bi bi-box-arrow-left"></i>
        <span>Log Out</span>
        </a>
    </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container-fluid p-4">
    <div class="mb-4">
        <h2 class="fw-bold">Dashboard</h2>
        <p class="text-muted">Monitor and manage all aspects of your car dealership.</p>
    </div>

    <!-- Row: Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
        <div class="card shadow-sm p-3">
            <div class="d-flex justify-content-between align-items-center">
            <div>
                <h6 class="text-muted">Total Cars</h6>
                <h3 class="fw-bold">27</h3>
                <a href="#" class="text-primary text-decoration-none small">View Cars →</a>
            </div>
            <i class="bi bi-car-front-fill fs-1 text-primary"></i>
            </div>
            <div class="progress mt-2" style="height: 5px;">
            <div class="progress-bar bg-primary" style="width: 80%"></div>
            </div>
            <small class="text-success fw-semibold mt-1 d-block">↑ 8.4%</small>
        </div>
        </div>

        <div class="col-md-4">
        <div class="card shadow-sm p-3">
            <div class="d-flex justify-content-between align-items-center">
            <div>
                <h6 class="text-muted">Active Clients</h6>
                <h3 class="fw-bold">42</h3>
                <a href="#" class="text-primary text-decoration-none small">View Clients →</a>
            </div>
            <i class="bi bi-people-fill fs-1 text-primary"></i>
            </div>
            <div class="progress mt-2" style="height: 5px;">
            <div class="progress-bar bg-primary" style="width: 70%"></div>
            </div>
            <small class="text-danger fw-semibold mt-1 d-block">↓ 3.2%</small>
        </div>
        </div>

        <div class="col-md-4">
        <div class="card shadow-sm p-3">
            <div class="d-flex justify-content-between align-items-center">
            <div>
                <h6 class="text-muted">Available Models</h6>
                <h3 class="fw-bold">15</h3>
                <a href="#" class="text-primary text-decoration-none small">View Models →</a>
            </div>
            <i class="bi bi-ui-checks fs-1 text-primary"></i>
            </div>
            <div class="progress mt-2" style="height: 5px;">
            <div class="progress-bar bg-primary" style="width: 90%"></div>
            </div>
            <small class="text-success fw-semibold mt-1 d-block">↑ 12.7%</small>
        </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-6">
        <div class="card shadow-sm p-3 h-100">
            <h6 class="fw-bold mb-1">📊 Monthly Car Sales</h6>
            <p class="text-muted small">Last 6 months performance</p>
            <!-- Placeholder chart -->
            <div style="height: 250px; background-color: white; display: flex; align-items: center; justify-content: center;">
            <span class="text-muted">[Chart Placeholder]</span>
            </div>
        </div>
        </div>

        <div class="col-md-6">
        <div class="card shadow-sm p-3 h-100">
            <h6 class="fw-bold mb-2">📈 Top Performing Models</h6>
            <p class="text-muted small">Most viewed car models this month</p>
            <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                <tr>
                    <th>Model</th>
                    <th>Views</th>
                    <th>Price</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>BMW X5</td>
                    <td>1245</td>
                    <td>$89,400</td>
                    <td><span class="badge bg-primary">Available</span></td>
                </tr>
                <tr>
                    <td>Mercedes E-Class</td>
                    <td>980</td>
                    <td>$74,200</td>
                    <td><span class="badge bg-secondary">Reserved</span></td>
                </tr>
                <tr>
                    <td>Audi Q7</td>
                    <td>875</td>
                    <td>$65,300</td>
                    <td><span class="badge bg-primary">Available</span></td>
                </tr>
                <tr>
                    <td>Tesla Model 3</td>
                    <td>820</td>
                    <td>$48,900</td>
                    <td><span class="badge bg-danger">Sold</span></td>
                </tr>
                <tr>
                    <td>Volvo XC60</td>
                    <td>760</td>
                    <td>$52,700</td>
                    <td><span class="badge bg-info">Recommended</span></td>
                </tr>
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>


    <!-- Bootstrap JS bundle (popper + bootstrap.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
