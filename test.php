<?php

$myfun = password_hash("12345678", PASSWORD_DEFAULT);
    echo $myfun;
?>



<?php 
include("conn.php");
if(session_id() == ''){
    //session has not started
    session_start();
}


$user_id = $_SESSION['user_id'];
//include("login-handler.php");
    $currentPage = 'cardDetails';
    
    if (isset($_SESSION['username'])){
        include("user-header.php");
        //echo $_SESSION["user_id"];
    }else{
        //header("Location: login.php/");
        include("header.php");
    }
    
?>



<h2 class="card-header">Cards Created By <?php echo $_SESSION['username']; ?> </h2>



<ul class="cards">
<?php

$sql2 = mysqli_query($db, "SELECT * from card_details WHERE user_id = $user_id");
if(mysqli_num_rows($sql2)>0){

    while($row = mysqli_fetch_assoc($sql2)){
                                    
        $fname = $row['firstname'];
        $lname = $row['lastname'];
        

                                
?>
  
<?php
            }
            }

?>




