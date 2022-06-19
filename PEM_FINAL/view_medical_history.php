<?php include ('time_stamp.php'); ?>
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
      if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
      $url = "https://";   
 else  
      $url = "http://";   
 $url.= $_SERVER['HTTP_HOST'];   
 $url.= $_SERVER['REQUEST_URI'];  
      if(preg_match_all('/\d+/', $url, $numbers))
      $id_pet = end($numbers[0]);
      echo "<a href='add_new_entry.php?pet=".$id_pet."' class='users__cta'>Add new entry</a>";
  require "view_medical_history_script.php";
  if (count($results) > 0) { foreach ($results as $r) {
    echo(
  "<section><div class='card'>
  <div class='image'>
  <img src='".$r['profile_picture_pet']. "' alt='Profile' class='profile'/>
  </div>
  <div class='details'>
  <h2 class=''>".$r['name']."</h2> <br/>");
  echo ("<h2 class=''>".$r['date']."</h2>
<br />
  <h2 class=''> Entry: ".$r["entry"]."</h2>
  </div>
  <a href='delete_entry.php?created=".$r["created"]."&pet_id=".$id_pet."' class='users__cta'>Delete entry</a>
  </div></section>");
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