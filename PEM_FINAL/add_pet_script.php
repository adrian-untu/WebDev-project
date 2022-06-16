<?php include ('session.php');?>
<?php
	include ('includes/database.php');
	
	if (isset($_POST['submit']))
	{
		$pet_name = $_POST['name'];
        $pet_birthday = $_POST['birthday'];
        $pet_plan = $_POST['food_plan'];
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
                        
                    else
                        {
				$sql1=mySQLi_query($con,"select * from pets");
				$count = mySQLi_num_rows($sql1) + 1;
                move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
				$location="upload/" . $_FILES["image"]["name"];
				mySQLi_query($con,"INSERT INTO pets (pet_id,name,birthday,profile_picture_pet,family_id,history_id,food_plan,restrictions)
				VALUES ('$count','$pet_name','$pet_birthday','$location','$family_id','$count','$pet_plan','$pet_restrictions')");
				echo "<script>alert('Pet successfully added!'); window.location='family.php'</script>";
                        }
                    }
                }
            
	}
	
?>