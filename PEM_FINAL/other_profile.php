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
    
    <link rel="stylesheet" href="css/profilestyle.css" />
    <link rel="icon" href="img/logo.png" type="image/icon" />
    <title>Profile</title>
</head>
  <body>
  <?php include ('session.php');?>
    <div class="header">
      <nav>
        <img src="img/logo.png" class="logo" alt="" />
        <ul class="nav-links">
          <li>
            <a href="home.php">Home Pet Posts</a>
          </li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="profile.php">My profile</a></li>
          <li><a href="family.php">My family</a></li>
          <li>
            <a href="logout.php" class="logout"
              >Log out</a
            >
          </li>
        </ul>
      </nav>
      <?php
      if(preg_match_all('/\d+/', $url, $numbers))
      $id1 = end($numbers[0]);
      $id2 = $row['user_id'];
      $result=mysqli_query($con,"SELECT * FROM user where user_id='$id1' ");
      while($test = mysqli_fetch_array($result))
      {
        $id = $test['user_id'];
        echo "<div class='card'>";
        echo "<div class='image'>";
        echo "<img src='".$test['profile_picture']. "' alt='Profile' class='profile'/>";
        echo "</div>";
        echo "<div class='details'>";
        echo "<h2 class=''>".$test['firstname']."  " .$test['lastname']." (".$test['username'].")</h2>";
        echo "<h2 class=''> Birthday: ".$test['birthday']."</h2>";
        echo "</div>";
        echo "</div>";
      }
      
      ?>
    <?php
	include("includes/database.php");
			$line = "SELECT * from posts LEFT JOIN user on user.user_id = posts.user_id where user.user_id = ".$id." and posts.private=0 order by created DESC";
			$query=mySQLi_query($con,$line);
			while($row=mySQLi_fetch_array($query)){
				$posted_by = $row['firstname']." ".$row['lastname'];
				$location = $row['post'];
				$profile_picture = $row['profile_picture'];
				$content=$row['content']; 
				$post_id = $row['post_id'];
				$time=$row['created'];
                $privacy=$row['private'];
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
			if($file_extension =="mp4")
			{
			echo "<video controls> <source src='".$location."' type='video/mp4'> Your browser does not support the video tag. </video>";
			}
			else
			echo "<img src='".$location."'>"
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
		<div class="user-comment-name"><img src="<?php echo $row['image']; ?>">&nbsp;&nbsp;&nbsp;<?php echo $row['name']; ?><b class="time-comment"><?php echo $time = time_stamp($time); ?></b></div>
		<div class="comment"><?php echo $row['content_comment']; ?></div>
	
	</div>
	<br />

<?php
}
?>
		
		 <form  method="POST" action="comment.php">			
			<div class="comment-area">
			
						<?php $image=mysqli_query($con,"select * from user where user_id='$id2'");
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
  </div>
  </body>
</html>
