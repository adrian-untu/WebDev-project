<?php 
include('includes/database.php');
include('session.php');
    $friend1 = $_REQUEST['origin'];
    $friend2 = $_REQUEST['id'];
    mySQLi_query($con,"INSERT INTO friends (friend1,friend2) VALUES ('$friend1', '$friend2')");
	echo "<script>alert('Friendship successfully added!'); window.location='petprofile.php?pet=$friend1'</script>";
    ?>