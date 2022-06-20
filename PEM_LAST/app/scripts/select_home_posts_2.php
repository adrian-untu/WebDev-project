<?php
$stmt = $pdo->prepare("SELECT * FROM user WHERE user_id = ?");
$stmt->execute(["$id"]);
$results = $stmt->fetchAll();
if (isset($_POST["ajax"])) { echo json_encode($results); }
?>