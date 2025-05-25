<?php
session_start();
require_once("database/db_conn.php");

if(isset($_GET['id'])){

    $id = $_GET['id'];
    // Total cars
    $result = $con->query("SELECT * FROM cars WHERE id = '$id'");
    $cars = [];
        while ($row = $result->fetch_assoc()) {
        $cars[] = $row;
    }
}else{
    header('Loacation: index.php');
}

// Cars
$result = $con->query("SELECT * FROM cars t01 ORDER BY id DESC LIMIT 3");
$others = [];
while ($row = $result->fetch_assoc()) {
    $others[] = $row;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title Name -->
    <title>Car Marketplace | Product</title>
    <link rel="icon" href="assets/img/webicon.png" type="image/x-icon">

    <!-- Bootstrap & Custom CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="assets/style/car.css">
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
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                </ul>
                <ul class="navbar-nav d-flex align-items-right flex-row py-1">
                    <li class="nav-item"><a class="nav-link" href="cars.php"><i class="bi bi-car-front-fill fs-4"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="favorite.php"><i class="bi bi-bag-heart fs-4"></i></a></li>
                    <?php if (isset($_SESSION['active'])) { ?>
                        <li class="nav-item"><a class="nav-link" href="admin/dashboard.php"><i class="bi bi-person-circle fs-4"></i></a></li>
                    <?php } else { ?>
                        <li class="nav-item"><a class="nav-link" href="login.php"><i class="bi bi-person-circle fs-4"></i></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container-fluid">
        
        <?php if(count($cars)>0){ ?>
            <?php foreach ($cars as $car): ?>
                <!-- Product Title -->
                <h2 class="margin-top-3"><b><?= $car['car_name'] ?></b></h2>

                <!-- Product Images -->
                <div class="row" id="mercedes">
                    <div class="col-sm-12 col-md-12 col-lg-8">
                        <img src="<?= htmlspecialchars($car['cover_img']) ?>" alt="main-img-1" id="active"
                            class="img-hover-product main-img shadow-sm" style="height: 500px; object-fit: cover;">
                    </div>

                    <!-- Product Info -->
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <div class="row">
                            <?php
                            $images = json_decode($car['images'], true);

                            if (!empty($images) && is_array($images)) {
                                foreach ($images as $index => $imgPath) {
                                    // Limit to first 2 or 3 images (optional)
                                    if ($index == 2) break;
                                    ?>
                                    <div class="col-12 mb-3">
                                        <img src="<?= htmlspecialchars($imgPath) ?>" alt="main-img-<?= $index + 1 ?>" id="main-img-<?= $index + 1 ?>"
                                            class="img-hover-product main-img shadow-sm w-100" style="height: 250px; object-fit:cover;">
                                    </div>
                                    <?php
                                }
                            } else {
                                echo '<div class="col-12"><p class="text-muted">No images available.</p></div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <h3 class="fw-semibold">Description</h3>
                    <ul style="opacity: 75%; list-style-type: square;">
                        <li><i class="bi bi-geo-alt me-2"></i><?= $car['location'] ?></li>
                        <li><i class="bi-speedometer me-2"></i><?= $car['km'] ?></li>
                        <li><i class="bi bi-fuel-pump me-2"></i><?= $car['fuel'] ?></li>
                        <li><i class="bi-gear me-2"></i><?= $car['transmission'] ?></li>
                    </ul>
                    <p><?= $car['description'] ?></p>
                </div>
            <?php endforeach; ?>
        <?php };?>

        <!-- Other Cars -->
        <div class="d-flex justify-content-between align-items-center mt-5">
            <h3 class="fw-semibold">Other Products</h3>
            <a href="cars.php" class="text-decoration-none text-secondary">View all<i class="bi bi-arrow-right ms-2"></i></a>
        </div>
        <div class="row align-items-center">
            <?php if(count($others)>0){ ?>
                <?php foreach ($others as $other): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-img-wrapper">
                                <img src="<?= htmlspecialchars($other['cover_img']) ?>" alt="<?= htmlspecialchars($other['car_name']) ?>">
                                <div class="date-badge"><?= htmlspecialchars($other['relased_year']) ?></div>
                            </div>
                            <div class="card-body">
                                <h3 class="car-title">
                                    <a href="car.php?id=<?= $other['id'] ?>" class="text-decoration-none text-dark">
                                            <?= htmlspecialchars($other['car_name']) ?>
                                        </a>
                                    </h3>
                                <p class="car-price">€<?= number_format($other['price'], 0) ?></p>
                                <div class="car-details-grid">
                                    <div class="car-detail"><i class="bi bi-speedometer"></i><span><?= number_format($other['km']) ?> km</span></div>
                                    <div class="car-detail"><i class="bi bi-fuel-pump"></i><span><?= htmlspecialchars($other['fuel']) ?></span></div>
                                    <div class="car-detail"><i class="bi bi-map"></i><span><?= htmlspecialchars(string: $other['location']) ?></span></div>
                                    <div class="car-detail"><i class="bi bi-gear"></i><span><?= htmlspecialchars($other['transmission']) ?></span></div>
                                </div>
                                <?php if(isset($_SESSION['active']) && $_SESSION['user_role']=='client'): ?>
                                    <div class="mt-3">
                                        <form method="post" action="add_to_wishlist.php">
                                            <input type="hidden" name="car_id" value="<?= $other['id'] ?>">
                                            <input type="hidden" name="car_name" value="<?= htmlspecialchars($other['car_name']) ?>">
                                            <input type="hidden" name="car_price" value="<?= $other['price'] ?>">
                                            <input type="hidden" name="cover_img" value="<?= $other['cover_img'] ?>">
                                            <button type="submit" class="btn btn-dark text-center w-100">Add to wishlist</button>
                                        </form>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach;
                    } else {
                        echo "<p class='text-muted text-center'>Your wishlist is currently empty.</p>";
                    }
                ?>
        </div>
    </div>

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

    <!-- ============= SCRIPTS ============= -->
    <script src="assets/main.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>