<?php

require_once "db_config.php"; // Change this to your database configuration file

// Retrieve products from the database
$sql = "SELECT * FROM product";
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

<?php include('header.php') ?>

<?php if ($result->num_rows > 0) { ?>
    <div class='container mt-5'>
        <div class="row">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <a href="image_desc.php?img_desc=<?php echo urlencode($row["img_desc"]); ?>">
                            <img src='uploads/<?php echo $row["image"]; ?>' class='card-img-top' alt='Product Image'>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row["name"]; ?></h5>
                            <p class="card-text">Price: $<?php echo $row["price"]; ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } else {
    echo "<div class='container'>No products found.</div>";
}


// Close connection
$mysqli->close();
?>



        
<?php include('footer.php') ?>
<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
      

