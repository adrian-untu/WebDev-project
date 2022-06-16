<?php include ('session.php');?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="css/homestyle.css" type="text/css" />
    <title>My family</title>
    <link rel="icon" href="img/logo.png" type="image/icon" />
  </head>
  <body>
    <div class="header">
      <nav>
        <img src="img/logo.png" class="logo" alt="" />
        <ul class="nav-links">
          <li>
            <a href="home.php">Home Pet Posts</a>
          </li>
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
      $result=mysqli_query($con,"SELECT * FROM family where family_id='$family_id' ");
      while($test = mysqli_fetch_array($result))
      {
        echo "<div class='card'>";
        echo "<div class='details'>";
        echo "<h2>Familia ".$test['name']."</h2><br/>";
        echo "<h2>Membrii:</h2>";
        echo "</div>";
        echo "</div>";
      }
      
      ?>
      <?php
$result=mysqli_query($con,"SELECT * FROM user where family_id='$family_id' ");
while($r=mySQLi_fetch_array($result)) {
    echo"<div class='users'>
    <div class='users__img'>
      <img src='".$r['profile_picture']."' alt='' />
    </div>
    <div class='users__info'>
      <h1 class='users__title'>".$r["firstname"]." ".$r["lastname"]."</h1>
      <a href='other_profile.php?id=".$r['user_id']."' class='users__cta'
        >View profile</a
      >
    </div>
  </div>";
  }
?>
      </div>
    </div>
  </body>
</html>