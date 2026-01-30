<?php
$username = $_SESSION['username'];

include('conn.php');
include "phpqrcode/qrlib.php";

if (isset($_POST['reg_user'])) {
    // Initialize variables
    $img_ex_lc = '';
    $allowed_exs = array("jpg", "jpeg", "png", "svg");
    $preferedprofile = 'profile2';
    $user_id = 0;
    $new_img_name = '';
    
    // receive all input values from the form
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $cname = mysqli_real_escape_string($db, $_POST['cname']);
    $psummary = mysqli_real_escape_string($db, $_POST['psummary']);
    $website = mysqli_real_escape_string($db, $_POST['website']);
    $jobtitle = mysqli_real_escape_string($db, $_POST['jobtitle']);
    $color = mysqli_real_escape_string($db, $_POST['color-input']);
    $sec_color = mysqli_real_escape_string($db, $_POST['color-input-sec']);
    $text_color = mysqli_real_escape_string($db, $_POST['text-color-input']);
    
    // Use correct field names from form
    $profile1 = isset($_POST['profile1']) ? mysqli_real_escape_string($db, $_POST['profile1']) : '';
    $profile2 = isset($_POST['profile2']) ? mysqli_real_escape_string($db, $_POST['profile2']) : '';
    $profile3 = isset($_POST['profile3']) ? mysqli_real_escape_string($db, $_POST['profile3']) : '';
    
    // social page 
    $facebook = mysqli_real_escape_string($db, $_POST['facebook-link']);
    $instagram = mysqli_real_escape_string($db, $_POST['instagram-link']);
    $twitter = mysqli_real_escape_string($db, $_POST['twitter-link']);
    $linkedin = mysqli_real_escape_string($db, $_POST['linkedin-link']);
    $pintrest = mysqli_real_escape_string($db, $_POST['pin-link']);
    $youtube = mysqli_real_escape_string($db, $_POST['youtube-link']);
    $whatsapp = mysqli_real_escape_string($db, $_POST['whatsapp-link']);
    
    // check selected profile template
    $profiles = [$profile1, $profile2, $profile3];
    foreach ($profiles as $profile) {
        if (!empty($profile)) {
            $preferedprofile = $profile;
            break;
        }
    }

    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    $sql_query = "SELECT user_id from user where username like '$username'";
    $result = mysqli_query($db, $sql_query);
    
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['user_id'];
        
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        
        // Generate filename ONCE here
        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
    }
    
    if (!empty($img_ex_lc) && in_array($img_ex_lc, $allowed_exs)) {
        $img_upload_path = 'uploads/'.$new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);

        // Attempt insert query execution
        $sql = "INSERT INTO card_details (user_id, firstname, lastname, email, phone, caddress, company_name, psummary, jobtitle, website_link, images, profile_page, color, sec_color, text_color) VALUES ('$user_id', '$fname', '$lname', '$email', '$phone', '$address', '$cname', '$psummary', '$jobtitle', '$website', '$new_img_name', '$preferedprofile', '$color', '$sec_color', '$text_color')";
        
        if($db->query($sql) === true){
            $card_id = mysqli_insert_id($db);
        } else {
            echo "ERROR: " . $db->error;
            exit;
        }

        $query2 = "INSERT INTO user_social_link (card_id, user_id, facebook, instagram, linkedin, twitter, whatsapp, pintrest, youtube)
                    VALUES('$card_id', '$user_id', '$facebook', '$instagram', '$linkedin', '$twitter', '$whatsapp', '$pintrest', '$youtube')";
        mysqli_query($db, $query2);

        $images = $_FILES['files'];
        $num_of_imgs = count($images['name']);

        for ($i=0; $i < $num_of_imgs; $i++) { 
            $image_name = $images['name'][$i];
            $tmp_name = $images['tmp_name'][$i];
            $error = $images['error'][$i];

            if ($error === 0) {
                $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $allowed_exs = array('jpg', 'jpeg', 'png');

                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid('IMG-', true).'.'.$img_ex_lc;
                    $img_upload_path = 'uploads/'.$new_img_name;

                    $sql = "INSERT INTO images (user_id, card_id, file_name) VALUES (?,?,?)";
                    $stmt = $db->prepare($sql);
                    $stmt->bind_param('sss', $user_id, $card_id, $new_img_name);
                    $stmt->execute();

                    move_uploaded_file($tmp_name, $img_upload_path);
                } else {
                    $em = "You can't upload files of this type";
                    header("Location: card_details.php?error=$em");
                    exit;
                }
            }
        }
        
        echo "<script>location.href='card-success.php';</script>";
    }
    
    $db->close();
}
?>
