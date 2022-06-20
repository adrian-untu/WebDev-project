<?php
require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/config/session.php"; 
$friend1 =$_GET['origin'];
$friend2 = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM friends WHERE (friend1 = ? AND friend2 = ?) OR (friend1 = ? AND friend2 = ?)");
$stmt->execute(["$friend1", "$friend2", "$friend2", "$friend1"]);
    echo "<script>alert('Removed from friends!'); window.location='/PEM/PEM_LAST/app/view_friends?pet=$friend1'</script>";
?>