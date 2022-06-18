<?php
include('includes/database.php');
include('session.php');
$result=mySQLi_query($con,"SELECT * FROM family");
$count=mySQLi_num_rows($result) + 1;
$name = $_POST["name"];
mySQLi_query($con,"INSERT INTO family(family_id,name) VALUES ('$count', '$name')");
mySQLi_query($con,"UPDATE user set family_id = '$count' where user_id = '$id'");
echo "<script>alert('Family successfully created!'); window.location='family.php'</script>";
?>