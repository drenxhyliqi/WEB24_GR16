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
    <style>
        .container-fluid {
            padding: 0 5%;
        }

        .margin-top-3 {
            margin-top: 20px;
        }

        .margin-bottom-3 {
            margin-bottom: 20px;
        }

        .no-decoration {
            text-decoration: none;
        }

        .dark-text {
            color: black;
        }

        .main-img {
            width: 100%;
            border-radius: 10px;
        }

        .img-hover-product {
            cursor: pointer;
        }

        .font-weight-semibold {
            font-weight: 600;
        }

        .user-info {
            background-color: #F5F7FA;
            padding: 30px 20px 60px 20px;
            border-radius: 10px;
        }

        #profile {
            display: flex;
            align-items: center;
            gap: 20px;
            margin: 20px 0px 20px 0px;
        }

        #user-img {
            width: 70px;
            height: 70px;
            border-radius: 50px;
        }

        #link {
            text-decoration: none;
            color: black;
            font-size: 15px;
            display: block;
        }

        #link:hover {
            text-decoration: underline;
        }

        #email {
            margin-top: 10px;
            border: 1px solid #035dad;
            border-radius: 10px;
            padding: 10px;
            background-color: #035dad;
            text-decoration: none;
            color: white;
        }

        #phone {
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 10px;
            text-decoration: none;
            color: black;
        }

        #email:hover {
            border: 1px solid #000615;
            background-color: #000615;
        }

        #phone:hover {
            border: 1px solid #000615;
            background-color: #000615;
            color: white;
        }

        table {
            width: 100%;
            margin-top: 20px;
            margin-bottom: 20px;
            overflow-x: auto;
            display: block;
        }

        table th,
        table td {
            width: 100%;
            border: 1px solid #ddd;
            padding: 8px;
            white-space: nowrap;
        }

        .info-card {
            background-color: #ECF2F2;
            padding: 20px;
            border-radius: 10px;
            height: 100%;
        }

        .info-card-icons {
            color: #035dad;
        }

        #extra-content {
            display: none;
        }

        .show-more {
            color: #000615;
            cursor: pointer;
            text-decoration: underline;
        }

        #email-me {
            padding: 20px;
            background-color: #F5F7FA;
            border: 0.3px solid rgb(221, 221, 221);
            border-radius: 10px;
            width: 100%;
            margin: 20px auto;
        }

        #email-me p {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 15px;
            color: #000615;
        }

        #email-me input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            color: #000615;
        }

        #email-me input[type="email"]:focus {
            outline: none;
        }

        #email-me button {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            color: #000615;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        #email-me button:hover {
            border: 1px solid #000615;
            background-color: #000615;
            color: white;
        }

        .accordion-btn {
            padding: 10px;
            font-size: 18px;
            background-color: white;
            border: 0;
            border-bottom: 1px solid #ccc;
            width: 100%;
            text-align: left;
        }

        .accordion-content {
            padding: 10px;
            background-color: #f4f4f9;
            border: 1px solid #ccc;
            border-radius: 10px;
            margin-top: 10px;
            font-size: 14px;
            line-height: 1.6;
            display: none;
        }

        .accordion-content ul {
            margin: 0;
        }

        .navbar-canvas-container {
            display: flex;
            align-items: center;
            justify-content: center;
            padding-left: 15px;
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
            background-color: #035dad;
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

        .video {
            position: relative;
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
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link active" href="products.php">Cars</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                </ul>
                <ul class="navbar-nav d-flex align-items-right flex-row py-1">
                    <li class="nav-item"><a class="nav-link" href="cars.php"><i class="bi bi-car-front-fill fs-4"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-cash-coin fs-4"></i></a></li>
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

        <!-- Pages Link -->
        <div class="margin-top-3">
            <small><a href="index.php" class="no-decoration dark-text">Home</a><i class="bi bi-caret-right mx-1"></i><a href="products.php" class="no-decoration dark-text">All Cars</a><i class="bi bi-caret-right mx-1"></i><a href="#mercedes" class="no-decoration dark-text">Mercedes-Benz A205 Cabriolet</a></small>
        </div>

        <!-- Product Title -->
        <h2 class="margin-top-3"><b>Mercedes-Benz A205 Cabriolet</b></h2>

        <!-- Product Images -->
        <div class="row" id="mercedes">
            <div class="col-sm-12 col-md-12 col-lg-8">
                <img src="assets/img/prod1.jpg" alt="main-img-1" id="active"
                    class="img-hover-product main-img shadow-sm">
                <div class="row mt-4">
                    <div class="col-3">
                        <img src="assets/img/prod1.jpg" alt="main-img-1" id="main-img-1"
                            class="img-hover-product main-img shadow-sm">
                    </div>
                    <div class="col-3">
                        <img src="assets/img/prod2.jpg" alt="main-img-2" id="main-img-2"
                            class="img-hover-product main-img shadow-sm">
                    </div>
                    <div class="col-3">
                        <img src="assets/img/prod3.jpg" alt="main-img-3" id="main-img-3"
                            class="img-hover-product main-img shadow-sm">
                    </div>
                    <div class="col-3">
                        <img src="assets/img/prod4.jpg" alt="main-img-4" id="main-img-4"
                            class="img-hover-product main-img shadow-sm">
                    </div>
                </div>
                <hr>

                <!-- Specifications Table -->
                <div class="table-container">
                    <table style="width: 100%; border-color: #f0f0f0;" cellspacing="10" cellpadding="8">
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: #ECF2F2; color: #00515a; text-align: center;">Car Specifications</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Manufacturing year:</strong> 2021</td>
                                <td><strong>Fuel type:</strong> Gasoline</td>
                            </tr>
                            <tr>
                                <td style="background-color: #ECF2F2; color: #00515a;"><strong>Mileage:</strong> 60Kmiles</td>
                                <td style="background-color: #ECF2F2; color: #00515a;"><strong>City MPG:</strong> 25</td>
                            </tr>
                            <tr>
                                <td><strong>Body type:</strong> Convertible</td>
                                <td><strong>Highway MPG:</strong> 35</td>
                            </tr>
                            <tr>
                                <td style="background-color: #ECF2F2; color: #00515a;"><strong>Drive type:</strong> 2 wheel drive - rear</td>
                                <td style="background-color: #ECF2F2; color: #00515a;"><strong>Exterior color:</strong> Red</td>
                            </tr>
                            <tr>
                                <td><strong>Engine:</strong> 6-Cylinder Turbo</td>
                                <td rowspan="2"><a href="#description" style="text-decoration: none; color: black;"><b>View Details<i class="bi bi-arrow-right ms-2"></i></b></a></td>
                            </tr>
                            <tr>
                                <td style="background-color: #ECF2F2; color: #00515a;"><strong>Exterior color: </strong>Red</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: center;"><strong>Transmission:</strong> 7-Speed Shiftable Automatic</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Infos Card -->
                <div class="row margin-top-3">
                    <div class="col-6 col-md-3 col-lg-3 mb-3">
                        <div class="info-card">
                            <h1><i class="bi bi-check-circle info-card-icons"></i></h1>
                            <small class="font-weight-semibold">Checked and Certified by Finder</small>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-3 mb-3">
                        <div class="info-card">
                            <h1><i class="bi bi-person-circle info-card-icons"></i></h1>
                            <small class="font-weight-semibold">Single Owner</small>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-3 mb-3">
                        <div class="info-card">
                            <h1><i class="bi bi-tools info-card-icons"></i></h1>
                            <small class="font-weight-semibold">Well-Equipped</small>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-3 mb-3">
                        <div class="info-card">
                            <h1><i class="bi bi-shield-check info-card-icons"></i></h1>
                            <small class="font-weight-semibold">No Accident / Damage Reported</small>
                        </div>
                    </div>
                </div>

                <!-- Features -->
                <h3>Features</h3>
                <button class="accordion-btn" id="accordion-btn1"><i class="bi bi-arrow-right me-2"></i>Exterior</button>
                <div class="accordion-content" id="accordion-content1" style="display: none;">
                    <ol>
                        <li>Alloy Wheels</li>
                        <li>Sunroof / Moonroof</li>
                        <ul>
                            <li>Tinged glass</li>
                            <li>LED Headlights</li>
                        </ul>
                        <li>Foldable Roof</li>
                        <li>Tow Hitch</li>
                    </ol>
                </div>
                <button class="accordion-btn" id="accordion-btn2"><i class="bi bi-arrow-right me-2"></i>Interior</button>
                <div class="accordion-content" id="accordion-content2" style="display: none;">
                    <ol type="A">
                        <li>Adjustable Steering Wheel</li>
                        <li>Auto-Dimming Rearview Mirror</li>
                        <li>Driver Adjustable Lumbar</li>
                        <li>Driver Illuminated Vanity Mirror</li>
                        <li>Universal Garage Door Opener</li>
                        <li>Steering Wheel Audio Controls</li>
                    </ol>
                </div>
                <button class="accordion-btn" id="accordion-btn3"><i class="bi bi-arrow-right me-2"></i>Safety</button>
                <div class="accordion-content" id="accordion-content3" style="display: none;">
                    <ol type="a">
                        <li>Airbag: Driver
                            <ul>
                                <li>Front Impact</li>
                                <li>Side Impact</li>
                                <li>Rear Impact</li>
                            </ul>
                        </li>
                        <li>Airbag: Passenger
                            <ul>
                                <li>Front Impact</li>
                                <li>Side Impact</li>
                            </ul>
                        </li>
                        <li>Adaptive Cruise Control
                            <ul>
                                <li>Maintains Distance</li>
                                <li>Automatic Braking</li>
                            </ul>
                        </li>
                        <li>Blind Spot Monitor
                            <ul>
                                <li>Visual Alerts</li>
                                <li>Audible Alerts</li>
                            </ul>
                        </li>
                        <li>Alarm
                            <ul>
                                <li>Anti-Theft</li>
                                <li>Motion Detection</li>
                            </ul>
                        </li>
                        <li>Antilock Brakes
                            <ul>
                                <li>Prevents Skidding</li>
                                <li>Improves Steering</li>
                            </ul>
                        </li>
                    </ol>
                </div>
                <button class="accordion-btn" id="accordion-btn4"><i class="bi bi-arrow-right me-2"></i>Technology</button>
                <div class="accordion-content" id="accordion-content4" style="display: none;">
                    <ol type="I">
                        <li>Multi-Zone A/C</li>
                        <li>Climate Control</li>
                        <li>Navigation System</li>
                        <li>Remote Start</li>
                        <li>Bluetooth</li>
                        <li>Remote Start</li>
                    </ol>
                </div>

                <!-- Full Description -->
                <h3 class="margin-top-3" id="description">Description</h3>
                <div id="content" class="margin-bottom-3">
                    <p>This stunning convertible blends luxury with performance, featuring a sleek design, advanced
                        technology, and a powerful engine. Enjoy open-air driving with premium comfort and the
                        unmistakable elegance of Mercedes-Benz. Impeccably maintained and ready to provide an
                        exhilarating driving experience. Don't miss out on this exceptional vehicle.</p>
                    <div id="extra-content">
                        <p>This A205 Cabriolet comes equipped with top-of-the-line features, including a responsive
                            infotainment system, advanced safety options, and a finely crafted interior that showcases
                            Mercedes-Benz's commitment to quality. The soft-top roof operates seamlessly, allowing you
                            to transition from a cozy cabin to an open-air cruiser in seconds. Whether you're navigating
                            city streets or cruising along the coast, this cabriolet delivers a smooth, refined ride
                            every time.</p>
                        <p>With low mileage and a full service history, this 2021 model remains in excellent condition,
                            both mechanically and aesthetically. The exterior shines in pristine condition, and the
                            interior has been meticulously cared for, ensuring a like-new experience. This Mercedes-Benz
                            A205 Cabriolet is the perfect choice for those who desire a blend of sophistication,
                            comfort, and thrilling performance in their next vehicle.</p>
                    </div>
                    <span class="show-more" onclick="showMore()"><i class="bi bi-arrow-right me-2"></i>Show More</span>

                    <div class="audio">
                        <p>Listen to the Revs</p>
                        <audio controls>
                            <source src="/assets/video/rev.mp3" type="audio/mp3">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                    <div class="audio">
                        <p>Listen to the Cold Start</p>
                        <audio controls>
                            <source src="/assets/video/coldstart.mp3" type="audio/mp3">
                            Your browser does not support the audio element.
                        </audio>
                    </div>

                    <div class="video text-center mt-4">
                        <video src="assets/video/Cla 45 amg Launch Control.mp4" class="rounded-4" controls autoplay muted loop playsinline
                            style="height: 500px; width: 100%; object-fit: cover;" playsinline></video>

                    </div>

                </div>
            </div>

            <!-- Product Info -->
            <div class="col-sm-12 col-md-12 col-lg-4">
                <hr>
                <div class="sticky-top pt-3 margin-bottom-3">
                    <small
                        style="background-color: #3D7A81; color: white; padding-right: 10px; padding-left: 10px; border-radius: 5px;"><i
                            class="bi bi-check2-circle me-2"></i><i>Verified</i></small>
                    <small
                        style="background-color: #FC9231; color: white; padding-right: 10px; padding-left: 10px; border-radius: 5px;"><i>Used</i></small>
                    <h2 class="font-weight-semibold margin-top-3">$41 900</h2>
                    <ul style="opacity: 75%; list-style-type: square;">
                        <li><i class="bi bi-geo-alt me-2"></i>Los Angeles</li>
                        <li><i class="bi-speedometer me-2"></i>69K mi</li>
                        <li><i class="bi bi-fuel-pump me-2"></i>Gasoline</li>
                        <li><i class="bi-gear me-2"></i>Automatic</li>
                    </ul>
                    <div class="user-info">
                        <div id="profile">
                            <img src="assets/img/seller.jpg" alt="user-image" id="user-img">
                            <div class="profile-info">
                                <span class="font-weight-semibold"><u>Darrell Steward</u></span><br>
                                <small><i class="bi bi-star-fill text-warning me-2"></i><strong>4.9</strong> (5
                                    reviews)</small><br>
                                <small style="opacity: 75%; font-size: 12px;"><abbr
                                        title="We don't take responsibility for sale!">Private seller</abbr></small>
                            </div>
                        </div>
                        <a href="products.php" id="link">Other ads by this seller</a><br>
                        <a href="tel:+12345678" id="phone" class="d-block d-md-inline">(316)********** - Reveal</a>
                        <a href="mailto:ndouedison02@gmail.com" id="email" class="d-block d-md-inline">Send Email</a>
                        <address class="mt-4">
                            <p>AutoLux, Inc.</p>
                            <p>Address: <mark>1234 Park Avenue, New York, NY 10001</mark>
                            </p>
                            <p>Phone: +1 212-555-1234</p>
                            <p>X/Twitter: <a href="https://twitter.com/AutoLux"
                                    class="text-decoration-none text-muted">AutoLux@x.com</a></p>
                        </address>
                    </div>

                    <!-- Email Me -->
                    <div id="email-me">
                        <p class="font-weight-semibold">Email me price drops and new listings for these search results:
                        </p>
                        <form action="product.php">
                            <input type="email" name="" id="" placeholder="Your email">
                            <button type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Other Cars -->
        <div class="d-flex justify-content-between align-items-center mt-5">
            <h3 class="fw-semibold">Other Products</h3>
            <a href="products.php" class="text-decoration-none text-secondary">View all<i class="bi bi-arrow-right ms-2"></i></a>
        </div>
        <div class="row align-items-center">
            <div class="col-12 col-md-6 col-lg-3 mb-4">
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
                        <h6 class="card-title fw-bold"><a href="product.php"
                                class="text-decoration-none text-dark">Ford Truck Lifted <span
                                    class="text-muted ms-1">(2024)</span></a></h6>
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
                        <h6 class="card-title fw-bold"><a href="product.php" class="text-decoration-none text-dark">Bmw
                                M5 F90<span class="text-muted ms-1">(2023)</span></a></h6>
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
                        <h6 class="card-title fw-bold"><a href="product.php"
                                class="text-decoration-none text-dark">Porsche 911 GT <span
                                    class="text-muted ms-1">(2023)</span></a></h6>
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
                        <h6 class="card-title fw-bold"><a href="product.php"
                                class="text-decoration-none text-dark">Tesla<span
                                    class="text-muted ms-1">(2024)</span></a></h6>
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
    </div>

    <!-- Footer Section -->
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#main-img-1').mouseenter(function() {
                const newSrc = $(this).attr('src');
                $('#active').attr('src', newSrc);
            });

            $('#main-img-2').mouseenter(function() {
                const newSrc = $(this).attr('src');
                $('#active').attr('src', newSrc);
            });

            $('#main-img-3').mouseenter(function() {
                const newSrc = $(this).attr('src');
                $('#active').attr('src', newSrc);
            });

            $('#main-img-4').mouseenter(function() {
                const newSrc = $(this).attr('src');
                $('#active').attr('src', newSrc);
            });
        });

        function showMore() {
            const extraContent = document.getElementById('extra-content');
            const showMoreLink = document.querySelector('.show-more');

            if (extraContent.style.display === 'none' || extraContent.style.display === '') {
                extraContent.style.display = 'block';
                showMoreLink.innerHTML = '<i class="bi bi-arrow-right me-2"></i>Show Less';
            } else {
                extraContent.style.display = 'none';
                showMoreLink.innerHTML = '<i class="bi bi-arrow-right me-2"></i>Show More';
            }
        }

        $(document).ready(function() {
            $('#accordion-btn1').click(function() {
                $('#accordion-content1').slideToggle();
            });

            $('#accordion-btn2').click(function() {
                $('#accordion-content2').fadeToggle();
            });

            $('#accordion-btn3').click(function() {
                const content = $('#accordion-content3');

                if (content.is(':visible')) {
                    content.animate({
                            paddingTop: '0px',
                            paddingBottom: '0px',
                            marginTop: '0px',
                            marginBottom: '0px'
                        },
                        500,
                        function() {
                            content.css('display', 'none');
                        }
                    );
                } else {
                    content.css('display', 'block');
                    content.animate({
                            paddingTop: '10px',
                            paddingBottom: '10px',
                            marginTop: '10px',
                            marginBottom: '10px'
                        },
                        500
                    );
                }
            });

            $('#accordion-btn4').click(function() {
                if ($('#accordion-content4').is(':visible')) {
                    $('#accordion-content4').hide();
                } else {
                    $('#accordion-content4').show();
                }
            });
        });
    </script>

    <!-- Designing Canvas Icon -->
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

        myCanvas.addEventListener('click', function() {
            window.location.href = "login.html";

        });
    </script>

    <!-- Scroll to top btn -->
    <script>
        $(document).ready(function() {
            $("body").append('<button id="scrollToTop">↑</button>');

            $(window).scroll(function() {
                if ($(this).scrollTop() > 200) {
                    $("#scrollToTop").fadeIn();
                } else {
                    $("#scrollToTop").fadeOut();
                }
            });

            $("#scrollToTop").click(function() {
                $("html, body").animate({
                    scrollTop: 0
                }, 100);
            });
        });
    </script>
</body>

</html>