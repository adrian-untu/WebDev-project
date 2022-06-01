<?php
function time_stamp($session_time) 
{ 
 
$time_difference = time() - $session_time ; 
$seconds = $time_difference ; 
$minutes = round($time_difference / 60 );
$hours = round($time_difference / 3600 ); 
$days = round($time_difference / 86400 ); 
$weeks = round($time_difference / 604800 ); 
$months = round($time_difference / 2419200 ); 
$years = round($time_difference / 29030400 ); 

if($seconds <= 60)
{
echo"$seconds seconds ago"; 
}
else if($minutes <=60)
{
   if($minutes==1)
   {
     echo"one minute ago"; 
    }
   else
   {
   echo"$minutes minutes ago"; 
   }
}
else if($hours <=24)
{
   if($hours==1)
   {
   echo"one hour ago";
   }
  else
  {
  echo"$hours hours ago";
  }
}
else if($days <=7)
{
  if($days==1)
   {
   echo"one day ago";
   }
  else
  {
  echo"$days days ago";
  }


  
}
else if($weeks <=4)
{
  if($weeks==1)
   {
   echo"one week ago";
   }
  else
  {
  echo"$weeks weeks ago";
  }
 }
else if($months <=12)
{
   if($months==1)
   {
   echo"one month ago";
   }
  else
  {
  echo"$months months ago";
  }
 
   
}

else
{
if($years==1)
   {
   echo"one year ago";
   }
  else
  {
  echo"$years years ago";
  }

}
 
} 
?>
<?php  
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
             $url = "https://";   
        else  
             $url = "http://";   
        $url.= $_SERVER['HTTP_HOST'];   
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
    <title>My profile</title>
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
      $result=mysqli_query($con,"SELECT * FROM user where user_id='$id' ");
      while($test = mysqli_fetch_array($result))
      {
        $id = $test['user_id'];
        echo "<div class='card'>";
        echo "<div class='image'>";
        echo " <a href='updatephoto.php' title='Change Profile Picture'><img src='".$test['profile_picture']. "' alt='Profile' class='profile'/></a>";
        echo "</div>";
        echo "<div class='details'>";
        echo "<h2 class=''>".$test['firstname']."  " .$test['lastname']." (".$test['username'].")</h2>";
        echo "<h2 class=''> Birthday: ".$test['birthday']."</h2>";
        echo " <a href ='edit_profile.php?user_id=".$test['user_id']."'><button>Edit Profile</button></a>";
        echo "</div>";
        echo "</div>";
      }
      
      ?>
			<h1>Update Status</h1>
	<div>
			<form method="post" action="post.php" enctype="multipart/form-data">
				<textarea placeholder="Whats on your mind?" name="content" class="post-text" required></textarea>
				<input type="file" name="image">
				<button class="btn-share" name="Submit" value="Log out">Share</button>
			</form>
	</div>
    <?php
	include("includes/database.php");
			$query=mySQLi_query($con,"SELECT * from user where user_id='$id' order by user_id DESC");
			while($row=mySQLi_fetch_array($query)){
				$id = $row['user_id'];
?>	
<?php
}
?>
    <?php
	include("includes/database.php");
			$line = "SELECT * from posts LEFT JOIN user on user.user_id = posts.user_id where user.user_id = ".$id." order by created DESC";
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
      <h1><?php if($privacy=='1') echo 'PRIVATE';
      else echo 'PUBLIC';?></h1>
			</div>
		<br />
			<div class="post-content">
				<div class="delete-post">
				<a href="delete_post.php<?php echo '?id='.$post_id; ?>" title="Delete your post"><button class="btn-delete">Delete post</button></a>
				<a href="edit_privacy.php<?php echo '?id='.$post_id; ?>" title="Delete your post"><button class="btn-delete">Change privacy</button></a>
				</div>
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
			
      <a href="share_post.php" title="Share to Facebook"><button class="fa fa-facebook"></button></a>
      <h1>Share to Facebook</h1>
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
  </div>
  </body>
</html>
