<?php
require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/config/session.php"; 
$id =$_GET['pet_id'];
$stmt = $pdo->prepare("SELECT * FROM pets WHERE pet_id = ?");
$stmt->execute(["$id"]);
$results = $stmt->fetchAll();
if(count($results)>0){ foreach ($results as $r){
$name=$r['name'];
$birthday=$r['birthday'];
$restrictions=$r['restrictions'];
$monday=$r['monday'];
$tuesday=$r['tuesday'];
$wednesday=$r['wednesday'];
$thursday=$r['thursday'];
$friday=$r['friday'];
$saturday=$r['saturday'];
$sunday=$r['sunday'];
}}

if(isset($_POST['save']))
{	
$name_save=htmlspecialchars($_POST['name']);
$birthday_save=$_POST['birthday'];
$copy_birthday=$birthday_save;
list($y,$m,$d) = explode('-', $copy_birthday);
$restrictions_save=htmlspecialchars($_POST['restrictions']);
$monday_save=htmlspecialchars($_POST['monday']);
$tuesday_save=htmlspecialchars($_POST['tuesday']);
$wednesday_save=htmlspecialchars($_POST['wednesday']);
$thursday_save=htmlspecialchars($_POST['thursday']);
$friday_save=htmlspecialchars($_POST['friday']);
$saturday_save=htmlspecialchars($_POST['saturday']);
$sunday_save=htmlspecialchars($_POST['sunday']);

if($y< date("Y") ||($y== date("Y") && $m<date("m")) || ($y== date("Y") && $m=date("m")&& $d<date("d")))
{
    $stmt = $pdo->prepare("UPDATE pets SET name = ?, birthday = ?, restrictions = ?, monday = ?, tuesday = ?, wednesday = ?, thursday = ?, friday = ?, saturday = ?, sunday = ? where pet_id = ?");
    $stmt->execute(["$name_save", "$birthday_save", "$restrictions_save", "$monday_save", "$tuesday_save", "$wednesday_save", "$thursday_save", "$friday_save", "$saturday_save", "$sunday_save", "$id"]);
	echo "Saved!";
	header("Location: /PEM/PEM_LAST/app/petprofile.php?id=$id");
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
				<a href="updatepetphoto?id=<?php echo $id?>" title="Change Profile Picture"><img src="<?php echo $r['profile_picture_pet'] ?>"></a>
				</div>
		</div>

<form method="post">
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