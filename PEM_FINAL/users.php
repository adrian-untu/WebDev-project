<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="css/family.css" type="text/css" />
    <title>About</title>
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
      <div class="text">
      <?php
if (isset($_POST["search"])) {
  require "search.php";
  if (count($results) > 0) { foreach ($results as $r) {
    echo("<section><div class='users'>
    <div class='users__img'>
      <img src='".$r['profile_picture']."' alt='' />
    </div>
    <div class='users__info'>
      <h1 class='users__title'>".$r["firstname"]." ".$r["lastname"]."</h1>
      <a href='other_profile.php?id=".$r['user_id']."' class='users__cta'
        >Read More about him</a
      >
    </div>
  </div></section>");
  }} else { echo "No results found"; }
}
?>
      </div>
	<footer>
	<h1>©Website done by Badarau Dragos and Untu George Adrian, est. 2022</h1>
</footer>
</div>
    </div>
  </body>
</html>