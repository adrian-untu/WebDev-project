<?php 
require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/config/session.php";
$stmt = $pdo->prepare("SELECT * FROM user where family_id = ? ");
$stmt->execute(["$family_id"]);
$results = $stmt->fetchAll();
if (isset($_POST["ajax"])) { echo json_encode($results); }
    if(count($results)>1){
        $stmt = $pdo->prepare("UPDATE user SET family_id = '0' WHERE user_id = ?");
        $stmt->execute(["$id"]);
        $stmt = $pdo->prepare("DELETE FROM posts WHERE user_id = ? ");
        $stmt->execute(["$id"]);
	echo "<script>alert('Left family!'); window.location=' /PEM/PEM_LAST/app/profile.php'</script>";
    }
    else
    {
        $stmt = $pdo->prepare("DELETE FROM family where family_id = ?");
        $stmt->execute(["$family_id"]);
        $stmt = $pdo->prepare("UPDATE user SET family_id = '0' WHERE user_id = ?");
        $stmt->execute(["$id"]);
        $stmt = $pdo->prepare("DELETE FROM posts WHERE user_id = ?");
        $stmt->execute(["$id"]);
        $stmt = $pdo->prepare("DELETE FROM pets WHERE family_id = ?");
        $stmt->execute(["$family_id"]);
        echo "<script>alert('Left family and family deleted!'); window.location=' /PEM/PEM_LAST/app/profile'</script>";
    }
?>