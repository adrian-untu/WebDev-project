					
<?php
require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/config/database.php";

						if(isset($_POST['submit']))
						{
							$username=htmlspecialchars($_POST['username']);
							$password=htmlspecialchars($_POST['password']);
							$md5_pass=md5($password);
						{
							$stmt = $pdo->prepare("SELECT * FROM user WHERE username = ? and  password = ? ");
                            $stmt->execute(["$username", "$md5_pass"]);
                            $results = $stmt->fetchAll();
                            if (isset($_POST["ajax"])) { echo json_encode($results); }
							if (count($results) > 0) { foreach ($results as $r) {			
										session_start();
										$_SESSION['user_id'] = $r['user_id'];
										header("location:..\home");
                                }
						}
                        else {
                            echo "<script>alert('Please check your username and password!'); window.location='/PEM/PEM_LAST/app/login_register'</script>";
                        }			
						}
                    }
?>