<?php 
include('includes/database.php');
include('session.php');
    $result=mySQLi_query($con, "SELECT * from user where family_id = '$family_id'");
    $count=mySQLi_num_rows($result);
    if($count>1){
    mySQLi_query($con,"UPDATE user SET family_id = '0' WHERE user_id = '$id'");
	echo "<script>alert('Left family!'); window.location='profile.php'</script>";
    }
    else
    {
        mySQLi_query($con,"DELETE FROM family where family_id = '$family_id'");
        mySQLi_query($con,"UPDATE user SET family_id = '0' WHERE user_id = '$id'");
        echo "<script>alert('Left family and family deleted!'); window.location='profile.php'</script>";
    }
?>