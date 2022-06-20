<?php
$get_id = $_REQUEST['pet'];
$stmt = $pdo->prepare("SELECT DISTINCT * FROM pets where pets.pet_id != ? AND (pets.pet_id NOT IN (select friend1 from friends WHERE friend2 = ?) AND pets.pet_id NOT IN (select friend2 from friends where friend1 = ?))");
$stmt->execute(["$get_id", "$get_id", $get_id]); 
$results = $stmt->fetchAll();
if (isset($_POST["ajax"])) { echo json_encode($results); }
?>