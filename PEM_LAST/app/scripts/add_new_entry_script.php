<?php 
require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/config/session.php"; 
        if (isset($_POST['submit']))
	{
        $pet_id = $_POST['pet_id'];
        $time=time();
        $entry = $_POST['entry'];
        $date=$_POST['date'];
        $stmt=$pdo->prepare("INSERT INTO medical_history(pet_id,entry,created,date) VALUES(?,?,?,?)");
        $stmt->execute(["$pet_id", "$entry", "$time", "$date"]);
	echo "<script>alert('Entry successfully added!'); window.location='/PEM/PEM_LAST/app/view_medical_history?pet=$pet_id'</script>";
    }
    ?>