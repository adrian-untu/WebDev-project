<?php
require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/config/session.php";
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
									$content=htmlspecialchars($_POST['content']);
									$id_pet = $_POST['pet_id'];
									$time=time();
                                    $stmt = $pdo->prepare("SELECT * FROM posts");
                                    $stmt->execute();
									$results = $stmt->fetchAll();
                                    if (isset($_POST["ajax"])) { echo json_encode($results); }
			                        $count = count($results) + 1;
									$stmt=$pdo->prepare(" INSERT INTO posts (post_id,user_id,pet_id,post,content,created,private,family_id)
									VALUES (?,?,?,?,?,?,'0',?) ");
                                    $stmt->execute(["$count","$id","$id_pet","$location","$content","$time","$family_id"]);

									}
										header("location:/PEM/PEM_LAST/app/petprofile?id=$id_pet");

									}
							}
?>