<?php require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/config/session.php"; ?>
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
  require "scripts/search_pets.php";
  if (count($results) > 0) { foreach ($results as $r) {
    ?>
    <article><div class='users'>
    <div class='users__img'>
      <img src='<?php echo $r["profile_picture_pet"];?>' alt='' />
    </div>
    <div class='users__info'>
      <h1 class='users__title'><?php echo $r["name"];?></h1>
      <a href='scripts/delete_pet_script.php?id=<?php echo $r['pet_id']?>' class='users__cta'
        >Delete pet</a
      >
    </div>
  </div></article>
  <?php
  }} else { echo "No results found"; }
?>
      </div>
      
	<footer>
	<h1>©Website done by Badarau Dragos and Untu George Adrian, est. 2022</h1>
</footer>
</div>
    </div>
  </body>
</html>