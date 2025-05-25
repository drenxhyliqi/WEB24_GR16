<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Me | About Us</title>
    <link rel="icon" href="assets/img/webicon.png" type="image/x-icon">


    <!-- Bootstrap & Custom CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/style/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .text-primary {
            color: #1a73e8 !important;
        }

        .hero-section h1 {
            line-height: 1.2;
        }

        .story-content p,
        .company-content p {
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
        }

        .brand-logo {
            width: 120px;
            height: 60px;
            border-radius: 4px;
        }

        .fact-item i {
            font-size: 1.5rem;
        }

        .quick-facts {
            border-radius: 8px;
        }
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
                    <li class="nav-item"><a class="nav-link active" href="#">About</a></li>
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

    <!-- ============= ABOUT US SECTION ============= -->
    <div class="container mt-4">
        <?php
        // Variabla globale dinamike
        $youtubeSubscribers = "10M+";
        $trustpilotRating = "4.5 'Excellent'";
        $trustedDealers = "5,500+";
        $registeredUsers = "12M+";
        $customers = "12M";
        $growth = "50%";
        $billionCarsBought = "€3 billion";
        $billionCarsListed = "€1.8 billion";
        $youtubeViews = "1.1 billion";
        $printCopies = "1.2 million";
        $websiteVisits = "100 million";
        // var_dump($youtubeSubscribers, $trustpilotRating, $trustedDealers, $registeredUsers);
        ?>

        <div class="row">
            <div class="col-lg-8">
                <section class="hero-section mb-4">
                    <h3 class="display-6 fw-bold">
                        OUR CAR JOURNEY STARTS HERE
                    </h3>
                </section>
                <section class="story-section mb-3">
                    <h4 class="fw-bold mb-4"><span class="text-primary">OUR STORY</span></h4>
                    <div class="story-content">
                        <p class="lead">
                            What started as a simple reviews site, is now one of the largest online car-changing destinations in <span class="text-primary">Europe</span>.
                        </p>
                        <p>
                            Over <span class="text-primary"><?= $customers; ?> customers</span> have used CarMe to buy or sell their car. Last year we grew over <span class="text-primary"><?= $growth; ?></span> with nearly
                            <span class="text-primary"><?= $billionCarsBought; ?></span> worth of cars bought on our site, while <span class="text-primary"><?= $billionCarsListed; ?></span> of cars were listed for sale through our Sell
                            My Car service.
                        </p>
                    </div>
                </section>
                <section class="company-section mb-3">
                    <h4 class="fw-bold mb-4"><span class="text-primary">CARMARKET GROUP</span></h4>
                    <div class="company-content">
                        <p>
                            In 2021, we acquired Autovia and formed Carmarket Group. Together we're driven by a passion for getting
                            people into cars. But not just any car, <span class="text-primary">the right car</span>.
                        </p>
                        <p>
                            That's why our trailblazing portfolio of automotive brands is building the go-to destination for car-changing,
                            capable of reaching drivers everywhere.
                        </p>
                        <p>
                            Our group has one of the world's most popular motoring YouTube channels, with over <span class="text-primary"><?= $youtubeViews; ?></span> annual views.
                            We also sell <span class="text-primary"><?= $printCopies; ?></span> print copies of our magazines and have over <span class="text-primary"><?= $websiteVisits; ?></span> website visits a year.
                        </p>
                    </div>
                    <h4><span class="text-primary fw-bold">Trusted By</span></h4>
                    <div class="brand-logos mt-2 d-flex flex-wrap justify-content-between">
                        <div class="brand-logo me-1 mb-3 bg-light d-flex align-items-center justify-content-center" style="flex: 1 1 calc(33.333% - 0.5rem);">
                            <img src="assets/svg/svgexport-41.svg" alt="bmw">
                        </div>
                        <div class="brand-logo me-1 mb-3 bg-light d-flex align-items-center justify-content-center" style="flex: 1 1 calc(33.333% - 0.5rem);">
                            <img src="assets/svg/svgexport-64.svg" alt="lexus">
                        </div>
                        <div class="brand-logo me-1 mb-3 bg-light d-flex align-items-center justify-content-center" style="flex: 1 1 calc(33.333% - 0.5rem);">
                            <img src="assets/svg/svgexport-72.svg" alt="Mitsubishi">
                        </div>
                        <div class="brand-logo me-1 mb-3 bg-light d-flex align-items-center justify-content-center" style="flex: 1 1 calc(33.333% - 0.5rem);">
                            <img src="assets/svg/svgexport-67.svg" alt="Mazda">
                        </div>
                        <div class="brand-logo me-1 mb-3 bg-light d-flex align-items-center justify-content-center" style="flex: 1 1 calc(33.333% - 0.5rem);">
                            <img src="assets/svg/svgexport-79.svg" alt="Rolls">
                        </div>
                        <div class="brand-logo me-1 mb-3 bg-light d-flex align-items-center justify-content-center" style="flex: 1 1 calc(33.333% - 0.5rem);">
                            <img src="assets/svg/svgexport-89.svg" alt="volvo">
                        </div>
                        <div class="brand-logo me-1 mb-3 bg-light d-flex align-items-center justify-content-center" style="flex: 1 1 calc(33.333% - 0.5rem);">
                            <img src="assets/svg/svgexport-88.svg" alt="VW">
                        </div>
                        <div class="brand-logo me-1 mb-3 bg-light d-flex align-items-center justify-content-center" style="flex: 1 1 calc(33.333% - 0.5rem);">
                            <img src="assets/svg/svgexport-69.svg" alt="benz">
                        </div>
                        <div class="brand-logo me-1 mb-3 bg-light d-flex align-items-center justify-content-center" style="flex: 1 1 calc(33.333% - 0.5rem);">
                            <img src="assets/svg/svgexport-65.svg" alt="Lotus">
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-lg-4">
                <div class="quick-facts bg-light p-4">
                    <h2 class="fw-bold mb-4">QUICK FACTS</h2>
                    <div class="fact-item mb-4">
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-youtube text-danger me-2"></i>
                            <h3 class="fs-4 fw-bold mb-0"><?= $youtubeSubscribers; ?></h3>
                        </div>
                        <p class="text-muted">YouTube subscribers</p>
                    </div>
                    <div class="fact-item mb-4">
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-star-fill text-warning me-2"></i>
                            <h3 class="fs-4 fw-bold mb-0"><?= $trustpilotRating; ?></h3>
                        </div>
                        <p class="text-muted">Trustpilot rating</p>
                    </div>
                    <div class="fact-item mb-4">
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-award text-primary me-2"></i>
                            <h3 class="fs-4 fw-bold mb-0"><?= $trustedDealers; ?></h3>
                        </div>
                        <p class="text-muted">Trusted dealer partners</p>
                    </div>
                    <div class="fact-item mb-4">
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-people-fill text-primary me-2"></i>
                            <h3 class="fs-4 fw-bold mb-0"><?= $registeredUsers; ?></h3>
                        </div>
                        <p class="text-muted">Registered users</p>
                    </div>
                </div>
                <img src="assets/img/about.png" alt="ABOUT" class="img-fluid mt-4 mb-4 rounded" style="width: 100%; height: auto;">
            </div>
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
                </ul>
            </div>
            <div class="col-6 col-md-6 col-lg-3">
                <p>About</p>
                <ul class="list-unstyled">
                    <li><a href="#">About Us</a></li>
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
    <!-- Script Source Bootsrap JS & Custom JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="assets/main.js" defer></script>
</body>

</html>