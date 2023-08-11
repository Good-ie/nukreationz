<?php

include 'conn.php';


if (isset($_GET['ordered_item'])) {
    echo $_GET['email'];
}
if (!isset($_GET['ordered_item'])) {
    
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <title>NuKreationz Digital Solutions Website | Place Your Order</title>
    <!-- Stylesheets -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&amp;family=Teko:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/owl.css" rel="stylesheet">
    <link href="css/flaticon.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/jquery-ui.css" rel="stylesheet">
    <link href="css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="css/hover.css" rel="stylesheet">
    <link href="css/custom-animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- rtl css -->
    <link href="css/rtl.css" rel="stylesheet">
    <!-- Responsive File -->
    <link href="css/responsive.css" rel="stylesheet">

    <!-- Color css -->
    <link rel="stylesheet" id="jssDefault" href="css/colors/color-default.css">

    <link rel="shortcut icon" href="images/faviconmixed.png" id="fav-shortcut" type="image/x-icon">
    <link rel="icon" href="images/faviconmixed.png" id="fav-icon" type="image/x-icon">

    <!-- Responsive Settings -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>

    <div class="page-wrapper">

        <!-- Main Header -->
        <?php include'header.php'; ?>
        <!-- End Main Header -->

        <!--Mobile Menu-->
        <?php include'mobile_menu.php'; ?>

        <!--Search Popup-->
        <?php include'popup.php'; ?>

        <!-- Banner Section -->
        <section class="page-banner">
            <div class="image-layer" style="background-image:url(images/background/image-7.jpg);"></div>
            <div class="shape-1"></div>
            <div class="shape-2"></div>
            <div class="banner-inner">
                <div class="auto-container">
                    <div class="inner-container clearfix">
                        <h1>Place An Order</h1>
                        <div class="page-nav">
                            <ul class="bread-crumb clearfix">
                                <li><a href="index.php">Home</a></li>
                                <li class="active">Place Your Order</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Banner Section -->

        <!--Contact Section-->
        <section class="contact-section">
            <div class="auto-container">
                <div class="sec-title centered">
                    <h2>We always offer Quality<span class="dot">.</span></h2>
                </div>

                <div class="map-box">
                    <!--<iframe class="map-iframe"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d230899.1642407818!2d145.06327708904033!3d-37.792102974783376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65cd0db468a97%3A0xb61fde84306fc38a!2sMelbourne%20Zoo!5e0!3m2!1sen!2s!4v1592307685926!5m2!1sen!2s"
                        style="border:0;" aria-hidden="false" tabindex="0"></iframe>-->
                        
                        <iframe  class="map-iframe"  src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15855.493202032374!2d3.3683023!3d6.5376806!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2b5dd0e95998805f!2sNukreationz%20Printing%20Solutions%20Ltd!5e0!3m2!1sen!2sng!4v1638972616210!5m2!1sen!2sng" width="100%" height="800" style="align:center !important; border:0;"  allowfullscreen="" loading="lazy"></iframe>
                        
                        <!--<iframe  class="map-iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.8755622513618!2d3.3666598148084312!3d6.537395324815258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8dbad3f41597%3A0x24748d5ae90ef05e!2s67%20Akeju%20St%2C%20Onipanu%20102216%2C%20Lagos!5e0!3m2!1sen!2sng!4v1636720135296!5m2!1sen!2sng" width="100%" height="800" style="align:center !important; border:0;" allowfullscreen="" loading="lazy"></iframe>-->
                </div>
                <div class="form-box">
                    <div class="sec-title">
                        <h2>Request a Quote<span class="dot">.</span></h2>
                    </div>
                    <div class="default-form">
                        <form method="post" action="#" id="contact-form">
                            <div class="row clearfix">
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <div class="field-inner">
                                        <input type="text" name="username" value="" placeholder="Your Name" required="">
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <div class="field-inner">
                                        <input type="email" name="email" value="" placeholder="Email Address"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <div class="field-inner">
                                        <input type="text" name="phone" value="" placeholder="Phone Number" required="">
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <div class="field-inner">
                                        <input type="text" name="selected_order" value="" disabled>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <div class="field-inner">
                                        <select name="new_order" id="new_order">
                                            <option value=" " selected >-Select Extra Order-</option>
                                          <option value="Website Development">Website Development</option>
                                          <option value="Online Advertisement">Online Advertisement</option>
                                          <option value="Social Media Marketing">Social Media Marketing</option>
                                          <option value="Search Engine Optimization">Search Engine Optimization</option>
                                          <option value="App Development">App Development</option>
                                          <option value="Bulk SMS">Bulk SMS</option>
                                         </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <div class="field-inner">
                                        <input type="text" name="subject" value="" placeholder="Subject" required="">
                                    </div>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <div class="field-inner">
                                        <textarea name="message" placeholder="Write Message" required=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <button class="theme-btn btn-style-one">
                                        <i class="btn-curve"></i>
                                        <span class="btn-title">Submit Order</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Footer -->
        <?php include'footer.php'; ?>

    </div>
    <!--End pagewrapper-->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1qUNOxeOe519_odAAopxJK2t5zNFmnu8-M&amp;ver=2.1.6"></script>
    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/TweenMax.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.fancybox.js"></script>
    <script src="js/owl.js"></script>
    <script src="js/mixitup.js"></script>
    <script src="js/knob.js"></script>
    <script src="js/validate.js"></script>
    <script src="js/appear.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/jQuery.style.switcher.min.js"></script>
    <script type="text/javascript" src="../../cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.2/js.cookie.min.js">
    </script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/custom-script.js"></script>


    <script src="js/lang.js"></script>
    <script src="../../translate.google.com/translate_a/elementa0d8.html?cb=googleTranslateElementInit"></script>
    <script src="js/color-switcher.js"></script>

</body>


</html>