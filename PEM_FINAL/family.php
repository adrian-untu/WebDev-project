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
          <li><a href="firstaid.php">First Aid</a></li>
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
      if($family_id!=0){
      $result=mysqli_query($con,"SELECT * FROM family where family_id='$family_id' ");
      while($test = mysqli_fetch_array($result))
      {
        echo "<div class='card'>";
        echo "<div class='details'>";
        echo "<div class='familyname'>".$test['name']." Family</div><br/>";
        echo "<a href='add_pet.php?family_id=$family_id' class='users__cta'>Add pet to family</a>
        <a href='add_user.php?family_id=$family_id' class='users__cta'>Add user to family</a>
        <a href='leave_family.php' class='users__cta'>Leave family</a>
        <a href='delete_pet.php' class='users__cta'>Delete pet from family</a>";
        echo "<h2>Members:</h2>";
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
<br/><br/>
<h2>Pets:</h2>
<?php
$result=mysqli_query($con,"SELECT * FROM pets where family_id='$family_id' ");
while($r=mySQLi_fetch_array($result)) {
    echo"<div class='users'>
    <div class='users__img'>
      <img src='".$r['profile_picture_pet']."' alt='' />
    </div>
    <div class='users__info'>
      <h1 class='users__title'>".$r["name"]."</h1>
      <a href='petprofile.php?id=".$r['pet_id']."' class='users__cta'
        >View profile</a
      >
    </div>
  </div>";
  }
}
else echo "<a href='create_family.php' class='users__cta'>Create family</a>";
?>
      </div>
    </div>
  </body>
</html>