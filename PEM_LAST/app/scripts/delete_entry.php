<?php
require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/config/session.php"; 
$get_time =$_GET['created'];
$get_id = $_GET['pet_id'];
    $stmt = $pdo->prepare("DELETE FROM medical_history WHERE created = ? AND pet_id = ?");
    $stmt->execute(["$get_time", "$get_id"]);
    echo "<script>alert('Entry successfully deleted!'); window.location='/PEM/PEM_LAST/app/view_medical_history?pet=$get_id'</script>";
?>