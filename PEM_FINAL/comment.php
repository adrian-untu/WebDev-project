<?php include ('session.php');?>
<?php
	include ('includes/database.php');
	
	if (isset($_POST['post_comment']))
	{
		$user=$_SESSION['id'];
		$content_comment=$_POST['content_comment'];
		$post_id=$_POST['post_id'];
		$user_id=$_POST['user_id'];
		$url=$_POST['url'];
		$time=time();
		

		{
			$sql1=mySQLi_query($con,"select * from comments");
			$count = mySQLi_num_rows($sql1) + 1;
			mySQLi_query($con,"INSERT INTO comments (comment_id,post_id,user_id,name,content_comment,image,created)
			VALUES ('$count','$post_id','$id','$user_id','$content_comment','$profile_picture',$time)");
			$line = "<script>window.location='".$url."'</script>";
			echo $line;
		}
			
	}
	
?>