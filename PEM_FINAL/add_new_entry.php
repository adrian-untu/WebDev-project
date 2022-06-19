<?php  
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
             $url = "https://";   
        else  
             $url = "http://";   
        // Append the host(domain name, ip) to the URL.   
        $url.= $_SERVER['HTTP_HOST'];   
        
        // Append the requested resource location to the URL   
        $url.= $_SERVER['REQUEST_URI'];    
        if(preg_match_all('/\d+/', $url, $numbers))
        $id_pet = end($numbers[0]);
      ?> 
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0,initial-scale=1.0"
    />
    <link rel="stylesheet" href="css/homestyle.css" />
    <link rel="icon" href="img/logo.png" type="image/icon" />
    <title>Home Pet Posts</title>
</head>
<body>
<?php include ('session.php');?>

    <div class="header">
      <nav class="up">
        <img src="img/logo.png" class="logo" alt="" />
        <ul class="nav-links">
			<div class="links">
      <li><a href="firstaid.php">First Aid</a></li>
          	<li><a href="profile.php">My profile</a></li>
		  	<li><a href="family.php">Family</a></li>
          	<li><a href="logout.php" class="logout">Log out</a></li>
</div>
        </ul>
      </nav>
      <article>
      <div id="container">
	
		<div id="left-nav">
             <form method="post" action="add_new_entry_script.php" enctype="multipart/form-data">
            
			<h1>Add entry</h1>
		<fieldset class="-------------">
			<table cellpadding="5" cellspacing="5">
				<tr>
					<td><label>Medical Entry</label></td>
				</tr>
				<tr>
					<td><input type="text" name="entry"  placeholder="Enter text" class="form-1" required /></td>
				</tr>
        <tr>
					<td><label>Entry date</label></td>
</tr>
<tr> 
					<td><input type="date" name="date" value=" "class="form-1" title="Date" /></td>
				
				</tr>
			</table>
		</fieldset>
<br />
        <input type="hidden" name="pet_id" value="<?php echo $id_pet ?>">
        <button type="submit" class="btn-share" name="submit" value="Submit">Submit</button>
			</form>
		</div>
</article>

<footer>
	<h1>©Website done by Badarau Dragos and Untu George Adrian, est. 2022</h1>
</footer>
</div>
	</div>
</body>
</html>