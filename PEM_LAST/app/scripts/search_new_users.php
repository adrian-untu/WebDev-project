<?php
$stmt = $pdo->prepare("SELECT * FROM `user` WHERE family_id = '0'");
$stmt->execute();
$results = $stmt->fetchAll();
if (isset($_POST["ajax"])) { echo json_encode($results); }
?>