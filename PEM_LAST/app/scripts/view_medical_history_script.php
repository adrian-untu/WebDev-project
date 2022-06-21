<?php
$id_pet = htmlspecialchars($_GET['pet']);
$stmt = $pdo->prepare("SELECT * FROM medical_history LEFT JOIN pets on medical_history.pet_id = pets.pet_id WHERE pets.pet_id = ? ORDER BY medical_history.date DESC");
$stmt->execute(["$id_pet"]);
$results = $stmt->fetchAll();
if (isset($_POST["ajax"])) { echo json_encode($results); }
?>