<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "db_config.php"; // Change this to your database configuration file

// Retrieve products from the database
$sql = "SELECT * FROM feedback";
$result = $mysqli->query($sql);
?>

 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Navbar Example</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .navbar-nav .nav-item .nav-link {
        transition: color 0.3s ease; /* Smooth transition for color change */
    }

    .navbar-nav .nav-item .nav-link:hover {
        color: #007bff !important; /* Change color to Bootstrap primary color on hover */
    }
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <!-- Logo on the left -->
    <a class="navbar-brand" href="#"><img src="img/logo1.png" alt="Logo" style="width: 200px;height: auto;"></a>

    <!-- Toggler/collapsible Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-dark" href="add_prod.php" style="font-size: 18px;">Add Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="feedback_disp.php" style="font-size: 18px;">Feedback</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="#" style="font-size: 18px;">Inquiry</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="logout.php" style="font-size: 18px;">Logout</a>
            </li>
        </ul>
    </div>



  </div>
</nav>

<?php if ($result->num_rows > 0) { ?>
    <div class='container mt-5'>
        <table class='table table-striped'>
            <thead class='thead-dark'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Action</th> <!-- Added Action column -->
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td>$<?php echo $row["email"]; ?></td>
                        <td>$<?php echo $row["msg"]; ?></td>                       
                        <td>
                            <!-- Delete button -->
                            <button type="button" class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php } else {
    echo "<div class='container'>No products found.</div>";
}

// Close connection
$mysqli->close();
?>


        

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>