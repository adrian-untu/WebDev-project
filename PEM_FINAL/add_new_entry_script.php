<?php 
include('includes/database.php');
include('session.php');
        if (isset($_POST['submit']))
	{
        $pet_id = $_POST['pet_id'];
        $time=time();
        $entry = $_POST['entry'];
        $date=$_POST['date'];
    mySQLi_query($con,"INSERT INTO medical_history(pet_id,entry,created,date) VALUES ('$pet_id', '$entry', '$time', '$date')");
	echo "<script>alert('Entry successfully added!'); window.location='view_medical_history.php?pet=$pet_id'</script>";
    }
    ?>