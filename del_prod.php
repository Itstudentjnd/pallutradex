<?php

include ("db_config.php");


if(isset($_POST['delete_prod'])){
        
    $id = $_POST['delete_id'];
    $image = $_POST['delete_image'];
    $img_desc = $_POST['delete_img_desc'];

    $query = "DELETE FROM product WHERE id='$id' ";
    $query_run = mysqli_query($mysqli,$query);

    if($query_run){
        unlink("uploads/".$image);
        unlink("uploads_desc/".$img_desc);
        header("Location: add_prod.php");
    }
    else{
        $_SESSION['status'] = "Record not deleted successfully";
    }
}
?>