<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd"> 
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
    <title>Home Pet Posts</title>
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
        echo "<div class = 'pet-posts'>";
        echo "<div class='pet-posts__img'>";
        echo "<img src='upload/Loki2.jpg' alt='' />";
        echo "</div>";
        echo "<div class='pet-posts__info'>";
        echo "<div class='pet-posts__date'>";
        echo "<span>Friday</span>";
        echo "<span>October 8th 2021</span>";
        echo "</div>";
        echo "<h1 class='pet-posts__title'>Loki</h1>";
        echo "<p class='pet-posts__text'>He is Loki at about 3 months and he likes football</p>";
        echo "<a href='petprofile.php' class='pet-posts__cta'>Read More about him</a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
      
      ?>
  </body>
</html>
