<?php

    session_start();

    include('conn.php');

    require_once('google-config.php');



    $errors = array(); 

    if(isset($_POST["username"]) && isset($_POST["password"]))

    {

     $username = mysqli_real_escape_string($db, $_POST["username"]);

     $password = md5(mysqli_real_escape_string($db, $_POST["password"]));

     $sql = "SELECT * FROM user WHERE username = '".$username."' AND password = '".$password."'";

     $result = mysqli_query($db, $sql);

     $num_row = mysqli_num_rows($result);

     if($num_row > 0)

     {

      $data = mysqli_fetch_array($result);

      $_SESSION['loggedin'] = TRUE;

      $_SESSION["username"] = $data["username"];

      $_SESSION["user_id"] = $data["user_id"];

      $_SESSION["email"]= $data["email"];

      $_SESSION["plan"] = $data["plan"];

    //   echo $data["plan"];

    //   echo $data["username"];

    //   echo $data["user_id"];

    //   echo $data["email"];

      echo "<script>location.href='./';</script>";

      //header("Location: index.php");

     }else {

        array_push($errors, "Wrong username/password combination");

    }



    }

?>





<?php

    include("header.php");

?>



<div class="container1">

    <div class="login">

        <h2>Login &nbsp;| </h2>&nbsp;<a style="text-decoration: none;" href="register">
            <h3>Signup</h3>
        </a>

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

        <div style="display: flex;">

            <p class="checkbox" style="font-size: 13px;"> Remember Me </p><input
                style="margin-left: 12px; margin-top: -14px;" type="checkbox">

        </div>

        <div>

            <a href="resset-password.php">

                <p style="font-size: 13px;">Forgotten Password?</p>

            </a>

        </div>



    </div>





    <div class="sign-in-google">

        <button style="border: none; background: none;" onclick="window.location = '<?php echo  $login_url; ?>'">

            <div class="sign-in-google-icon">

                <p>Continue with</p>

                <img src="img/1342004.png" alt="">

            </div>

        </button>

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