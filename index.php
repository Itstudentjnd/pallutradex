<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bootstrap Carousel with Videos</title>
<!-- Bootstrap CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    .navbar-nav .nav-item .nav-link {
        transition: color 0.3s ease; /* Smooth transition for color change */
    }

    .navbar-nav .nav-item .nav-link:hover {
        color: #007bff !important; /* Change color to Bootstrap primary color on hover */
    }
    
    .carousel-inner .carousel-item {
        position: relative;
    }

    .carousel-caption {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(0%, -50%);
        color: #fff;
        text-align: center;
        padding: 10px;
    }

    /* Make videos responsive */
    .carousel-inner .carousel-item video {
        width: 100%;
        height: auto;
    }

    /* Adjust h1 size */
    .carousel-caption h1 {
        font-size: 2.5rem; /* Adjust as needed */
    }

    /* Make carousel caption smaller on smaller screens */
    @media (max-width: 768px) {
        .carousel-caption {
            padding: 5px; /* Smaller padding */
        }
        .carousel-caption h1{
            font-size: 1.2rem; /* Smaller font size */
        }
    }
</style>
</head>
<body>

<?php include('header.php') ?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="4000">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <video autoplay loop muted playsinline class="d-block">
          <source src="img/bg1.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
        <div class="carousel-caption">
            <h1>Construction Machinery & Equipments</h1>
            <a href="product.php" class="btn btn-primary" style="padding: 15px 20px;">Explore</a>
        </div>
      </div>
      <div class="carousel-item">
        <video autoplay loop muted playsinline class="d-block">
          <source src="img/bg2.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
        <div class="carousel-caption">
            <h1>Monkey Hoist</h1>
            <a href="product.php" class="btn btn-primary" style="padding: 15px 20px;">Explore Products</a>
        </div>
      </div>
      <div class="carousel-item">
        <video autoplay loop muted playsinline class="d-block">
          <source src="img/bg3.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
        <div class="carousel-caption">
            <h1>Road Roller</h1>
            <a href="product.php" class="btn btn-primary" style="padding: 15px 20px;">Explore Products</a>
        </div>
      </div>
    </div>
</div>

<?php include('footer.php') ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
