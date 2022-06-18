<?php 
include('includes/database.php');
include('session.php');
    mySQLi_query($con,"UPDATE user SET family_id = '0' WHERE user_id = '$id'");
	echo "<script>alert('Left family!'); window.location='profile.php'</script>";
?>