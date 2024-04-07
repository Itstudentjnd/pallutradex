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
  <div class="container ms-0">
    <!-- Logo on the left -->
    <a class="navbar-brand" href="index.php"><img src="img/logo1.png" alt="Logo" style="width: 200px;height: auto;left:0px;"></a>

    <!-- Toggler/collapsible Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse me-0" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-dark" href="index.php" style="font-size: 18px;">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="product.php" style="font-size: 18px;">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="feedback.php" style="font-size: 18px;">Feedback</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="about.php" style="font-size: 18px;">About us</a>
            </li>
        </ul>
    </div>
  </div>
</nav>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
