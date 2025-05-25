<?php
session_start();

if (isset($_POST['logout'])) {
    session_unset();     
    session_destroy();   
    header("Location: index.php");
    exit();
} 

$userName = $_SESSION['user_name'] ?? 'Emri Mbiemri';
$userEmail = $_SESSION['user_email'] ?? 'email@example.com';
$userRole = $_SESSION['user_role'] ?? 'Përdorues';
$userPhone = $_SESSION['user_phone'] ?? '+383 44 123 456';
$joinDate = $_SESSION['created_at'] ?? '2024-01-01';
$profileImage = 'assets/profile_default.png'; 
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Profili Im</title>
    <link rel="icon" href="assets/img/webicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script><style>
         body {
      background-color: #f5f7fa;
    }

    .profile-header {
      background-color: #ffffff;
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0 0 20px rgba(0,0,0,0.05);
    }

    .profile-img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #dee2e6;
    }

    .tab-content {
      margin-top: 30px;
    }

    .info-label {
      font-weight: bold;
      color: #6c757d;
    }

    .edit-btn {
      margin-top: 20px;
    }
  </style>
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <a href="index.php">
                <img src="assets/img/company_logo.png" alt="logo" width="140px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="bi bi-list fs-2"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto d-flex align-items-left gap-1 py-2">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link active" href="products.php">Cars</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                </ul>
                <ul class="navbar-nav d-flex align-items-right flex-row py-1">
                    <li class="nav-item">
                        <a class="nav-link" href="cars.php"><i class="bi bi-car-front-fill fs-4"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="cars.php"><i class="bi bi-cash-coin fs-4"></i></a>
                    </li>

                    <?php if (isset($_SESSION['active'])): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle fs-4"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <?php  if ($_SESSION['user_role'] == 'admin'): ?>
                                    <li><button class="dropdown-item" href="admin/dashboard.php">Dashboard</button></li>
                                <?php endif; ?>
                                <li><button class="dropdown-item" href="myProfile.php">My Profile</button></li>
                                <form method="post" onsubmit="return confirm('A jeni i sigurt që doni të dilni?');">
                                    <button type="submit" name="logout" class="dropdown-item">Logout</button>
                                </form>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php"><i class="bi bi-person-circle fs-4"></i></a>
                        </li>
                    <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<div class="container-fluid py-5 text-left">
    <h2>Profili Im</h2>

    <!-- Shfaqja e mesazheve -->
    <?php if (!empty($_SESSION['success_msg'])): ?>
        <div class="alert alert-success"><?php echo htmlspecialchars($_SESSION['success_msg']); ?></div>
        <?php unset($_SESSION['success_msg']); ?>
    <?php endif; ?>
    <?php if (!empty($_SESSION['error_msg'])): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($_SESSION['error_msg']); ?></div>
        <?php unset($_SESSION['error_msg']); ?>
    <?php endif; ?>

    <!-- Informacioni i përdoruesit -->
    <p><strong>Emri:</strong> <?php echo htmlspecialchars($_SESSION['user_name'] ?? 'Përdorues'); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['user_email'] ?? ''); ?></p>
    <p><strong>Roli:</strong> <?php echo htmlspecialchars($_SESSION['user_role'] ?? ''); ?></p>

    <!-- Butoni për modalin -->
    <button class="btn" style="background-color: #035dad !important; color: #f9f9f9 !important;" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
        Ndrysho Fjalëkalimin
    </button>
</div>

<!-- Modal Ndrysho Fjalëkalimin -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="admin/users/change_password.php" class="modal-content needs-validation" novalidate>
      <div class="modal-header">
        <h5 class="modal-title" id="changePasswordModalLabel">Ndrysho Fjalëkalimin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Mbylle"></button>
      </div>
      <div class="modal-body">
          <div class="mb-3">
            <label for="current_password" class="form-label">Fjalëkalimi Aktual</label>
            <input type="password" name="current_password" id="current_password" class="form-control" required />
            <div class="invalid-feedback">Ju lutem shkruani fjalëkalimin aktual.</div>
          </div>
          <div class="mb-3">
            <label for="new_password" class="form-label">Fjalëkalimi i Ri</label>
            <input type="password" name="new_password" id="new_password" class="form-control" required minlength="6" />
            <div class="invalid-feedback">Fjalëkalimi i ri duhet të ketë të paktën 6 karaktere.</div>
          </div>
          <div class="mb-3">
            <label for="confirm_password" class="form-label">Konfirmo Fjalëkalimin</label>
            <input type="password" name="confirm_password" id="confirm_password" class="form-control" required />
            <div class="invalid-feedback">Ju lutem konfirmoni fjalëkalimin e ri.</div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anulo</button>
        <button type="submit" name="change_password" class="btn" style="background-color: #035dad !important; color: #f9f9f9 ;">Ndrysho</button>
      </div>
    </form>
  </div>
</div>

<?php if (isset($_GET['success'])): ?>
    <script>
        alert("<?php echo htmlspecialchars($_GET['success']); ?>");
    </script>
<?php elseif (isset($_GET['error'])): ?>
    <script>
        alert("Gabim: <?php echo htmlspecialchars($_GET['error']); ?>");
    </script>
<?php endif; ?>


    <!-- ============= FOOTER SECTION ============= -->
    <footer class="container-fluid mt-5 footer-info">
        <div class="row d-flex align-items-center footer-info-content">
            <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                <div class="d-flex align-items-center">
                    <i class="bi bi-copy me-2"></i>
                    <span class="mb-0">Over 1 million listings</span>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                <div class="d-flex align-items-center">
                    <i class="bi bi-search me-2"></i>
                    <span class="">Personalized search</span>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                <div class="d-flex align-items-center">
                    <i class="bi bi-car-front-fill me-2"></i>
                    <span class="mb-0">Online car appraisal</span>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                <div class="d-flex align-items-center">
                    <i class="bi bi-lightbulb me-2"></i>
                    <span class="mb-0">Non-stop innovation</span>
                </div>
            </div>
        </div>
        <hr>
        <div class="row d-flex justify-content-around footer-lists">
            <div class="col-6 col-md-6 col-lg-3">
                <p>Buying</p>
                <ul class="list-unstyled">
                    <li><a href="cars.php">Find a car</a></li>
                    <li><a href="#brands">Car dealers</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-6 col-lg-3">
                <p>About</p>
                <ul class="list-unstyled">
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.php">Contact us</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <p>Profile</p>
                <ul class="list-unstyled">
                    <li><a href="login.php">My account</a></li>
                    <li><a href="favorite.php">Favorite</a></li>
                </ul>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                <p>Every buyers beliver</p>
                <p style="font-size: small;">Explore carmee web app and join the community of car enthusiasts.</p>
            </div>
        </div>

        <p id="copyright">&copy; All rights are reserved. Made by <a href="https://github.com/drenxhyliqi/WEB24_GR16"
                target="_blank"><b>GR16</b></a></p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
