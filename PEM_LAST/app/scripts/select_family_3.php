<?php

$stmt = $pdo->prepare("SELECT * FROM pets where family_id = ?");
$stmt->execute(["$family_id"]);
$results = $stmt->fetchAll();
if (isset($_POST["ajax"])) { echo json_encode($results); }
?>