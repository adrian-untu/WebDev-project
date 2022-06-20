<?php
$stmt = $pdo->prepare("SELECT * from posts LEFT JOIN user on user.user_id = posts.user_id where user.user_id = ? and ((posts.private=0 and user.family_id!=?) or ((posts.private=0 or posts.private=2) and user.family_id = ?)) order by created DESC");
$stmt->execute(["$id", "$family_id", "$family_id"]);
$results = $stmt->fetchAll();
if (isset($_POST["ajax"])) { echo json_encode($results); }
?>