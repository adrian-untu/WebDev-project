<?php
$stmt = $pdo->prepare("SELECT * FROM `user` WHERE `firstname` LIKE ? OR `lastname` LIKE ?");
$stmt->execute(["%".$_POST["search"]."%", "%".$_POST["search"]."%"]);
$results = $stmt->fetchAll();
if (isset($_POST["ajax"])) { echo json_encode($results); }
?>