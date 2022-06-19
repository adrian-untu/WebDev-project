<?php
require('includes/database.php');
$id =$_REQUEST['user_id'];

$result = mysqli_query($con,"SELECT * FROM user WHERE user_id  = '$id' ");
$test = mysqli_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
$firstname=$test['firstname'];
$lastname=$test['lastname'];
$username=$test['username'];
$birthday=$test['birthday'];
$old_password=$test['password'];

if(isset($_POST['save']))
{	
$first_save=$_POST['firstname'];
$last_save=$_POST['lastname'];
$username_save=$_POST['username'];
$birthday_save=$_POST['birthday'];
$copy_birthday=$birthday_save;
list($y,$m,$d) = explode('-', $copy_birthday);
$old_password_save=$_POST['old_password'];
$new_password_save=$_POST['new_password'];
if(checkdate($m,$d,$y)==true && $y< date("Y") ||($y== date("Y") && $m<date("m")) || ($y== date("Y") && $m==date("m")&& $d<date("d")))
{
	mysqli_query($con,"UPDATE user SET firstname ='$first_save', lastname ='$last_save', username ='$username_save', birthday='$birthday_save'
 WHERE user_id = '$id'");
	echo "Saved!";
	header("Location: profile.php");
	exit();
}
else
{
	echo "<script>alert('The birthday introduced is invalid!'); window.location='edit_profile.php?user_id=".$id."'</script>";
} 

if($new_password_save=="")
{	
	mysqli_query($con,"UPDATE user SET firstname ='$first_save', lastname ='$last_save', username ='$username_save' 
 WHERE user_id = '$id'");
	echo "Saved!";
	header("Location: profile.php");			
}
else if($old_password_save==$old_password && $new_password_save!="")
{
	mysqli_query($con,"UPDATE user SET firstname ='$first_save', lastname ='$last_save', username ='$username_save', 
 password='$new_password_save' WHERE user_id = '$id'");
	echo "Saved!";
	header("Location: profile.php");	
}
else
	{
		echo "<script>alert('The old password does not match!'); window.location='edit_profile.php?user_id=".$id."'</script>";
	} 
}


?>

<!DOCTYPE html>
<html>

	<head>
		<title> Update profile</title>
		<link rel="stylesheet" type="text/css" href="css/profilestyle.css">
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
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="profile.php">My profile</a></li>
          <li>
            <a href="logout.php" class="logout"
              >Log out</a
            >
          </li>
        </ul>
      </nav>

	<div id="container">
	
		<div id="left-nav">
				
				<div>
				<a href="updatephoto.php" title="Change Profile Picture"><img src="<?php echo $test['profile_picture'] ?>"></a>
				</div>
		</div>

			<h1>Edit Info</h1>		
		<fieldset class="-------------">
			<table cellpadding="5" cellspacing="5">

<form method="post">
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
</div>
</body>

</html>