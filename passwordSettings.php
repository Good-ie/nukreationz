<?php
session_start();
include('conn.php');

$currentPage = 'password';
include "profile-header.php";

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

$user_id = $_SESSION["user_id"];

$newplan = mysqli_query($db, "SELECT * FROM user where user_id = $user_id ");
if(mysqli_num_rows($newplan)>0){
    while($row = mysqli_fetch_assoc($newplan)){        
        $newplannow = $row['plan'];  
        $username = $row['username']; 
        $created_at = $row['created_at'];
        $password = $row['password'];              
    }  
}
$plan = $newplannow;
$user_plan = $newplannow;

$oldpassword = "";
$newpassword    = "";
$newpassword2 = "";
$errors = array(); 



// REGISTER USER
if (isset($_POST['updatepassword'])) {
  // receive all input values from the form
  $oldpassword = mysqli_real_escape_string($db, $_POST['oldpassword']);
  $newpassword = mysqli_real_escape_string($db, $_POST['newpassword']);
  $newpassword2 = mysqli_real_escape_string($db, $_POST['newpassword2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($oldpassword)) { array_push($errors, "Old Password is required"); }
  if (empty($newpassword)) { array_push($errors, "New password is required"); }
  if (empty($newpassword2)) { array_push($errors, "Retype new password"); }
  if ($newpassword != $newpassword2) {
	array_push($errors, "The two new passwords do not match");
  }
  if (md5($oldpassword) != $password) {
	array_push($errors, "The old password is incorrect");
  }

  $hashnewpassword = md5($newpassword);

  if ($hashnewpassword = $password) {
  	$query = "UPDATE user SET password='$hashnewpassword' WHERE user_id = $user_id";
    if ($db->query($query) === TRUE) {
        
        echo"<script>alert('Password Updated Successfully!')</script>";
    }else{
        
    }
  }
  
}

?>
<style>
body {
    background: #FCFCFD;
}
</style>
<div class="profile-settings-body">
    <div class="profile-set-first">
        <h2>Settings</h2>
        <div class="profile-set-side">
            <ul>
                <a href="profileSettings">
                    <li>
                        <i class="bi bi-person-circle"></i>Profile
                    </li>
                </a>
                <a class="active-set" href="passwordSettings">
                    <li>
                        <i class="bi bi-shield-lock"></i>Password
                    </li>
                </a>
                <a href="billing">
                    <li>
                        <i class="bi bi-cash"></i>Billing
                    </li>
                </a>
                <a href="notification">
                    <li>
                        <i class="bi bi-bell"></i>Notification <span>0</span>
                    </li>
                </a>
            </ul>
        </div>
    </div>


    <div class="profile-set-second">
        <div>
            <div class="profile-user-top">
                <div style="display: flex;">
                    <div>
                        <img src="<?php if(!empty($profileimage)){echo'uploads/',$profileimage;}else{echo'img/user-img.png';} ?>" alt="">
                    </div>

                    <div style="margin-top: 40px; margin-left: 20px;">
                        <span
                            style="font-size: 20px; text-transform: capitalize;"><b><?php echo $username; ?></b></span><br>
                        <span style="text-transform: capitalize;"><?php echo $plan; ?></span>
                    </div>
                </div>
                <div class="view-profile-btn" style="margin-top: 30px;">
                    <button>View Profile</button>
                </div>
            </div>

        </div>


        <div class="passwordheader" style="padding: 30px; line-height: 5px;">
            <p><b>Password</b></p>
            <p>Please enter your current password to change your password.</p>
        </div>

        <div class="password-reset-set">
            <form action="" method="POST">
                <?php include('errors.php'); ?>
                <div style="border-bottom: 2px solid #eaecf0; padding: 0 0 20px 0  !important;" class=" row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Current Password</label>
                    <div class=" col-sm-10">
                        <input type="password" name="oldpassword" class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class=" password-set row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="newpassword" class="form-control" id="inputPassword3">
                    </div>
                </div>
                <div class=" password-set row mb-3">

                    <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm
                        New
                        Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="newpassword2" class="form-control" id="inputPassword3">
                    </div>
                </div>
                <div class="update-password">
                    <input style="width: fit-content;" name="updatepassword" type="submit" value="Update password">
                </div>
            </form>
        </div>
    </div>
    <script src="js/main.js"></script>