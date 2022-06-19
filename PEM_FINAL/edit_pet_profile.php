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
$restrictions=$test['restrictions'];
$monday=$test['monday'];
$tuesday=$test['tuesday'];
$wednesday=$test['wednesday'];
$thursday=$test['thursday'];
$friday=$test['friday'];
$saturday=$test['saturday'];
$sunday=$test['sunday'];

if(isset($_POST['save']))
{	
$name_save=$_POST['name'];
$birthday_save=$_POST['birthday'];
$copy_birthday=$birthday_save;
list($y,$m,$d) = explode('-', $copy_birthday);
$restrictions_save=$_POST['restrictions'];
$monday_save=$_POST['monday'];
$tuesday_save=$_POST['tuesday'];
$wednesday_save=$_POST['wednesday'];
$thursday_save=$_POST['thursday'];
$friday_save=$_POST['friday'];
$saturday_save=$_POST['saturday'];
$sunday_save=$_POST['sunday'];

if($y< date("Y") ||($y== date("Y") && $m<date("m")) || ($y== date("Y") && $m=date("m")&& $d<date("d")))
{
	mysqli_query($con,"UPDATE pets SET name = '$name_save', birthday = '$birthday_save', restrictions = '$restrictions_save', monday = '$monday_save', tuesday = '$tuesday_save', wednesday = '$wednesday_save', thursday = '$thursday_save', friday = '$friday_save', saturday = '$saturday_save', sunday = '$sunday_save' where pet_id = '$id'");
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
<section>
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
                <tr>
					<td><label>Name</label></td>
					<td><input type="text" name="name" value="<?php echo $name; ?>" placeholder="Enter your lastname....." class="form-1" title="Enter your lastname" required /></td>
				</tr>
			</table>
		</fieldset>
		<fieldset class="---------------">
			<legend><h1>Change informations</h1></legend>
			<table cellpadding="5" cellspacing="5">
				<tr>
					<td><label>Food Restrictions</label></td>
					<td><input type="text" name="restrictions" value="<?php echo $restrictions?>" class="form-1" /></td>
				</tr>
			</table>
		</fieldset>
<br />		
        <fieldset class="---------------">
			<legend><h1>Food planning</h1></legend>
			<table cellpadding="5" cellspacing="5">
				<tr>
					<td><label>Monday</label></td>
					<td><input type="text" name="monday" value="<?php echo $monday?>" class="form-1" /></td>
				</tr>
                <tr>
					<td><label>Tuesday</label></td>
					<td><input type="text" name="tuesday" value="<?php echo $tuesday?>" class="form-1" /></td>
				</tr>
                <tr>
					<td><label>Wednesday</label></td>
					<td><input type="text" name="wednesday" value="<?php echo $wednesday?>" class="form-1" /></td>
				</tr>
                <tr>
					<td><label>Thursday</label></td>
					<td><input type="text" name="thursday" value="<?php echo $thursday?>" class="form-1" /></td>
				</tr>
                <tr>
					<td><label>Friday</label></td>
					<td><input type="text" name="friday" value="<?php echo $friday?>" class="form-1" /></td>
				</tr>
                <tr>
					<td><label>Saturday</label></td>
					<td><input type="text" name="saturday" value="<?php echo $saturday?>" class="form-1" /></td>
				</tr>
                <tr>
					<td><label>Sunday</label></td>
					<td><input type="text" name="sunday" value="<?php echo $sunday?>" class="form-1" /></td>
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