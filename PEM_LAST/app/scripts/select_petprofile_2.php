<?php 
$stmt = $pdo->prepare("SELECT * FROM posts LEFT JOIN user on user.user_id = posts.user_id where posts.pet_id= ? and posts.family_id = ? order by created desc");
$stmt->execute(["$id_pet", "$family_id"]);
$results = $stmt->fetchAll();
if (isset($_POST["ajax"])) { echo json_encode($results); }
?>