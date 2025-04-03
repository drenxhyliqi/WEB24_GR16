<?php

// Products
$products = [
    [
        "id" => 1,
        "name" => "Ford Truck Lifted",
        "price" => 79000,
        "location" => "Boston",
        "year" => 2024,
        "mileage" => "12K mi",
        "fuel" => "Diesel",
        "transmission" => "Automatic",
        "image" => "assets/img/ford.jpg",
        "date" => "30/09/2022"
    ],
    [
        "id" => 2,
        "name" => "Bmw M5 F90",
        "price" => 129000,
        "location" => "New York",
        "year" => 2023,
        "mileage" => "28K mi",
        "fuel" => "Gasoline",
        "transmission" => "Automatic",
        "image" => "assets/img/m5.jpg",
        "date" => "11/21/2023"
    ],
    [
        "id" => 3,
        "name" => "Porsche 911 GT",
        "price" => 119000,
        "location" => "San Diego",
        "year" => 2024,
        "mileage" => "56K mi",
        "fuel" => "Gasoline",
        "transmission" => "Automatic",
        "image" => "assets/img/porsche.jpg",
        "date" => "06/11/2024"
    ],
    [
        "id" => 4,
        "name" => "Tesla Model S",
        "price" => 90000,
        "location" => "San Francisco",
        "year" => 2022,
        "mileage" => "15K mi",
        "fuel" => "Electric",
        "transmission" => "Automatic",
        "image" => "assets/img/tesla.jpg",
        "date" => "01/15/2022"
    ],
    [
        "id" => 5,
        "name" => "Ferrari F8 Tributo",
        "price" => 280000,
        "location" => "Los Angeles",
        "year" => 2021,
        "mileage" => "5K mi",
        "fuel" => "Gasoline",
        "transmission" => "Automatic",
        "image" => "assets/img/fff.webp",
        "date" => "09/23/2021"
    ],
    [
        "id" => 6,
        "name" => "FERRARI ROMA 3.9 V8",
        "price" => 350000,
        "location" => "Miami",
        "year" => 2023,
        "mileage" => "2K mi",
        "fuel" => "Gasoline",
        "transmission" => "Automatic",
        "image" => "assets/img/ferrr.webp",
        "date" => "02/14/2023"
    ],
    [
        "id" => 7,
        "name" => "Porsche 911",
        "price" => 179000,
        "location" => "Boston",
        "year" => 2024,
        "mileage" => "10K mi",
        "fuel" => "Gasoline",
        "transmission" => "Automatic",
        "image" => "assets/img/porschecar.jpg",
        "date" => "06/18/2024"
    ],
    [
        "id" => 8,
        "name" => "Ferrari Pista 499",
        "price" => 419000,
        "location" => "San Diego",
        "year" => 2022,
        "mileage" => "56K mi",
        "fuel" => "Gasoline",
        "transmission" => "Automatic",
        "image" => "assets/img/pista488.jpg",
        "date" => "06/18/2022"
    ]
];

// Controlling sort request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the value from the POST request
    $sort_by = $_POST['sort_by'];

    // Validate the sort_by value using a RegEx
    if (preg_match("/^(sort|rsort|asort|ksort|arsort|krsort)$/", $sort_by)) {
        switch ($sort_by) {
            case 'sort':
                sort($products);
                break;
            case 'rsort':
                rsort($products);
                break;
            case 'asort':
                asort($products);
                break;
            case 'ksort':
                ksort($products);
                break;
            case 'arsort':
                arsort($products);
                break;
            case 'krsort':
                krsort($products);
                break;
            default:
                break;
        }
    } else {
        $error_message = "Error: Invalid sort option selected!";
    }
}

