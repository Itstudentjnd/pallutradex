<?php
    include("db_config.php");
    if(isset($_POST['submit']))
	{
		
		$name = $_POST['name'];
		$email = $_POST['email'];
        $msg = $_POST['msg'];

		$q=mysqli_query($mysqli,"INSERT INTO `feedback` (`id`, `name`, `email`, `msg`) VALUES (NULL, '$name', '$email', '$msg');");
			
	}
	echo"<script>window.location='feedback.php'</script>";
?>