<?php
require_once('database/db_conn.php');
session_start();

$log_file = fopen("file.txt", "a") or die("Unable to open file!");
fwrite($log_file, "[" . date("Y-m-d H:i:s") . "] Sign up attempt\n");
fclose($log_file);

if (isset($_SESSION['active'])) {
  session_unset();
  session_destroy();
}

$errors = [];
if (isset($_POST['signup'])) {
  $user = $_POST['user'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (empty($user)) {
    $err = "Username is required.";
    $errors[] = $err;
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $err = "Invalid email format.";
    $errors[] = $err;
  } elseif (strlen($password) < 8) {
    $err = "Password must be at least 8 characters long.";
    $errors[] = $err;
  } else {
    $query = "SELECT * FROM users WHERE email = ?";
    if ($stmt = mysqli_prepare($con, $query)) {
      mysqli_stmt_bind_param($stmt, "s", $email);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);

      if (mysqli_stmt_num_rows($stmt) > 0) {
        $err = "Email already exists. Please choose another one.";
        $errors[] = $err;
      } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (user, email, password) VALUES (?, ?, ?)";

        if ($stmt = mysqli_prepare($con, $query)) {
          mysqli_stmt_bind_param($stmt, "sss", $user, $email, $hashedPassword);

          if (mysqli_stmt_execute($stmt)) {
            
            $log_file = fopen("file.txt", "a") or die("Unable to open log file!");
            fwrite($log_file, "[" . date("Y-m-d H:i:s") . "] User " . $user . " " . $email . " signed up\n");
            fclose($log_file);
            
            header('Location: login.php?register_success=true');
            exit();
          } else {
            $err = "Error registering user. Please try again.";
            $errors[] = $err;
            header('Location: signup.php?register_success=false');
            exit();
          }

          // mysqli_stmt_close($stmt);
        } else {
          echo "Error preparing the query: " . mysqli_error($con);
        }
      }

      mysqli_stmt_close($stmt);
    } else {
      echo "Error preparing the query: " . mysqli_error($con);
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Car Marketplace | Signup</title>
  <link rel="icon" href="assets/img/webicon.png" type="image/x-icon">

  <!-- Bootstrap & Custom CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="assets/style/style.css">
  <link rel="stylesheet" href="assets/style/login.css">
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

  <div class="wrapper">
    <div class="login-container text-center">
      <img src="assets/img/company_logo.png" alt="cmp" width="180px" height="40px">
      <h2 class="login-title mt-5">CREATE NEW ACCOUNT</h2>

      <?php
      if (isset($_GET['register_success'])) {
        if ($_GET['register_success'] == 'true') {
          echo '
              <div class="alert alert-success" role="alert">
                Your registration request has been approved, please log in now.
              </div>
            ';
        } else {
          echo '
              <div class="alert alert-danger" role="alert">
                Registration failed, please try again.
              </div>
            ';
        }
      }

      if (!empty($errors)) {
        foreach ($errors as $error) {
          echo '
              <div class="alert alert-danger" role="alert">
                ' . $error . '
              </div>
            ';
        }
      }
      ?>

      <form action="signup.php" method="POST">
        <label for="user">Full name</label>
        <input type="text" id="user" name="user" placeholder="Enter name and surname" required><br><br>
        <label for="email">Email</label>
        <input type="text" id="email" name="email" placeholder="Enter email" required><br><br>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter password" required><br><br>
        <button type="submit" name="signup" class="login-btn">Signup</button>
      </form>

      <div class="signup">
        <p>Do you have an account? <a href="login.php">Log in</a></p>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>