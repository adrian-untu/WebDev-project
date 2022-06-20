<?php
require $_SERVER['DOCUMENT_ROOT']."/PEM/PEM_LAST/app/config/session.php";
	if (isset($_POST['submit']))
	{
		$pet_name = htmlspecialchars($_POST['name']);
        $pet_birthday = $_POST['birthday'];
        $copy_birthday=$pet_birthday;
        list($y,$m,$d) = explode('-', $copy_birthday);
        $pet_monday = htmlspecialchars($_POST['monday']);
        $pet_tuesday = htmlspecialchars($_POST['tuesday']);
        $pet_wednesday = htmlspecialchars($_POST['wednesday']);
        $pet_thursday = htmlspecialchars($_POST['thursday']);
        $pet_friday = htmlspecialchars($_POST['friday']);
        $pet_saturday = htmlspecialchars($_POST['saturday']);
        $pet_sunday = htmlspecialchars($_POST['sunday']);
        $pet_restrictions = htmlspecialchars($_POST['restrictions']);
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
                        if($size > 10000000)
                        {
                        die("Format is not allowed or file size is too big!");
                        }
                        
                        else if(checkdate($m,$d,$y)==true && $y< date("Y") ||($y== date("Y") && $m<date("m")) || ($y== date("Y") && $m==date("m")&& $d<date("d")))
                        {
                            $stmt = $pdo->prepare("SELECT * FROM pets");
                            $stmt->execute();
                            $results = $stmt->fetchAll();
                            if (isset($_POST["ajax"])) { echo json_encode($results); }
			                $count = count($results)+1;
                            move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
				            $location="upload/" . $_FILES["image"]["name"];
				            $stmt=$pdo->prepare("INSERT INTO pets (pet_id,name,birthday,profile_picture_pet,family_id,restrictions,monday,tuesday,wednesday,thursday,friday,saturday,sunday)
				            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
                            $stmt->execute(["$count","$pet_name","$pet_birthday","$location","$family_id","$pet_restrictions","$pet_monday","$pet_tuesday","$pet_wednesday","$pet_thursday","$pet_friday","$pet_saturday","$pet_sunday"]);
				            echo "<script>alert('Pet successfully added!'); window.location=' /PEM/PEM_LAST/app/family'</script>";
                        }
                        else{
                        
                            echo "<script>alert('The birthday introduced is invalid!'); window.location='/PEM/PEM_LAST/app/family'</script>";
                    }
                    }
                }
            
	}
	
?>