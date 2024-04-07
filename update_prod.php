<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "db_config.php"; // Change this to your database configuration file

// Define variables and initialize with empty values
$name = $price = "";
$name_err = $price_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate product name
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter a product name.";
    } else{
        $name = trim($_POST["name"]);
    }
    
    // Validate price
    if(empty(trim($_POST["price"]))){
        $price_err = "Please enter a price.";
    } else{
        $price = trim($_POST["price"]);
    }
    
    // Check input errors before updating the database
    if(empty($name_err) && empty($price_err)){
        // Prepare an update statement
        $sql = "UPDATE product SET name = ?, price = ? WHERE id = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssi", $param_name, $param_price, $param_id);
            
            // Set parameters
            $param_name = $name;
            $param_price = $price;
            $param_id = $_POST["id"];
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Product updated successfully. Redirect to product list
                header("location: add_prod.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $mysqli->close();
} else {
    // Retrieve product information from the database
    $sql = "SELECT name, price FROM product WHERE id = ?";
    
    if($stmt = $mysqli->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("i", $param_id);
        
        // Set parameters
        $param_id = $_GET["id"];
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            // Store result
            $stmt->store_result();
            
            // Check if product exists
            if($stmt->num_rows == 1){
                // Bind result variables
                $stmt->bind_result($name, $price);
                if($stmt->fetch()){
                    // Product found, pre-fill form fields with existing values
                } else {
                    // Product not found, redirect to error page
                    header("location: error.php");
                    exit();
                }
            } else{
                // Product not found, redirect to error page
                header("location: error.php");
                exit();
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    
    // Close statement
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Update Product
                    </div>
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
                            <div class="form-group">
                                <label for="name">Product Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
                                <span class="text-danger"><?php echo $name_err; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="number" class="form-control" id="price" name="price" value="<?php echo $price; ?>">
                                <span class="text-danger"><?php echo $price_err; ?></span>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="add_prod.php" class="btn btn-secondary ml-2">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
