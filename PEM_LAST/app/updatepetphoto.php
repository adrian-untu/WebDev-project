<?php 
require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/scripts/time_stamp.php";
require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/config/session.php"; 
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>

	<head>
		<title>Update pet profile photo </title>
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
<form method="post" enctype="multipart/form-data">
<input type="file" name="image">
<input type="submit" value="save" name="image" />
<?php
							
							if (!isset($_FILES['image']['tmp_name'])) {
							echo "";
							}else{
							$file=$_FILES['image']['tmp_name'];
							$image = $_FILES["image"] ["name"];
							$image_name= addslashes($_FILES['image']['name']);
							$size = $_FILES["image"] ["size"];
							$error = $_FILES["image"] ["error"];

							if ($error > 0){
										die("Error uploading file! Code $error.");
									}else{
										if($size > 10000000) //conditions for the file
										{
										die("Format is not allowed or file size is too big!");
										}
										
									else
										{

									move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
									$location="upload/" . $_FILES["image"]["name"];
                                    $stmt = $pdo->prepare("UPDATE pets SET profile_picture_pet = ? WHERE pet_id = ? ");
                                    $stmt->execute(["$location", "$id"]);
                                    echo "<script>alert('Pet photo successfully updated!'); window.location='/PEM/PEM_LAST/app/petprofile?id=$id'</script>";
									
									
									}
							}
                        }
						?>
						</form>
                        </div>
                        </section>
</body>

</html>