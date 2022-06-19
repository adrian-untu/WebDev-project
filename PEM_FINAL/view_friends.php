<?php include ('session.php');?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="css/homestyle.css" type="text/css" />
    <title>Pet friends</title>
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
      <div class = "nav-links">
</div>
<?php
$get_id = $_REQUEST['pet'];
$result=mysqli_query($con,"SELECT * FROM pets join friends on (friends.friend2 = pets.pet_id or friends.friend1 = pets.pet_id) where (friends.friend1 = $get_id or friends.friend2 = $get_id) and pets.pet_id != $get_id");
if(mySQLi_num_rows($result) > 0 )
while($r=mySQLi_fetch_array($result)) {
    echo"<section><div class='users'>
    <div class='users__img'>
      <img src='".$r['profile_picture_pet']."' alt='' />
    </div>
    <div class='users__info'>
      <h1 class='users__title'>".$r["name"]."</h1>
      <a href='friendprofile.php?id=".$r['pet_id']."' class='users__cta'>View profile</a>
      <a href='delete_friendship.php?origin=".$get_id."&id=".$r['pet_id']."' class='users__cta'>Delete friendship</a>
    </div>
  </div></section>";
  }
else echo "No results found";
?>
      </div>
    </div>
  </body>
</html>