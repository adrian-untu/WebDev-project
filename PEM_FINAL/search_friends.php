<?php
define("DB_HOST", "localhost");
define("DB_NAME", "pem_final");
define("DB_CHARSET", "utf8");
define("DB_USER", "root");
define("DB_PASSWORD", "");
 
// (B) CONNECT TO DATABASE
try {
  $pdo = new PDO(
    "mysql:host=".DB_HOST.";charset=".DB_CHARSET.";dbname=".DB_NAME,
    DB_USER, DB_PASSWORD, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
  );
} catch (Exception $ex) { exit($ex->getMessage()); }
$get_id = $_REQUEST['pet'];
$stmt = $pdo->prepare("SELECT DISTINCT * FROM pets where pets.pet_id != ? AND (pets.pet_id NOT IN (select friend1 from friends WHERE friend2 = ?) AND pets.pet_id NOT IN (select friend2 from friends where friend1 = ?))");
$stmt->execute(["$get_id", "$get_id", $get_id]); 
$results = $stmt->fetchAll();
if (isset($_POST["ajax"])) { echo json_encode($results); }
?>