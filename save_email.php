<?php
include("conn.php");
// Get the email value from the AJAX request
$email = $_POST["email"];
$name = $_POST["name"];

// Validate and sanitize the email (you can add more validation if needed)
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $response = array(
    "success" => false,
    "message" => "Invalid email address"
  );
} else {
    $check_email = "SELECT email FROM email_list WHERE email = '$email'";
    $result = mysqli_query($conn, $check_email);
    $user = mysqli_fetch_assoc($result);
    if($user){
        $response = array(
        "success" => false,
        "message" => "Email address already exist"
        );
    }else{
        $sql =  "INSERT INTO email_list (email, name) VALUES('$email', '$name') ";
        mysqli_query($conn, $sql);

        // Return a success response
        $response = array(
            "success" => true,
            "message" => "Email saved successfully"
        );
        
        $to = $email;
        $subject = 'Thank you for subscribing';
        $message = "Dear $name,\n\nThank you for subscribing to our newsletter! We are thrilled to have you on board.
        
By subscribing, you'll receive the latest updates, news, and special offers delivered straight to your inbox. 
We promise to provide you with valuable content, exclusive promotions, and exciting announcements.
                    
If you ever have any questions or feedback, feel free to reach out to us. We'd love to hear from you!
                    
Once again, thank you for joining our newsletter community. We look forward to sharing our updates with you.
                    
Best regards,
Nukreationz Digital Team";
        $fromName = 'Nukreationzdigital Subscription';
        $fromEmail = 'info@nukreationzdigital.com';
        
        $headers = 'From: "' . $fromName . '" <' . $fromEmail . '>' . "\r\n";
        
        mail($to, $subject, $message, $headers);


    }
   
}

// Send the response back to the JavaScript code
echo json_encode($response);



?>