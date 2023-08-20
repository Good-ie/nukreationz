<?php
session_start();
include('conn.php');

$id=$_GET['id'];
$user_id = $_SESSION["user_id"];

foreach ($_FILES['files']['name'] as $i => $name) {
    $tmp_name = $_FILES['files']['tmp_name'][$i];
    $type = $_FILES['files']['type'][$i];
    $size = $_FILES['files']['size'][$i];
    
    // validate file
    // move file to desired directory
    $target_dir = 'uploads/';
    $target_file = basename($name);
    move_uploaded_file($tmp_name, $target_file);
    
    // insert file information into database
    $stmt = $db->prepare("INSERT INTO images (user_id, card_id, file_name) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $user_id, $id, $target_file);
    $stmt->execute();
    header("Location: edit.php?id=$id");
}

// close the database connection
$db = null;



?>