<?php
require('includes/database.php');
$id =$_REQUEST['pet_id'];

$result = mysqli_query($con,"SELECT * FROM pets WHERE pet_id  = '$id' ");
$test = mysqli_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
$name=$test['name'];
$birthday=$test['birthday'];
$profile_picture_pet=$test['profile_picture_pet'];
$food_plan=$test['food_plan'];
$restrictions=$test['restrictions'];

if(isset($_POST['save']))
{	
$name_save=$_POST['name'];
$birthday_save=$_POST['birthday'];
$copy_birthday=$birthday_save;
list($y,$m,$d) = explode('-', $copy_birthday);
$profile_picture_pet_save=$_POST['profile_picture_pet'];
$food_plan_save=$_POST['food_plan'];
$restrictions_save=$_POST['restrictions'];
if($y< date("Y") ||($y== date("Y") && $m<date("m")) || ($y== date("Y") && $m=date("m")&& $d<date("d")))
{
	mysqli_query($con,"UPDATE pets SET name = '$name_save', birthday = '$birthday_save', food_plan = '$food_plan_save', restrictions = '$restrictions_save' where pet_id = '$id'");
	echo "Saved!";
	header("Location: petprofile.php?id=$id");
	exit(); 
}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Update Pet profile</title>
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
          <li><a href="firstaid.php">First Aid</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="profile.php">My profile</a></li>
          <li><a href="logout.php" class="logout">Log out</a>
          </li>
        </ul>
      </nav>

	<div id="container">
	
		<div id="left-nav">
				
				<div>
				<a href="updatepetphoto.php?pet_id=<?php echo $id?>" title="Change Profile Picture"><img src="<?php echo $test['profile_picture_pet'] ?>"></a>
				</div>
		</div>

			<h1>Edit Info</h1>		
		<fieldset class="-------------">
			<table cellpadding="5" cellspacing="5">

<form method="post">
				<tr>
					<td><label>Name</label></td>
				</tr>
				<tr>
					<td><input type="text" name="name" value="<?php echo $name; ?>" placeholder="Enter your lastname....." class="form-1" title="Enter your lastname" required /></td>
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
			<legend><h1>Change informations</h1></legend>
			<table cellpadding="5" cellspacing="5">
				<tr>
					<td><label>Food Plan</label></td>
					<td><input type="text" name="food_plan" value="<?php echo $food_plan?>" class="form-1"/></td>
				</tr>
				<tr>
					<td><label>Food Restrictions</label></td>
					<td><input type="text" name="restrictions" value="<?php echo $restrictions?>" class="form-1" /></td>
				</tr>
			</table>
		</fieldset>
<br />		
		<button type="submit" name="save" class="">Save</button>

		
	</div>
</div>
</body>

</html>