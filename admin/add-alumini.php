<?php
// Database connection
require_once("../db.php");

// Handle deletion of alumni record
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']); // Convert to integer for security
    $sql = "DELETE FROM alumni WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        $message = "Alumni deleted successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
}

// Fetch all alumni from the database
$sql = "SELECT * FROM alumni";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Alumni</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
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
          <a class="navbar-brand" style="font-size: 24px; color: #053a5a; line-height: 42px;" href="index.php">CAREERLINK</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">     
          <ul class="nav navbar-nav navbar-right">
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
    <p style="font-size: 34px; color: white; text-align: center; line-height: 73px;">Admin Panel</p>
  </div>
  <br>

    <div class="container">
      <div class="row">
        <div class="col-md-12" align="center">
          <div class="list-group" align="center" style="width: 50%; border: 1px solid #053a5a; border-radius: 5px;">
            <a href="dashboard.php" class="list-group-item" style="font-size: 20px;">Dashboard</a>
            <a href="user.php" class="list-group-item active" style="font-size: 20px;">Users</a>
            <a href="company.php" class="list-group-item" style="font-size: 20px;">Company</a>
            <a href="job-posts.php" class="list-group-item" style="font-size: 20px;">Job Posts</a>
            <a href="add-alumini.php" class="list-group-item" style="font-size: 20px;">Alumini</a>
          </div>
        </div>

    <div class="container">
        <h2 class="text-center">Alumni Management</h2>

        <!-- Display messages if any -->
        <?php if (isset($message)) { ?>
            <div class="alert alert-info">
                <?php echo $message; ?>
            </div>
        <?php } ?>

        <!-- Add Alumni Form -->
        <h3>Add Alumni</h3>
        <form method="POST" action="add-alumni-process.php">
            <div class="form-group">
                <label for="name">Alumni Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter alumni name" required>
            </div>

            <div class="form-group">
                <label for="qualification">Qualification:</label>
                <input type="text" class="form-control" id="qualification" name="qualification" placeholder="Enter qualification" required>
            </div>

            <div class="form-group">
                <label for="current_company">Current Company:</label>
                <input type="text" class="form-control" id="current_company" name="current_company" placeholder="Enter current company" required>
            </div>

            <div class="form-group">
                <label for="contact_email">Contact Email:</label>
                <input type="email" class="form-control" id="contact_email" name="contact_email" placeholder="Enter email address" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number" required>
            </div>

            <div class="form-group">
                <label for="passout_year">Passout Year:</label>
                <input type="number" class="form-control" id="passout_year" name="passout_year" placeholder="Enter passout year" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Alumni</button>
        </form>

        <br><hr><br>

        <!-- Display Alumni Table -->
        <h3>Current Alumni</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Qualification</th>
                    <th>Current Company</th>
                    <th>Contact Email</th>
                    <th>Phone Number</th>
                    <th>Passout Year</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['qualification']; ?></td>
                        <td><?php echo $row['current_company']; ?></td>
                        <td><?php echo $row['contact_email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['passout_year']; ?></td>
                        <td>
                            <a href="edit-alumni.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="add-alumini.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this alumni?');">Delete</a>
                        </td>
                    </tr>
                <?php } } else { ?>
                    <tr>
                        <td colspan="7" class="text-center">No alumni records found</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Include necessary scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>

</body>
</html>

<?php
// Close the database connection after everything is done
$conn->close();
?>
