<?php
require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/config/database.php";
$get_id =htmlspecialchars($_GET['id']);
$url=$_POST['url'];
$stmt = $pdo->prepare("DELETE FROM comments WHERE comment_id = ? ");
$stmt->execute(["$get_id"]);
$line = "<script>window.location='".$url."'</script>";
echo $line;
?>
