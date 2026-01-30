<?php

include("conn.php");



if (!isset($_SESSION['username'])) {

    $_SESSION['msg'] = "You must log in first";

    header('location: login.php');

    

}


$user_id = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : 0;

// Set default values
$newplannow = 'free';
$username = '';
$created_at = '';
$email = '';
$firstname = '';
$lastname = '';
$profileimage = '';
$sub_end_date = date('Y-m-d');

if($user_id > 0) {
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
            $sub_end_date = $row['sub_end'] ?? date('Y-m-d');
        }
    }
}

$sub_end = new DateTime($sub_end_date);
$currentDate = new DateTime();

if ($currentDate > $sub_end) {
    $sql = "UPDATE user SET plan = 'free', created_at = '$created_at', updated_at = NOW() WHERE user_id = $user_id";
    
    if ($db->query($sql) === true) {
        $affected_rows = $db->affected_rows;
        if ($affected_rows > 0) {
            
        } else {
        
        }
    } else {
        
    }
}








    

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta property="og:title"
        content="NUKZ QR - The Best QR Code Generator for Android and IOS | Nukreationz Digital" />

    <meta property="og:url" content="https://www.nukreationzdigitals.com/qr" />

    <meta name="robots" content="index, follow" />

    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />

    <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />

    <meta property="og:type" content="website">

    <meta name="keywords"
        content="QR Code Generator, QR Code Generator, Free QR Code Generator, Free QR Code Generator Online, QR Code Management Platform, Professional QR Code Generator, Business QR Code Generator, custom QR Codes" />

    <meta name="description"
        content="Generate fast, unique and dynamic QR codes with NUKZ QR. Our QR code generator is compatible with android and IOS devices. Get started now!" />





    <meta property="og:image" content="https://nukreationzdigital.com/qr/img/qrimage.png">

    <meta property="og:site_name" content="NUKZ QR">

    <meta property="og:description"
        content="Experience the power of our top-rated QR Code generator and management platform designed for businesses and marketing purposes. Generate custom QR Codes with ease, bulk upload capabilities, APIs, and various shapes. Our platform supports a wide range of applications, including links, social media, apps, forms, URLs, vCards, Facebook, Instagram, websites, YouTube, and much more. Get started today and elevate your QR Code strategy to new heights.">

    <link rel="shortcut icon" href="img/Nukreakionz Smartcard Logo 2.png" />

    <link rel="stylesheet" href="css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="./font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <script defer src="https://cdn.crop.guide/loader/l.js?c=123ABC"></script>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link href="./cropperjs/cropper.min.css" rel="stylesheet" type="text/css" />

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>NUKZ QR - The Best QR Code Generator for Android and IOS | Nukreationz Digital</title>

</head>

<!-- Google tag (gtag.js) -->

<script async src="https://www.googletagmanager.com/gtag/js?id=G-RM806B8K89"></script>

<script>
window.dataLayer = window.dataLayer || [];

function gtag() {
    dataLayer.push(arguments);
}

gtag('js', new Date());



gtag('config', 'G-RM806B8K89');
</script>

