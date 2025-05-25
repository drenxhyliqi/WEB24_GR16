<?php

session_start();
require_once("database/db_conn.php");

if (isset($_POST['logout'])) {
    session_unset();     
    session_destroy();   
    header("Location: index.php");
    exit();
} 

class Car {
    public $image;
    public $models;
    public $variant;
    public $price;
    public $savings;
    public $year;
    public $mileage;
    public $status;
    public $highlighted = false; // default


    public function __construct($image, $models, $variant, $price, $savings, $year, $mileage, $status, $highlighted = false) {
    $this->image = $image;
    $this->models = $models;
    $this->variant = $variant;
    $this->price = $price;
    $this->savings = $savings;
    $this->year = $year;
    $this->mileage = $mileage;
    $this->status = $status;
    $this->highlighted = $highlighted;
}


    public function getImage()       { return $this->image; }
    public function getModels()   { return $this->models; }
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


//Funksioni me reference 
function formatValue(&$value, $prefix = '', $suffix = '')
{
    $value = $prefix . number_format($value) . $suffix;
    return $value;
}


if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rowPrice = $row['price'];
        $rowKm = $row['km'];

        formatValue($rowPrice, '€');
        formatValue($rowKm, '', ' km');

        $car = new Car(
            $row['cover_img'],
            $row['car_name'] . ' ' . $row['model'],
            $row['fuel'] . ' • ' . $row['transmission'],
            //Percjellja vleres permes references
            $rowPrice,
            'Saving €1000 off RRP',
            $row['relased_year'],
            $rowKm,
            $row['status']
        );
        $cars[] = $car;
    }
}

function &getCarReferenceByIndex(array &$cars, int $index) {
    if (isset($cars[$index])) {
        return $cars[$index];
    }
    static $empty = null;
    return $empty;
}

