<?php

$stmt = $pdo->prepare("SELECT * from posts LEFT JOIN user on user.user_id = posts.user_id where user.user_id = ? order by created DESC");
$stmt->execute(["$id"]);
$results = $stmt->fetchAll();
if (isset($_POST["ajax"])) { echo json_encode($results); }
?>