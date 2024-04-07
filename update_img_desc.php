<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

require_once "db_config.php";

$image_desc_err = "";

// Function to create target directory if it doesn't exist
function createDirectory($directory)
{
    if (!file_exists($directory)) {
        mkdir($directory, 0777, true);
    }
}

// Check and create target directory
$target_desc_dir = "uploads_desc/";
createDirectory($target_desc_dir);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql_select = "SELECT * FROM product WHERE id =".$_POST['id'];
    $result = $mysqli->query($sql_select);
    $row = $result->fetch_assoc();
    // Validate and upload image description
    if (isset($_FILES["img_desc"]) && $_FILES["img_desc"]["error"] === 0) {
        $target_file = $target_desc_dir . basename($_FILES["img_desc"]["name"]);
        // Check if target directory is writable
        if (!is_writable($target_desc_dir)) {
            die("Target directory is not writable.");
        }
        // Rest of the code remains the same
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["img_desc"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["img_desc"]["tmp_name"], $target_file)) {
                // Extract file name from the full path
                $file_name = basename($_FILES["img_desc"]["name"]);
                // Prepare an update statement for the image description
                $sql = "UPDATE product SET img_desc = ? WHERE id = ?";
                if ($stmt = $mysqli->prepare($sql)) {
                    $stmt->bind_param("si", $file_name, $_POST["id"]);
                    if ($stmt->execute()) {
                        // Image description updated successfully
                        unlink("uploads_desc/".$row['img_desc']);
                        header("location: add_prod.php");
                        exit();
                    } else {
                        $image_desc_err = "Failed to update image description.";
                    }
                    $stmt->close();
                }
            } else {
                $image_desc_err = "Failed to upload image description.";
            }
        } else {
            $image_desc_err = "File is not an image.";
        }
    } else {
        $image_desc_err = "No image description selected.";
    }
}

$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Image Description</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Update Image Description
                    </div>
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
                            <div class="form-group">
                                <label for="img_desc">Image Description:</label>
                                <input type="file" class="form-control-file" id="img_desc" name="img_desc" required>
                                <span class="text-danger"><?php echo $image_desc_err; ?></span>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Image Description</button>
                            <a href="add_prod.php" class="btn btn-secondary ml-2">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
