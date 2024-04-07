<?php
// Check if the img_desc parameter is set in the URL
if (isset($_GET['img_desc'])) {
    // Get the img_desc value from the URL
    $img_desc = urldecode($_GET['img_desc']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Image Description</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php include('header.php') ?>

<img src="uploads_desc/<?php echo $img_desc; ?>" class="img-fluid p-4" style="width: 100%; height: 600px;">
<center><a href="#" class="btn btn-primary mt-3 mb-3" style="padding: 15px 20px;">Inquiry</a></center>
         
<!-- Bootstrap JS (optional, for some features) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php
} else {
    // If img_desc parameter is not set, display an error message
    echo "<div class='container mt-5'>Image description not found.</div>";
}
?>
