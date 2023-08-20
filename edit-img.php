<?php

    session_start();
    $username = $_SESSION['username'];

    // echo ('something');
    include('conn.php');
    include "phpqrcode/qrlib.php";
    
    $id=$_GET['id'];
    if (isset($_POST['change-img'])) {
        $img_name = $_FILES['editted-img']['name'];
        $img_size = $_FILES['editted-img']['size'];
        $tmp_name = $_FILES['editted-img']['tmp_name'];
        


    $sql2 = mysqli_query($db, "SELECT * from card_details WHERE card_id = $id ");
                if(mysqli_num_rows($sql2)>0){
                
                    while($row = mysqli_fetch_assoc($sql2)){
                
                        $card_id = $row['card_id'];  
                        $created_at = $row['created_on'];                
                    }
                }
    $sql_query = "SELECT user_id from user where username like '$username'";
    $result = mysqli_query($db, $sql_query);
    
    if(mysqli_num_rows($result) > 0 ){
    
        $row = mysqli_fetch_assoc($result);
        $user_id =  $row['user_id'];
        
        
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

        $allowed_exs = array("jpg", "jpeg", "png", "svg" );
        if (in_array($img_ex_lc, $allowed_exs)) {
        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
        $img_upload_path = 'uploads/'.$new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);
        


        // Attempt insert query execution
        $sql = "UPDATE  card_details SET  images='$new_img_name', created_on ='$created_at', updated_at = NOW() WHERE card_id = $card_id ";
        if($db->query($sql) === true){
            $card_id = mysqli_insert_id($db);
            echo "<script>location.href='edit?id=$id';</script>";
        } else{
            echo "ERROR: Could not able to execute $sql. " . $db->error;
        }
    }
}
}

?>