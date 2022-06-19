<?php
include ('time_stamp.php');   
$post_id = $_REQUEST["id"];
include('includes/database.php');
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0,initial-scale=1.0"
    />
    <link rel="stylesheet" href="css/homestyle.css" />
    <link rel="icon" href="img/logo.png" type="image/icon" />
    <title>View Post</title>
</head>
<body>
    <div class="header">
      <nav class="up">
        <img src="img/logo.png" class="logo" alt="" />
        <ul class="nav-links">
		  <li> 
			  <form method="post" action="users.php">
  			<input type="text"
			  class="search-bar" name="search" required/>
  			<input type="submit" class="btn-search" value="Search"/>
				</form>
			</li>
			<div class="links">
            <li><a href="home.php">Home Pet Posts</a></li>
			<li><a href="firstaid.php">First Aid</a></li>
          	<li><a href="profile.php">My profile</a></li>
		  	<li><a href="family.php">Family</a></li>
          	<li><a href="logout.php" class="logout">Log out</a></li>
</div>
        </ul>
      </nav>
	  <article>
      <?php
			$line = "SELECT * from posts LEFT JOIN user on user.user_id = posts.user_id where posts.post_id = $post_id";
			$query=mySQLi_query($con,$line);
			while($row=mySQLi_fetch_array($query)){
				$posted_by = $row['firstname']." ".$row['lastname'];
				$location = $row['post'];
				$profile_picture = $row['profile_picture'];
				$content=$row['content']; 
				$post_id = $row['post_id'];
				$time=$row['created'];	
?>
		<div id="right-nav1">
			<div class="profile-pics">
			<img src="<?php echo $profile_picture ?>">
			<b><?php echo $posted_by ?></b>
			<strong><?php echo $time = time_stamp($time); ?></strong>
			</div>
		<br />
			<div class="post-content">
			<p><?php echo $row['content']; ?></p>
		<center>
			<?php
			$fileEnd = explode(".",$location);
			$file_extension = end($fileEnd);
			if($file_extension =="mp4" || $file_extension =="webm")
			{
			echo "<video controls> <source src='".$location."' type='video/".$file_extension."'> Your browser does not support the video tag. </video>";
			}
			else if ($file_extension =="mp3" || $file_extension =="ogg" || $file_extension =="wav" )
			{ echo "<audio controls> <source src='".$location."' type='audio/".$file_extension."'> Your browser does not support the audio tag. </audio>";
			}
			else
			echo "<img src='".$location."'>";
			?>
			
		</center>

<?php
	include("includes/database.php");
	$comment=mySQLi_query($con,"SELECT * from comments where post_id='$post_id' order by post_id DESC");
	while($row=mySQLi_fetch_array($comment)){
	$comment_id=$row['comment_id'];
	$content_comment=$row['content_comment'];
		$time=$row['created'];	
	$post_id=$row['post_id'];
	$user=$_SESSION['user_id'];
	$posted_by=$row['user_id'];
	?>
	<div class="comment-display"<?php echo $comment_id ?>>
	<?php
	if($posted_by==$user)
	{

?>			
	
			<div class="delete-post">
			<form  method="POST" action="delete_comment.php<?php echo '?id='.$comment_id; ?>">
            	<input type="hidden" name="url" value="<?php echo $url ?>">	
				<input type="submit" title="Delete Comment" name="delete_comment" value="Delete" class="btn-delete">
            </form>
			</div>
			<?php } ?>
		<div class="user-comment-name"><img src="<?php echo $row['image']; ?>"><?php echo $row['name']; ?><b class="time-comment"><?php echo $time = time_stamp($time); ?></b></div>
		<div class="comment"><?php echo $row['content_comment']; ?></div>
	
	</div>
	<br />

<?php
}
?>
			

		 <form  method="POST" action="comment.php">			
			<div class="comment-area">
			
						<?php $image=mysqli_query($con,"select * from user where user_id='$id'");
							while($row=mysqli_fetch_array($image)){
							

							?>
						<img src="<?php echo $row['profile_picture']; ?>" width="50" height="50">
						<?php } ?>
			
						<input type="text" name="content_comment" placeholder="Write a comment..." class="comment-text">
			<input type="hidden" name="post_id" value="<?php echo $post_id ?>">
			<input type="hidden" name="user_id" value="<?php echo $firstname . ' ' . $lastname  ?>">
			<input type="hidden" name="image" value="<?php echo $profile_picture  ?>">
			<input type="hidden" name="url" value="<?php echo $url ?>">
			<input type="submit" name="post_comment" value="Enter" class="btn-comment">
			
			</div>
		</form>

              </div>
		</div>
	<?php
	}
	?>
	</article>
	<footer>
	<h1>©Website done by Badarau Dragos and Untu George Adrian, est. 2022</h1>
</footer>
</div>
</body>

</html>