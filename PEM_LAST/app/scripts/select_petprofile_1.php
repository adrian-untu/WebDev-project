<?php
$stmt = $pdo->prepare("SELECT * FROM pets where pet_id= ? and family_id = ? ");
$stmt->execute(["$id_pet", "$family_id"]);
$results = $stmt->fetchAll();
if (isset($_POST["ajax"])) { echo json_encode($results); }
?>