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
      <nav class="up">
        <img src="img/logo.png" class="logo" alt="" />
        <ul class="nav-links">
			<div class="links">
			<li><a href="firstaid.php">First Aid</a></li>
          	<li><a href="profile.php">My profile</a></li>
		  	<li><a href="family.php">Family</a></li>
          	<li><a href="logout.php" class="logout">Log out</a></li>
</div>
        </ul>
      </nav>
	  <article>
      <div id="container">
	
		<div id="left-nav">
             <form method="post" action="create_family_script.php" enctype="multipart/form-data">
			<h1>Add Information</h1>
		<fieldset class="-------------">
			<table cellpadding="5" cellspacing="5">
				<tr>
					<td><label>Family name</label></td>
				</tr>
				<tr>
					<td><input type="text" name="name"  placeholder="Enter family's name" class="form-1" required /></td>
				</tr>
			</table>
		</fieldset>
        <button type="submit" class="btn-share" name="submit" value="Submit">Submit</button>
			</form>
		</div>
</article>
	</div>
</body>
</html>