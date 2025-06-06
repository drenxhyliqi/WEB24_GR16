<?php

session_start();

if (isset($_POST['logout'])) {
    session_unset();     
    session_destroy();   
    header("Location: index.php");
    exit();
} 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = filter_var(trim($_POST['full-name']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $number = filter_var(trim($_POST['number']), FILTER_SANITIZE_STRING);
    $message = filter_var(trim($_POST['message']), FILTER_SANITIZE_STRING);

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
        
        $to = "donartspahiu@gmail.com";  
        $subject = "New contact form submission from " . $full_name;

        // email content
        $email_message = "You have received a new message from your website contact form.\n\n";
        $email_message .= "Name: " . $full_name . "\n";
        $email_message .= "Email: " . $email . "\n";
        if (!empty($number)) {
            $email_message .= "Phone: " . $number . "\n";
        }
        $email_message .= "Message:\n" . $message . "\n";

        // Additional headers
        $headers = "From: " . $email . "\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Send email
        if (mail($to, $subject, $email_message, $headers)) {
            $successMessage = "Your message has been successfully submitted!";
        } else {
            $errorMessages = "<ul><li>There was an error sending your message. Please try again later.</li></ul>";
        }
    }
}
function formatPhoneNumber($number)
{
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
    .contactForm input,
    .contactForm textarea {
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

    .questionsImg {
        width: 150px;
        border-radius: 50%;
    }

    .dropdown-toggle::after {
        display: none;
    }

    .dropdown-menu {
        min-width: 180px; 
        text-transform: capitalize;
    }

    .dropdown-item {
        padding: 10px 20px;
        font-size: 1rem;
        text-transform: capitalize;
    }

    .dropdown-item:hover {
        opacity: 0.7;
        transition: opacity 0.3s ease;
    }

</style>

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
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
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
    <section class="container-fluid mt-4 Contact">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-4 contactUs">
                    <h1><b>Contact Us</b></h1>
                    <p class="fs-6">Write to us if you have any difficulties in working with the service. We are open to communication and want to know more about those who trust us.</p>
                    <div class="d-flex align-items-center gap-4 flex-wrap">
                        <img src="assets/img/team/person1.jpg" alt="carme" class="questionsImg">
                        <div class="questionText">
                            <h2><b>Questions?</b></h2>
                            <div id="contact-info">
                                <p>Give us a call right now at : <br><a href=tel:045548747 style="text-decoration: none; color: #222;">+383 (0)45 548 747</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-8 mb-5 contactForm">
                    <h2 class="text-center"><b>Get in touch</b></h2>

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

                        <button type="submit" class="btn w-100 mt-3 mb-3" style="background-color: #035dad !important; color: #f9f9f9;">Submit</button>
                    </form>
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
                <p>Buying</p>
                <ul class="list-unstyled">
                    <li><a href="cars.php">Find a car</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-6 col-lg-3">
                <p>About</p>
                <ul class="list-unstyled">
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="#">Contact us</a></li>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>