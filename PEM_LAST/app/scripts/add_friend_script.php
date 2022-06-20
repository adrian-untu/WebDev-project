<?php 
require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/config/session.php"; 
    $friend1 = $_REQUEST['origin'];
    $friend2 = $_REQUEST['id'];
    $stmt = $pdo->prepare("INSERT INTO friends (friend1,friend2) VALUES (?, ?)");
    $stmt->execute(["$friend1", "$friend2"]);
	echo "<script>alert('Friendship successfully added!'); window.location='/PEM/PEM_LAST/app/petprofile?id=$friend1'</script>";
    ?>