<?php
require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/config/session.php";
$stmt = $pdo->prepare("SELECT * FROM family");
    $stmt->execute();
    $results = $stmt->fetchAll();
    if (isset($_POST["ajax"])) { echo json_encode($results); }
$count=count($results) + 1;
$name = $_POST["name"];
$stmt = $pdo->prepare("INSERT INTO family(family_id,name) VALUES (?, ?)");
$stmt->execute(["$count", "$name"]);
$stmt = $pdo->prepare("UPDATE user set family_id = ? where user_id = ?");
$stmt->execute(["$count", "$id"]);
echo "<script>alert('Family successfully created!'); window.location='/PEM/PEM_LAST/app/family'</script>";
?>