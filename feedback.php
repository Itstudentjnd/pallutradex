<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback Form</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Center text feedback */
    .text-feedback {
      text-align: center;
      font-weight: bold;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

<?php include('header.php') ?>

<h3 class="text-feedback mt-3 ">Leave Your Feedback</h3>

<div class="container mt-5">
  <div class="row">
    <!-- Image on the right side -->
    <div class="col-md-6 mt-0 order-md-1">
      <img src="img/feedback_bg.png" class="img-fluid" alt="Feedback Background Image" style="height: 450px;">
    </div>
    <!-- Card on the left side -->
    <div class="col-md-6 order-md-2 mt-4">
      <div class="card p-2" style="border-radius: 20px;">
        <!-- Text feedback on top of the card -->
        
        <div class="card-body">
          <form action="feedback_proc.php" method="POST">
            <div class="form-group">
              <label for="name">Your Name:</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
              <label for="email">Your Email:</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
              <label for="feedback">Your Feedback:</label>
              <textarea class="form-control" id="feedback" rows="3" name="msg" placeholder="Enter your feedback" required></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit Feedback</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('footer.php') ?>
<!-- Bootstrap JS (optional, for some features) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
