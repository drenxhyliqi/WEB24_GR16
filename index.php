<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Marketplace | Home</title>
    <link rel="icon" href="assets/img/webicon.png" type="image/x-icon">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!-- ============= NAVBAR ============= -->
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
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="products.php">Cars</a></li>
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

    <!-- ============= MAIN BANNER ============= -->
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
                        <a href="#" class="btn btn-primary btn-lg w-100 mb-3"><i class="bi bi-car-front-fill"></i> Sell
                            my car</a>
                        <a href="#" class="btn btn-find btn-lg w-100"><i class="bi bi-search"></i> Find a car</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ============= SELECT TYPE SECTION ============= -->
    <section class="container-fluid select-type">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-left flex-column gap-2">
                    <h3>Browse:</h3>
                    <div class="d-flex flex-wrap gap-2">
                        <button class="filter-btn active btn py-2 px-3"><i class="bi bi-tag"></i> Spring Sale</button>
                        <button class="filter-btn btn py-2 px-3"><i class="bi bi-stars"></i> New cars</button>
                        <button class="filter-btn btn py-2 px-3"><i class="bi bi-car-front"></i> Used cars</button>
                        <button class="filter-btn btn py-2 px-3"><i class="bi bi-lightning-charge"></i>
                            Electric</button>
                        <button class="filter-btn btn py-2 px-3"><i class="bi bi-truck"></i> SUVs</button>
                        <button class="filter-btn btn py-2 px-3"><i class="bi bi-fuel-pump"></i> Hybrids</button>
                        <button class="filter-btn btn py-2 px-3"><i class="bi bi-eyeglasses"></i> Big boot</button>
                        <button class="filter-btn btn py-2 px-3"><i class="bi bi-piggy-bank"></i> Below £30k</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============= EXPLORE CARS SECTION ============= -->
    <section class="container-fluid mt-4 mb-4 explore">
        <h2 class="fw-bold">Explore cars</h2>
        <p class="fw-semibold">Browse by car type</p>

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

    <!-- ============= THANK YOU SECTION ============= -->
    <section id="thankyou">
        <div class="container-fluid">
            <h3><i class="bi bi-balloon-heart" style="color: #0369fc !important;"></i> With partners we trust. <i
                    class="bi bi-balloon-heart" style="color: #0369fc !important;"></i></h3>
            <h4>We connect you with all the major manufacturers and thousands of hand-picked dealers.</h4>
            <button class="cnt-btn fw-semibold">Contact</button>
        </div>
    </section>

    <!-- ============= TOP OFFERS SECTION ============= -->
    <div class="container">
        <div class="header-row">
            <h2 class="section-title mt-5">Top offers</h2>
            <a href="#" class="view-all">
                View all <i class="bi bi-chevron-right"></i>
            </a>
        </div>

        <!-- <div class="row">
            <!-- Card 1 
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-img-wrapper">
                        <img src="assets/img/gwagon.jpg" alt="G Wagon">
                        <div class="date-badge">28/06/2024</div>
                    </div>
                    <div class="card-body">
                        <h3 class="car-title">Mereceds G Wagon 63</h3>
                        <p class="car-price">$273,000</p>

                        <div class="car-details-grid">
                            <div class="car-detail">
                                <i class="bi bi-geo-alt"></i>
                                <span>L.A</span>
                            </div>
                            <div class="car-detail">
                                <i class="bi bi-speedometer"></i>
                                <span>09K mi</span>
                            </div>
                            <div class="car-detail">
                                <i class="bi bi-fuel-pump"></i>
                                <span>Gasoline</span>
                            </div>
                            <div class="car-detail">
                                <i class="bi bi-gear"></i>
                                <span>Automatic</span>
                            </div>
                        </div>
                        <button class="btn-view">View Details</button>
                    </div>
                </div>
            </div>

            <!-- Card 2 
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-img-wrapper">
                        <img src="assets/img/e63s.jpg" alt="E63s">
                        <div class="date-badge">23/10/2024</div>
                    </div>
                    <div class="card-body">
                        <h3 class="car-title">Mercedes Benz E63s</h3>
                        <p class="car-price">$142,500</p>

                        <div class="car-details-grid">
                            <div class="car-detail">
                                <i class="bi bi-geo-alt"></i>
                                <span>Chicago</span>
                            </div>
                            <div class="car-detail">
                                <i class="bi bi-speedometer"></i>
                                <span>0 mi</span>
                            </div>
                            <div class="car-detail">
                                <i class="bi bi-fuel-pump"></i>
                                <span>Electric</span>
                            </div>
                            <div class="car-detail">
                                <i class="bi bi-gear"></i>
                                <span>Manual</span>
                            </div>
                        </div>

                        <button class="btn-view">View Details</button>
                    </div>
                </div>
            </div>

            <!-- Card 3 
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-img-wrapper">
                        <img src="assets/img/m5.jpg" alt="BMW M5">
                        <div class="date-badge">15/07/2024</div>
                    </div>
                    <div class="card-body">
                        <h3 class="car-title">BMW M5 F90</h3>
                        <p class="car-price">$122,500</p>

                        <div class="car-details-grid">
                            <div class="car-detail">
                                <i class="bi bi-geo-alt"></i>
                                <span>NYC</span>
                            </div>
                            <div class="car-detail">
                                <i class="bi bi-speedometer"></i>
                                <span>15K mi</span>
                            </div>
                            <div class="car-detail">
                                <i class="bi bi-fuel-pump"></i>
                                <span>Gasoline</span>
                            </div>
                            <div class="car-detail">
                                <i class="bi bi-gear"></i>
                                <span>Automatic</span>
                            </div>
                        </div>

                        <button class="btn-view">View Details</button>
                    </div>
                </div>
            </div>
        </div> -->
        <?php
