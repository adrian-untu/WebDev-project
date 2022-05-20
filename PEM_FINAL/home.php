<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0,initial-scale=1.0"
    />
    <link rel="stylesheet" href="css/homestyle.css" />
    <link rel="icon" href="img/logo.png" type="image/icon" />
    <title>Home Pet Posts</title>
</head>
<body>
<?php include ('session.php');?>

    <div class="header">
      <nav>
        <img src="img/logo.png" class="logo" alt="" />
        <ul class="nav-links">
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="profile.php">My profile</a></li>
          <li><a href="logout.php" class="logout">Log out</a></li>
        </ul>
      </nav>
		<div class="pet-posts">
        <div class="pet-posts__img">
          <img src="upload/Loki2.jpg" alt="" />
        </div>
        <div class="pet-posts__info">
          <div class="pet-posts__date">
            <span>Friday</span>
            <span>October 8th 2021</span>
          </div>
          <h1 class="pet-posts__title">Loki</h1>
          <p class="pet-posts__text">
            He is Loki at about 3 months and he likes football
          </p>
          <a href="petprofile.php" class="pet-posts__cta"
            >Read More about him</a
          >
        </div>
      </div>
      <div class="pet-posts">
        <div class="pet-posts__img">
          <img src="upload/Messy-profile.jpg" alt="" />
        </div>
        <div class="pet-posts__info">
          <div class="pet-posts__date">
            <span>Tuesday</span>
            <span>June 12th 2011</span>
          </div>
          <h1 class="pet-posts__title">Messy</h1>
          <p class="pet-posts__text">
            He is Messy at about 11 years old and he loves sleeping
          </p>
          <a href="petprofile.php" class="pet-posts__cta"
            >Read More about him</a
          >
        </div>
      </div>
</div>
</body>

</html>