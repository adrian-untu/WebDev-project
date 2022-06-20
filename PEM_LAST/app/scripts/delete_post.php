<?php
require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/config/session.php";
$get_id =$_GET['id'];
$stmt=$pdo->prepare("DELETE FROM posts WHERE post_id = ?");
$stmt->execute(["$get_id"]);
	header("Location: /PEM/PEM_LAST/app/profile");
?>