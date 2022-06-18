<?php 
include('includes/database.php');
include('session.php');
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
             $url = "https://";   
        else  
             $url = "http://";   
        $url.= $_SERVER['HTTP_HOST'];   
        $url.= $_SERVER['REQUEST_URI'];    
    if(preg_match_all('/\d+/', $url, $numbers))
    $id_new = end($numbers[0]);
    mySQLi_query($con,"UPDATE user SET family_id = '$family_id' WHERE user_id = '$id_new'");
	echo "<script>alert('User successfully added!'); window.location='family.php'</script>";
    ?>