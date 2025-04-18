<?php
function validateEmail($email) {
    $emailPattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    return preg_match($emailPattern, $email);
}

function validatePassword($password) {
    $passwordPattern = '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*(),.?":{}|<>])[A-Za-z\d!@#$%^&*(),.?":{}|<>]{8,}$/';
    return preg_match($passwordPattern, $password);
}

$showAlert = false;
$alertType = '';
$alertMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"] ?? '';
    $password = $_POST["password"] ?? '';
    
    $emailValid = validateEmail($email);
    $passwordValid = validatePassword($password);

    if ($emailValid && $passwordValid) {
        $showAlert = true;
        $alertType = 'success';
        $alertMessage = 'Login Successful';
    } else {
        $showAlert = true;
        $alertType = 'danger';
        $alertMessage = '<strong>Invalid input:</strong><br>';
        if (!$emailValid) {
            $alertMessage .= '- Invalid email format.<br>';
        }
        if (!$passwordValid) {
            $alertMessage .= '- Password must be at least 8 characters with one letter, number, and special character.<br>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Car Marketplace | Log IN</title>
  <link rel="icon" href="assets/img/webicon.png" type="image/x-icon">
  <!-- Bootstrap & Custom CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="assets/style/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    .wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 90vh;
      width: 100%;
    }

    .login-container {
      padding: 2rem;
      border-radius: 8px;
      text-align: center;
      width: 100%;
      max-width: 400px;
    }

    h2 {
      margin-bottom: 1rem;
      font-size: 1.5rem;
    }

    .google-login {
      background: #035dad;
      color: white;
      border: none;
      padding: 10px;
      width: 100%;
      border-radius: 5px;
      cursor: pointer;
      font-size: 1rem;
    }

    .separator {
      margin: 1rem 0;
      font-size: 0.9rem;
      color: #777;
    }

    form {
      text-align: left;
    }

    label {
      font-weight: bold;
      font-size: 0.9rem;
    }

    input {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      margin-bottom: 1rem;
      border: none;
      border-bottom: 1px solid #035dad;
      border-radius: 0 !important;
    }

    .password-container {
      position: relative;
    }

    .toggle-password {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
    }

    .login-btn {
      background: #035dad;
      color: white;
      border: none;
      padding: 10px;
      width: 100%;
      border-radius: 5px;
      cursor: pointer;
      font-size: 1rem;
      margin-top: 10px;
    }

    .forgot-password {
      display: block;
      margin-top: 1rem;
      font-size: 0.9rem;
      font-weight: bold;
      color: #000;
    }

    p {
      font-size: 0.9rem;
      margin-top: 10px;
    }

    p a {
      font-weight: bold;
      color: #000;
    }
    
    /* Alert message styling */
    .alert-container {
      margin-top: 20px;
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

  <div class="wrapper">
    <div class="login-container text-center">
      <img src="assets/img/company_logo.png" alt="cmp" width="180px" height="40px">
      <br>
      <br>
      <h2 class="login-title">LOG IN TO YOUR ACCOUNT</h2>
      <button class="google-login">
        <i class="bi bi-google"></i> &nbsp; Continue with Google
      </button>
      <div class="separator">or</div>

      <form action="" method="POST">
        <label for="email">Email</label>
        <input type="text" id="email" name="email" placeholder="Enter email" required><br><br>

        <label for="password">Password</label>
        <div class="password-container">
          <input type="password" id="password" name="password" placeholder="Enter password" required>
          <span class="toggle-password"><i class="bi bi-eye"></i></span>
        </div><br>

        <div class="remember-forgot">
          <a href="#" class="forgot-password">Forgot password?</a>
        </div><br>

        <button type="submit" class="login-btn">Log in</button>
        
        <!-- Alerti per succes of fail -->
        <?php if ($showAlert): ?>
        <div class="alert-container">
          <div class="alert alert-<?= $alertType ?> mt-3">
            <?= $alertMessage ?>
          </div>
        </div>
        <?php endif; ?>
      </form>

      <div class="signup">
        <p>Don't have an account? <a href="#">Sign up</a></p>
        <p>Are you a dealer? <a href="#">Log in as a dealer</a></p>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
    
  <script>
    //Js per password
    document.querySelector('.toggle-password').addEventListener('click', function() {
      const passwordInput = document.querySelector('#password');
      const icon = this.querySelector('i');
      
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
      } else {
        passwordInput.type = 'password';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
      }
    });
  </script>
</body>
</html>