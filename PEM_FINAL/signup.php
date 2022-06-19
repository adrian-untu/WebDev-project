<?php include ('session.php');?>
<?php
	include ('includes/database.php');
	
	if (isset($_POST['submit']))
	{
		$username=$_POST['username'];
		$count=count(explode('_',$username));
		if($count!=2)
		{
			echo "<script>alert('Please introduce your username with the following format: firstname_lastname!'); window.location='login_register.php'</script>";
			exit();
		}

		$firstname=ucfirst(explode('_',$username)[0]); 
		$lastname=ucfirst(explode('_',$username)[1]); 

		if(strlen($firstname)<2 || strlen($lastname)<2)
		{
				echo "<script>alert('Your firstname or lastname is invalid! '); window.location='login_register.php'</script>";
				exit();
		}
		$birthday=$_POST['birthday'];
		$copy_birthday=$birthday;
		list($y,$m,$d) = explode('-', $copy_birthday);
		$email=$_POST['email'];
		$password=$_POST['password'];
		$password2=$_POST['password2'];
		
		$sql=mySQLi_query($con,"select * from user WHERE email='$email'");
		$row=mySQLi_num_rows($sql);
		if ($row > 0)
			{
				echo "<script>alert('E-mail already taken!'); window.location='login_register.php'</script>";
				exit();
			}
		$sql=mySQLi_query($con,"select * from user WHERE username='$username'");
		$row=mySQLi_num_rows($sql);
		if ($row > 0)
			{
				echo "<script>alert('Username already taken!'); window.location='login_register.php'</script>";
				exit();
			}
			
		if($password != $password2)
			{
			echo "<script>alert('Password do not match!'); window.location='login_register.php'</script>";
			exit();
			}
        else
			{
				$md5_pass=md5($password);
				$sql1=mySQLi_query($con,"select * from user");
				$count = mySQLi_num_rows($sql1) + 2;
				mySQLi_query($con,"INSERT INTO user (user_id,firstname,lastname,username,birthday,email,password,profile_picture,family_id)
				VALUES ('$count','$firstname','$lastname','$username','$birthday','$email','$md5_pass', 'upload/default_profile.jpg', '0')");
				echo "<script>alert('Account successfully created!'); window.location='login_register.php'</script>";
			}
	}
	
?>