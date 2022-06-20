<?php require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/config/session.php"; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="css/family.css" type="text/css" />
    <title>Search Results</title>
    <link rel="icon" href="img/logo.png" type="image/icon" />
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
      <div class="text">
      <?php
if (isset($_POST["search"])) {
    require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/scripts/search.php"; 
  if (count($results) > 0) { foreach ($results as $r) {
    ?>
    <section><div class='users'>
    <div class='users__img'>
      <img src="<?php echo $r['profile_picture'];?>" alt='' />
    </div>
    <div class='users__info'>
      <h1 class='users__title'><?php echo $r["firstname"]." ".$r["lastname"]?></h1>
      <a href="other_profile?id=<?php echo $r['user_id']?>" class='users__cta'>Read More</a>
    </div>
  </div></section>
  <?php
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