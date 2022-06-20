<?php include ('session.php');?>
<?php
	include ('includes/database.php');
	
	if (isset($_POST['submit']))
	{
		$pet_name = $_POST['name'];
        $pet_birthday = $_POST['birthday'];
        $copy_birthday=$pet_birthday;
        list($m,$d,$y) = explode('-', $copy_birthday);
        $pet_monday = $_POST['monday'];
        $pet_tuesday = $_POST['tuesday'];
        $pet_wednesday = $_POST['wednesday'];
        $pet_thursday = $_POST['thursday'];
        $pet_friday = $_POST['friday'];
        $pet_saturday = $_POST['saturday'];
        $pet_sunday = $_POST['sunday'];
        $pet_restrictions = $_POST['restrictions'];
        $family_id = $_POST['family_id'];
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
                        
                    else if(checkdate($m,$d,$y)==true && $y< date("Y") ||($y== date("Y") && $m<date("m")) || ($y== date("Y") && $m==date("m")&& $d<date("d")))
                        {
				$sql1=mySQLi_query($con,"select * from pets");
				$count = mySQLi_num_rows($sql1) + 1;
                move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
				$location="upload/" . $_FILES["image"]["name"];
				mySQLi_query($con,"INSERT INTO pets (pet_id,name,birthday,profile_picture_pet,family_id,restrictions,monday,tuesday,wednesday,thursday,friday,saturday,sunday)
				VALUES ('$count','$pet_name','$pet_birthday','$location','$family_id','$pet_restrictions','$pet_monday','$pet_tuesday','$pet_wednesday','$pet_thursday','$pet_friday','$pet_saturday','$pet_sunday')");
				echo "<script>alert('Pet successfully added!'); window.location='family.php'</script>";
                        }
                        else{
                        
                                echo "<script>alert('The birthday introduced is invalid!'); window.location='edit_profile.php?user_id=".$id."'</script>";
                            
                        }
                    }
                }
            
	}
	
?>