<?php

session_start();
require_once("database/db_conn.php");
class Car {
    public $image;
    public $makeModel;
    public $variant;
    public $price;
    public $savings;
    public $year;
    public $mileage;
    public $status;

    public function __construct($image, $makeModel, $variant, $price, $savings, $year, $mileage, $status) {
        $this->image = $image;
        $this->makeModel = $makeModel;
        $this->variant = $variant;
        $this->price = $price;
        $this->savings = $savings;
        $this->year = $year;
        $this->mileage = $mileage;
        $this->status = $status;
    }

    public function getImage()       { return $this->image; }
    public function getMakeModel()   { return $this->makeModel; }
    public function getVariant()     { return $this->variant; }
    public function getPrice()       { return $this->price; }
    public function getSavings()     { return $this->savings; }
    public function getYear()        { return $this->year; }
    public function getMileage()     { return $this->mileage; }
    public function getStatus()      { return $this->status; }
}


function countVisits()
{
    if (isset($_SESSION['count_visit'])) {
        $_SESSION['count_visit'] += 1;
    } else {
        $_SESSION['count_visit'] = 1;
    }

    return $_SESSION['count_visit'];
}

$visits = countVisits();


//Vendosja e veturave nga Admini ne cars.php
$cars = [];
$query = "SELECT c.*, m.model FROM cars c 
        LEFT JOIN models m ON c.model_id = m.id 
        ORDER BY c.id DESC";
$result = $con->query($query);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $car = new Car(
            $row['cover_img'],
            $row['car_name'] . ' ' . $row['model'],
            $row['fuel'] . ' • ' . $row['transmission'],
            '€' . number_format($row['price'], 0),
            'Saving €0 off RRP',
            $row['relased_year'],
            number_format($row['km']) . ' km',
            $row['status']
        );
        $cars[] = $car;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Marketplace - Find Your Perfect Car</title>
    <link rel="icon" href="assets/img/webicon.png" type="image/x-icon">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Custom CSS -->
    <link href="assets/style/cars.css" rel="stylesheet">
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
                    <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-car-front-fill fs-4"></i></a></li>
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

    <!-- Main content -->
    <main>
        <div class="container mt-4">

            <!-- Header section -->
            <div class="mb-4">
                <h1 class="fw-bold"><?= $result->num_rows ?> Cars Available</h1>
                <small>You visited this page : <b><?= $visits; ?></b> times</small>
            </div>

            <div class="row">
                <!-- Filter Sidebar (Desktop) -->
                <aside class="col-md-3 d-none d-md-block">
                    <div class="filter-sidebar bg-white p-4 rounded shadow-sm">
                        <h5 class="fw-bold mb-4">Filter</h5>

                        <!-- Condition Filter -->
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3">Condition</h6>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="newCar" checked>
                                <label class="form-check-label" for="newCar">New</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="usedCar">
                                <label class="form-check-label" for="usedCar">Used</label>
                            </div>
                        </div>

                        <!-- Price Filter -->
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3">Price</h6>
                            <div class="d-flex mb-2">
                                <select class="form-select form-select-sm me-2">
                                    <option>Min price</option>
                                    <option>€5,000</option>
                                    <option>€10,000</option>
                                    <option>€15,000</option>
                                </select>
                                <select class="form-select form-select-sm">
                                    <option>Max price</option>
                                    <option>€15,000</option>
                                    <option>€20,000</option>
                                    <option>€30,000</option>
                                </select>
                            </div>
                        </div>

                        <!-- Make Filter -->
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3">Make</h6>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="citroen">
                                <label class="form-check-label" for="citroen">Citroen</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="fiat">
                                <label class="form-check-label" for="fiat">Fiat</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="ford">
                                <label class="form-check-label" for="ford">Ford</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="suzuki">
                                <label class="form-check-label" for="suzuki">Suzuki</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="volvo">
                                <label class="form-check-label" for="volvo">Volvo</label>
                            </div>
                        </div>
                    </div>
                </aside>

                <!-- Mobile Filter Button -->
                <div class="col-12 d-md-none mb-3">
                    <button class="btn btn-outline-secondary w-100 d-flex justify-content-between align-items-center"
                        type="button" data-bs-toggle="collapse" data-bs-target="#mobileFilter">
                        <span class="fw-medium">Filters</span>
                        <i class="bi bi-chevron-down"></i>
                    </button>
                </div>

                <!-- Mobile Filter Panel -->
                <div class="collapse mb-3 d-md-none" id="mobileFilter">
                    <div class="bg-white p-3 rounded shadow-sm">
                        <!-- Condition Filter -->
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3">Condition</h6>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="newCarMobile" checked>
                                <label class="form-check-label" for="newCarMobile">New</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="usedCarMobile">
                                <label class="form-check-label" for="usedCarMobile">Used</label>
                            </div>
                        </div>

                        <!-- Price Filter -->
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3">Price</h6>
                            <div class="d-flex mb-2">
                                <select class="form-select form-select-sm me-2">
                                    <option>Min price</option>
                                    <option>€5,000</option>
                                    <option>€10,000</option>
                                    <option>€15,000</option>
                                </select>
                                <select class="form-select form-select-sm">
                                    <option>Max price</option>
                                    <option>€15,000</option>
                                    <option>€20,000</option>
                                    <option>€30,000</option>
                                </select>
                            </div>
                        </div>

                        <!-- Make Filter -->
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3">Make</h6>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="citroenMobile">
                                <label class="form-check-label" for="citroenMobile">Citroen</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="fiatMobile">
                                <label class="form-check-label" for="fiatMobile">Fiat</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="fordMobile">
                                <label class="form-check-label" for="fordMobile">Ford</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Car Listings Section -->
                <section class="col-md-9">
                    <div class="row g-4">
                        <!-- Display the cars -->
                        <?php while ($car = $result->fetch_assoc()): ?>
                        <div class="col-md-6">
                            <div class="card h-100 shadow-sm hover-shadow">
                                <div class="position-relative">
                                    <img src="<?= $car['cover_img'] ?>" class="card-img-top" alt="<?= $car['car_name'] ?>" style="height: 180px; object-fit: cover;">
                                    <div class="position-absolute top-0 start-0 m-2 badge bg-dark"><?= $car['status'] ?></div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text small text-muted mb-1"><?= $car['fuel'] ?> • <?= $car['transmission'] ?></p>
                                    <h5 class="card-title fw-bold mb-1"><?= $car['car_name'] . ' ' . $car['model'] ?></h5>
                                    <div class="mb-2">
                                        <div class="fs-4 fw-bold">€<?= number_format($car['price']) ?></div>
                                        <div class="text-success small">Saving €0 off RRP</div>
                                    </div>
                                    <div class="d-flex align-items-center small text-secondary mt-3">
                                        <span><?= $car['relased_year'] ?></span>
                                        <span class="mx-2">•</span>
                                        <span><?= number_format($car['km']) ?> km</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    </div>
                </section>
            </div>
    </main>

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
                    <li><a href="#">Find a car</a></li>
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

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>