<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database configuration
    require_once "db_config.php"; // Change this to your database configuration file

    // Check if all form fields are filled
    if (isset($_POST["name"], $_POST["price"]) && !empty($_POST["name"]) && !empty($_POST["price"])) {
        $name = $_POST["name"];
        $price = $_POST["price"];

        // Check if image and img_desc are uploaded
        if (isset($_FILES["image"], $_FILES["img_desc"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK && $_FILES["img_desc"]["error"] === UPLOAD_ERR_OK) {
            // Define target directories
            $target_dir_image = "uploads/";
            $target_dir_img_desc = "uploads_desc/";

            // Move uploaded files to target directories
            $image = move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir_image . $_FILES["image"]["name"]);
            $img_desc = move_uploaded_file($_FILES["img_desc"]["tmp_name"], $target_dir_img_desc . $_FILES["img_desc"]["name"]);

            if ($image && $img_desc) {
                // Prepare SQL statement
                $sql = "INSERT INTO product (name, price, image, img_desc) VALUES (?, ?, ?, ?)";
                $stmt = $mysqli->prepare($sql);

                // Bind parameters
                $stmt->bind_param("ssss", $name, $price, $_FILES["image"]["name"], $_FILES["img_desc"]["name"]);

                // Execute the statement
                if ($stmt->execute()) {
                    // Redirect to the page after successful insertion
                    header("location: add_prod.php");
                    exit();
                } else {
                    echo "Error: " . $stmt->error;
                }

                // Close statement
                $stmt->close();
            } else {
                echo "Failed to move uploaded files to target directories.";
            }
        } else {
            echo "Please upload both image and img_desc files.";
        }
    } else {
        echo "Please fill all the required fields.";
    }

    // Close connection
    $mysqli->close();
}
?>
