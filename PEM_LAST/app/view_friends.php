<?php
require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/config/session.php"; ?>
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
            <li><a href="home">Home Pet Posts</a></li>
			<li><a href="firstaid">First Aid</a></li>
          	<li><a href="profile">My profile</a></li>
		  	<li><a href="family">Family</a></li>
          	<li><a href="logout" class="logout">Log out</a></li>
        </ul>
      </nav>
      <div class = "nav-links">
</div>
<?php
$get_id = $_GET['pet'];
$stmt = $pdo->prepare("SELECT DISTINCT * FROM pets join friends on (friends.friend2 = pets.pet_id or friends.friend1 = pets.pet_id) where (friends.friend1 = ? or friends.friend2 = ?) and pets.pet_id != ?");
$stmt->execute(["$get_id", "$get_id", "$get_id"]);
$results = $stmt->fetchAll();
if (isset($_POST["ajax"])) { echo json_encode($results); }
if(count($results)>0){foreach ($results as $r){
    ?>
    <section><div class='users'>
    <div class='users__img'>
      <img src='<?php echo $r['profile_picture_pet']?>' alt='' />
    </div>
    <div class='users__info'>
      <h1 class='users__title'><?php echo $r["name"]?></h1>
      <a href='friendprofile?id=<?php echo $r['pet_id']?>' class='users__cta'>View profile</a>
      <a href='scripts/delete_friendship.php?origin=<?php echo $get_id?>&id=<?php echo $r['pet_id']?>' class='users__cta'>Delete friendship</a>
    </div>
  </div></section>
  <?php
  }
}
else echo "No results found";
?>

<footer>
	<h1>©Website done by Badarau Dragos and Untu George Adrian, est. 2022</h1>
</footer>
</div>
      </div>
    </div>
  </body>
</html>