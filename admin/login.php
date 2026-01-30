<?php

    session_start();

    include('conn.php');



    $errors = array();



if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $status = 'active';

    $username = mysqli_real_escape_string($db, $_POST["username"]);

    $password = md5(mysqli_real_escape_string($db, $_POST["password"]));



    $sql = "SELECT * FROM nadmin WHERE username = '$username' AND password = '$password' AND status = '$status'";

    $result = mysqli_query($db, $sql);



    if (!$result) {

        echo "Error: " . mysqli_error($db);

        exit();

    }
    
    if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $admin = mysqli_fetch_assoc($result);
        $adminstatus = $admin['status'];
        
        if ($adminstatus == "suspended") {
            echo '<script>alert("Your admin access has been suspended");</script>';
        } else {
            $_SESSION['loggedin'] = true;
            $_SESSION["username"] = $admin["username"];
            $_SESSION["admin_id"] = $admin["admin_id"];
            $_SESSION["email"] = $admin["email"];
            $_SESSION["user_type"] = $admin["user_type"];
            // removed duplicate
            $_SESSION["status"] = $admin["status"];
            
            header("Location: index.php");
        }
    } else {
        array_push($errors, "Wrong username/password combination");
        echo '<script>alert("Wrong username/password combination");</script>';
    }
}



}

?>







<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Login</title>

</head>



<body>



</body>



</html>



<div class="container1">

    <div class="login">

        <h2>Login</h2>



    </div>

    <div class="form-content1">

        <form action="" method="POST">

            <?php include('errors.php'); ?>

            <input type="text" name="username" placeholder="Username">

            <input type="password" name="password" placeholder="Password">

            <input style="width: 100%;" name="" type="submit" value="LOGIN">

        </form>



    </div>

    <div class="login-footer">

        <p class="checkbox" style="font-size: 13px;"> Remember Me </p><input type="checkbox">

        <a href="resset-password.php">

            <p style="margin-left: 190px; font-size: 13px;">Forgotten Password?</p>

        </a>

    </div>

</div>



<script src="js/main.js"></script>

<script>
if (window.history.replaceState) {

    window.history.replaceState(null, null, window.location.href);

}
</script>



</body>



</html>