<?php
session_start();
    $username = $_SESSION['username'];

// echo ('something');
include('conn.php');
include "phpqrcode/qrlib.php";

$id=$_GET['id'];


if (isset($_POST['reg_user'])) {
    

    // social page 
    $facebook = mysqli_real_escape_string($db, $_POST['facebook']);
    $instagram = mysqli_real_escape_string($db, $_POST['instagram']);
    $twitter = mysqli_real_escape_string($db, $_POST['twitter']);
    $linkedin = mysqli_real_escape_string($db, $_POST['linkedin']);
    $pintrest = mysqli_real_escape_string($db, $_POST['pintrest']);
    $youtube = mysqli_real_escape_string($db, $_POST['youtube']);
    $whatsapp = mysqli_real_escape_string($db, $_POST['whatsapp']);


    $sql33 = mysqli_query($db, "SELECT * from user_social_link WHERE card_id = $id ");
                            if(mysqli_num_rows($sql33)>0){
                            
                                while($row = mysqli_fetch_assoc($sql33)){

                                    $link_id = $row['link_id'];
                                    $user_id = $row['user_id'];
                                    $card_id = $row['card_id'];
                                    


        // Attempt insert query execution
       
        $update_Social = "UPDATE user_social_link SET link_id='$link_id', user_id='$user_id', card_id='$id', facebook='$facebook', instagram='$instagram', linkedin='$linkedin', twitter='$twitter', whatsapp='$whatsapp', pintrest='$pintrest', youtube='$youtube' WHERE card_id = $card_id ";
        if($db->query($update_Social) === true){
            $card_id = $db->insert_id;
            echo '<script>location.href="edit.php?id='.$id.'";</script>';
        } else{
            echo "ERROR: Could not able to execute $sql. " . $db->error;
        }
                                }
                            }

}

?>