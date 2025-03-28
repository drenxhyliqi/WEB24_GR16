<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title Name -->
    <title>Car Marketplace | Home</title>
    <link rel="icon" href="assets/img/weblogo.png" type="image/x-icon">

    <!-- Bootstrap & Custom CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        #myCanvas {
            margin-left: 10px;
            cursor: pointer;
        }

        #myCanvas {
            margin-left: 10px;
            cursor: pointer;
        }

        #scrollToTop {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
            background-color: red;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 50%;
            font-size: 18px;
            cursor: pointer;
        }

        #scrollToTop:hover {
            background-color: #024c89;
        }

        .wrapped {
            overflow-wrap: break-word;
            margin: 20px 0;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <!-- <img src="assets/img/company_logo.png" alt="logo" width="150px"> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="bi bi-list fs-2"></span>
                <!-- <span class="navbar-toggler-icon text-white"></span> -->
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto py-1 py-md-0 fs-6 text-start text-md-center ">
                    <li class="nav-item py-1 py-md-0">
                        <a class="nav-link active" aria-current="page" href="/index.html">Home</a>
                    </li>
                    <li class="nav-item py-1 py-md-0">
                        <a class="nav-link" href="/about.html">About</a>
                    </li>
                    <li class="nav-item py-1 py-md-0">
                        <a class="nav-link" href="/products.html">Cars</a>
                    </li>
                    <li class="nav-item py-1 py-md-0">
                        <a class="nav-link" href="/contact.html">Contact</a>
                    </li>
                </ul>
                <div class="navbar-canvas-container text-start text-md-center text-lg-end">
                    <canvas id="myCanvas" width="40" height="40"></canvas>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Section -->
    <div class="container-fluid main-banner p-3 p-md-3 p-lg-5">
        <div class="p-0 p-md-1 p-lg-5">
            <div class="row align-items-center">
                <div class="col-12 col-md-7 col-lg-7 order-2 order-md-1">
                    <form action="" class="half-main-banner p-3 p-md-2 p-lg-3" id="carSearchForm">
                        <div class="mb-3">
                            <input type="radio" class="btn-check" name="options" id="btn-check-1">
                            <label class="btn btn-select rounded-3 px-3" for="btn-check-1">All</label>

                            <input type="radio" class="btn-check" name="options" id="btn-check-2">
                            <label class="btn btn-select rounded-3 px-3" for="btn-check-2">New Cars</label>

                            <input type="radio" class="btn-check" name="options" id="btn-check-3">
                            <label class="btn btn-select rounded-3 px-3" for="btn-check-3">Used Cars</label>
                        </div>
                        <div id="optionsError" class="text-danger mb-3" style="margin-top: 5px;"></div>

                        <!-- Form Fields -->
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6 mb-3">
                                <select name="make" id="make" class="form-control shadow-none">
                                    <option value="" selected disabled>Select Make</option>
                                    <option value="Audi">Audi</option>
                                    <option value="BMW">BMW</option>
                                    <option value="Mercedes">Mercedes</option>
                                    <option value="Volkswagen">Volkswagen</option>
                                </select>
                                <div id="makeError" class="text-danger" style="margin-top: 5px;"></div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 mb-3">
                                <select name="model" id="model" class="form-control shadow-none">
                                    <option value="" selected disabled>Select Model</option>
                                    <option value="A-Class">A-Class</option>
                                    <option value="C-Class">C-Class</option>
                                    <option value="E-Class">E-Class</option>
                                    <option value="Brabus">Brabus</option>
                                </select>
                                <div id="modelError" class="text-danger" style="margin-top: 5px;"></div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 mb-3">
                                <select name="bodyType" id="bodyType" class="form-control shadow-none">
                                    <option value="" selected disabled>Select Body Type</option>
                                    <option value="Sedan">Sedan</option>
                                    <option value="Convertible">Convertible</option>
                                    <option value="SUV">SUV</option>
                                    <option value="Coupe">Coupe</option>
                                </select>
                                <div id="bodyTypeError" class="text-danger" style="margin-top: 5px;"></div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 mb-3">
                                <div class="input-group">
                                    <select name="yearFrom" id="yearFrom" class="form-control shadow-none">
                                        <option value="">Year from</option>
                                        <option value="2024">2024</option>
                                        <option value="2023">2023</option>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                    </select>
                                    <select name="yearTo" id="yearTo" class="form-control shadow-none">
                                        <option value="">Year to</option>
                                        <option value="2024">2024</option>
                                        <option value="2023">2023</option>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                    </select>
                                </div>
                                <div id="yearError" class="text-danger" style="margin-top: 5px;"></div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 mb-3">
                                <select name="location" id="location" class="form-control shadow-none">
                                    <option value="" selected disabled>Select Location</option>
                                    <option value="San Diego">San Diego</option>
                                    <option value="Dallas">Dallas</option>
                                    <option value="San Jose">San Jose</option>
                                    <option value="Phoenix">Phoenix</option>
                                </select>
                                <div id="locationError" class="text-danger" style="margin-top: 5px;"></div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 mb-3">
                                <div class="input-group">
                                    <input type="text" placeholder="$ Price from" id="priceFrom" class="form-control">
                                    <input type="text" placeholder="$ Price to" id="priceTo" class="form-control">
                                </div>
                                <div id="priceError" class="text-danger" style="margin-top: 5px;"></div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn search"><i class="bi bi-search me-2"></i>Search</button>
                        <a href="#" id="warning" class="text-decoration-none text-light ms-2">Advanced search<i
                                class="bi bi-arrow-right ms-2"></i></a>
                    </form>
                    <p class="p-3 text-light opacity-75 text-center text-md-start">Finder is a <strong>leading digital
                            marketplace</strong> for the automotive industry.</p>
                </div>
                <div class="col-12 col-md-5 col-lg-5 p-5 text-start text-md-start order-1 order-md-2">
                    <h1 class="display-4 fw-semibold text-light">Easy way to find the right car</h1>
                    <div class="d-flex align-items-center justify-content-start text-light">
                        <img src="assets/img/google.png" alt="google"
                            style="width: 30px; height: 30px; object-fit: cover;">
                        <span class="ms-2">Google</span>
                        <span class="ms-3"><i class="bi bi-star-fill text-warning me-2 h3"></i></span>
                        <span>4.9</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Car Demand Section -->
    <section class="container-fluid car-demands">
        <h1 class="text-center mb-5"><b>Currently in demand</b></h1>
        <div class="row justify-content-around text-center">
            <div class="col-6 col-md-6 col-lg-2">
                <img src="assets/img/01.jpg" alt="Car Image" class="img-fluid mb-3">
                <div class="text-center mt-3">
                    <a href="/products.html">Electric Cars</a>
                </div>
            </div>
            <div class="col-6 col-md-6 col-lg-2">
                <img src="assets/img/02.jpg" alt="Car Image" class="img-fluid mb-3">
                <div class="text-center mt-3">
                    <a href="/products.html">Luxury Cars</a>
                </div>
            </div>
            <div class="col-6 col-md-6 col-lg-2">
                <img src="assets/img/03.jpg" alt="Car Image" class="img-fluid mb-3">
                <div class="text-center mt-3">
                    <a href="/products.html">City Cars</a>
                </div>
            </div>
            <div class="col-6 col-md-6 col-lg-2">
                <img src="assets/img/04.jpg" alt="Car Image" class="img-fluid mb-3">
                <div class="text-center mt-3">
                    <a href="/products.html">Off-road Cars</a>
                </div>
            </div>
            <div class="col-6 col-md-6 col-lg-2">
                <img src="assets/img/05.jpg" alt="Car Image" class="img-fluid mb-3">
                <div class="text-center mt-3">
                    <a href="/products.html">Family Cars</a>
                </div>
            </div>
        </div>
    </section>

    <!--Body types-->
    <section class="container-fluid mt-4 mb-4 banner">
        <div class="d-flex justify-content-between">
            <h3><b>Body types</b></h3>
            <a href="/products.html" class="text-decoration-none text-secondary">View all<i class="bi bi-arrow-right ms-2"></i></a>
        </div>
        <div class="row">
            <!-- Card 1 -->
            <div class="col-12 col-md-6 col-lg-2 mb-3">
                <div class="card h-100">
                    <img src="https://finder-html.createx.studio/assets/img/home/cars/body-type/sedan.svg"
                        alt="Sedan" class="card-img-top">
                    <div class="card-body text-center">
                        <h4 class="card-title"><b>Sedan</b></h4>
                        <p class="card-text">1765 offers</p>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-12 col-md-6 col-lg-2 mb-3">
                <div class="card h-100">
                    <img src="https://finder-html.createx.studio/assets/img/home/cars/body-type/coupe.svg"
                        alt="Coupe" class="card-img-top">
                    <div class="card-body text-center">
                        <h4 class="card-title"><b>Coupe</b></h4>
                        <p class="card-text">923 offers</p>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-12 col-md-6 col-lg-2 mb-3">
                <div class="card h-100">
                    <img src="https://finder-html.createx.studio/assets/img/home/cars/body-type/convertible.svg"
                        alt="Convertible" class="card-img-top">
                    <div class="card-body text-center">
                        <h4 class="card-title"><b>Convertble</b></h4>
                        <p class="card-text">120 offers</p>
                    </div>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="col-12 col-md-6 col-lg-2 mb-3">
                <div class="card h-100">
                    <img src="https://finder-html.createx.studio/assets/img/home/cars/body-type/suv.svg" alt="SUV"
                        class="card-img-top">
                    <div class="card-body text-center">
                        <h4 class="card-title"><b>SUV</b></h4>
                        <p class="card-text">2107 offers</p>
                    </div>
                </div>
            </div>
            <!-- Card 5 -->
            <div class="col-12 col-md-6 col-lg-2 mb-3">
                <div class="card h-100">
                    <img src="https://finder-html.createx.studio/assets/img/home/cars/body-type/mpv.svg"
                        alt="Family MPV" class="card-img-top">
                    <div class="card-body text-center">
                        <h4 class="card-title"><b>Family MPV</b></h4>
                        <p class="card-text">582 offers</p>
                    </div>
                </div>
            </div>
            <!-- Card 6 -->
            <div class="col-12 col-md-6 col-lg-2 mb-3">
                <div class="card h-100">
                    <img src="https://finder-html.createx.studio/assets/img/home/cars/body-type/pickup.svg"
                        alt="Pickup" class="card-img-top">
                    <div class="card-body text-center">
                        <h4 class="card-title"><b>Pickup</b></h4>
                        <p class="card-text">341 offers</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Top offers -->
    <section class="container-fluid mt-4 mb-4 top-of">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="fw-semibold">Top offers</h3>
            <a href="/products.html" class="text-decoration-none text-secondary">View all<i class="bi bi-arrow-right ms-2"></i></a>
        </div>
        <div class="row align-items-center">
            <div class="col-sm-12 col-md-12 col-lg-5">
                <div class="card shadow-sm">
                    <div class="card-body p-0">
                        <div class="rounded-top overflow-hidden">
                            <img src="assets/img/maserati.jpg" class="rounded-top img-hover" alt="img" style="width: 100%; height: 300px; object-fit: cover;">
                        </div>
                        <div class="p-3">
                            <small class="opacity-50">28/06/2024</small><br>
                            <h5 class="mt-2"><a href="/product.html" class="text-dark text-decoration-none">Maserati Granturismo</a></h5>
                            <p class="fw-semibold">$73,000</p>
                            <hr>
                            <div class="row">
                                <div class="col-6 col-md-3">
                                    <small><i class="bi bi-geo-alt me-2"></i>L.A</small>
                                </div>
                                <div class="col-6 col-md-3">
                                    <small><i class="bi-speedometer me-2"></i>69K mi</small>
                                </div>
                                <div class="col-6 col-md-3">
                                    <small><i class="bi bi-fuel-pump me-2"></i>Gasoline</small>
                                </div>
                                <div class="col-6 col-md-3">
                                    <small><i class="bi-gear me-2"></i>Automatic</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-7 mt-3 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body p-0">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-4">
                                <div class="rounded-start overflow-hidden">
                                    <img src="assets/img/volvo.jpg" class="rounded-start img-hover" alt="img" style="width: 100%; height: 220px; object-fit: cover;">
                                </div>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="p-3">
                                    <small class="opacity-50">23/10/2024</small><br>
                                    <h5 class="mt-2"><a href="/product.html" class="text-dark text-decoration-none">Volvo XC90 4WD</a></h5>
                                    <p class="fw-semibold">$92,500</p>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6 col-md-3">
                                            <small><i class="bi bi-geo-alt me-2"></i>Chicago</small>
                                        </div>
                                        <div class="col-6 col-md-3">
                                            <small><i class="bi-speedometer me-2"></i>0 mi</small>
                                        </div>
                                        <div class="col-6 col-md-3">
                                            <small><i class="bi bi-fuel-pump me-2"></i>Hybrid</small>
                                        </div>
                                        <div class="col-6 col-md-3">
                                            <small><i class="bi-gear me-2"></i>Manual</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-4 shadow-sm">
                    <div class="card-body p-0">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-4">
                                <div class="rounded-start overflow-hidden">
                                    <img src="assets/img/benz.jpg" class="rounded-start img-hover" alt="img"
                                        style="width: 100%; height: 220px; object-fit: cover;">
                                </div>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="p-3">
                                    <small class="opacity-50">15/07/2024</small><br>
                                    <h5 class="mt-2"><a href="/product.html" class="text-dark text-decoration-none">Mercedes-Benz Coupe</a>
                                    </h5>
                                    <p class="fw-semibold">$92,500</p>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6 col-md-3">
                                            <small><i class="bi bi-geo-alt me-2"></i>NYC</small>
                                        </div>
                                        <div class="col-6 col-md-3">
                                            <small><i class="bi-speedometer me-2"></i>15K mi</small>
                                        </div>
                                        <div class="col-6 col-md-3">
                                            <small><i class="bi bi-fuel-pump me-2"></i>Diesel</small>
                                        </div>
                                        <div class="col-6 col-md-3">
                                            <small><i class="bi-gear me-2"></i>Manual</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Car Logos Section -->
    <section class="container-fluid car-logos">
        <div class="row justify-content-center text-center">
            <div class="col-6 col-md-6 col-lg-2">
                <img src="assets/img/bmw (2).png" alt="" class="img-fluid mb-3">
            </div>
            <div class="col-6 col-md-6 col-lg-2">
                <img src="assets/img/tesla1.png" alt="" class="img-fluid mb-3">
            </div>
            <div class="col-6 col-md-6 col-lg-2">
                <img src="assets/img/mercedes.png" alt="" class="img-fluid mb-3">
            </div>
            <div class="col-6 col-md-6 col-lg-2">
                <img src="assets/img/ferrari.png" alt="" class="img-fluid mb-3">
            </div>
            <div class="col-6 col-md-6 col-lg-2">
                <img src="assets/img/audi.png" alt="" class="img-fluid mb-3">
            </div>
            <div class="col-6 col-md-6 col-lg-2">
                <img src="assets/img/bugatti.png" alt="" class="img-fluid mb-3">
            </div>
        </div>
    </section>

    <!-- Info Section -->
    <section class="container-fluid mt-4 mb-4 ">
        <div class="col-auto">
            <h2 class="mt-3 mb-4">What sets Finder apart?</h2>
        </div>
        <div class="row align-items-center ">
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                <div class="card info-content " style="width: 100%;">
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

            <div class="col-12 col-md-6 col-lg-3 mb-4 ">
                <div class="card  info-content" style="width: 100%;">
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
                <div class="card  info-content" style="width: 100%;">
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
                <div class="card  info-content" style="width: 100%;">
                    <div class="card-body">
                        <div class="row d-flex justify-content-between">
                            <div class="col-auto">
                                <i class="bi bi-lightbulb "></i>
                                <p class="mt-5">Non-stop innovation</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Latest Cars Section -->
    <section class="container-fluid mt-4 mb-4 cars-cards">
        <div class="cars-content">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-auto">
                    <h2>Latest Cars</h2>
                </div>
                <div class="col-auto mb-3">
                    <button class="btn-all me-2 rounded-pill">All</button>
                    <button class="btn-new me-2 rounded-pill">New Cars</button>
                    <button class="btn-used rounded-pill">Used Cars</button>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                <!-- Card 1 -->
                <div class="card card-content" style="width: 100%;">
                    <img src="assets/img/ford.jpg" class="card-img-top img-fluid" alt="benz">
                    <div class="card-body">
                        <div class="row d-flex justify-content-between">
                            <div class="col-auto">
                                <p class="text-muted">30/09/2022</p>
                            </div>
                            <div class="col-auto card-icons ">
                                <i class="bi bi-suit-heart"></i>
                                <i class="bi bi-bell"></i>
                                <i class="bi bi-arrow-repeat"></i>
                            </div>
                        </div>
                        <h6 class="card-title fw-bold">Ford Truck Lifted <span class="text-muted ms-1">(2024)</span>
                        </h6>
                        <h6 class="fw-semibold">$79,000</h6>
                        <hr>
                        <div class="row d-flex">
                            <div class="col-auto">
                                <small><i class="bi bi-geo-alt me-2"></i>Boston</small><br>
                                <small><i class="bi-speedometer me-2"></i>12K mi</small>
                            </div>
                            <div class="col-auto mx-auto">
                                <small><i class="bi bi-fuel-pump me-2"></i>Diesel</small><br>
                                <small><i class="bi-gear me-2"></i>Automatic</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3 mb-4 ">
                <!-- Card 2 -->
                <div class="card" style="width: 100%;">
                    <img src="assets/img/m5.jpg" class="card-img-top" alt="maserati">
                    <div class="card-body">
                        <div class="row d-flex justify-content-between">
                            <div class="col-auto">
                                <p class="text-muted">11/21/2023</p>
                            </div>
                            <div class="col-auto card-icons">
                                <i class="bi bi-suit-heart"></i>
                                <i class="bi bi-bell"></i>
                                <i class="bi bi-arrow-repeat"></i>
                            </div>
                        </div>
                        <h6 class="card-title fw-bold">Bmw M5 F90<span class="text-muted ms-1">(2023)</span></h6>
                        <h6 class="fw-semibold">$129,000</h6>
                        <hr>
                        <div class="row d-flex">
                            <div class="col-auto">
                                <small><i class="bi bi-geo-alt me-2"></i>New York</small><br>
                                <small><i class="bi-speedometer me-2"></i>28K mi</small>
                            </div>
                            <div class="col-auto mx-auto">
                                <small><i class="bi bi-fuel-pump me-2"></i>Gasoline</small><br>
                                <small><i class="bi-gear me-2"></i>Automatic</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                <!-- Card 3 -->
                <div class="card" style="width: 100%;">
                    <img src="assets/img/porsche.jpg" class="card-img-top" alt="volvo">
                    <div class="card-body">
                        <div class="row d-flex justify-content-between">
                            <div class="col-auto">
                                <p class="text-muted">05/12/2023</p>
                            </div>
                            <div class="col-auto card-icons">
                                <i class="bi bi-suit-heart"></i>
                                <i class="bi bi-bell"></i>
                                <i class="bi bi-arrow-repeat"></i>
                            </div>
                        </div>
                        <h6 class="card-title fw-bold">Porsche 911 GT <span class="text-muted ms-1">(2023)</span>
                        </h6>
                        <h6 class="fw-semibold">$119,000</h6>
                        <hr>
                        <div class="row d-flex">
                            <div class="col-auto">
                                <small><i class="bi bi-geo-alt me-2"></i>San Diego</small><br>
                                <small><i class="bi-speedometer me-2"></i>56K mi</small>
                            </div>
                            <div class="col-auto mx-auto">
                                <small><i class="bi bi-fuel-pump me-2"></i>Gasoline</small><br>
                                <small><i class="bi-gear me-2"></i>Automatic</small>
                            </div>
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
                                <i class="bi bi-suit-heart"></i>
                                <i class="bi bi-bell"></i>
                                <i class="bi bi-arrow-repeat"></i>
                            </div>
                        </div>
                        <h6 class="card-title fw-bold">Tesla<span class="text-muted ms-1">(2024)</span>
                        </h6>
                        <h6 class="fw-semibold">$69,000</h6>
                        <hr>
                        <div class="row d-flex">
                            <div class="col-auto">
                                <small><i class="bi bi-geo-alt me-2"></i>Washington</small><br>
                                <small><i class="bi-speedometer me-2"></i>66K mi</small>
                            </div>
                            <div class="col-auto mx-auto">
                                <small><i class="bi bi-fuel-pump me-2"></i>Electric</small><br>
                                <small><i class="bi-gear me-2"></i>Automatic</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Auto Market -->
    <section class="container-fluid mt-4 mb-4">
        <div class="row d-flex justify-content-around auto-market ">
            <div class="col-12 col-md-4 col-lg-4 mt-4 text-center">
                <h2>Auto Market</h2>
                <p class="wrapped" id="p1">Choose the best for your car!</p>
                <button class="btn-shop mb-4">Go to shop</button>
            </div>
            <div class="col-12 col-md-8 col-lg-8 auto-img mt-4">
                <div class="row">
                    <div class="col-6 col-md-6 col-lg-3 mb-5">
                        <img src="assets/img/babysitter.png" alt="babysitter" class="img-fluid">
                        <div class="text-center mt-3">
                            <a href="#" class="text-decoration-none text-white">Tires</a>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-lg-3 mb-5">
                        <img src="assets/img/wheel.png" alt="wheel" class="img-fluid">
                        <div class="text-center mt-3">
                            <a href="#" class="text-decoration-none text-white">Disks</a>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-lg-3 mb-5">
                        <img src="/assets/img/rims.png" alt="rims" class="img-fluid">
                        <div class="text-center mt-3">
                            <a href="#" class="text-decoration-none text-white">Tunning</a>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-lg-3 mb-5">
                        <img src="/assets/img/tire.png" alt="tires" class="img-fluid">
                        <div class="text-center mt-3">
                            <a href="#" class="text-decoration-none text-white">Child seat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--    Footer Section -->
    <footer class="container-fluid mt-5 footer-info">
        <div class="row d-flex align-items-center footer-info-content">
            <div class="col-6 col-sm-6 col-md-6 col-lg-3 ">
                <div class="d-flex align-items-center">
                    <i class="bi bi-copy me-2"></i>
                    <span class="mb-0">Over 1 million listings</span>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-3 ">
                <div class="d-flex align-items-center">
                    <i class="bi bi-search me-2"></i>
                    <span class="">Personalized search</span>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-3 ">
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
            <div class="col-6 col-md-6 col-lg-3 ">
                <p>Buying & Selling</p>
                <ul class="list-unstyled">
                    <li><a href="#">Find a car</a></li>
                    <li><a href="#">Sell your car</a></li>
                    <li><a href="#">Car dealers</a></li>
                    <li><a href="#">Compare Cars</a></li>
                    <li><a href="#">Online car</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-6 col-lg-3 ">
                <p>About</p>
                <ul class="list-unstyled ">
                    <li><a href="#">About Finder</a></li>
                    <li><a href="#">Contact us</a></li>
                    <li><a href="#">FAQs & Support</a></li>
                    <li><a href="#">Mobile app</a></li>
                    <li><a href="#">Blog & News</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-3 ">
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
        
        <p id="copyright">&copy; All rights are reserved. Made by <a href="https://github.com/drenxhyliqi/WEB24_GR16" target="_blank"><b>Gr.16</b></a></p>
    </footer>

    <!-- Script Source Bootsrap JS & Custom JS -->
    <script src="assets/main.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const canvas = document.getElementById('myCanvas');
        const ctx = canvas.getContext('2d');

        ctx.beginPath();
        ctx.arc(20, 15, 7, 0, Math.PI * 2);
        ctx.fillStyle = 'white';
        ctx.fill();

        ctx.beginPath();
        ctx.arc(20, 40, 13, Math.PI, 0, false);
        ctx.closePath();
        ctx.fillStyle = 'white';
        ctx.fill();

        myCanvas.addEventListener('click', function () {
            window.location.href = "login.html";
            
        });

        document.getElementById("carSearchForm").addEventListener("submit", function (e) {
            e.preventDefault();

            let isValid = true;

            // Reset all errors before validation
            const errorMessages = ['optionsError', 'makeError', 'modelError', 'bodyTypeError', 'yearError', 'locationError', 'priceError'];
            errorMessages.forEach(function (id) {
                document.getElementById(id).innerText = "";
            });

            const selectedOption = document.querySelector('input[name="options"]:checked');
            if (!selectedOption) {
                isValid = false;
                document.getElementById("optionsError").innerText = "• Please select a car type.";
            }

            const make = document.getElementById("make").value;
            if (!make) {
                isValid = false;
                document.getElementById("makeError").innerText = "• Please select a car make.";
            }

            const model = document.getElementById("model").value;
            if (!model) {
                isValid = false;
                document.getElementById("modelError").innerText = "• Please select a car model.";
            }

            const bodyType = document.getElementById("bodyType").value;
            if (!bodyType) {
                isValid = false;
                document.getElementById("bodyTypeError").innerText = "• Please select a body type.";
            }

            const yearFrom = document.getElementById("yearFrom").value;
            const yearTo = document.getElementById("yearTo").value;
            if (!yearFrom || !yearTo) {
                isValid = false;
                document.getElementById("yearError").innerText = "• Please select both 'Year From' and 'Year To'.";
            } else if (parseInt(yearFrom) > parseInt(yearTo)) {
                isValid = false;
                document.getElementById("yearError").innerText = "• Year 'From' cannot be greater than 'To'.";
            }

            const location = document.getElementById("location").value;
            if (!location) {
                isValid = false;
                document.getElementById("locationError").innerText = "• Please select a location.";
            }

            const priceFrom = document.getElementById("priceFrom").value;
            const priceTo = document.getElementById("priceTo").value;
            if (!priceFrom || !priceTo) {
                isValid = false;
                document.getElementById("priceError").innerText = "• Please fill in both 'Price From' and 'Price To'.";
            } else if (parseFloat(priceFrom) > parseFloat(priceTo)) {
                isValid = false;
                document.getElementById("priceError").innerText = "• 'Price From' cannot be greater than 'To'.";
            }

            if (isValid) {
                alert("Form submitted successfully!");
                this.submit();
            }
        });
        $(document).ready(function () {
            $("body").append('<button id="scrollToTop">↑</button>');

            $(window).scroll(function () {
                if ($(this).scrollTop() > 200) {
                    $("#scrollToTop").fadeIn();
                } else {
                    $("#scrollToTop").fadeOut();
                }
            });

            $("#scrollToTop").click(function () {
                $("html, body").animate({ scrollTop: 0 }, 100);
            });
        });
    </script>

</body>

</html>