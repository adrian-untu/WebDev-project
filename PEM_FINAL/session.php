<?php
include("includes/database.php");
session_start();
if (!isset($_SESSION['user_id'])){
header('location:index.php');
}
$id = $_SESSION['user_id'];
?>