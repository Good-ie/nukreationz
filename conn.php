<?php



$servername = "localhost";

$username = "root";

$password = "";

$db = "nukreati_digital";



$conn = mysqli_connect($servername, $username, $password, $db);



if (!$conn) {

	die("Connection Failed: " .mysqli_connect_error($conn) );

}

/*

if (isset($conn) ) {

	echo "<script type='text/javascript'>alert('New Database Accessed!.')</script>";

}

*/



?>