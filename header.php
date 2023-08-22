<?php

    //session_start();

    // echo $_SESSION['loggedin'];



?>



<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="img/Nukreakionz Smartcard Logo 2.png" />

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/pricing.css">
    <link href="./font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->

    <!--<link rel="preconnect" href="https://fonts.googleapis.com">-->

    <!--<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>-->

    <!--<link href="./font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">-->

    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>-->

    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">-->

    <!--<script defer src="https://cdn.crop.guide/loader/l.js?c=123ABC"></script>-->

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/> -->

    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">-->

    <!--<link href="./cropperjs/cropper.min.css" rel="stylesheet" type="text/css"/>-->

    <!--<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">-->

    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->

    <title>Digital Me</title>

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
    <style>
    @media only screen and (min-width: 900px) {
        #nav-nav-img {
            margin-left: -80px !important;
        }
    }
    </style>

    <div class="navbar">

        <div style="z-index: 999; display: flex; justify-content: space-between; width: 100%;" class="nav"
            id="myHeader">

            <div>
                <a href="./">

                    <img id="image nav-nav-img" class="logo-img" src="img/NDA Logo 1 3.png" alt="">
                </a>
            </div>



            <div class="mobile-menu">

                <button style="color: #fff;" class="icon"><i class=" icon fa fa-bars "></i></button>

            </div>





            <div class="button" id="btn-sticky">

                <a href="login">

                    <button
                        style="background: #FF8B3B; padding: 14px 32px 14px 32px; color: white; border-radius: 12px; border: none;">LOGIN</button>

                </a>

                <a href="register">

                    <button
                        style="margin-left: 0px; background: #F8F8F8; padding: 12px 30px 12px 30px; border: 2px solid #686868; border-radius: 12px;">SIGN
                        UP</button>

                </a>

            </div>

        </div>





        <div class="mobile-menu-list" style="display: none;">

            <ul class="">



                <li style="text-align: left; margin-top: 20px;"><a href="login">LOGIN</a></li>



                <li style="margin-top: 20px;"><a href="register">SIGN UP</a></li>



            </ul>

        </div>





    </div>



    <script>
    const menu = document.querySelector('.icon')

    const menu_link = document.querySelector('.mobile-menu-list');

    menu.addEventListener('click', function() {

        console.log('clicked');

        if (menu_link.style.display === "block") {

            menu_link.style.display = "none";

        } else {

            menu_link.style.display = "block";

        }

    });
    </script>

    <style>
    .mobile-menu-list {

        margin-top: 20px;

        color: #000;

        font-weight: 600;

        font-style: normal;

    }

    .mobile-menu-list a ul {

        color: #000;

        font-weight: 600;



    }

    a {

        text-decoration: none;

        color: #000;

        font-weight: 600;



    }

    ul {

        list-style: none;

    }
    </style>