<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">
  <title>Car Marketplace | Sign UP</title>
  <link rel="icon" href="assets/img/webicon.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-color: #f2f2f2;
    }

    form {
      border: 3px solid #f1f1f1;
      padding: 16px;
      max-width: 400px;
      width: 100%;
      background-color: white;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }

    input[type=text],
    input[type=password] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    button {
      background-color: #04AA6D;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
    }

    button:hover {
      opacity: 0.8;
    }

    .cancelbtn {
      width: auto;
      padding: 10px 18px;
      background-color: transparent;
      color: #111;
      font-weight: bold;
      border: 1px solid red;
    }

    .imgcontainer {
      text-align: center;
      margin: 24px 0 12px 0;
    }

    img.avatar {
      width: 15%;
      border-radius: 50%;
    }

    .container {
      padding: 16px;
    }

    span.psw {
      float: right;
      padding-top: 16px;
      font-size: 14px;
    }

    .error {
      color: red;
      font-size: 14px;
      margin-top: -8px;
      margin-bottom: 8px;
    }

    .success {
      color: green;
      font-size: 14px;
      margin-top: -8px;
      margin-bottom: 8px;
    }

    #goBack {
      width: auto;
      padding: 5px 15px;
      cursor: pointer;
      font-size: 18px;
      color: #035dad;
      margin-bottom: 20px;
    }

    @media screen and (max-width: 300px) {
      span.psw {
        display: block;
        float: none;
      }

      .cancelbtn {
        width: 100%;
      }
    }
  </style>
</head>

<body>
  <form id="signupForm" onsubmit="return validateSignUpForm()">
    <i class="bi bi-chevron-left mt-6" id="goBack"></i>
    <div class="form">
      <div class="imgcontainer">
        <h2 style="text-align: center; margin-bottom: 20px;">Sign Up Form</h2>
        <img src="assets/img/avatar2.png" alt="Avatar" class="avatar">
      </div>

      <div class="container">
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" id="email">
        <div id="emailError" class="error"></div>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" id="psw">
        <div id="pswError" class="error"></div>

        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat">
        <div id="pswRepeatError" class="error"></div>

        <label>
          <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label>

        <button type="submit">Sign Up</button>
        <div id="successMessage" class="success"></div>
      </div>
    </div>
  </form>

  <script>
    function validateSignUpForm() {
      var email = document.getElementById("email").value;
      var psw = document.getElementById("psw").value;
      var pswRepeat = document.getElementById("psw-repeat").value;

      document.getElementById("emailError").innerHTML = "";
      document.getElementById("pswError").innerHTML = "";
      document.getElementById("pswRepeatError").innerHTML = "";
      document.getElementById("successMessage").innerHTML = "";

      var isValid = true;
      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      if (email.trim() === "") {
        document.getElementById("emailError").innerHTML = "Please fill in the Email field.";
        isValid = false;
      } else if (!emailRegex.test(email)) {
        document.getElementById("emailError").innerHTML = "Please enter a valid email address.";
        isValid = false;
      }

      if (psw.trim() === "") {
        document.getElementById("pswError").innerHTML = "Please fill in the password field.";
        isValid = false;
      }

      if (psw !== pswRepeat) {
        document.getElementById("pswRepeatError").innerHTML = "Passwords do not match.";
        isValid = false;
      }

      if (psw.length < 6) {
        document.getElementById("pswError").innerHTML = "Password must be at least 6 characters long.";
        isValid = false;
      }

      if (isValid) {
        document.getElementById("successMessage").innerHTML = "Sign up successful!";
      }
      return isValid;
    }

    document.getElementById("goBack").addEventListener("click", function () {
      window.history.back();
    });

    
  </script>

</body>

</html>