// Showing products
function renderProducts($products) {
    foreach ($products as $product) {
        echo "
        <div class='col-12 col-md-6 col-lg-3 mb-4'>
            <div class='card' style='width: 100%;'>
                <img src='{$product['image']}' class='card-img-top' alt='{$product['name']}'>
                <div class='card-body'>
                    <div class='row d-flex justify-content-between'>
                        <div class='col-auto'>
                            <p class='text-muted'>{$product['date']}</p>
                        </div>
                        <div class='col-auto card-icons'>
                            <i class='bi bi-suit-heart'></i>
                            <i class='bi bi-bell'></i>
                            <i class='bi bi-arrow-repeat'></i>
                        </div>
                    </div>
                    <h6 class='card-title fw-bold'>
                        <a href='product.php' class='text-decoration-none text-dark'>{$product['name']}
                            <span class='text-muted ms-1'>({$product['year']})</span>
                        </a>
                    </h6>
                    <h6 class='fw-semibold'>\$" . number_format($product['price']) . "</h6>
                    <hr>
                    <div class='row d-flex'>
                        <div class='col-auto'>
                            <small><i class='bi bi-geo-alt me-2'></i>{$product['location']}</small><br>
                            <small><i class='bi bi-speedometer me-2'></i>{$product['mileage']}</small>
                        </div>
                        <div class='col-auto mx-auto'>
                            <small><i class='bi bi-fuel-pump me-2'></i>{$product['fuel']}</small><br>
                            <small><i class='bi bi-gear me-2'></i>{$product['transmission']}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Marketplace | Products</title>
    <link rel="icon" href="assets/img/webicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .small-search-bar {
            padding: 10px !important;
            margin-right: 10px !important;
            margin-top: 0px !important;
            border: 1px solid #ccc !important;
            font-size: 14px !important;
            width: 250px !important;
            border-radius: 5px;
        }

        .btn {
            padding: 10px 20px;
            margin-right: 10px;
            margin-bottom: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn:hover {
            background-color: #ccc;
        }

        #total-price {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        /* Feedback Popout */
        #feedback-popout {
            display: none;
            position: fixed;
            background-color: #fff;
            width: 450px;
            height: 500px;
            outline: #024c89 dotted 1px; 
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            cursor: move;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .feedback-form input, .feedback-form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        #returnButton {
            display: none;
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            padding: 10px 20px;
            background-color: #f5f5f5;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #closePopout{
            position: absolute;
            bottom: 20px;
            left: 15%;
            transform: translateX(-50%);
            padding: 10px 20px;
            background-color: #f5f5f5;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #feedback-list {
            max-height: 150px;
            overflow-y: auto;
            margin-top: 10px;
        }

        .feedback-item {
            margin-bottom: 10px;
            background-color: #f8f8f8;
            padding: 10px;
            border-radius: 5px;
            position: relative;
        }

        .feedback-item button.remove-btn {
            position: absolute;
            top: 17px;
            right: 10px;
            background: none;
            border: none;
            cursor: pointer;
            color: red;
        }

    </style>
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

    <!-- Content -->
    <div class="container-fluid">
        <div class="mt-5">
            <h3 class="fw-semibold">Other Products</h3>
            <hr>
        </div>

        <!-- Sorting -->
        <div class="controls mb-4">
            <form method="POST" action="products.php">
                <div class="row align-items-center justify-content-between">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="input-group" style="width: 100%;">
                            <select name="sort_by" class="form-control shadow-none border-dark" id="sort_by" aria-describedby="basic-addon2">
                                <option value="sort">Sort (Ascending by Index)</option>
                                <option value="rsort">Rsort (Descending by Index)</option>
                                <option value="asort">Asort (Ascending by Value)</option>
                                <option value="ksort">Ksort (Ascending by Key)</option>
                                <option value="arsort">Arsort (Descending by Value)</option>
                                <option value="krsort">Krsort (Descending by Key)</option>
                            </select>
                            <button class="input-group-text bg-dark text-light border-dark" type="submit" id="basic-addon2">Sort</button>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 text-end">
                        <span><b>Total number of products:</b> <?php echo count($products); ?></span>
                    </div>
                </div>
            </form>
            <?php if (isset($error_message)): ?>
                <div class="alert alert-danger mt-3" role="alert">
                    <?php echo $error_message; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Products -->
        <div class="row">
            <?php renderProducts($products); ?>
        </div>

        <!-- Feedback Button and Popout -->
        <button id="openPopout" class="btn">Leave Feedback</button>

        <div id="feedback-popout">
            <h4>Leave Feedback</h4>
            <form id="feedback-form" class="feedback-form">
                <textarea id="feedback-text" placeholder="Write your feedback..." rows="1"></textarea>
                <button type="submit">Submit Feedback</button>
            </form>

            <div id="feedback-list"></div>
            <button id="returnButton">Return</button>
            <button id="closePopout" >Close</button>
        </div>
    </div>

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
                    <span>Personalized search</span>
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

    <!-- Designing Canvas Icon -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // Feedback Section Logic
        const feedbackPopout = document.getElementById("feedback-popout");
        const openPopout = document.getElementById("openPopout");
        const closePopout = document.getElementById("closePopout");
        const feedbackForm = document.getElementById("feedback-form");
        const feedbackList = document.getElementById("feedback-list");

        openPopout.addEventListener("click", () => {
            feedbackPopout.style.display = "block";
        });

        closePopout.addEventListener("click", () => {
            feedbackPopout.style.display = "none";
        });

        feedbackForm.addEventListener("submit", (event) => {
            event.preventDefault();
            const feedbackText = document.getElementById("feedback-text").value;
            if (feedbackText.trim()) {
                const feedbackItem = document.createElement("div");
                feedbackItem.classList.add("feedback-item");
                feedbackItem.textContent = feedbackText;
                feedbackList.appendChild(feedbackItem);
                document.getElementById("feedback-text").value = "";
            }
        });
    </script>
</body>
