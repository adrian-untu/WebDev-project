<?php
require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/config/session.php"; 
$id =$_SESSION['user_id'];

require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/scripts/select_home_posts_2.php"; 
if (count($results) > 0) { foreach ($results as $r) {
$firstname=$r['firstname'];
$lastname=$r['lastname'];
$username=$r['username'];
$birthday=$r['birthday'];
$old_password=$r['password'];
$profile_picture=$r['profile_picture'];
}}

if(isset($_POST['save']))
{	
$first_save=htmlspecialchars($_POST['firstname']);
$last_save=htmlspecialchars($_POST['lastname']);
$username_save=htmlspecialchars($_POST['username']);
$birthday_save=$_POST['birthday'];
$copy_birthday=$birthday_save;
list($y,$m,$d) = explode('-', $copy_birthday);
$old_password_save=htmlspecialchars($_POST['old_password']);
$new_password_save=htmlspecialchars($_POST['new_password']);
$md5_old_pass=md5($old_password_save);
$md5_new_pass=md5($new_password_save);
if(checkdate($m,$d,$y)==true && $y< date("Y") ||($y== date("Y") && $m<date("m")) || ($y== date("Y") && $m==date("m")&& $d<date("d")))
{
    $stmt = $pdo->prepare("UPDATE user SET firstname =?, lastname =?, username =?, birthday=? WHERE user_id = ?");
    $stmt->execute(["$first_save", "$last_save", "$username_save", "$birthday_save", "$id"]);
	header("Location: /PEM/PEM_LAST/app/profile.php");
}
else
{
	echo "<script>alert('The birthday introduced is invalid!'); window.location='/PEM/PEM_LAST/app/edit_profile'</script>";
} 

if($new_password_save=="")
{	
    $stmt = $pdo->prepare("UPDATE user SET firstname =?, lastname =?, username =? WHERE user_id = ?");
    $stmt->execute(["$first_save", "$last_save", "$username_save", "$id"]);
	header("Location: /PEM/PEM_LAST/app/profile.php");			
}
else if($md5_old_pass==$old_password && $new_password_save!="")
{
    $stmt = $pdo->prepare("UPDATE user SET firstname =?, lastname =?, username =?, password=? WHERE user_id = ?");
    $stmt->execute(["$first_save", "$last_save", "$username_save", "$md5_new_pass", "$id"]);
	header("Location: /PEM/PEM_LAST/app/profile.php");	
}
else if ($md5_old_pass!=$old_password)
	{
		echo "<script>alert('The old password does not match!'); window.location='/PEM/PEM_LAST/app/edit_profile'</script>";
	} 
}
?>