// Array me të dhënat e veturave
$veturat = [    
    [
        "image" => "assets/img/gwagon.jpg",
        "date" => "28/06/2024",
        "title" => "Mereceds G Wagon 63",
        "price" => "$273,000",
        "location" => "L.A",
        "mileage" => "09K mi",
        "fuel" => "Gasoline",
        "gear" => "Automatic"
    ],
    [
        "image" => "assets/img/e63s.jpg",
        "date" => "23/10/2024",
        "title" => "Mercedes Benz E63s",
        "price" => "$142,500",
        "location" => "Chicago",
        "mileage" => "0 mi",
        "fuel" => "Electric",
        "gear" => "Manual"
    ],
    [
        "image" => "assets/img/m5.jpg",
        "date" => "15/07/2024",
        "title" => "BMW M5 F90",
        "price" => "$122,500",
        "location" => "NYC",
        "mileage" => "15K mi",
        "fuel" => "Gasoline",
        "gear" => "Automatic"
    ]
];
?>
        <div class="row">
        <?php foreach ($veturat as $vetura): ?>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-img-wrapper">
                        <img src="<?php echo $vetura['image']; ?>" alt="<?php echo $vetura['title']; ?>">
                        <div class="date-badge"><?php echo $vetura['date']; ?></div>
                    </div>
                    <div class="card-body">
                        <h3 class="car-title"><?php echo $vetura['title']; ?></h3>
                        <p class="car-price"><?php echo $vetura['price']; ?></p>

                        <div class="car-details-grid">
                            <div class="car-detail">
                                <i class="bi bi-geo-alt"></i>
                                <span><?php echo $vetura['location']; ?></span>
                            </div>
                            <div class="car-detail">
                                <i class="bi bi-speedometer"></i>
                                <span><?php echo $vetura['mileage']; ?></span>
                            </div>
                            <div class="car-detail">
                                <i class="bi bi-fuel-pump"></i>
                                <span><?php echo $vetura['fuel']; ?></span>
                            </div>
                            <div class="car-detail">
                                <i class="bi bi-gear"></i>
                                <span><?php echo $vetura['gear']; ?></span>
                            </div>
                        </div>
                        <button class="btn-view">View Details</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


    </div>

    <!-- ============= BRANDS SECTION ============= -->
    <section class="container brands">
        <h3 class="fw-bold">Browse by car manufacturer</h3>
        <div class="row">
            <div class="col-6 col-md-3">
                <a href="#" class="d-flex align-items-center mb-2 text-decoration-none text-dark">
                    <img src="assets/svg/svgexport-57.svg" alt="Jaguar" class="me-3" style="width: 40px;">
                    <span class="fw-bold">Jaguar</span>
                </a>
                <a href="#" class="d-flex align-items-center mb-2 text-decoration-none text-dark">
                    <img src="assets/svg/svgexport-61.svg" alt="Lamborghini" class="me-3" style="width: 40px;">
                    <span class="fw-bold">Lamborghini</span>
                </a>
                <a href="#" class="d-flex align-items-center mb-2 text-decoration-none text-dark">
                    <img src="assets/svg/svgexport-62.svg" alt="Land Rover" class="me-3" style="width: 40px;">
                    <span class="fw-bold">Land Rover</span>
                </a>
                <a href="#" class="d-flex align-items-center mb-2 text-decoration-none text-dark">
                    <img src="assets/svg/svgexport-64.svg" alt="Lexus" class="me-3" style="width: 40px;">
                    <span class="fw-bold">Lexus</span>
                </a>
                <a href="#" class="d-flex align-items-center mb-2 text-decoration-none text-dark">
                    <img src="assets/svg/svgexport-66.svg" alt="Maserati" class="me-3" style="width: 40px;">
                    <span class="fw-bold">Maserati</span>
                </a>
            </div>
            <div class="col-6 col-md-3">
                <a href="#" class="d-flex align-items-center mb-2 text-decoration-none text-dark">
                    <img src="assets/svg/svgexport-68.svg" alt="McLaren" class="me-3" style="width: 40px;">
                    <span class="fw-bold">McLaren</span>
                </a>
                <a href="#" class="d-flex align-items-center mb-2 text-decoration-none text-dark">
                    <img src="assets/svg/svgexport-69.svg" alt="Mercedes" class="me-3" style="width: 40px;">
                    <span class="fw-bold">Mercedes</span>
                </a>
                <a href="#" class="d-flex align-items-center mb-2 text-decoration-none text-dark">
                    <img src="assets/svg/svgexport-47.svg" alt="Ferrari" class="me-3" style="width: 40px;">
                    <span class="fw-bold">Ferrari</span>
                </a>
                <a href="#" class="d-flex align-items-center mb-2 text-decoration-none text-dark">
                    <img src="assets/svg/svgexport-72.svg" alt="Mitsubishi" class="me-3" style="width: 40px;">
                    <span class="fw-bold">Mitsubishi</span>
                </a>
                <a href="#" class="d-flex align-items-center mb-2 text-decoration-none text-dark">
                    <img src="assets/svg/svgexport-73.svg" alt="Nissan" class="me-3" style="width: 40px;">
                    <span class="fw-bold">Nissan</span>
                </a>
            </div>
            <div class="col-6 col-md-3">
                <a href="#" class="d-flex align-items-center mb-2 text-decoration-none text-dark">
                    <img src="assets/svg/svgexport-77.svg" alt="Porsche" class="me-3" style="width: 40px;">
                    <span class="fw-bold">Porsche</span>
                </a>
                <a href="#" class="d-flex align-items-center mb-2 text-decoration-none text-dark">
                    <img src="assets/svg/svgexport-79.svg" alt="Rolls Royce" class="me-3" style="width: 40px;">
                    <span class="fw-bold">Rolls Royce</span>
                </a>
                <a href="#" class="d-flex align-items-center mb-2 text-decoration-none text-dark">
                    <img src="assets/svg/svgexport-35.svg" alt="Abarth" class="me-3" style="width: 40px;">
                    <span class="fw-bold">Abarth</span>
                </a>
                <a href="#" class="d-flex align-items-center mb-2 text-decoration-none text-dark">
                    <img src="assets/svg/svgexport-36.svg" alt="Alfa Romeo" class="me-3" style="width: 40px;">
                    <span class="fw-bold">Alfa Romeo</span>
                </a>
                <a href="#" class="d-flex align-items-center mb-2 text-decoration-none text-dark">
                    <img src="assets/svg/svgexport-67.svg" alt="Mazda" class="me-3" style="width: 40px;">
                    <span class="fw-bold">Mazda</span>
                </a>
            </div>
            <div class="col-6 col-md-3">
                <a href="#" class="d-flex align-items-center mb-2 text-decoration-none text-dark">
                    <img src="assets/svg/svgexport-38.svg" alt="Aston Martin" class="me-3" style="width: 40px;">
                    <span class="fw-bold">Aston Martin</span>
                </a>
                <a href="#" class="d-flex align-items-center mb-2 text-decoration-none text-dark">
                    <img src="assets/svg/svgexport-39.svg" alt="Audi" class="me-3" style="width: 40px;">
                    <span class="fw-bold">Audi</span>
                </a>
                <a href="#" class="d-flex align-items-center mb-2 text-decoration-none text-dark">
                    <img src="assets/svg/svgexport-40.svg" alt="Bentley" class="me-3" style="width: 40px;">
                    <span class="fw-bold">Bentley</span>
                </a>
                <a href="#" class="d-flex align-items-center mb-2 text-decoration-none text-dark">
                    <img src="assets/svg/svgexport-41.svg" alt="BMW" class="me-3" style="width: 40px;">
                    <span class="fw-bold">BMW</span>
                </a>
                <a href="#" class="d-flex align-items-center mb-2 text-decoration-none text-dark">
                    <img src="assets/svg/svgexport-65.svg" alt="Lotus" class="me-3" style="width: 40px;">
                    <span class="fw-bold">Lotus</span>
                </a>
            </div>
        </div>
    </section>

    <!-- ============= INFO SECTION ============= -->
    <section class="container-fluid mt-4 mb-4">
        <div class="col-auto">
            <h2 class="mt-3 mb-4">What sets Finder apart?</h2>
        </div>
        <div class="row align-items-center">
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                <div class="card info-content" style="width: 100%;">
                    <div class="card-body">
                        <div class="row d-flex justify-content-between">
                            <div class="col-auto">
                                <i class="bi bi-copy"></i>
                                <p class="mt-5">Over 1 million listings</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3 mb-4">
                <div class="card info-content" style="width: 100%;">
                    <div class="card-body">
                        <div class="row d-flex justify-content-between">
                            <div class="col-auto">
                                <i class="bi bi-search"></i>
                                <p class="mt-5">Personalized search</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                <div class="card info-content" style="width: 100%;">
                    <div class="card-body">
                        <div class="row d-flex justify-content-between">
                            <div class="col-auto">
                                <i class="bi bi-car-front-fill"></i>
                                <p class="mt-5">Online car appraisal</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                <div class="card info-content" style="width: 100%;">
                    <div class="card-body">
                        <div class="row d-flex justify-content-between">
                            <div class="col-auto">
                                <i class="bi bi-lightbulb"></i>
                                <p class="mt-5">Non-stop innovation</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============= LATEST CARS SECTION ============= -->
    <section class="container-fluid mt-4 mb-4 cars-cards">
        <div class="cars-content">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-auto">
                    <h2>Latest Cars</h2>
                </div>
                <div class="col-auto mb-3">
                    <button class="btn-all me-2">All</button>
                    <button class="btn-new me-2">New Cars</button>
                    <button class="btn-used">Used Cars</button>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                <!-- Card 1 -->
                <div class="card card-content" style="width: 100%;">
                    <img src="assets/img/porschecar.jpg" class="card-img-top img-fluid" alt="porsche">
                    <div class="card-body">
                        <div class="row d-flex justify-content-between">
                            <div class="col-auto">
                                <p class="text-muted">30/09/2022</p>
                            </div>
                            <a href="#" alt="favorite" class="text-decoration-none text-muted">
                                <i class="bi bi-heart"></i>
                            </a>
                            <a href="#" alt="favorite" class="text-decoration-none text-muted">
                                <p class="new-deal">NEW DEAL</p>
                            </a>
                        </div>
                        <h6 class="card-title fw-bold">Porsche 911 <span class="text-muted ms-1">(2024)</span>
                        </h6>
                        <h5 class="fw-semibold">$179,000</h5>
                        <div class="row d-flex">
                            <div class="col-auto">
                                <small><i class="bi bi-geo-alt me-2"></i>Boston</small><br>
                                <small><i class="bi-speedometer me-2"></i>12K mi</small>
                            </div>
                            <div class="col-auto mx-auto">
                                <small><i class="bi bi-fuel-pump me-2"></i>Gasoline</small><br>
                                <small><i class="bi-gear me-2"></i>Automatic</small>
                            </div>
                            <button class="view fw-semibold">View Deal</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3 mb-4">
                <!-- Card 2 -->
                <div class="card" style="width: 100%;">
                    <img src="assets/img/m5.jpg" class="card-img-top" alt="m5">
                    <div class="card-body">
                        <div class="row d-flex justify-content-between">
                            <div class="col-auto">
                                <p class="text-muted">11/21/2023</p>
                            </div>
                            <a href="#" alt="favorite" class="text-decoration-none text-muted">
                                <i class="bi bi-heart"></i>
                            </a>
                            <a href="#" alt="favorite" class="text-decoration-none text-muted">
                                <p class="new-deal">NEW DEAL</p>
                            </a>
                        </div>
                        <h6 class="card-title fw-bold">Bmw M5 F90<span class="text-muted ms-1">(2023)</span></h6>
                        <h5 class="fw-semibold">$129,000</h5>
                        <div class="row d-flex">
                            <div class="col-auto">
                                <small><i class="bi bi-geo-alt me-2"></i>New York</small><br>
                                <small><i class="bi-speedometer me-2"></i>28K mi</small>
                            </div>
                            <div class="col-auto mx-auto">
                                <small><i class="bi bi-fuel-pump me-2"></i>Gasoline</small><br>
                                <small><i class="bi-gear me-2"></i>Automatic</small>
                            </div>
                            <button class="view fw-semibold">View Deal</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                <!-- Card 3 -->
                <div class="card" style="width: 100%;">
                    <img src="assets/img/pista488.jpg" class="card-img-top" alt="ferrari">
                    <div class="card-body">
                        <div class="row d-flex justify-content-between">
                            <div class="col-auto">
                                <p class="text-muted">05/12/2019</p>
                            </div>
                            <a href="#" alt="favorite" class="text-decoration-none text-muted">
                                <i class="bi bi-heart"></i>
                            </a>
                            <a href="#" alt="favorite" class="text-decoration-none text-muted">
                                <p class="new-deal">NEW DEAL</p>
                            </a>
                        </div>
                        <h6 class="card-title fw-bold">Ferrari Pista 499 <span class="text-muted ms-1">(2019)</span>
                        </h6>
                        <h5 class="fw-semibold">$419,000</h5>
                        <div class="row d-flex">
                            <div class="col-auto">
                                <small><i class="bi bi-geo-alt me-2"></i>San Diego</small><br>
                                <small><i class="bi-speedometer me-2"></i>56K mi</small>
                            </div>
                            <div class="col-auto mx-auto">
                                <small><i class="bi bi-fuel-pump me-2"></i>Gasoline</small><br>
                                <small><i class="bi-gear me-2"></i>Automatic</small>
                            </div>
                            <button class="view fw-semibold">View Deal</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                <!-- Card 4 -->
                <div class="card" style="width: 100%;">
                    <img src="assets/img/tesla.jpg" class="card-img-top" alt="benz">
                    <div class="card-body">
                        <div class="row d-flex justify-content-between">
                            <div class="col-auto">
                                <p class="text-muted">12/09/2024</p>
                            </div>
                            <div class="col-auto card-icons">
                                <a href="#" alt="favorite" class="text-decoration-none text-muted">
                                    <i class="bi bi-heart"></i>
                                </a>
                                <a href="#" alt="favorite" class="text-decoration-none text-muted">
                                    <p class="new-deal">NEW DEAL</p>
                                </a>
                            </div>
                        </div>
                        <h6 class="card-title fw-bold">Tesla<span class="text-muted ms-1">(2024)</span></h6>
                        <h5 class="fw-semibold">$69,000</h5>
                        <div class="row d-flex">
                            <div class="col-auto">
                                <small><i class="bi bi-geo-alt me-2"></i>Washington</small><br>
                                <small><i class="bi-speedometer me-2"></i>66K mi</small>
                            </div>
                            <div class="col-auto mx-auto">
                                <small><i class="bi bi-fuel-pump me-2"></i>Electric</small><br>
                                <small><i class="bi-gear me-2"></i>Automatic</small>
                            </div>
                            <button class="view fw-semibold">View Deal</button>
                        </div>
                    </div>
                </div>
            </div>
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
                        <i class="bi bi-google-play"></i> Google Play</button>
                    <button class="btn btn-primary">
                        <i class="bi bi-apple"></i> App Store</button>
                </div>
            </div>
        </div>

        <p id="copyright">&copy; All rights are reserved. Made by <a href="https://github.com/drenxhyliqi/WEB24_GR16"
                target="_blank"><b>execution</b></a></p>
    </footer>

    <!-- ============= SCRIPTS ============= -->
    <script src="assets/main.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>