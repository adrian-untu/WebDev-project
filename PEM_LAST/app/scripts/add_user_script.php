<?php 
require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/config/session.php";
    $id_new = htmlspecialchars($_GET['id']);
    $stmt = $pdo->prepare("UPDATE user SET family_id = ? WHERE user_id = ?");
    $stmt->execute(["$family_id", "$id_new"]);
	echo "<script>alert('User successfully added!'); window.location=' /PEM/PEM_LAST/app/family'</script>";
    ?>