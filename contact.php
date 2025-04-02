<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Marketplace | Contact</title>
    <link rel="icon" href="assets/img/webicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/style.css">
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

        // Form validation function
        function validateForm(event) {
            const fullName = document.getElementById('full-name').value.trim();
            const email = document.getElementById('email').value.trim();
            const message = document.getElementById('message').value.trim();
            const number = document.getElementById('number').value.trim();
            
            const errorMessage = document.getElementById('error-message');

            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            const phonePattern = /^\+383\d{8}$/; // Modify this pattern if necessary for specific formats

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

        // Attach the validation function to the form submission event
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById("contactForm");

            form.addEventListener("submit", function (e) {
                if (!validateForm(e)) {
                    e.preventDefault();  // Prevent form submission if validation fails
                }
            });
        });
    </script>

    <section class="container-fluid mt-4 Contact">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 contactUs">
                    <h1><b>Contact Us</b></h1>
                    <p class="fs-6">Write to us if you have any difficulties in working with the service. We are open to
                        communication and want to know more about those who trust us.</p>
                    <div class="d-flex align-items-center">
                        <div class="questions">
                            <div class="questions-body">
                                <img src="assets/img/avatar1.jpg" alt="" id="questionsImg">
                                <div class="text mt-4">
                                    <h2><b>Questions?</b></h2>
                                    <div id="contact-info">
                                        <p>Give us a call right now at <span id="phoneNumber"
                                                style="display: none; cursor: pointer;">(406) 555‑0120</span>
                                            <button id="toggleNumberBtn" class="btn btn-link"
                                                style="background: none; border: none; text-decoration: none; color: gray;">Show
                                                Number</button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 mb-5 contactForm">
                    <h2><b>Get in touch</b></h2>
                    <form id="contactForm" onSubmit="validateForm(event)">
                            <label for="full-name" class="form-label"></label>
                            <input type="text" id="full-name" class="form-control" placeholder="Full name" autocomplete="off">
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
                            <input type="email" id="email" class="form-control" placeholder="Email" autocomplete="off">
                            <label for="number" class="form-label"></label>
                            <input type="tel" id="number" class="form-control" placeholder="+38349123456" autocomplete="off" pattern="^\+383\d*$">
                            <label for="message" class="form-label"></label>
                            <textarea id="message" name="message" class="form-control" rows="3" placeholder="Your message"></textarea>
                            <button type="submit" class="btn btn-primary w-100 mt-3 mb-3">Submit</button>
                    </form>
                    <p id="error-message" style="color: #FF0000; display: none;">Please fill out all fields correctly.</p>
                </div>
            </div>
        </div>
    </section>

<footer class="container-fluid footer-info">
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

</body>

</html>
