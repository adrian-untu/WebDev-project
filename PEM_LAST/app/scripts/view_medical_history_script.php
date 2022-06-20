<?php
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
             $url = "https://";   
        else  
             $url = "http://";   
        $url.= $_SERVER['HTTP_HOST'];   
        $url.= $_SERVER['REQUEST_URI'];    
        if(preg_match_all('/\d+/', $url, $numbers))
        $id_pet = end($numbers[0]);
$stmt = $pdo->prepare("SELECT * FROM medical_history LEFT JOIN pets on medical_history.pet_id = pets.pet_id WHERE pets.pet_id = ? ORDER BY medical_history.date DESC");
$stmt->execute(["$id_pet"]);
$results = $stmt->fetchAll();
if (isset($_POST["ajax"])) { echo json_encode($results); }
?>