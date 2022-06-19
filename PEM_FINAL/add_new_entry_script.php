<?php 
include('includes/database.php');
include('session.php');
        if (isset($_POST['submit']))
	{
        $pet_id = $_POST['pet_id'];
        $time=time();
        $entry = $_POST['entry'];
    mySQLi_query($con,"INSERT INTO medical_history(pet_id,entry,created) VALUES ('$pet_id', '$entry', '$time')");
	echo "<script>alert('Entry successfully added!'); window.location='view_medical_history.php?pet=$pet_id'</script>";
    }
    ?>