<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

require_once "db_config.php";

$image_err = "";

// Function to create target directory if it doesn't exist
function createDirectory($directory)
{
    if (!file_exists($directory)) {
        mkdir($directory, 0777, true);
    }
}

// Check and create target directory
$target_dir = "uploads/";
createDirectory($target_dir);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Unlink Old Image 
    $sql_select = "SELECT * FROM product WHERE id =".$_POST['id'];
    $result = $mysqli->query($sql_select);
    $row = $result->fetch_assoc();

    // Validate and upload image
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === 0) {
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        // Check if target directory is writable
        if (!is_writable($target_dir)) {
            die("Target directory is not writable.");
        }
        // Rest of the code remains the same
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                // Extract file name from the full path
                $file_name = basename($_FILES["image"]["name"]);
                // Prepare an update statement for the image
                $sql = "UPDATE product SET image = ? WHERE id = ?";
                if ($stmt = $mysqli->prepare($sql)) {
                    $stmt->bind_param("si", $file_name, $_POST["id"]);
                    if ($stmt->execute()) {
                        // Image updated successfully
                        unlink("uploads/".$row['image']);
                        header("location: add_prod.php");
                        exit();
                    } else {
                        $image_err = "Failed to update image.";
                    }
                    $stmt->close();
                }
                
            } else {
                $image_err = "Failed to upload image.";
            }
        } else {
            $image_err = "File is not an image.";
        }
        
    } else {
        $image_err = "No image selected.";
    }
}

$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Image</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Update Image
                    </div>
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
                            <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="file" class="form-control-file" id="image" name="image" required>
                                <span class="text-danger"><?php echo $image_err; ?></span>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Image</button>
                            <a href="add_prod.php" class="btn btn-secondary ml-2">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
