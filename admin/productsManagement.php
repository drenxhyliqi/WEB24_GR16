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
    <a href="../admin/index.php">
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
        <a href="index.php" class="btn-custom">
        <i class="bi bi-grid-fill"></i>
        <span>Dashboard</span>
        </a>
        <a href="#" class="btn-custom">
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
        <h2 class="fw-bold">Menaxhimi i Veturave</h2>
        <p class="text-muted">Menaxhoni inventarin e veturave tuaja, çmimet dhe statusin e tyre.</p>
    </div>

    <div class="card shadow-sm p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-semibold mb-0">Lista e Veturave</h5>
        <a href="#" class="btn btn-primary">
            <i class="bi bi-plus-circle-fill"></i> Shto
        </a>
        </div>

        <div class="table-responsive">
        <table class="table align-middle">
            <thead>
            <tr>
                <th>Modeli</th>
                <th>Çmimi (€)</th>
                <th>Statusi</th>
                <th class="text-end">Veprimet</th>
            </tr>
            </thead>
            <tbody>
            <!-- Rresht 1 -->
            <tr>
                <td>Audi A4</td>
                <td><input type="number" class="form-control" value="35000" /></td>
                <td>
                <select class="form-select">
                    <option selected>Në dispozicion</option>
                    <option>E rezervuar</option>
                    <option>E shitur</option>
                    <option>E rekomanduar</option>
                </select>
                </td>
                <td class="text-end">
                <button class="btn btn-sm btn-primary">
                    <i class="bi bi-save"></i> Ruaj
                </button>
                <button class="btn btn-sm btn-danger">
                    <i class="bi bi-trash"></i> Fshij
                </button>
                </td>
            </tr>

            <!-- Rreshti 2 -->
            <tr>
                <td>BMW 3 Series</td>
                <td><input type="number" class="form-control" value="38000" /></td>
                <td>
                <select class="form-select">
                    <option>Në dispozicion</option>
                    <option selected>E rezervuar</option>
                    <option>E shitur</option>
                    <option>E rekomanduar</option>
                </select>
                </td>
                <td class="text-end">
                <button class="btn btn-sm btn-primary">
                    <i class="bi bi-save"></i> Ruaj
                </button>
                <button class="btn btn-sm btn-danger">
                    <i class="bi bi-trash"></i> Fshij
                </button>
                </td>
            </tr>

            <!-- Rreshti 3 -->
            <tr>
                <td>Mercedes C-Class</td>
                <td><input type="number" class="form-control" value="40000" /></td>
                <td>
                <select class="form-select">
                    <option>Në dispozicion</option>
                    <option>E rezervuar</option>
                    <option selected>E shitur</option>
                    <option>E rekomanduar</option>
                </select>
                </td>
                <td class="text-end">
                <button class="btn btn-sm btn-primary">
                    <i class="bi bi-save"></i> Ruaj
                </button>
                <button class="btn btn-sm btn-danger">
                    <i class="bi bi-trash"></i> Fshij
                </button>
                </td>
            </tr>

            <!-- Rreshti 4 -->
            <tr>
                <td>Volkswagen Golf</td>
                <td><input type="number" class="form-control" value="25000" /></td>
                <td>
                <select class="form-select">
                    <option>Në dispozicion</option>
                    <option>E rezervuar</option>
                    <option>E shitur</option>
                    <option selected>E rekomanduar</option>
                </select>
                </td>
                <td class="text-end">
                <button class="btn btn-sm btn-primary">
                    <i class="bi bi-save"></i> Ruaj
                </button>
                <button class="btn btn-sm btn-danger">
                    <i class="bi bi-trash"></i> Fshij
                </button>
                </td>
            </tr>

            <!-- Rreshti 5 -->
            <tr>
                <td>Toyota Camry</td>
                <td><input type="number" class="form-control" value="28000" /></td>
                <td>
                <select class="form-select">
                    <option selected>Në dispozicion</option>
                    <option>E rezervuar</option>
                    <option>E shitur</option>
                    <option>E rekomanduar</option>
                </select>
                </td>
                <td class="text-end">
                <button class="btn btn-sm btn-primary">
                    <i class="bi bi-save"></i> Ruaj
                </button>
                <button class="btn btn-sm btn-danger">
                    <i class="bi bi-trash"></i> Fshij
                </button>
                </td>
            </tr>
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