<body>

    <!-- <div id="loader"></div> -->

    <style>
    img {

        display: block;

        max-width: 100%;

    }

    .preview {

        overflow: hidden;

        width: 160px;

        height: 160px;

        margin: 10px;

        border: 1px solid red;

    }

    .mobile-menu-list {

        margin-top: 35px;

        color: #000;

        font-weight: 600;

        font-style: normal;

        text-align: left;

        position: fixed;

        background: #fff;

        width: 300px;

    }

    .mobile-menu-list a ul {

        color: #000;

    }

    a {

        text-decoration: none;

        color: #000;

    }

    ul {

        list-style: none;

    }

    .disapear {

        display: none;

    }



    a:hover {

        color: #FF8B3B !important;

    }
    </style>





    <div class="navbar" style="z-index: 999; display: flex; justify-content: space-evenly;">

        <div class="nav" id="myHeader">

            <div>

                <img id="image" class="logo-img" src="img/NDA Logo 1 3.png" alt="">

            </div>

            <div style="text-align: center; margin-left: 100px; justify-content: center; display: flex;"
                class="nav-text">

                <a class="<?php if($currentPage =='home'){echo 'active';}?>" href="./">HOME</a>

                <!-- <a href="">ABOUT US</a> -->

                <a class="<?php if($currentPage =='dashboard'){echo 'active';}?>" href="dashboard">DASHBOARD</a>



                <a class="<?php if($currentPage =='tools'){echo 'active';}?>" href="tools">GENERATE QR CODE</a>

                <a class="<?php if($currentPage =='wallet'){echo 'active';}?>" href="wallet">WALLET</a>

                <a class="<?php if($currentPage =='pricing'){echo 'active';}?>" href="pricing">PRICING</a>

                <a class="<?php if($currentPage =='support'){echo 'active';}?>" href="support">SUPPORT</a>


            </div>



            <div class="mobile-menu icon">

                <button style="color: #fff;" class="icon"><i class="icon fa fa-bars "></i></button>

            </div>



            <?php  if (isset($_SESSION['username'])) :?>







            <div style="display: flex; margin-left: 100px;" id="login-user-button" class="">

                <a href="">

                    <p><?php echo $_SESSION['username']; ?></p>

                </a>







                <img class="img" style=" object-fit: cover; width: 50px; cursor: pointer; height: 50px; margin-top: px; border-radius: 50%; background: #D9D9D9;

                        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.12); padding: 2px;"
                    src="<?php if(!empty($profileimage)){echo'uploads/',$profileimage;}else{echo'img/user-img.png';} ?>"
                    alt="nukreationz" ">

                    

                   

                    

                </div>

                

            <?php endif ?>

        </div>



        

        <div class=" top-profile-card " style=" display: none;">

                <div class="top-profile-card-img">

                    <h2>Welcome<br> <?php echo $_SESSION['username']; ?>!</h2>

                    <h4 style="font-size: 15px; margin-bottom: 20px; margin-top: 10px;">Current Plan: <b
                            style="text-transform: uppercase;"> <?php echo $newplannow; ?></b></h4>

                </div>



                <ul style="margin-left: 20px; font-size: 18px;">

                    <li><a class="<?php if($currentPage =='userProfile'){echo 'active';}?>"
                            href="profileSettings">Profile</a></li>

                    <li><a class="<?php if($currentPage =='settinga'){echo 'active';}?>"
                            href="profileSettings">Settings</a></li>

                    <li><a href="logout">Logout</a></li>

                </ul>

            </div>

        </div>



        <div class="mobile-menu-list" style="display: none;">

            <ul class="">

                <li><a class="<?php if($currentPage =='home'){echo 'active';}?>" href="./">HOME</a></li><br>

                <!-- <a href="">ABOUT US</a> -->

                <li><a class="<?php if($currentPage =='createCard'){echo 'active';}?>" href="dashboard">DASHBOARD</a>
                </li><br>



                <li><a class="<?php if($currentPage =='tools'){echo 'active';}?>" href="tools">GENERATE QR CODE</a></li>
                <br>

                <li><a class="<?php if($currentPage =='pricing'){echo 'active';}?>" href="pricing">PRICING</a></li><br>



                <li><a class="<?php if($currentPage =='support'){echo 'active';}?>" href="support">SUPPORT</a></li><br>

                <li><a class="<?php if($currentPage =='support'){echo 'active';}?>" href="profileSettings">PROFILE</a>
                </li>
                <br>
                <li> <a href="logout">LOGOUT</a></li>

            </ul>

        </div>



        <!-- <script src="js/main.js"></script> -->

        <!-- <script src="js/page.js" ></script> -->

        <script>
        // -------- top Profile card

        const menu = document.querySelector('.icon');

        const menu_link = document.querySelector('.mobile-menu-list');

        const user_button = document.getElementById('login-user-button');

        const user_profile_card = document.querySelector('.top-profile-card');

        const user_image = document.querySelector('.img');



        user_image.addEventListener('click', function() {

            console.log('clicked');

            event.stopPropagation();



            if (user_profile_card.style.display === "none") {

                user_profile_card.style.display = "block";

            } else {

                user_profile_card.style.display = "none";

            }



        });



        document.addEventListener('click', function(event) {

            if (!user_profile_card.contains(event.target) && event.target !== user_image) {

                user_profile_card.style.display = "none";

            }

        });

        window.addEventListener('scroll', function() {

            if (user_profile_card.style.display !== "none") {

                user_profile_card.style.display = "none";

            }

        });

        user_profile_card.addEventListener('mouseout', function() {

            if (user_profile_card.style.display === "none") {

                user_profile_card.style.display = "block";

            } else {

                user_profile_card.style.display = "block";

            }



        })









        menu.addEventListener('click', function() {

            console.log('clicked');

            if (menu_link.style.display === "block") {

                menu_link.style.display = "none";

            } else {

                menu_link.style.display = "block";

            }

        });





        window.addEventListener('scroll', function() {

            // Set the display property of the menu_link element to "none"

            menu_link.style.display = "none";

        });
        </script>