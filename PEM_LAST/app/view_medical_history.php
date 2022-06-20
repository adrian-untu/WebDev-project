<?php require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/scripts/time_stamp.php";
require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/config/session.php"; 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="css/medicalhistory.css" type="text/css" />
    <title>Medical History</title>
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
      
      $id_pet = htmlspecialchars($_GET['pet']);
      echo "<a href='add_new_entry?pet=".$id_pet."' class='users__cta'>Add new entry</a>";
  require "scripts/view_medical_history_script.php";
  if (count($results) > 0) { foreach ($results as $r) {
    ?>
  <section><div class='card'>
  <div class='image'>
  <img src='<?php echo $r['profile_picture_pet']?>' alt='Profile' class='profile'/>
  </div>
  <div class='details'>
  <h2 class=''><?php echo $r['name']?></h2> <br/>
  <h2 class=''><?php echo $r['date']?></h2>
<br />
  <h2 class=''> Entry: <?php echo $r["entry"]?></h2>
  </div>
  <a href='scripts/delete_entry.php?created=<?php echo $r["created"]?>&pet_id=<?php echo $id_pet?>' class='users__cta'>Delete entry</a>
  </div></section>
  <?php
  }} else { echo "No results found"; }
?>
<footer>
<h1>©Website done by Badarau Dragos and Untu George Adrian, est. 2022</h1>
</footer>
</div>
      </div>
    </div>
  </body>
</html>