<?php require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/config/session.php"; ?>
<!DOCTYPE html>
<html>

	<head>
		<title> Update profile</title>
		<link rel="stylesheet" type="text/css" href="css/profilestyle.css">
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
<section>
	<div id="container">
	
		<div id="left-nav">
				
				<div>
				<a href="updatephoto" title="Change Profile Picture"><img src="<?php echo $profile_picture ?>"></a>
				</div>
		</div>

			<h1>Edit Info</h1>		
		<fieldset class="-------------">
			<table cellpadding="5" cellspacing="5">

<form method="post" action="scripts/edit_profile_script.php">
				<tr>
					<td><label>First name</label></td>
					<td><label>Last name</label></td>
				</tr>
				<tr>
					<td><input type="text" name="firstname" value="<?php echo $firstname; ?>" placeholder="Enter your firstname....." class="form-1" title="Enter your firstname" required /></td>
					<td><input type="text" name="lastname" value="<?php echo $lastname; ?>" placeholder="Enter your lastname....." class="form-1" title="Enter your lastname" required /></td>
				</tr>
				<tr>
					<td><label>User name</label></td>
				</tr>
				<tr>
					<td><input type="text" name="username" value="<?php echo $username; ?>" placeholder="Enter your username....." class="form-1" title="Enter your username" required /></td>
				</tr>
			</table>
		</fieldset>
<br />
		<fieldset class="---------------">
			<legend><h1>Personal Info</h1></legend>
			<table cellpadding="5" cellspacing="5">
				<tr>
					<td><label>Birthday</label></td>
					<td><input type="date" name="birthday" value="<?php echo $birthday; ?>" class="form-1" title="Enter your birthday" /></td>
				
				</tr>
			</table>
		</fieldset>
		<fieldset class="---------------">
			<legend><h1>Change password</h1></legend>
			<table cellpadding="5" cellspacing="5">
				<tr>
					<td><label>Old Password</label></td>
					<td><input type="password" name="old_password" value="" class="form-1" title="Enter your old password" /></td>
				</tr>
				<tr>
					<td><label>New Password</label></td>
					<td><input type="password" name="new_password" value="" class="form-1" title="Enter your new password" /></td>
				</tr>
			</table>
		</fieldset>
<br />		
		<button type="submit" name="save" class="">Save</button>

		
	</div>
</section>

<footer>
	<h1>©Website done by Badarau Dragos and Untu George Adrian, est. 2022</h1>
</footer>
</div>
</body>

</html>