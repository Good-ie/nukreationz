<?php
session_start();
include('conn.php');
// echo "<Script>if(confirm('Are you sure you want this image deleted?'))</script>"

$imgid=$_GET['id'];
$id=$_GET['card'];
$query = "DELETE FROM images WHERE id = $imgid";
if ($db->query($query) === TRUE) {
header("Location: edit.php?id=$id");
}





?>