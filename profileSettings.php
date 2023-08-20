<?php
session_start();
include('conn.php');

$currentPage = 'profile';
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
        $email = $row['email'];  
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];  
        $profileimage = $row['profile_image'];         
    }  
}
$plan = $newplannow;
$user_plan = $newplannow;


if (isset($_POST['updatename'])) {
  // receive all input values from the form
  $updatefirstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $updatelastname = mysqli_real_escape_string($db, $_POST['lastname']);


    
  $query = "UPDATE user SET firstname='$updatefirstname', lastname='$updatelastname', profile_image='$profileimage', created_at='$created_at' WHERE user_id = $user_id";
    if ($db->query($query) === TRUE) {
        
        // echo"<script>alert('Name Updated Successfully!')</script>";
       
       
    }
    
    if ($_FILES['profile_image']['name']) {
        $target_dir = 'uploads/';
        $target_file = basename($_FILES['profile_image']['name']);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $extensions_arr = array("jpg","jpeg","png","gif");

        // check if the uploaded file is an image
        if (in_array($imageFileType,$extensions_arr)) {
            // move the uploaded file to the target directory
            move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_dir . $target_file);

        } else {
            // handle the case where the uploaded file is not an image
            echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
        }

        $profileimageupload = "UPDATE user SET profile_image='$target_file', created_at='$created_at' WHERE user_id = $user_id";
        if ($db->query($profileimageupload) === TRUE) {
            echo "<script>alert('Profile image updated successfully!')</script>";
        }

    }
    
 header('Location: profileSettings.php');
        
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
                <a class="active-set" href="profileSettings">
                    <li>
                        <i class="bi bi-person-circle"></i>Profile
                    </li>
                </a>
                <a href="passwordSettings">
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
                        <img id="edited-img"
                            src="<?php if(!empty($profileimage)){echo'uploads/',$profileimage;}else{echo'img/user-img.png';} ?>"
                            alt="">
                    </div>

                    <div style="margin-top: 40px; margin-left: 20px;">
                        <span
                            style="font-size: 20px; text-transform: capitalize;"><b><?php echo $username; ?></b></span><br>
                        <span style=" text-transform: capitalize;"><?php echo $plan; ?></span>
                    </div>
                </div>
                <div class="view-profile-btn" style="margin-top: 30px;">
                    <button>View Profile</button>
                </div>
            </div>

        </div>

        <div class="profile-personal-info">
            <div class="personal-info-field">
                <p><b>Personal Info</b></p>
                <p>Update your photo and personal details.</p>
            </div>
            <div class="personal-field-form">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div style="border-bottom: 1px solid #EAECF0;">
                        <div class="personal-input-field" style="display: flex; margin-bottom: 20px;">
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">First Name</label>
                                <input type="text" name="firstname" value="<?php echo $firstname ?>"
                                    class="form-control" id="inputEmail4">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Last Name</label>
                                <input type="text" name="lastname" value="<?php echo $lastname ?>" class="form-control"
                                    id="inputPassword4">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Email</label>
                            <input type="email" readonly class="form-control" id="inputAddress"
                                value="<?php echo $email; ?>">
                        </div>

                        <div class="upload-box" id="uploadBox">
                            <input type="file" id="fileInput" accept="image/jpeg, imgae/png, image/jpg" name="profile_image" onchange="
                                display_image(this.files[0])">
                            <span class="upload-icon" id="uploadIcon"></span>
                            <span class="upload-text" id="uploadText">Click to upload</span>
                        </div>
                    </div>


                    <div style="margin-top: 30px;" class="col-12">
                        <button type="submit" name="updatename" class="btn btn-primary">Save
                            changes</button>
                    </div>

                </form>
            </div>
        </div>
        <div class="profile-personal-info">
            <div class="personal-info-field">
                <p><b>Profile</b></p>
                <p>Update your portfolio and bio.</p>
            </div>
            <div class="personal-field-form">
                <form action="">
                    <div style="border-bottom: 1px solid #EAECF0;">
                        <div class="personal-input-field" style="display: flex; margin-bottom: 20px;">
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Username</label>
                                <input type="text" readonly value="<?php echo $username; ?>" class="form-control"
                                    id="inputEmail4">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Date Created</label>
                                <input type="text" value="<?php echo $created_at; ?>" readonly class="form-control"
                                    id="inputPassword4">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Website</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="www.example.com">
                        </div>


                    </div>


                    <div style="margin-top: 30px;" class="col-12">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<script>
const uploadBox = document.getElementById("uploadBox");
const fileInput = document.getElementById("fileInput");
const uploadIcon = document.getElementById("uploadIcon");
const uploadText = document.getElementById("uploadText");

uploadBox.addEventListener("click", () => {
    fileInput.click();
});

fileInput.addEventListener("change", () => {
    const files = fileInput.files;
    if (files.length === 0) {
        return;
    }

    uploadText.innerText = files[0].name;
    uploadIcon.style.display = "none";
    uploadText.style.color = "#000";
});

function display_image(file) {
    var img = document.querySelector("#fileInput");
    var prototype_img = document.querySelector("#edited-img");
    img.src = URL.createObjectURL(file);
    prototype_img.src = URL.createObjectURL(file);
}
</script>
<script src="js/main.js"></script>