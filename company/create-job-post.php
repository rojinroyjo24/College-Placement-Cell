<?php
session_start();
if(empty($_SESSION['id_user'])) {
    header("Location: user/dashboard.php");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Create Job Posts</title>

    <link rel="icon" href="../img/favicon.png" type="image/x-icon"/>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <font face="calibri">
    
    <!-- NAVIGATION BAR -->
    <section>
    <div class="container">
      <div class="row">
        <header>
          <nav class="navbar navbar-default" style="margin-bottom: 0; height: 80px; background-color: white; border-color: transparent;">
            <div class="container-fluid">

              <div class="navbar-header">
                <a class="navbar-brand" style="font-size: 24px; color: #053a5a; line-height: 42px;" href="../index.php">CAREERLINK</a>
              </div>

              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> 
                <ul class="nav navbar-nav navbar-right">
                  <li style="padding-right: 25px;"><a href="dashboard.php" style="font-size: 24px; color: #053a5a; line-height: 42px;">Dashboard</a></li>
                  <li style="padding-right: 25px;"><a href="../logout.php" style="font-size: 24px; color: #053a5a; line-height: 42px;">Logout</a></li>
                </ul>
              </div>

            </div>

          </nav>
        </header>
      </div>
    </div>
  </section>

  <div style="background-color: #053a5a; height: 80px;">
    <p style="font-size: 34px; color: white; text-align: center; line-height: 75px;">Create Job Post</p>
  </div>

  <br>
  <br>

    <section>
      <div class="container">
        <div class="row" align="center">
            <form method="post" action="addpost.php">

              <table>

                <tr>
                  <td style="font-size: 22px; text-align: right; color: #053a5a;">Job Title&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td style="font-size: 22px; color: #053a5a;">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td><input style="font-size: 20px; padding-right: 15px; padding-left: 15px; padding-top: 5px; padding-bottom: 5px; border-radius: 5px; border: 1px solid #053a5a;" type="text" id="jobtitle" name="jobtitle" placeholder="Job Title" required=""></td>
                </tr>

                <tr>
                  <td colspan="3"><br></td>
                </tr>

                <tr>
                  <td style="font-size: 22px; text-align: right; color: #053a5a;">Job Description&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td style="font-size: 22px; color: #053a5a;">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td><textarea style="font-size: 20px; padding-right: 15px; padding-left: 15px; padding-top: 5px; padding-bottom: 5px; border-radius: 5px; border: 1px solid #053a5a;" id="description" name="description" placeholder="Job Description" rows="5" cols="21"  required=""></textarea></td>
                </tr>

                <tr>
                  <td colspan="3"><br></td>
                </tr>

                <tr>
                  <td style="font-size: 22px; text-align: right; color: #053a5a;">Minimum Salary&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td style="font-size: 22px; color: #053a5a;">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td><input style="font-size: 20px; padding-right: 15px; padding-left: 15px; padding-top: 5px; padding-bottom: 5px; border-radius: 5px; border: 1px solid #053a5a;" type="number" id="minimumsalary" name="minimumsalary" placeholder="Minimum Salary" required=""></td>
                </tr>

                <tr>
                  <td colspan="3"><br></td>
                </tr>

                <tr>
                  <td style="font-size: 22px; text-align: right; color: #053a5a;">Maximum Salary&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td style="font-size: 22px; color: #053a5a;">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td><input style="font-size: 20px; padding-right: 15px; padding-left: 15px; padding-top: 5px; padding-bottom: 5px; border-radius: 5px; border: 1px solid #053a5a;" type="number" id="maximumsalary" name="maximumsalary" placeholder="Maximum Salary" required=""></td>
                </tr>

                <tr>
                  <td colspan="3"><br></td>
                </tr>

                <tr>
                  <td style="font-size: 22px; text-align: right; color: #053a5a;">Experience Required&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td style="font-size: 22px; color: #053a5a;">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td><input style="font-size: 20px; padding-right: 15px; padding-left: 15px; padding-top: 5px; padding-bottom: 5px; border-radius: 5px; border: 1px solid #053a5a;" type="text" id="experience" name="experience" placeholder="Experience Required" required=""></td>
                </tr>

                <tr>
                  <td colspan="3"><br></td>
                </tr>

                <tr>
                  <td style="font-size: 22px; text-align: right; color: #053a5a;">Qualification Required&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td style="font-size: 22px; color: #053a5a;">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td><input style="font-size: 20px; padding-right: 15px; padding-left: 15px; padding-top: 5px; padding-bottom: 5px; border-radius: 5px; border: 1px solid #053a5a;" type="text" id="qualification" name="qualification" placeholder="Qualification Required" required=""></td>
                </tr>

                <tr>
                  <td colspan="3"><br></td>
                </tr>

                <tr>
                  <td></td>
                  <td></td>
                  <td><button type="submit" style="font-size: 18px; background-color: #053a5a; color: white; width: 50%; height: 50px; border-color: transparent; border-radius: 5px;">Create</button></td>
                </tr>


              </table>

              </div>
              <?php 
              if(isset($_SESSION['registerError'])) {
                ?>
                <div>
                  <p class="text-center">Email Already Exists! Choose A Different Email!</p>
                </div>
              <?php
               unset($_SESSION['registerError']); }
              ?>     
            </form>
          </div>
        </div>
      </div>
    </section>

    <br><br>

<footer id="footer" style="background-color: #053a5a; height: 80px;">

    <p style="color:white; font-size: 20px; line-height: 80px; text-align: center;"> 
      Copyright &copy; 2024-2025 <a href="../index.php" style="color:white;">CAREERLINK.COM </a>
    </p>

    <div align="center" style="background-color: #053a5a; margin-top: -1.4%; height: 55px;">
      <a href="https://www.facebook.com/TataConsultancyServices" target="_blank"><img src="../img/facebook.png" style="width: 30px; height: 30px; margin-left: 5px; margin-right: 5px;" /></a>
      <a href="https://www.twitter.com/tcs" target="_blank"><img src="../img/twitter.png" style="width: 30px; height: 30px; margin-left: 5px; margin-right: 5px;" /></a>
      <a href="https://www.youtube.com/channel/UCaHyiyvJp4hhPNhIU7r9uqg" target="_blank"><img src="../img/youtube.png" style="width: 30px; height: 30px; margin-left: 5px; margin-right: 5px;" /></a>
    </div>

  </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </font>
  </body>
</html>