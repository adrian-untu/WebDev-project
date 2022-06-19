<?php

include('includes/database.php');

$friend1 =$_GET['origin'];
$friend2 = $_GET['id'];
	mysqli_query($con,"DELETE FROM friends WHERE (friend1 = '$friend1' and friend2 = '$friend2') or (friend1 = '$friend2' and friend2 = '$friend1')");
    echo "<script>alert('Removed from friends!'); window.location='view_friends.php?pet=$friend1'</script>";
?>