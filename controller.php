<?php
session_start();
  include('conn.php');
require_once('google-config.php');
if(isset($_GET["code"])){
    $toke = $gClient->fetchAccessTokenWithAuthCode($_GET["code"]);

}else{
    header('Location: index.php');
    exit();
}

if(isset($toke["error"]) != "invalid_grant"){
$oAuth = new Google_Service_Oauth2($gClient);
$userData = $oAuth ->userinfo_v2_me->get();


$useremail = $userData['email'];
$sql = "SELECT * FROM user WHERE email = '".$useremail."' ";
$result = mysqli_query($db, $sql);
     $num_row = mysqli_num_rows($result);
     if($num_row > 0)
     {
      $data = mysqli_fetch_array($result);
      
      $_SESSION['loggedin'] = TRUE;
      $_SESSION["username"] = $data["username"];
      $_SESSION["user_id"] = $data["user_id"];
      $_SESSION["email"]= $data["email"];
      $_SESSION["user_type"]= $data["user_type"];
      $_SESSION["plan"] = $data["plan"];
      $_SESSION["sub_period"] = $data["sub_period"];
      
      echo "<script>location.href='index';</script>";
    //   header("Location: index.php");
     }else{
        echo "<script>location.href='register';</script>";
     }
}else{
    header("Location: login.php");
    exit();
}


?>