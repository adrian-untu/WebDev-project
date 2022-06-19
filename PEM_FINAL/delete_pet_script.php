<?php

include('includes/database.php');

$get_id =$_GET['id'];
	
	// sending query
	mysqli_query($con,"DELETE FROM pets WHERE pet_id = '$get_id'");
    mysqli_query($con,"DELETE FROM posts where pet_id = '$get_id'");
    mysqli_query($con,"DELETE FROM medical_history where pet_id = '$get_id'");
    mysqli_query($con,"DELETE FROM friends where friend1 = '$get_id' or friend2 = '$get_id'");
    echo "<script>alert('Pet successfully deleted!'); window.location='family.php'</script>";

?>