
<?php
function time_stamp($session_time) 
{ 
 
$time_difference = time() - $session_time ; 
$seconds = $time_difference ; 
$minutes = round($time_difference / 60 );
$hours = round($time_difference / 3600 ); 
$days = round($time_difference / 86400 ); 
$weeks = round($time_difference / 604800 ); 
$months = round($time_difference / 2419200 ); 
$years = round($time_difference / 29030400 ); 

if($seconds <= 60)
{
echo"$seconds seconds ago"; 
}
else if($minutes <=60)
{
   if($minutes==1)
   {
     echo"one minute ago"; 
    }
   else
   {
   echo"$minutes minutes ago"; 
   }
}
else if($hours <=24)
{
   if($hours==1)
   {
   echo"one hour ago";
   }
  else
  {
  echo"$hours hours ago";
  }
}
else if($days <=7)
{
  if($days==1)
   {
   echo"one day ago";
   }
  else
  {
  echo"$days days ago";
  }


  
}
else if($weeks <=4)
{
  if($weeks==1)
   {
   echo"one week ago";
   }
  else
  {
  echo"$weeks weeks ago";
  }
 }
else if($months <=12)
{
   if($months==1)
   {
   echo"one month ago";
   }
  else
  {
  echo"$months months ago";
  }
 
   
}

else
{
if($years==1)
   {
   echo"one year ago";
   }
  else
  {
  echo"$years years ago";
  }

}
 
} 
?>
    <?php  
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
             $url = "https://";   
        else  
             $url = "http://";   
        // Append the host(domain name, ip) to the URL.   
        $url.= $_SERVER['HTTP_HOST'];   
        
        // Append the requested resource location to the URL   
        $url.= $_SERVER['REQUEST_URI'];    

      ?>   
<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">
<meta name = "viewport" content = "width=device-width">
<link rel="stylesheet" href="css/profilestyle.css" type="text/css">
<title>Pet profile</title>
<link rel="icon" href="img/logo.png" type="image/icon" >
</head>
<body>
<?php include ('session.php');?>
<div class = "header">
<nav>
    <img src = "images/logo.png" class = "logo" alt=" ">
    <ul class = "nav-links">
        <li><a href="home.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="profile.php">My profile</a></li>
        <li><a href="family.php">Family</a></li>
        <li><a href="logout.php" class="logout">Log out</a></li>
    </ul>
</nav>
<div class = "card">
    <div class = "image">
        <img src = "images/Loki/Loki2.jpg" alt = "Profile" class = "profile" />
    </div>
    <div class = "details">
        <h2 class = "">Loki</h2>
        <p class = "text">Hello everyone! My name is Loki, I am a 7 month dog.</p>
    </div>
</div>
<div class = "food-plan">
    <h3>Food plan</h3>
    <p class = "description"></p>
    <ul class = "langs">
        <li class = "lang">Food plan</li>
        <li class = "lang">Restrictions</li>
    </ul>
</div>
<div class = "memories">
    <h3>Memories made by my owner</h3>
    <p class = "description">These are some memories (photos, videos) that my owner had put up for me:</p>
    <div class = "photo">
    <img src="images/Loki/Loki_bath.jpeg" alt="Photo 1">
    <p style= "float: right; padding: 10px;">Taking a bath...</p>
    <a href="#" class="fa fa-facebook"></a>
    <a href="#" class="fa fa-twitter"></a>
    <a href="#" class="fa fa-instagram"></a>
    </div>
    <div class = "photo">
    <img src="images/Loki/Loki_chill.jpeg" alt="Photo 2">
    <p style= "float: right; padding: 10px;">Chilling...</p>
    <a href="#" class="fa fa-facebook"></a>
    <a href="#" class="fa fa-twitter"></a>
    <a href="#" class="fa fa-instagram"></a>
    </div>
    <div class = "photo">
    <img src="images/Loki/Loki_football.jpeg" alt="Photo 3">
    <p style= "float: right; padding: 10px;">Fusbal</p>
    <a href="#" class="fa fa-facebook"></a>
    <a href="#" class="fa fa-twitter"></a>
    <a href="#" class="fa fa-instagram"></a>
    </div>
    <div class = "photo">
    <img src="images/Loki/Loki_out.jpeg" alt="Photo 4">
    <p style= "float: right; padding: 10px;">No mercy</p>
    <a href="#" class="fa fa-facebook"></a>
    <a href="#" class="fa fa-twitter"></a>
    <a href="#" class="fa fa-instagram"></a>
    </div>

    <ul class = "langs">
        <li class = "lang">Memories</li>
        <li class = "lang">Photos</li>
        <li class = "lang">Videos</li>
    </ul>
    </div>
</div>
</div>
</body>
</html>