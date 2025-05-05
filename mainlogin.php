<?php

session_start();
require_once("db.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <link rel="icon" href="img/favicon.png" type="image/x-icon"/>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <!-- Custom Styles -->
    <style>
      body {
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        background-color: #f4f7f6;
        color: #333;
      }

      .navbar {
        background-color: white;
        border-bottom: 1px solid #ddd;
        padding: 15px 0;
      }

      .navbar-brand {
        color: #053a5a;
        font-weight: bold;
        font-size: 28px;
        padding-left: 15px;
      }

      .navbar-nav > li > a {
        color: #053a5a;
        font-size: 18px;
        font-weight: 500;
        padding-right: 25px;
      }

      .header-banner {
        background-color: #053a5a;
        height: 150px;
        color: white;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 48px;
        font-weight: 700;
      }

      .container {
        margin-top: 50px;
      }

      .login-option {
        background: linear-gradient(135deg, #ff7e5f, #feb47b);
        border-radius: 8px;
        padding: 30px;
        margin-bottom: 30px;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      }

      .login-option:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      }

      .login-option h1 {
        font-size: 36px;
        font-weight: bold;
        margin-bottom: 0;
        color: white;
      }

      .login-option a {
        color: white;
        text-decoration: none;
      }

      .footer {
        background-color: #053a5a;
        color: white;
        text-align: center;
        padding: 20px 0;
        margin-top: 50px;
      }

      .footer a {
        color: white;
        text-decoration: none;
        margin: 0 10px;
        font-size: 20px;
      }

      .footer-icons img {
        width: 40px;
        height: 40px;
        margin: 0 10px;
        transition: all 0.3s;
      }

      .footer-icons img:hover {
        transform: scale(1.1);
      }
    </style>
  </head>
  <body>

  <!-- Navigation Bar Start -->
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">CAREERLINK</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <?php if(isset($_SESSION['id_user']) && empty($_SESSION['companyLogged'])) { ?>
          <li><a href="user/dashboard.php">Dashboard</a></li>
          <li><a href="logout.php">Logout</a></li>
        <?php } else if(isset($_SESSION['id_user']) && isset($_SESSION['companyLogged'])) { ?>
          <li><a href="company/dashboard.php">Dashboard</a></li>
          <li><a href="logout.php">Logout</a></li>
        <?php } else { ?>
          <li><a href="search.php">Search for Jobs</a></li>
          <li><a href="mainregister.php">Register</a></li>
          <li><a href="mainlogin.php">Login</a></li>
        <?php } ?>
      </ul>
    </div>
  </nav>
  <!-- Navigation Bar End -->

  <!-- Banner Start -->
  <div class="header-banner">
    Login
  </div>
  <!-- Banner End -->

  <!-- Login Options Start -->
  <div class="container">
    <div class="row text-center">
      <div class="col-md-6 col-md-offset-3">
        <div class="login-option">
          <h1><a href="login.php">Candidate Login</a></h1>
        </div>
      </div>

      <div class="col-md-6 col-md-offset-3">
        <div class="login-option" style="background-color: #f39c12;">
          <h1><a href="company-login.php">Company Login</a></h1>
        </div>
      </div>

      <div class="col-md-6 col-md-offset-3">
        <div class="login-option" style="background-color: #27ae60;">
          <h1><a href="admin/index.php">Admin Login</a></h1>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Options End -->

  <!-- Footer Start -->
  <footer class="footer">
    <p>&copy; 2024-2025 <a href="index.php">CAREERLINK.COM</a></p>
    <div class="footer-icons">
      <a href="https://www.facebook.com/TataConsultancyServices" target="_blank"><img src="img/facebook.png" alt="Facebook"></a>
      <a href="https://www.twitter.com/tcs" target="_blank"><img src="img/twitter.png" alt="Twitter"></a>
      <a href="https://www.youtube.com/channel/UCaHyiyvJp4hhPNhIU7r9uqg" target="_blank"><img src="img/youtube.png" alt="YouTube"></a>
    </div>
  </footer>
  <!-- Footer End -->

  </body>
</html>
