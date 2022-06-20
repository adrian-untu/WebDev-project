<?php
require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/scripts/time_stamp.php";
require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/config/session.php"; 
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
    <title>My Profile</title>
</head>
  <body>
    <div class="header">
      <nav>
        <img src="img/logo.png" class="logo" alt="" />
        <ul class="nav-links">
            <li><a href="home">Home Pet Posts</a></li>
			<li><a href="firstaid">First Aid</a></li>
          	<li><a href="profile">My profile</a></li>
		  	<li><a href="family">Family</a></li>
          	<li><a href="logout" class="logout">Log out</a></li>
        </ul>
      </nav>
      <?php
      require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/scripts/select_home_posts_2.php";
      if (count($results) > 0) { foreach ($results as $r) {
        $id = $r['user_id'];
        ?>
        <section><div class='card'>
        <div class='image'>
        <a href="updatephoto" title='Change Profile Picture'><img src="<?php echo $r['profile_picture']?>" alt="Profile" class="profile"/></a>
        </div>
        <div class='details'>
        <h2 class=''><?php echo $r['firstname']."  ".$r['lastname']." (".$r['username'].")";?></h2>
        <h2 class=''> Birthday: <?php echo $r['birthday'];?></h2>
        <a href ="edit_profile"><button>Edit Profile</button></a>
        </div>
        </div></section>
        <?php
      }
      }
    else echo "No result found";
    require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/scripts/select_profile_1.php";
    if (count($results) > 0) { foreach ($results as $r) {
        $posted_by = $r['firstname']." ".$r['lastname'];
        $location = $r['post'];
        $profile_picture = $r['profile_picture'];
        $content=$r['content']; 
        $post_id = $r['post_id'];
        $time=$r['created'];
        $privacy=$r['private'];
?>
<article>
		<div id="right-nav1">
			<div class="profile-pics">
			<img src="<?php echo $profile_picture ?>">
			<b><?php echo $posted_by ?></b>
			<strong><?php echo $time = time_stamp($time); ?></strong>
      <h1><?php if($privacy=='1') echo 'PRIVATE';
      else if($privacy=='2') echo 'ONLY FAMILY';
      else echo 'PUBLIC';?></h1>
			</div>
		<br />
			<div class="post-content">
				<div class="delete-post">
				<a href="scripts/delete_post.php?id=<?php echo $post_id; ?>" title="Delete your post"><button class="btn-delete">Delete post</button></a>
				<a href="scripts/edit_privacy.php?id=<?php echo $post_id; ?>" title="Change privacy"><button class="btn-delete">Change privacy</button></a>
				</div>
			<p><?php echo $r['content']; ?></p>
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
	$stmt = $pdo->prepare("SELECT * from comments where post_id = ? order by post_id DESC");
    $stmt->execute(["$post_id"]);
    $results = $stmt->fetchAll();
    if (isset($_POST["ajax"])) { echo json_encode($results); }
	if (count($results) > 0) { foreach ($results as $r) {
	$comment_id=$r['comment_id'];
	$content_comment=$r['content_comment'];
	$time=$r['created'];	
	$post_id=$r['post_id'];
	$user=$_SESSION['user_id'];
	$posted_by=$r['user_id'];
    $image=$r['image'];
    $name=$r['name'];
	?>
	<div class="comment-display"<?php echo $comment_id ?>>
	<?php
	if($posted_by==$user)
	{
?>			
			<div class="delete-post">
			<form  method="POST" action="scripts/delete_comment.php<?php echo '?id='.$comment_id; ?>">
            	<input type="hidden" name="url" value="<?php echo $url ?>">	
				<input type="submit" title="Delete Comment" name="delete_comment" value="Delete" class="btn-delete">
            </form>
			</div>
			<?php } ?>
            <div class="user-comment-name"><img src="<?php echo $image; ?>"><?php echo $name; ?><b class="time-comment"><?php echo time_stamp($time); ?></b></div>
		<div class="comment"><?php echo $content_comment; ?></div>
	
	</div>
	<br />
<?php
}
    }
?>
        <a onClick="window.open('https://facebook.com/sharer/sharer.php?&u=<?php echo "https://public.petsmartmanager.com/certain_post?id=$post_id"; ?>','sharer','toolbar=0,status=0,width=1920,height=1080');" href="javascript: void(0)">Share on Facebook</a>
        <a onClick="window.open('http://twitter.com/intent/tweet?text=<?php echo $content?> &url=<?php echo "https://public.petsmartmanager.com/certain_post?id=$post_id"; ?>','sharer','toolbar=0,status=0,width=1920,height=1080');" href="javascript: void(0)">Share on Twitter</a>
        <a onClick="window.open('https://www.linkedin.com/shareArticle?mini=true&url=<?php echo "https://public.petsmartmanager.com/certain_post?id=$post_id"; ?>','sharer','toolbar=0,status=0,width=1920,height=1080');" href="javascript: void(0)" >Share on LinkedIn</a>
		<form  method="POST" action="scripts/comment.php">			
			<div class="comment-area">
			<?php   require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/scripts/select_home_posts_2.php";
                    if (count($results) > 0) { foreach ($results as $r) {
                        $profile_picture_user = $r['profile_picture'];
                    
                        ?>
						<img src="<?php echo $profile_picture_user; ?>" width="50" height="50">
                        <?php } }?>
			
			<input type="text" name="content_comment" placeholder="Write a comment..." class="comment-text" required>
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
}
	?>
	
	<footer>
	<h1>©Website done by Badarau Dragos and Untu George Adrian, est. 2022</h1>
</footer>
</div>
  </div>
  </body>
</html>
