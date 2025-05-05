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

    <title>Register</title>

    <link rel="icon" href="img/favicon.png" type="image/x-icon"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Custom Styles -->
    <style>
      body {
        font-family: 'Arial', sans-serif;
        background-color: #f7f9fb;
        color: #333;
      }

      /* Navbar Styles */
      .navbar {
        background-color: #fff;
        border-bottom: 1px solid #e6e6e6;
        height: 80px;
      }

      .navbar-brand {
        font-size: 28px;
        color: #053a5a;
        font-weight: bold;
        padding-top: 20px;
      }

      .navbar-nav > li > a {
        color: #053a5a;
        font-size: 18px;
        padding: 20px 15px;
      }

      .navbar-nav > li > a:hover {
        color: #0056b3;
      }

      /* Header Styles */
      .page-header {
        background-color: #053a5a;
        color: white;
        height: 120px;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .page-header h1 {
        font-size: 40px;
        margin: 0;
      }

      /* Registration Options */
      .container {
        margin-top: 50px;
      }

      .register-box {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 40px;
        margin-bottom: 30px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
      }

      .register-box:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      }

      .register-box h2 {
        font-size: 30px;
        margin-bottom: 20px;
      }

      .register-box a {
        color: #053a5a;
        font-weight: bold;
        text-decoration: none;
      }

      .register-box a:hover {
        color: #0056b3;
        text-decoration: underline;
      }

      /* Footer Styles */
      footer {
        background-color: #053a5a;
        color: white;
        padding: 20px 0;
        text-align: center;
      }

      footer p {
        margin: 0;
        font-size: 18px;
      }

      footer a {
        color: white;
        margin: 0 10px;
        font-size: 22px;
        transition: all 0.3s;
      }

      footer a:hover {
        color: #ccc;
      }

      /* Social Icons */
      .social-icons img {
        width: 40px;
        height: 40px;
        margin: 0 10px;
        transition: all 0.3s;
      }

      .social-icons img:hover {
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
        <?php
        if(isset($_SESSION['id_user']) && empty($_SESSION['companyLogged'])) {
          ?>
          <li><a href="user/dashboard.php">Dashboard</a></li>
          <li><a href="logout.php">Logout</a></li>
          <?php 
        } else if(isset($_SESSION['id_user']) && isset($_SESSION['companyLogged'])) {
          ?>
          <li><a href="company/dashboard.php">Dashboard</a></li>
          <li><a href="logout.php">Logout</a></li>
          <?php 
        } else { 
          ?>
          <li><a href="search.php">Search for Jobs</a></li>
          <li><a href="mainregister.php">Register</a></li>
          <li><a href="mainlogin.php">Login</a></li>
        <?php } ?>
      </ul>
    </div>
  </nav>
  <!-- Navigation Bar End -->

  <!-- Page Header Start -->
  <div class="page-header">
    <h1>Register</h1>
  </div>
  <!-- Page Header End -->

  <!-- Registration Options Start -->
  <div class="container text-center">
    <div class="row">
      <!-- Candidate Register Box -->
      <div class="col-md-6 col-md-offset-3">
        <div class="register-box">
          <h2><a href="register.php">Candidate Register</a></h2>
        </div>
      </div>

      <!-- Company Register Box -->
      <div class="col-md-6 col-md-offset-3">
        <div class="register-box">
          <h2><a href="company-register.php">Company Register</a></h2>
        </div>
      </div>

      <!-- Uncomment if Alumni Register is available
      <div class="col-md-6 col-md-offset-3">
        <div class="register-box">
          <h2><a href="alumni_register.php">Alumni Register</a></h2>
        </div>
      </div>
      -->
    </div>
  </div>
  <!-- Registration Options End -->

  <!-- Footer Start -->
  <footer>
    <p>&copy; 2024-2025 <a href="index.php">CAREERLINK.COM</a></p>
    <div class="social-icons">
      <a href="https://www.facebook.com/TataConsultancyServices" target="_blank"><img src="img/facebook.png" alt="Facebook"></a>
      <a href="https://www.twitter.com/tcs" target="_blank"><img src="img/twitter.png" alt="Twitter"></a>
      <a href="https://www.youtube.com/channel/UCaHyiyvJp4hhPNhIU7r9uqg" target="_blank"><img src="img/youtube.png" alt="YouTube"></a>
    </div>
  </footer>
  <!-- Footer End -->

  </body>
</html>
