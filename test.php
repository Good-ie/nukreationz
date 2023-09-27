<?php
// Password to be hashed
$password = "12345678";

// Generate a Bcrypt hash of the password
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

// Display the hashed password
echo "Hashed Password: " . $hashedPassword;
?>