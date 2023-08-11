<?php
include("conn.php");
// Get the email value from the AJAX request
$email = $_POST["email"];

// Validate and sanitize the email (you can add more validation if needed)
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $response = array(
    "success" => false,
    "message" => "Invalid email address"
  );
} else {
    $check_email = "SELECT email FROM email_list WHERE email = '$email'";
    $result = mysqli_query($db, $check_email);
    $user = mysqli_fetch_assoc($result);
    if($user){
        $response = array(
        "success" => false,
        "message" => "Email address already exist"
        );
    }else{
        $sql =  "INSERT INTO email_list (email) VALUES('$email') ";
        mysqli_query($db, $sql);

        // Return a success response
        $response = array(
            "success" => true,
            "message" => "Email saved successfully"
        );
    }
   
}

// Send the response back to the JavaScript code
echo json_encode($response);
?>