<?php

include('includes/database.php');

$get_id =$_GET['id'];
	
	// sending query
	mysqli_query($con,"DELETE FROM posts WHERE post_id = '$get_id'");
	@unlink($row['post']);
	header("Location: home.php");

?>