$carRef = &getCarReferenceByIndex($cars, 0);
if ($carRef !== null) {
    $carRef->highlighted = true;
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
    <link rel="stylesheet" href="assets/style/style.css">

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
                    <li class="nav-item"><a class="nav-link active" href="#">Cars</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                </ul>
                <ul class="navbar-nav d-flex align-items-right flex-row py-1">
                    <?php if (isset($_SESSION['active'])): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle fs-4"></i>
                            </a>
                            <ul class="dropdown-menu " aria-labelledby="dropdownMenuLink">
                                <?php if ($_SESSION['user_role'] == 'admin'): ?>
                                    <li><a class="dropdown-item navList" href="admin/dashboard.php">Dashboard</a></li>
                                <?php endif; ?>

                                <li><a class="dropdown-item navList" href="myProfile.php">My Profile</a></li>

                                <li>
                                    <form method="post" style="margin: 0;" onsubmit="return confirm('A jeni i sigurt që doni të dilni?');">
                                        <button type="submit" name="logout" class="logoutBtn ">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php"><i class="bi bi-person-circle fs-4"></i></a>
                        </li>
                    <?php endif; ?>
                    </li>
                     <li class="nav-item"><a class="nav-link" href="favorite.php"><i class="bi bi-bag-heart fs-4"></i></a></li>
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
                                <input class="form-check-input" type="checkbox" name="condition[]" value="New" id="newCar">
                                <label class="form-check-label" for="newCar">New</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="condition[]" value="Used" id="usedCar">
                                <label class="form-check-label" for="usedCar">Used</label>
                            </div>
                        </div>

                        <!-- Price Filter -->
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3">Price (€)</h6>
                            <label for="priceMin" class="form-label">Min: <span id="minPriceValue">500€</span></label>
                            <input type="range" class="form-range" name="minPrice" id="priceMin" min="500" max="800000" step="5000" value="0">
                            <label for="priceMax" class="form-label mt-2">Max: <span id="maxPriceValue">800.000€</span></label>
                            <input type="range" class="form-range" name="maxPrice" id="priceMax" min="500" max="800000" step="5000" value="800000">
                        </div>
                        <!-- Model Type Filter -->
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3">Body Type</h6>
                            <?php
                            $modelsQuery = "SELECT DISTINCT model FROM models WHERE model IS NOT NULL AND model != ''";
                            $modelsResult = $con->query($modelsQuery);
                            if ($modelsResult && $modelsResult->num_rows > 0) {
                                while ($modelRow = $modelsResult->fetch_assoc()) {
                                    $model = htmlspecialchars($modelRow['model']);
                                    echo '
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="models[]" value="' . $model . '" id="' . $model . '">
                                        <label class="form-check-label" for="' . $model . '">' . $model . '</label>
                                    </div>';
                                }
                            }
                            ?>
                        </div>
                </aside>

                <!-- Mobile Filter Panel -->
                <div class="collapse mb-3 d-md-none" id="mobileFilter">
                    <div class="bg-white p-3 rounded shadow-sm">
                        <!-- Condition Filter -->
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3">Condition</h6>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="condition[]" value="New" id="newCarMobile">
                                <label class="form-check-label" for="newCarMobile">New</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="condition[]" value="Used" id="usedCarMobile">
                                <label class="form-check-label" for="usedCarMobile">Used</label>
                            </div>
                        </div>

                        <!-- Price Filter -->
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3">Price (€)</h6>
                            <label for="priceMinMobile" class="form-label">Min: <span id="minPriceValueMobile">500</span></label>
                            <input type="range" class="form-range" name="minPrice" id="priceMinMobile" min="500" max="800000" step="1000" value="0">
                            <label for="priceMaxMobile" class="form-label mt-2">Max: <span id="maxPriceValueMobile">800000</span></label>
                            <input type="range" class="form-range" name="maxPrice" id="priceMaxMobile" min="500" max="800000" step="1000" value="800000">
                        </div>

                        <!-- Body Type Filter -->
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3">Body Type</h6>
                            <?php
                            $typesQuery = "SELECT DISTINCT model FROM models WHERE model IS NOT NULL AND model != ''";
                            $typesResult = $con->query($typesQuery);
                            if ($typesResult && $typesResult->num_rows > 0) {
                                while ($typeRow = $typesResult->fetch_assoc()) {
                                    $type = htmlspecialchars($typeRow['model']);
                                    echo '
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="types[]" value="' . $type . '" id="' . $type . '">
                                        <label class="form-check-label" for="' . $type . '">' . $type . '</label>
                                    </div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- Car Listings Section -->
                <section class="col-md-9">
                    <div class="row g-4" id="carsContainer">
                        <!-- Veturat vendosen me AJAX -->
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    function loadCars(filters = {}) {
        $.ajax({
            url: 'filterCars.php',
            type: 'POST',
            data: filters,
            success: function (response) {
                $('#carsContainer').html(response);
            },
            error: function () {
                $('#carsContainer').html('<div class="col-12 text-danger text-center">Failed to load cars.</div>');
            }
        });
    }

    function applyFilters() {
        let conditions = [];
        $('input[name="condition[]"]:checked').each(function () {
            conditions.push($(this).val());
        });

        let models = [];
        $('input[name="models[]"]:checked').each(function () {
            models.push($(this).val());
        });


        let minPrice = $('#priceMin').val() || $('#priceMinMobile').val() || 500;
        let maxPrice = $('#priceMax').val() || $('#priceMaxMobile').val() || 800000;

        $('#minPriceValue, #minPriceValueMobile').text(minPrice);
        $('#maxPriceValue, #maxPriceValueMobile').text(maxPrice);

        loadCars({
            conditions: conditions,
            models: models,
            minPrice: minPrice,
            maxPrice: maxPrice
        });
    }

    $(document).ready(function () {
        loadCars(); // ngarko veturat në fillim
        $(document).on('change input', 'input[type=checkbox], input[type=range]', applyFilters);
    });
</script>


</body>

</html>