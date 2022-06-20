<?php

require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/config/session.php";

$get_id =$_GET['id'];
$stmt = $pdo->prepare("DELETE FROM pets WHERE pet_id =  ?");
$stmt->execute(["$get_id"]);
$stmt = $pdo->prepare("DELETE FROM posts where pet_id = ?");
$stmt->execute(["$get_id"]);
$stmt = $pdo->prepare("DELETE FROM medical_history where pet_id = ?");
$stmt->execute(["$get_id"]);
$stmt = $pdo->prepare("DELETE FROM friends where friend1 = ? or friend2 = ?");
$stmt->execute(["$get_id", "$get_id"]);
    echo "<script>alert('Pet successfully deleted!'); window.location='/PEM/PEM_LAST/app/family'</script>";

?>