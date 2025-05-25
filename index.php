<?php
session_start();

if (isset($_POST['logout'])) {
    session_unset();     
    session_destroy();   
    header("Location: index.php");
    exit();
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Marketplace | Home PHP</title>
    <link rel="icon" href="assets/img/webicon.png" type="image/x-icon">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/style/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                    <li class="nav-item"><a class="nav-link active" href="cars.php">Cars</a></li>
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

    <!-- Main Banner -->
    <div class="container-fluid main-banner p-3 p-md-3 p-lg-5 text-white text-center">
        <div class="p-0 p-md-1 p-lg-5">
            <div class="row align-items-center">
                <div class="col-12 col-md-7 col-lg-7 order-2 order-md-1">
                    <img src="assets/img/mainbg.png" alt="mainimg" class="img-fluid">
                </div>
                <div class="col-12 col-md-5 col-lg-5 p-5 text-start text-md-start order-1 order-md-2">
                    <h1 class="display-3 fw-bold text-uppercase">
                        CAR CHANGE? <br> <span style="color: #0369fc;">CAR ME.</span>
                    </h1>
                    <p class="lead text-light">Find your perfect ride or sell yours effortlessly.</p>
                    <div class="mt-4">
                        <a href="contact.php" class="btn btn-primary btn-lg w-100 mb-3"><i class="bi bi-envelope"></i> Get in touch </a>
                        <a href="cars.php" class="btn btn-find btn-lg w-100"><i class="bi bi-search"></i> Find a car</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ============= SELECT TYPE SECTION ============= -->
    <!-- <section class="container-fluid select-type">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-left flex-column gap-2">
                    <h3>Browse:</h3>
                    <div class="d-flex flex-wrap gap-2">
                        <button class="filter-btn disabled active btn py-2 px-3"><i class="bi bi-tag"></i> Spring Sale</button>
                        <button class="filter-btn disabled btn py-2 px-3"><i class="bi bi-stars"></i> New cars</button>
                        <button class="filter-btn disabled btn py-2 px-3"><i class="bi bi-car-front"></i> Used cars</button>
                        <button class="filter-btn disabled btn py-2 px-3"><i class="bi bi-lightning-charge"></i>
                            Electric</button>
                        <button class="filter-btn disabled btn py-2 px-3"><i class="bi bi-truck"></i> SUVs</button>
                        <button class="filter-btn disabled btn py-2 px-3"><i class="bi bi-fuel-pump"></i> Hybrids</button>
                        <button class="filter-btn disabled btn py-2 px-3"><i class="bi bi-eyeglasses"></i> Big boot</button>
                        <button class="filter-btn disabled btn py-2 px-3"><i class="bi bi-piggy-bank"></i> Below 30k</button>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Our Vehicle Models -->
    <section class="container-fluid mt-5 explore">
        <h2 class="section-title mb-3">Discover Our Range of Vehicle Models</h2>
        <p class="fw-semibold mb-4">At Carme, we offer a diverse lineup of vehicle models to match every lifestyle and preference. Whether you're looking for a family-friendly SUV, a sleek saloon, or a sporty convertible, you’ll find exactly what suits you.</p>

        <div class="row g-3">
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="car-card">
                    <img src="assets/img/suv-dc743039.svg" alt="SUVs">
                    <p class="fw-medium">SUVs</p>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="car-card">
                    <img src="assets/img/hatchback-235fe02d.svg" alt="Hatchbacks">
                    <p class="fw-medium">Hatchbacks</p>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="car-card">
                    <img src="assets/img/saloon-b8d4b50e.svg" alt="Saloons">
                    <p class="fw-medium">Saloons</p>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="car-card">
                    <img src="assets/img/coupe-b6bef833.svg" alt="Coupes">
                    <p class="fw-medium">Coupes</p>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="car-card">
                    <img src="assets/img/sports_car-8604921b.svg" alt="Sports cars">
                    <p class="fw-medium">Sports cars</p>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="car-card">
                    <img src="assets/img/convertible-71f66687.svg" alt="Convertibles">
                    <p class="fw-medium">Convertibles</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Thank you section -->
    <section id="thankyou">
        <div class="container-fluid">
            <h3><i class="bi bi-balloon-heart" style="color: #0369fc !important;"></i> With partners we trust. <i
                    class="bi bi-balloon-heart" style="color: #0369fc !important;"></i></h3>
            <h4 class="mb-5">We connect you with all the major manufacturers and thousands of hand-picked dealers.</h4>
            <a href="contact.php" class="cnt-btn fw-semibold">Contact</a>
            <!-- <button class=""><a href="contact.php">Contact</a></button> -->
        </div>
    </section>

    <!-- Top offers(prej databaze ma te shtrejtit) -->
    <div class="container">
        <div class="header-row">
            <h2 class="section-title mt-5">Top offers<br> Here are the top 3 cheapest cars you can find toady!</h2>
            <a href="cars.php" class="view-all">
                View all <i class="bi bi-chevron-right"></i>
            </a>
        </div>
        <!--==== TOP OFFERS SECTION ======-->
        <?php
            require_once("database/db_conn.php");
            $topOffersQuery = "SELECT * FROM cars ORDER BY price ASC LIMIT 3";
            $topOffers = $con->query($topOffersQuery);
            ?>
            <div class="row">
                <?php while ($car = $topOffers->fetch_assoc()): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-img-wrapper">
                                <img src="<?= htmlspecialchars($car['cover_img']) ?>" alt="<?= htmlspecialchars($car['car_name']) ?>">
                                <div class="date-badge"><?= htmlspecialchars($car['relased_year']) ?></div>
                            </div>
                            <div class="card-body">
                                <h3 class="car-title">
                                    <a href="car.php?id=<?= $car['id'] ?>" class="text-decoration-none text-dark">
                                        <?= htmlspecialchars($car['car_name']) ?>
                                    </a>
                                </h3>
                                <p class="car-price">€<?= number_format($car['price'], 0) ?></p>
                                <div class="car-details-grid">
                                    <div class="car-detail"><i class="bi bi-speedometer"></i><span><?= number_format($car['km']) ?> km</span></div>
                                    <div class="car-detail"><i class="bi bi-fuel-pump"></i><span><?= htmlspecialchars($car['fuel']) ?></span></div>
                                    <div class="car-detail"><i class="bi bi-map"></i><span><?= htmlspecialchars(string: $car['location']) ?></span></div>
                                    <div class="car-detail"><i class="bi bi-gear"></i><span><?= htmlspecialchars($car['transmission']) ?></span></div>
                                </div>
                                <?php if(isset($_SESSION['active']) && $_SESSION['user_role']=='client'): ?>
                                    <div class="mt-3">
                                        <form method="post" action="add_to_wishlist.php">
                                            <input type="hidden" name="car_id" value="<?= $car['id'] ?>">
                                            <input type="hidden" name="car_name" value="<?= htmlspecialchars($car['car_name']) ?>">
                                            <input type="hidden" name="car_price" value="<?= $car['price'] ?>">
                                            <input type="hidden" name="cover_img" value="<?= $car['cover_img'] ?>">
                                            <button type="submit" class="btn btn-dark text-center w-100">Add to wishlist</button>
                                        </form>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
    </div>

    <!-- ============= BRANDS SECTION ============== -->
    <?php
    class CarBrand
    {
        public $name;
        protected $logoPath;

        public function __construct($name, $logoPath)
        {
            $this->name = $name;
            $this->logoPath = $logoPath;
        }

        public function render()
        {
            return '
            <a href="#" class="d-flex align-items-center mb-2 text-decoration-none text-dark">
                <img src="' . $this->logoPath . '" alt="' . $this->name . '" class="me-3" style="width: 40px;">
                <span class="fw-bold">' . $this->name . '</span>
            </a>';
        }
    }
    class Jaguar extends CarBrand
    {
        public function __construct()
        {
            parent::__construct('Jaguar', 'assets/svg/svgexport-57.svg');
        }
    }
    class Lamborghini extends CarBrand
    {
        public function __construct()
        {
            parent::__construct('Lamborghini', 'assets/svg/svgexport-61.svg');
        }
    }
    class LandRover extends CarBrand
    {
        public function __construct()
        {
            parent::__construct('Land Rover', 'assets/svg/svgexport-62.svg');
        }
    }
    class Lexus extends CarBrand
    {
        public function __construct()
        {
            parent::__construct('Lexus', 'assets/svg/svgexport-64.svg');
        }
    }
    class Maserati extends CarBrand
    {
        public function __construct()
        {
            parent::__construct('Maserati', 'assets/svg/svgexport-66.svg');
        }
    }
    class McLaren extends CarBrand
    {
        public function __construct()
        {
            parent::__construct('McLaren', 'assets/svg/svgexport-68.svg');
        }
    }
    class Mercedes extends CarBrand
    {
        public function __construct()
        {
            parent::__construct('Mercedes', 'assets/svg/svgexport-69.svg');
        }
    }
    class Ferrari extends CarBrand
    {
        public function __construct()
        {
            parent::__construct('Ferrari', 'assets/svg/svgexport-47.svg');
        }
    }
    class Mitsubishi extends CarBrand
    {
        public function __construct()
        {
            parent::__construct('Mitsubishi', 'assets/svg/svgexport-72.svg');
        }
    }
    class Nissan extends CarBrand
    {
        public function __construct()
        {
            parent::__construct('Nissan', 'assets/svg/svgexport-73.svg');
        }
    }
    class Porsche extends CarBrand
    {
        public function __construct()
        {
            parent::__construct('Porsche', 'assets/svg/svgexport-77.svg');
        }
    }
    class RollsRoyce extends CarBrand
    {
        public function __construct()
        {
            parent::__construct('Rolls Royce', 'assets/svg/svgexport-79.svg');
        }
    }
    class Abarth extends CarBrand
    {
        public function __construct()
        {
            parent::__construct('Abarth', 'assets/svg/svgexport-35.svg');
        }
    }
    class AlfaRomeo extends CarBrand
    {
        public function __construct()
        {
            parent::__construct('Alfa Romeo', 'assets/svg/svgexport-36.svg');
        }
    }
    class Mazda extends CarBrand
    {
        public function __construct()
        {
            parent::__construct('Mazda', 'assets/svg/svgexport-67.svg');
        }
    }
    class AstonMartin extends CarBrand
    {
        public function __construct()
        {
            parent::__construct('Aston Martin', 'assets/svg/svgexport-38.svg');
        }
    }
    class Audi extends CarBrand
    {
        public function __construct()
        {
            parent::__construct('Audi', 'assets/svg/svgexport-39.svg');
        }
    }
    class Bentley extends CarBrand
    {
        public function __construct()
        {
            parent::__construct('Bentley', 'assets/svg/svgexport-40.svg');
        }
    }
    class BMW extends CarBrand
    {
        public function __construct()
        {
            parent::__construct('BMW', 'assets/svg/svgexport-41.svg');
        }
    }
    class Lotus extends CarBrand
    {
        public function __construct()
        {
            parent::__construct('Lotus', 'assets/svg/svgexport-65.svg');
        }
    }
    $brands = [
        new Jaguar(),
        new Lamborghini(),
        new LandRover(),
        new Lexus(),
        new Maserati(),
        new McLaren(),
        new Mercedes(),
        new Ferrari(),
        new Mitsubishi(),
        new Nissan(),
        new Porsche(),
        new RollsRoyce(),
        new Abarth(),
        new AlfaRomeo(),
        new Mazda(),
        new AstonMartin(),
        new Audi(),
        new Bentley(),
        new BMW(),
        new Lotus(),
    ];
    ?>
    <section class="container brands" id="brands">
        <h3 class="fw-bold">Trusted by these manufacturers</h3>
        <div class="row">
            <?php foreach (array_chunk($brands, 5) as $brandChunk): ?>
                <div class="col-6 col-md-3">
                    <?php foreach ($brandChunk as $brand): ?>
                        <?= $brand->render(); ?>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- ============= INFO SECTION ============= -->
    <?php
    class InfoCard
    {
        private $icon;
        private $text;

        public function __construct(string $icon, string $text)
        {
            $this->icon = $icon;
            $this->text = $text;
        }

        public function renderCard(): string
        {
            return '
            <div class="card info-content" style="width: 100%;">
                <div class="card-body">
                    <div class="row d-flex justify-content-between">
                        <div class="col-auto">
                            <i class="bi ' . $this->icon . '"></i>
                            <p class="mt-5">' . $this->text . '</p>
                        </div>
                    </div>
                </div>
            </div>';
        }
    }

    class InfoSection
    {
        protected $title;
        private $cards = [];

        public function __construct(string $title)
        {
            $this->title = $title;
        }

        public function addCard(InfoCard $card): void
        {
            $this->cards[] = $card;
        }

        protected function renderHeader(): string
        {
            return '
            <div class="col-auto">
                <h2 class="mt-3 mb-4">' . $this->title . '</h2>
            </div>';
        }

        public function renderSection(): void
        {
            echo '
            <section class="container-fluid mt-4 mb-4">
                ' . $this->renderHeader() . '
                <div class="row align-items-center">';

            foreach ($this->cards as $card) {
                echo '
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                    ' . $card->renderCard() . '
                </div>';
            }

            echo '
                </div>
            </section>';
            echo "";
        }
    }


    $section = new InfoSection("What sets Finder apart?");

    $card1 = new InfoCard('bi-copy', 'Over 1 million listings');
    $card2 = new InfoCard('bi-search', 'Personalized search');
    $card3 = new InfoCard('bi-car-front-fill', 'Online car appraisal');
    $card4 = new InfoCard('bi-lightbulb', 'Non-stop innovation');


    $section->addCard($card1);
    $section->addCard($card2);
    $section->addCard($card3);
    $section->addCard($card4);

    $section->renderSection();
    ?>


    <!-- ============= LATEST CARS SECTION ============= -->
    <section class="container-fluid mt-4 mb-4 cars-cards">
        <div class="cars-content">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-auto">
                    <h2>Latest Cars</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <?php
            $latestCarsQuery = "SELECT * FROM cars ORDER BY id DESC LIMIT 4";
            $latestCars = $con->query($latestCarsQuery);
            ?>
            <?php while ($car = $latestCars->fetch_assoc()): ?>
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                <div class="card card-content">
                    <img src="<?= htmlspecialchars($car['cover_img']) ?>" class="card-img-top" alt="<?= htmlspecialchars($car['car_name']) ?>">
                    <div class="card-body">
                        <div class="row d-flex justify-content-between">
                            <div class="col-auto"><p class="text-muted"><?= htmlspecialchars($car['relased_year']) ?></p></div>
                            <a href="contact.php" class="text-decoration-none text-muted"><p class="new-deal">INQUIRE NOW</p></a>
                        </div>
                        <h6 class="card-title fw-bold">
                            <a href="car.php?id=<?= $car['id'] ?>" class="text-decoration-none text-dark">
                                <?= htmlspecialchars($car['car_name']) ?>
                            </a>
                        </h6>
                        <h5 class="fw-semibold">€<?= number_format($car['price'], 0) ?></h5>
                        <div class="row d-flex">
                            <div class="col-auto">
                                <small><i class="bi bi-speedometer me-2"></i><?= number_format($car['km']) ?> km</small><br>
                                <small><i class="bi bi-fuel-pump me-2"></i><?= htmlspecialchars($car['fuel']) ?></small>
                            </div>
                            <div class="col-auto mx-auto">
                                <small><i class="bi bi-gear me-2"></i><?= htmlspecialchars($car['transmission']) ?></small><br>
                                <small><i class="bi bi-calendar me-2"></i><?= htmlspecialchars($car['relased_year']) ?></small>
                            </div>
                            <?php if(isset($_SESSION['active']) && $_SESSION['user_role']=='client'): ?>
                                <div class="mt-3">
                                    <form method="post" action="add_to_wishlist.php">
                                        <input type="hidden" name="car_id" value="<?= $car['id'] ?>">
                                        <input type="hidden" name="car_name" value="<?= htmlspecialchars($car['car_name']) ?>">
                                        <input type="hidden" name="car_price" value="<?= $car['price'] ?>">
                                        <input type="hidden" name="cover_img" value="<?= $car['cover_img'] ?>">
                                        <button type="submit" class="btn btn-dark text-center w-100">Add to wishlist</button>
                                    </form>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </section>

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