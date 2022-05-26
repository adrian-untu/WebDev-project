<?php
							include ('includes/database.php');
	
                                    $get_id =$_GET['id'];
                                    $result = mysqli_query($con,"SELECT * from posts where post_id='".$get_id."'");
                                    while($row=MySQLi_fetch_array($result)){
                                        $privacy = (int)$row['private'];
                                    }
                                    if($privacy==1){
									mysqli_query($con,"UPDATE posts SET private = 0 WHERE post_id='".$get_id."'");
                                    }
                                    else{
                                    mysqli_query($con,"UPDATE posts SET private = 1 WHERE post_id='".$get_id."'");
                                    }
								
										header('location:profile.php');
									
						?>