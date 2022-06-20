<?php
require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/config/database.php";
session_start();
if (!isset($_SESSION['user_id'])){
    header("location: /PEM/PEM_LAST");
}
$id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM user WHERE user_id = ?");
$stmt->execute(["$id"]);
$results = $stmt->fetchAll();
if (isset($_POST["ajax"])) { echo json_encode($results); }
if (count($results) > 0) { foreach ($results as $r) {
$profile_picture=htmlspecialchars($r['profile_picture']);
$firstname=htmlspecialchars($r['firstname']);
$lastname=htmlspecialchars($r['lastname']);
$username=htmlspecialchars($r['username']);
$family_id=htmlspecialchars($r['family_id']);
$birthday=htmlspecialchars($r['birthday']);
}
}
?>