<?php include ('session.php');?>
<?php
	include ('includes/database.php');
	
	if (isset($_POST['submit']))
	{
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$username=$_POST['username'];
		$birthday=$_POST['birthday'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$password2=$_POST['password2'];
		$currentDirectory = getcwd();
        $uploadDirectory = "/upload/";
		$fileExtensionsAllowed = ['jpeg','jpg','png'];
		$fileName = $_FILES['the_file']['name'];
		$fileSize = $_FILES['the_file']['size'];
		$fileTmpName  = $_FILES['the_file']['tmp_name'];
		$fileType = $_FILES['the_file']['type'];
		$fileExtension = strtolower(end(explode('.',$fileName)));
		$uploadPath = $currentDirectory . $uploadDirectory . basename($fileName);
		if (! in_array($fileExtension,$fileExtensionsAllowed)) {
			$errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
		  }
	
		  if ($fileSize > 4000000) {
			$errors[] = "File exceeds maximum size (4MB)";
		  }
	
		  if (empty($errors)) {
			$didUpload = move_uploaded_file($fileTmpName, $uploadPath);
	
			if ($didUpload) {
			  echo "The file " . basename($fileName) . " has been uploaded";
			} else {
			  echo "An error occurred. Please contact the administrator.";
			}
		} 
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
				$filenames = $uploadDirectory . basename($fileName);
				mySQLi_query($con,"INSERT INTO user (user_id,firstname,lastname,username,birthday,email,password,password2,profile_picture)
				VALUES ('$count',NULL,NULL,'$username','$birthday','$email','$password','$password2', NULL)");
				echo "<script>alert('Account successfully created!'); window.location='login_register.php'</script>";
			}
			
	}
	
?>