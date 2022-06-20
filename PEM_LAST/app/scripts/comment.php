<?php
require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/config/session.php";
	if (isset($_POST['post_comment']))
	{
		$user=$_SESSION['user_id'];
		$content_comment=htmlspecialchars($_POST['content_comment']);
		$post_id=$_POST['post_id'];
		$user_id=$_POST['user_id'];
		$url=$_POST['url'];
		$time=time();
		{
            $stmt = $pdo->prepare("SELECT * FROM comments");
            $stmt->execute();
            $results = $stmt->fetchAll();
            if (isset($_POST["ajax"])) { echo json_encode($results); }
			$count = count($results);
            $stmt = $pdo->prepare("INSERT INTO comments (comment_id,post_id,user_id,name,content_comment,image,created)
			VALUES (?,?,?,?,?,?,?)");
            $stmt->execute(["$count", "$post_id", "$id", "$user_id", "$content_comment", "$profile_picture", "$time"]);
			$line = "<script>window.location='".$url."'</script>";
			echo $line;
		}
			
	}
	
?>