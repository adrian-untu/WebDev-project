<?php

$stmt = $pdo->prepare("SELECT * from posts LEFT JOIN user on user.user_id = posts.user_id where (posts.private = 0 and user.user_id != ?) or (posts.private = 1 and user.user_id = ?) or (posts.private = 0 and user.user_id = ?) or (posts.private = 2 and user.user_id = ?) order by created DESC");
$stmt->execute(["$id", "$id", "$id", "$id"]);
$results = $stmt->fetchAll();
if (isset($_POST["ajax"])) { echo json_encode($results); }
?>