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
    <title>Home</title>
    <link rel="icon" href="img/favicon.png" type="image/x-icon"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            overflow-x: hidden; /* Prevent horizontal scrolling */
        }

        body {
            font-family: 'calibri', sans-serif;
        }

        /* Hero Section */
        .hero-section {
            position: relative;
            width: 100%;
            height: 100vh;
            background: url('img/new-professional-bg.jpg') no-repeat center center/cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
        }

        .hero-section h1 {
            font-size: 60px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .hero-section p {
            font-size: 22px;
            margin-bottom: 30px;
        }

        .hero-section .search-box {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .hero-section input[type="text"] {
            width: 50%;
            padding: 15px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            margin-right: 10px;
        }

        .hero-section input[type="submit"] {
            padding: 15px 30px;
            font-size: 18px;
            background-color: #FF5722;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .hero-section input[type="submit"]:hover {
            background-color: #E64A19;
        }

        /* nav */
        /* Navigation Links */
        .navbar-nav {
            font-size: 24px; /* Font size for navigation links */
            font-weight: 600; /* Font weight for navigation links */
        }

        .navbar-nav > li > a {
            color: white; /* Default text color */
            padding: 30px 20px; /* Padding for links */
            text-decoration: none; /* Remove underline */
            transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition */
        }

        /* Hover Effects */
        .navbar-nav > li > a:hover {
            background-color: rgba(255, 255, 255, 0.2); /* Light background on hover */
            color: #FF5722; /* Change text color on hover */
        }

        /* Latest Jobs Section */
        .latest-jobs {
            padding: 60px 0;
            background-color: #f4f4f4;
        }

        .latest-jobs h2 {
            font-size: 36px;
            text-align: center;
            margin-bottom: 40px;
            color: #333;
        }

        .job-card {
            background-color: white;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .job-card:hover {
            transform: translateY(-10px);
        }

        .job-card h4 {
            font-size: 22px;
            margin-bottom: 10px;
        }

        .job-card p {
            font-size: 18px;
            color: #555;
        }

        .job-card .salary {
            font-size: 18px;
            font-weight: bold;
            color: #FF5722;
        }

        /* Footer */
        footer {
            background-color: #053a5a;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        footer a {
            color: white;
            text-decoration: none;
        }
        

        footer img {
            margin: 0 10px;
            width: 30px;
        }
    </style>
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-default" style="margin-bottom: 0; height: 100px; background-color:black; border: none;">
    <div class="fluid">
        <!-- Brand -->
        <div class="navbar-header">
            <a class="navbar-brand" style="font-size: 40px; color: white; font-weight: bold; line-height: 80px;" href="index.php">
                CAREERLINK
            </a>
        </div>
        
        <!-- Navigation Links -->
        <ul class="nav navbar-nav navbar-right">
            <?php if(isset($_SESSION['id_user'])) { ?>
                <li><a href="user/dashboard.php">Dashboard</a></li>
                <li><a href="logout.php">Logout</a></li>
            <?php } else { ?>
                <li><a href="index.php">Home</a></li>
                <li><a href="search.php">Search Jobs</a></li>
                <li><a href="mainregister.php">Register</a></li>
                <li><a href="mainlogin.php">Login</a></li>
                <li><a href="resources.php">Resources</a></li><br>
            <?php } ?>
        </ul>
    </div>
</nav>

<!-- Hero Section -->
<div class="hero-section">
    <h1>Find Your Dream Job</h1>
    <p>Search from thousands of job opportunities across various industries</p>

    <!-- Search Box -->
    <div class="search-box">
        <form action="" method="post" style="display: flex; flex-wrap: nowrap;">
            <input type="text" name="search" placeholder="Search by job title (e.g. Accountant)">
            <input type="submit" value="Search">
        </form>
    </div>
</div>

<!-- Latest Jobs Section -->
<div class="latest-jobs">
    <div class="container">
        <h2>Latest Job Posts</h2>
        <div class="row">
            <?php
            $sql = "SELECT * FROM job_post ORDER BY id_jobpost DESC LIMIT 5";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $sql1 = "SELECT * FROM company WHERE id_company='$row[id_company]'";
                    $result1 = $conn->query($sql1);
                    if($result1->num_rows > 0) {
                        while($row1 = $result1->fetch_assoc()) {
                            ?>
                            <div class="col-md-4">
                                <div class="job-card">
                                    <h4><a href="apply-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle']; ?></a></h4>
                                    <p><strong>Company:</strong> <?php echo $row1['companyname']; ?> | <strong>Location:</strong> <?php echo $row1['headofficecity']; ?></p>
                                    <p><strong>Experience:</strong> <?php echo $row['experience']; ?> years</p>
                                    <p class="salary">Rs.<?php echo $row['maximumsalary']; ?> per Month</p>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
            }
            ?>
        </div>
    </div>
</div>

<!-- Footer -->
<footer>
    <p>&copy; 2024-2025 <a href="index.php">CAREERLINK.COM</a></p>
    <div>
        <a href="#"><img src="img/facebook.png"></a>
        <a href="#"><img src="img/twitter.png"></a>
        <a href="#"><img src="img/youtube.png"></a>
    </div>
</footer>

</body>
</html>
