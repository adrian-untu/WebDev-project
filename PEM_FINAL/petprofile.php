
<?php
include ('time_stamp.php'); 
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
             $url = "https://";   
        else  
             $url = "http://";   
        // Append the host(domain name, ip) to the URL.   
        $url.= $_SERVER['HTTP_HOST'];   
        
        // Append the requested resource location to the URL   
        $url.= $_SERVER['REQUEST_URI'];    
        if(preg_match_all('/\d+/', $url, $numbers))
        $id_pet = end($numbers[0]);
      ?>   
<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">
<meta name = "viewport" content = "width=device-width">
<link rel="stylesheet" href="css/profilestyle.css" type="text/css">
<title>Pet profile</title>
<link rel="icon" href="img/logo.png" type="image/icon" >
</head>
<body>
<?php include ('session.php');?>

    <div class="header">
      <nav class="up">
        <img src="img/logo.png" class="logo" alt="" />
        <ul class="nav-links">
			<div class="links">
			<li><a href="home.php">Home Pet Posts</a></li>
			<li><a href="firstaid.php">First Aid</a></li>
          	<li><a href="profile.php">My profile</a></li>
		  	<li><a href="family.php">Family</a></li>
          	<li><a href="logout.php" class="logout">Log out</a></li>
</div>
        </ul>
      </nav>
<?php 
$result=mysqli_query($con,"SELECT * FROM pets where pet_id='$id_pet' and family_id = $family_id");
      while($test = mysqli_fetch_array($result))
      {
        echo "<section><div class='card'>";
        echo "<div class='image'>";
        echo " <a href='updatepetphoto.php?pet_id=".$test['pet_id']."' title='Change Profile Picture'><img src='".$test['profile_picture_pet']. "' alt='Profile' class='profile'/></a>";
        echo "</div>";
        echo "<div class='details'>";
        echo "<h2 class=''>".$test['name']."</h2><br />";
        echo "<h2 class=''> Birthday: ".$test['birthday']."</h2><br />";
        echo "<h2 class=''> Restrictions: ".$test['restrictions']."</h2><br />";
		echo "<h2 class=''> Food planning: </h2>";
		echo "<h2 class=''> Monday: ".$test['monday']."</h2>";
		echo "<h2 class=''> Tuesday: ".$test['tuesday']."</h2>";
		echo "<h2 class=''> Wednesday: ".$test['wednesday']."</h2>";
		echo "<h2 class=''> Thursday: ".$test['thursday']."</h2>";
		echo "<h2 class=''> Friday: ".$test['friday']."</h2>";
		echo "<h2 class=''> Saturday: ".$test['saturday']."</h2>";
		echo "<h2 class=''> Sunday: ".$test['sunday']."</h2>";
		echo "<a href ='edit_pet_profile.php?pet_id=".$test['pet_id']."'><button>Edit Profile</button></a>";
        echo "</div>";
        echo "</div></section>";
		echo "<section><a href='view_medical_history.php?pet=".$test['pet_id']."' class='users__cta'>View medical history</a>
		<a href='view_friends.php?pet=".$test['pet_id']."' class='users__cta'>View friends</a>
		<a href='add_friends.php?pet=".$test['pet_id']."' class='users__cta'>Add friends</a></section>";
		echo "<section><div id='right-nav'>
		<h1>Update Status</h1>
<div>
		<form method='post' action='post.php' enctype='multipart/form-data'>
			<textarea placeholder='Whats on your mind?' name='content' class='post-text' required></textarea>
			<input type='file' name='image'>
			<input type='hidden' name='url' value='$url'>
			<button class='btn-share' name='Submit' value='Share'>Share</button>
		</form>
</div></section>";
      }
$result=mysqli_query($con,"SELECT * FROM posts LEFT JOIN user on user.user_id = posts.user_id where posts.pet_id='$id_pet' and posts.family_id = '$family_id' order by created desc");
			while($row=mySQLi_fetch_array($result)){
				$posted_by = $row['firstname']." ".$row['lastname'];
				$location = $row['post'];
				$profile_picture = $row['profile_picture'];
				$content=$row['content']; 
				$post_id = $row['post_id'];
				$time=$row['created'];	
?>
<article>
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
	
?>			
	<div class="comment-display"<?php echo $comment_id ?>>
			<div class="delete-post">
			<form  method="POST" action="delete_comment.php<?php echo '?id='.$comment_id; ?>">
            	<input type="hidden" name="url" value="<?php echo $url ?>">	
				<input type="submit" title="Delete Comment" name="delete_comment" class="btn-delete">
            </form>
			</div>
		<div class="user-comment-name"><img src="<?php echo $row['image']; ?>">&nbsp;&nbsp;&nbsp;<?php echo $row['name']; ?><b class="time-comment"><?php echo $time = time_stamp($time); ?></b></div>
		<div class="comment"><?php echo $row['content_comment']; ?></div>
	
	</div>
	<br />

<?php
}
?>
			<a onClick="window.open('https://facebook.com/sharer/sharer.php?&u=<?php echo "https://public.petsmartmanager.com/certain_post.php?id=$post_id"; ?>','sharer','toolbar=0,status=0,width=1920,height=1080');" href="javascript: void(0)">Share on Facebook</a>
      <a onClick="window.open('http://twitter.com/intent/tweet?text=<?php echo $content?> &url=<?php echo "https://public.petsmartmanager.com/certain_post.php?id=$post_id"; ?>','sharer','toolbar=0,status=0,width=1920,height=1080');" href="javascript: void(0)">Share on Twitter</a>
      <a onClick="window.open('https://www.linkedin.com/shareArticle?mini=true&url=<?php echo "https://public.petsmartmanager.com/certain_post.php?id=$post_id"; ?>','sharer','toolbar=0,status=0,width=1920,height=1080');" href="javascript: void(0)" >Share on LinkedIn</a>

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
		</article>
	<?php
	}
	?>
	<footer>
	<h1>©Website done by Badarau Dragos and Untu George Adrian, est. 2022</h1>
</footer>
</div>
</div>
</body>
</html>