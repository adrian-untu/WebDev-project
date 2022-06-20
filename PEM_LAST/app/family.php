<?php require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/config/session.php"; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="css/family.css" type="text/css" />
    <title>My family</title>
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
      <?php
      if($family_id!=0){
      require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/scripts/select_family_1.php";
      if (count($results) > 0) { foreach ($results as $r) {
        ?>
        <section><div class='card'>
        <div class='details'>
        <div class='familyname'><?php echo $r['name']." "?>Family</div><br/>
        <a href='add_pet' class='users__cta'>Add pet to family</a>
        <a href='add_user' class='users__cta'>Add user to family</a>
        <a href='scripts/leave_family' class='users__cta'>Leave family</a>
        <a href='delete_pet' class='users__cta'>Delete pet from family</a>
        </div>
        </div></section>
        <h2>Members:</h2>
        <?php
        }
      }
      require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/scripts/select_family_2.php";
      if (count($results) > 0) { foreach ($results as $r) {
    ?>
    <article><div class='users'>
    <div class='users__img'>
      <img src="<?php echo $r['profile_picture'];?>" alt='' />
    </div>
    <div class='users__info'>
      <h1 class='users__title'><?php echo $r["firstname"]." ".$r["lastname"];?></h1>
      <a href='other_profile?id=<?php echo $r['user_id'];?>' class='users__cta'
        >View profile</a
      >
    </div>
  </div></article>
  <?php
      
  }
?>
<br/><br/>
<h2>Pets:</h2>
<?php
require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/scripts/select_family_3.php";
if (count($results) > 0) { foreach ($results as $r) {
    ?>
    <article><div class='users'>
    <div class='users__img'>
      <img src='<?php echo $r['profile_picture_pet'];?>' alt='' />
    </div>
    <div class='users__info'>
      <h1 class='users__title'><?php echo $r["name"];?></h1>
      <a href='petprofile?id=<?php echo $r['pet_id']?>' class='users__cta'>View profile</a>
    </div>
  </div></article>
  <?php
  }
}
}
}
else echo "<a href='create_family' class='users__cta'>Create family</a>";
?>
<footer>
	<h1>©Website done by Badarau Dragos and Untu George Adrian, est. 2022</h1>
</footer>
</div>
      </div>
    </div>
  </body>
</html>