<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = trim($_POST['full-name']);
    $email = trim($_POST['email']);
    $number = trim($_POST['number']);
    $message = trim($_POST['message']);
    
    $errors = [];

    $namePattern = "/^[a-zA-Z\s]+$/"; 
    $emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/"; 
    $phonePattern = "/^\+383[\s-]*\d{2}[\s-]*\d{3}[\s-]*\d{3}$/"; 

    // Validate full name
    if (empty($full_name) || !preg_match($namePattern, $full_name)) {
        $errors[] = "Please provide a valid full name.";
    }

    // Validate email
    if (empty($email) || !preg_match($emailPattern, $email)) {
        $errors[] = "Please provide a valid email address.";
    }

    // Validate phone number
    if (!empty($number)) {
        $cleanedNumber = preg_replace('/[^\d+]/', '', $number);
    
        if (!preg_match($phonePattern, $number) || !preg_match('/^\+383\d{8}$/', $cleanedNumber)) {
            $errors[] = "Please provide a valid Kosovo phone number (+383 followed by 8 digits). Formats allowed: +38344123456, +383 44 123 456, +383-44-123-456";
        } else {
            $number = '+383' . substr($cleanedNumber, 4);
            $number = formatPhoneNumber($number); 
        }
    }

    // Validate message
    if (empty($message)) {
        $errors[] = "Please enter your message.";
    }

    if (count($errors) > 0) {
        $errorMessages = "<ul>";
        foreach ($errors as $error) {
            $errorMessages .= "<li>" . $error . "</li>";
        }
        $errorMessages .= "</ul>";
    } else {
        $successMessage = "Your message has been successfully submitted!";
    }
}
function formatPhoneNumber($number) {
    return preg_replace('/^(\+383)(\d{2})(\d{3})(\d{3})$/', '$1-$2-$3-$4', $number);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Marketplace | Contact</title>
    <link rel="icon" href="assets/img/webicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/style/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<style>
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

    #toggleNumberBtn {
        display: inline-block;
        color: gray;
    }

    #phoneNumber {
    display: none; 
    cursor: pointer;
    }
    /* Responsivitet i formës dhe fushave të input-it */
    .contactForm input, .contactForm textarea {
        border-radius: 8px;
        padding: 10px;
        width: 100%;
    }

    .contactForm input[type="submit"] {
        background-color: #035dad;
        border: #035dad;
        color: white;
        font-size: 1rem;
        padding: 30px;
        border-radius: 8px;
        cursor: pointer;
        width: 100%;
    }

    .contactForm input[type="submit"]:hover {
        background-color: #024c89;
    }

    .form-label {
        font-size: 1rem;
        font-weight: 500;
    }

    .questionsImg{
        width:150px;
        border-radius:50%;
    }
</style>

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

    <section class="container-fluid mt-4 Contact">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 contactUs">
                    <h1><b>Contact Us</b></h1>
                    <p class="fs-6">Write to us if you have any difficulties in working with the service. We are open to communication and want to know more about those who trust us.</p>
                    <div class="d-flex align-items-center gap-4 flex-wrap"> 

                        <img src="assets/img/avatar1.jpg" alt="" class="questionsImg">

                        <div class="questionText">
                            <h2><b>Questions?</b></h2>
                            <div id="contact-info">
                                <p>Give us a call right now at <span id="phoneNumber" style="display: none; cursor: pointer;"><?php echo $phoneNumber?></span>
                                    <button id="toggleNumberBtn" class="btn btn-link" style="background: none; border: none; text-decoration: none; color: gray;">Show Number</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 mb-5 contactForm">
                    <h2><b>Get in touch</b></h2>

                    <!-- Error message displayed at the top of the form -->
                    <?php if (isset($errorMessages)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $errorMessages; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Success message displayed at the top of the form -->
                    <?php if (isset($successMessage)): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $successMessage; ?>
                        </div>
                    <?php endif; ?>

                    <form id="contactForm" action="contact.php" method="POST">
                        <label for="full-name" class="form-label"></label>
                        <input type="text" id="full-name" name="full-name" class="form-control" placeholder="Full name" autocomplete="off">
                        
                        <label for="location" class="form-label"></label>
                        <input list="locations" class="form-control" id="location" name="location" placeholder="Region" autocomplete="off">
                        <datalist id="locations">
                            <option value="Europe">
                            <option value="Asia">
                            <option value="USA">
                            <option value="Australia">
                            <option value="Africa">
                        </datalist>
                        
                        <label for="email" class="form-label"></label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" autocomplete="off">
                        
                        <label for="number" class="form-label"></label>
                        <input type="tel" id="number" name="number" class="form-control" placeholder="+38349123456" autocomplete="off" pattern="^\+383\d*$">
                        
                        <label for="message" class="form-label"></label>
                        <textarea id="message" name="message" class="form-control" rows="3" placeholder="Your message"></textarea>
                        
                        <button type="submit" class="btn btn-primary w-100 mt-3 mb-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        
        <script>

        document.addEventListener('DOMContentLoaded', function () {
            const phoneNumber = document.getElementById('phoneNumber');
            const toggleButton = document.getElementById('toggleNumberBtn');

            function togglePhoneNumber() {
                if (phoneNumber.style.display === "none") {
                    phoneNumber.style.display = "inline"; 
                    toggleButton.textContent = "Hide number"; 
                } else {
                    phoneNumber.style.display = "none"; 
                }
            }

            toggleButton.addEventListener('click', togglePhoneNumber);
        });

        // Form validation function
        function validateForm(event) {
            const fullName = document.getElementById('full-name').value.trim();
            const email = document.getElementById('email').value.trim();
            const message = document.getElementById('message').value.trim();
            const number = document.getElementById('number').value.trim();
            
            const errorMessage = document.getElementById('error-message');

            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            const phonePattern = /^\+383\d{8}$/; 

            // Validate inputs
            if (fullName === "" || email === "" || message === "") {
                errorMessage.style.display = "block";
                event.preventDefault();
                return false;
            }

            if (!emailPattern.test(email)) {
                errorMessage.style.display = "block";
                event.preventDefault();
                return false;
            }

            if (number && !phonePattern.test(number)) {
                errorMessage.style.display = "block";
                event.preventDefault();
                return false;
            }

            errorMessage.style.display = "none";
            return true;
        }

        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById("contactForm");

            form.addEventListener("submit", function (e) {
                if (!validateForm(e)) {
                    e.preventDefault();  
                }
            });    
        });

        </script>
    </section>
    <footer class="container-fluid footer-info">
        <div class="row d-flex align-items-center footer-info-content">
            <div class="col-6 col-sm-6 col-md-6 col-lg-3 ">
                <div class="d-flex align-items-center">
                    <i class="bi bi-copy me-2"></i>
                    <span class="mb-0">Over 1 million listings</span>
                </div>
            </div>
            <div class="coaval-6 col-sm-6 col-md-6 col-lg-3 ">
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

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
