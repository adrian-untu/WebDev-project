
<!DOCTYPE html>
<html>
  
<head>
    <title>Insert Page page</title>
</head>
  
<body>
        <?php
        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $conn = mysqli_connect("localhost", "root", "", "login");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
        $nume =  $_POST['name'];
        $parola = $_POST['password'];
        $check_user = mysqli_query($conn, "SELECT name, password FROM login where name = '$nume' AND password = '$parola' ");
if(mysqli_num_rows($check_user) > 0){
    switch($nume){
    case 'admin':
        header('Location: http://localhost/PEM/admin.html');
        break;
    case 'Dragos':
        header('Location: http://localhost/PEM/user1.html');
        break;
    case 'Adrian':
        header('Location: http://localhost/PEM/user2.html');
        break;
    default:
    }
}
else{
    header('Location: http://localhost/PEM/Register/login.html');
}
        // Close connection
        mysqli_close($conn);
        ?>
</body>
  
</html>