<?php

include('includes/database.php');

$get_time =$_GET['created'];
$get_id = $_GET['pet_id'];
	
	// sending query
	mysqli_query($con,"DELETE FROM medical_history WHERE created = '$get_time' AND pet_id = '$get_id'");
    echo "<script>alert('Entry successfully deleted!'); window.location='view_medical_history.php?pet=$get_id'</script>";

?>