<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="css/homestyle.css" type="text/css" />
    <title>Delete pet</title>
    <link rel="icon" href="img/logo.png" type="image/icon" />
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
      <div class="text">
      <?php
  require "search_pets.php";
  if (count($results) > 0) { foreach ($results as $r) {
    echo("<div class='users'>
    <div class='users__img'>
      <img src='".$r["profile_picture_pet"]."' alt='' />
    </div>
    <div class='users__info'>
      <h1 class='users__title'>".$r["name"]."</h1>
      <a href='delete_pet_script.php?id=".$r['pet_id']."' class='users__cta'
        >Delete pet</a
      >
    </div>
  </div>");
  }} else { echo "No results found"; }
?>
      </div>
    </div>
  </body>
</html>