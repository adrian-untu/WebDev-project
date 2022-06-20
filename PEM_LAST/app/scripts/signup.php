<?php
require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/config/database.php";
	if (isset($_POST['submit']))
	{
		$username=htmlspecialchars($_POST['username']);
		$count=count(explode('_',$username));
		if($count!=2)
		{
			echo "<script>alert('Please introduce your username with the following format: firstname_lastname!');  window.location='/PEM/PEM_LAST/app/login_register'</script>";
			exit();
		}

		$firstname=ucfirst(explode('_',$username)[0]); 
		$lastname=ucfirst(explode('_',$username)[1]); 

		if(strlen($firstname)<2 || strlen($lastname)<2)
		{
            echo "<script>alert('Your firstname or lastname is invalid!'); window.location = '/PEM/PEM_LAST/app/login_register'</script>";	
				exit();
		}
		$birthday=$_POST['birthday'];
		$copy_birthday=$birthday;
		list($y,$m,$d) = explode('-', $copy_birthday);
		$email=htmlspecialchars($_POST['email']);
		$password=htmlspecialchars($_POST['password']);
		$password2=htmlspecialchars($_POST['password2']);
                    $stmt = $pdo->prepare("SELECT * FROM user WHERE email = ?");
                    $stmt->execute(["$email"]);
                    $results = $stmt->fetchAll();
                    if (isset($_POST["ajax"])) { echo json_encode($results); }
                    if (count($results) > 0) { foreach ($results as $r) {
                    }}
                    $stmt = $pdo->prepare("SELECT * FROM user WHERE email = ?");
                    $stmt->execute(["$email"]);
                    $results = $stmt->fetchAll();
                    if (isset($_POST["ajax"])) { echo json_encode($results); }
                    if (count($results) > 0) {
                        echo "<script>alert('E-mail already taken!'); window.location = '/PEM/PEM_LAST/app/login_register'</script>";	
				exit();
			}
            $stmt = $pdo->prepare("SELECT * FROM user WHERE username = ?");
                    $stmt->execute(["$username"]);
                    $results = $stmt->fetchAll();
                    if (isset($_POST["ajax"])) { echo json_encode($results); }
                    if (count($results) > 0) {
                        echo "<script>alert('Username already taken!'); window.location = '/PEM/PEM_LAST/app/login_register'</script>";	
				exit();
			}
			
		if($password != $password2)
			{
			echo "<script>alert('Passwords do not match!'); window.location = '/PEM/PEM_LAST/app/login_register'</script>";
			exit();
			}
        else
			{
				$md5_pass=md5($password);
                $stmt = $pdo->prepare("INSERT INTO user (firstname,lastname,username,birthday,email,password,profile_picture,family_id)
				VALUES (?,?,?,?,?,?, 'upload/default_profile.jpg', '0')");
                $stmt->execute(["$firstname", "$lastname", "$username", "$birthday", "$email", "$md5_pass"]);
				echo "<script>alert('Account successfully created!');window.location = '/PEM/PEM_LAST/app/login_register'</script>";
			}
	}
	
?>