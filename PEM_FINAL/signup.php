<?php include ('session.php');?>
<?php
	include ('includes/database.php');
	
	if (isset($_POST['submit']))
	{
		$username=$_POST['username'];
		$birthday=$_POST['birthday'];
		$firstname=ucfirst(explode('_',$username)[0]);
		$lastname=ucfirst(explode('_',$username)[1]);
		$email=$_POST['email'];
		$password=$_POST['password'];
		$password2=$_POST['password2'];
		
			$sql=mySQLi_query($con,"select * from user WHERE email='$email'");
			$row=mySQLi_num_rows($sql);
			if ($row > 0)
			{
			echo "<script>alert('E-mail already taken!'); window.location='login_register.php'</script>";
			}
			elseif($password != $password2)
			{
			echo "<script>alert('Password do not match!'); window.location='login_register.php'</script>";
			}
            else
			{
				$sql1=mySQLi_query($con,"select * from user");
				$count = mySQLi_num_rows($sql1) + 1;
				mySQLi_query($con,"INSERT INTO user (user_id,firstname,lastname,username,birthday,email,password,password2,profile_picture)
				VALUES ('$count','$firstname','$lastname','$username','$birthday','$email','$password','$password2', 'upload/default_profile.jpg')");
				echo "<script>alert('Account successfully created!'); window.location='login_register.php'</script>";
			}
			
	}
	
?>