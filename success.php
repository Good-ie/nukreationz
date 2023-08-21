<?php

session_start();

include('conn.php');



if (!isset($_GET['reference'], $_GET['plan'], $_GET['period'], $_GET['price'])) {

    echo 'Missing parameters';

    exit;

}



$reference = mysqli_real_escape_string($db, $_GET['reference']);

$plan = mysqli_real_escape_string($db, $_GET['plan']);

$period = mysqli_real_escape_string($db, $_GET['period']);

$price = mysqli_real_escape_string($db, $_GET['price']);

$future_date_month = date('Y-m-d', strtotime('+30 days'));

$future_date_year = date('Y-m-d', strtotime('+365 days'));

$date_now = date('Y-m-d');



$user_id = $_SESSION['user_id'];

$email = $_SESSION['email'];

$name = $_SESSION['username'];





$sql2 = mysqli_query($db, "SELECT * from user WHERE user_id = $user_id ");

if(mysqli_num_rows($sql2)>0){

    while($row = mysqli_fetch_assoc($sql2)){        

        $created_at = $row['created_at'];  

        $userplan = $row['plan'];              

    }  

}



if($plan === 'starter' && $period === 'monthly'){

    $sql = "UPDATE user SET plan='$plan', sub_start='$date_now', sub_period = '$period', sub_end='$future_date_month', created_at='$created_at' WHERE user_id = $user_id";

    if ($db->query($sql) === TRUE) {

         echo "<script>location.href='tools';</script>";

    } else {

        echo "Error updating status: " . $db->error;

    }

} elseif($plan === 'business' && $period === 'monthly'){

    $sql = "UPDATE user SET plan='$plan', sub_start='$date_now', sub_period = '$period', sub_end='$future_date_month', created_at='$created_at' WHERE user_id = $user_id";

    if ($db->query($sql) === TRUE) {

        echo "<script>location.href='tools';</script>";

    } else {

        echo "Error updating status: " . $db->error;

    }

}elseif($plan === 'ultimal' && $period === 'monthly'){

    $sql = "UPDATE user SET plan='$plan', sub_start='$date_now', sub_period = '$period', sub_end='$future_date_month', created_at='$created_at' WHERE user_id = $user_id";

    if ($db->query($sql) === TRUE) {

        echo "<script>location.href='tools';</script>";

    } else {

        echo "Error updating status: " . $db->error;

    }

}elseif($plan === 'starter' && $period === 'yearly'){

    $sql = "UPDATE user SET plan='$plan', sub_start='$date_now', sub_period = '$period', sub_end='$future_date_year', created_at='$created_at' WHERE user_id = $user_id";

    if ($db->query($sql) === TRUE) {

        echo "<script>location.href='tools';</script>";

    } else {

        echo "Error updating status: " . $db->error;

    }

}elseif($plan === 'business' && $period === 'yearly'){

    $sql = "UPDATE user SET plan='$plan', sub_start='$date_now', sub_period = '$period', sub_end='$future_date_year', created_at='$created_at' WHERE user_id = $user_id";

    if ($db->query($sql) === TRUE) {

        echo "<script>location.href='tools';</script>";

    } else {

        echo "Error updating status: " . $db->error;

    }

}elseif($plan === 'ultimal' && $period === 'yearly'){

    $sql = "UPDATE user SET plan='$plan', sub_start='$date_now', sub_period = '$period', sub_end='$future_date_year', created_at='$created_at' WHERE user_id = $user_id";

    if ($db->query($sql) === TRUE) {

        echo "<script>location.href='tools';</script>";

    } else {

        echo "Error updating status: " . $db->error;

    }

}



$enddate = date('Y-m-d');
if($period === "yearly"){
    $enddate = date('Y-m-d', strtotime('+365 days'));
}else if ($period === "monthly"){
    $enddate = date('Y-m-d', strtotime('+30 days'));
}

$query = "INSERT INTO billing (user_id, tran_reference, amount, plan, period, start_date, end_date, status) 

  			  VALUES('$user_id', '$reference', '$price', '$plan', '$period', '$date_now', '$enddate', 'paid')";

  	mysqli_query($db, $query);









$to = $email;

  $subject = 'Thank you for subscribing';

  $message = "Dear $name,\n\nThank you for subscribing to our $plan plan!



    We're excited to have you as a subscriber and can't wait to get started.

    

    As a subscriber, you'll have access to several list of benefits/features included in the $plan plan. We're confident that you'll find [$plan plan] to be a valuable resource.

    If you have any questions or concerns, please don't hesitate to contact us at [info@nukreationzdigital.com]. We're always here to help.

    

    Thanks again for subscribing, and we look forward to serving you!\n\nBest regards,\nThe Nukreationzdigital Team";

  $headers = 'Nukreationzdigital Subscription <info@nukreationzdigital.com>' . "\r\n"  .

             'Reply-To: info@nukreationzdigital.com' . "\r\n" .

             'X-Mailer: PHP/' . phpversion();

  mail($to, $subject, $message, $headers);

?>