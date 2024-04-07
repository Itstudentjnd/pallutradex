<?php
// Start session
//session_start();

// Check if user is already logged in, if yes, redirect to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: add_prod.php");
    exit;
}

// Define hardcoded credentials
$valid_username = "admin";
$valid_password = "12345";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        if($username === $valid_username && $password === $valid_password){
            // Password is correct, so start a new session
            session_start();
                            
            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;                            
                            
            // Redirect user to welcome page
            header("location: add_prod.php");
        } else{
            // Display an error message if username or password is incorrect
            $login_err = "Invalid username or password.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-image: url('img/i1.jpg'); background-size: cover; background-position: center; height: 100vh;">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="text-center mb-5">
                        <img src="img/logo1.png" alt="Logo" class="logo" style="max-width: 500px; height: auto;">
                    </div>
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title mb-3 text-center">Admin Login</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>">
                            <span class="text-danger"><?php echo $username_err; ?></span>
                        </div>    
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <span class="text-danger"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Login</button>
                        </div>
                        <p class="text-danger"><?php echo $login_err; ?></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
