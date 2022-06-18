<?php
	include('includes/database.php');
	include('session.php');
							
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
										if($size > 10000000000) //conditions for the file
										{
										die("Format is not allowed or file size is too big!");
										}
										
									else
										{

									move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
									$location="upload/" . $_FILES["image"]["name"];
									$content=$_POST['content'];
									$url = $_POST['url'];
									$time=time();
									if(preg_match_all('/\d+/', $url, $numbers))
									$id_pet = end($numbers[0]);
									$sql1=mySQLi_query($con,"select * from posts");
				                    $count = mySQLi_num_rows($sql1) + 1;
									$update=mysqli_query($con," INSERT INTO posts (post_id,user_id,pet_id,post,content,created,private,family_id)
									VALUES ('$count','$id','$id_pet','$location','$content','$time','0','$family_id') ");

									}
										header("location:petprofile.php?id=$id_pet");

									}
							}
?>