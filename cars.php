<?php
 // Define the Car class
 class Car {
    private $image;
    private $makeModel;
    private $variant;
    private $price;
    private $savings;
    private $year;
    private $mileage;
    private $status;

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

        // Getters
        public function getImage() { 
            return $this->image;
        }

        public function getMakeModel() { return $this->makeModel; }
        public function getVariant() { return $this->variant; }
        public function getPrice() { return $this->price; }
        public function getSavings() { return $this->savings; }
        public function getYear() { return $this->year; }
        public function getMileage() { return $this->mileage; }
        public function getStatus() { return $this->status; }
        }

    // Create an array of Car objects
    $cars = [
        new Car("assets/img/m5.jpg", "BMW M5", "Automatic • Gasoline • 4.4 L", "€119,995", "Saving €5,000 off RRP", "2023", "0 miles", "New (Pre-Reg)"),
        new Car("assets/img/pista488.jpg", "Ferrari 488 Pista", "Automatic • Gasoline • 3.9 L", "€289,000", "Saving €15,000 off RRP", "2022", "10 miles", "New (Pre-Reg)"),
        new Car("assets/img/gwagon.jpg", "Mercedes G-Wagon G63", "Automatic • Gasoline • 6.2 L", "$311,999", "Saving $5,050 off RRP", "2021", "0 miles", "Used"),
        new Car("assets/img/porsche.jpg", "Porsche 911 Turbo S", "Automatic • Gasoline • 3.8 L", "€174,995", "Saving €20,000 off RRP", "2021", "2,000 miles", "Used")
    ];
    
    
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
    <link href="assets/cars.css" rel="stylesheet">
</head>

<body>
    <!-- ============= NAVIGATION BAR ============= -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <a href="index.php">
                <img src="assets/img/company_logo.png" alt="logo" width="140px">
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                    aria-expanded="false" aria-label="Toggle navigation">
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
                    <li class="nav-item"><a class="nav-link" href="cars.php"><i class="bi bi-car-front-fill fs-4"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-cash-coin fs-4"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php"><i class="bi bi-person-circle fs-4"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main content -->
     <main>
    <div class="container mt-4">
        <!-- Header section -->
        <div class="d-flex align-items-center mb-4">
            <div class="position-relative me-3">
                <div class="position-absolute top-0 end-0 translate-middle badge rounded-pill bg-danger">
                    8
                </div>
            </div>
            <h1 class="fw-bold">19,074 Cars Available</h1>
    </div>

        <!-- Active Filters Section -->
        <section class="mb-4">
            <div class="d-inline-flex align-items-center bg-white rounded-pill px-3 py-1 border">
                New
                <button class="btn btn-sm p-0 ms-1 text-muted">
                    <i class="bi bi-x-circle-fill"></i>
                </button>
            </div>
        </section>

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
                    <?php foreach ($cars as $car): ?>
                        <div class="col-md-6">
                            <div class="card h-100 shadow-sm hover-shadow">
                                <!-- Car Image -->
                                <div class="position-relative">
                                    <img src="<?= $car->getImage() ?>" class="card-img-top" alt="<?= $car->getMakeModel() ?>"
                                         style="height: 180px; object-fit: cover;">
                                    <div class="position-absolute top-0 start-0 m-2 badge bg-dark"><?= $car->getStatus() ?></div>
                                </div>

                                <!-- Car Details -->
                                <div class="card-body">
                                    <!-- Specs -->
                                    <p class="card-text small text-muted mb-1"><?= $car->getVariant() ?></p>

                                    <!-- Make and Model -->
                                    <h5 class="card-title fw-bold mb-1"><?= $car->getMakeModel() ?></h5>

                                    <!-- Price and Savings -->
                                    <div class="mb-2">
                                        <div class="fs-4 fw-bold"><?= $car->getPrice() ?></div>
                                        <div class="text-success small"><?= $car->getSavings() ?></div>
                                    </div>

                                    <!-- Year and Mileage -->
                                    <div class="d-flex align-items-center small text-secondary mt-3">
                                        <span><?= $car->getYear() ?></span>
                                        <span class="mx-2">•</span>
                                        <span><?= $car->getMileage() ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
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
                <p>Buying & Selling</p>
                <ul class="list-unstyled">
                    <li><a href="#">Find a car</a></li>
                    <li><a href="#">Sell your car</a></li>
                    <li><a href="#">Car dealers</a></li>
                    <li><a href="#">Compare Cars</a></li>
                    <li><a href="#">Online car</a></li>
                </ul>
            </div>
            
            <div class="col-6 col-md-6 col-lg-3">
                <p>About</p>
                <ul class="list-unstyled">
                    <li><a href="#">About Finder</a></li>
                    <li><a href="#">Contact us</a></li>
                    <li><a href="#">FAQs & Support</a></li>
                    <li><a href="#">Mobile app</a></li>
                    <li><a href="#">Blog & News</a></li>
                </ul>
            </div>
            
            <div class="col-12 col-md-6 col-lg-3">
                <p>Profile</p>
                <ul class="list-unstyled">
                    <li><a href="#">My account</a></li>
                    <li><a href="#">Wishlist</a></li>
                    <li><a href="#">My listings</a></li>
                    <li><a href="#">Add listings</a></li>
                </ul>
            </div>
            
            <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                <p>Download our app</p>
                <p style="font-size: small;">Download Finder app and join the community of car enthusiasts.</p>
                <div>
                    <button class="btn btn-primary me-2">
                        <i class="bi bi-google-play"></i> Google Play
                    </button>
                    <button class="btn btn-primary">
                        <i class="bi bi-apple"></i> App Store
                    </button>
                </div>
            </div>
        </div>

        <p id="copyright">
            &copy; All rights are reserved. Made by 
            <a href="https://github.com/drenxhyliqi/WEB24_GR16" target="_blank"><b>execution</b></a>
        </p>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>