<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard Management</title>
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
    <nav style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); background-color:#f9f9f9;">
        <div class="container">
            <div class="nav justify-content-between align-items-center">
                <div>
                    <a class="nav-link p-0" href="#">
                        <img src="../assets/img/webicon.png" alt="Logo" height="62" />
                    </a>
                </div>
                <div class="d-inline-flex align-items-center gap-2">
                    <span class="nav-link p-0">
                        <a href="#" class="text-decoration-none text-dark"><i class="bi bi-person-circle fs-4 h5 "></i></a>
                    </span>
                    <span>
                        <a class="btn btn-transparent p-0" class="text-decoration-none text-dark" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu" aria-label="Toggle menu">
                            <i class="bi bi-list fs-4 h5"></i>
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </nav>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasMenuLabel">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="list-group">
                <li class="list-group-item"><a href="clientsManagement.php">Clients Management</a></li>
                <li class="list-group-item"><a href="modelsManagement.php">Models Management</a></li>
                <li class="list-group-item"><a href="productsManagement.php">Products Management</a></li>
            </ul>
        </div>
    </div>

    <!-- Bootstrap JS bundle (popper + bootstrap.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
