<?php
include("conn.php");
$id = $_GET['id'];


$sql = mysqli_query($db, "DELETE FROM card_details WHERE card_id = $id;");
header("Location: card_details_view2");



?>