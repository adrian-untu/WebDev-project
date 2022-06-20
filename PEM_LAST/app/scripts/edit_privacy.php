<?php
require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/config/session.php";
                                    $get_id =$_GET['id'];
                                    $stmt = $pdo->prepare("SELECT * from posts where post_id = ?");
                                    $stmt->execute(["$get_id"]);
                                    $results = $stmt->fetchAll();
                                    if (isset($_POST["ajax"])) { echo json_encode($results); }
                                    if (count($results) > 0) { foreach ($results as $r) {
                                        $privacy = (int)$r['private'];
                                    }
                                    }
                                    if($privacy==1){
                                        $stmt = $pdo->prepare("UPDATE posts SET private = 2 WHERE post_id = ?");
                                        $stmt->execute(["$get_id"]);
                                    }
                                    else if($privacy==2){
                                        $stmt = $pdo->prepare("UPDATE posts SET private = 0 WHERE post_id = ?");
                                        $stmt->execute(["$get_id"]);
                                    }
                                    else{
                                        $stmt = $pdo->prepare("UPDATE posts SET private = 1 WHERE post_id = ?");
                                        $stmt->execute(["$get_id"]);
                                    }
									header('location:/PEM/PEM_LAST/app/profile');
									
						?>