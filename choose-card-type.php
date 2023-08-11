<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <title>NUKZ Smart Card For Professionals | Choose Your Preferred Card Type</title>
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
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/nouislider.pips.css">
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

    

    <style>
        .modal {
z-index:1;
display:none;
padding-top:10px;
position:fixed;
left:0;
top:0;
width:100%;
height:100%;
overflow:auto;
background-color:rgb(0,0,0);
background-color:rgba(0,0,0,0.8)
}

.modal-content{
margin: auto;
display: block;
    position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}


.modal-hover-opacity {
opacity:1;
filter:alpha(opacity=100);
-webkit-backface-visibility:hidden
}

.modal-hover-opacity:hover {
opacity:0.60;
filter:alpha(opacity=60);
-webkit-backface-visibility:hidden
}


.close {
text-decoration:none;float:right;font-size:24px;font-weight:bold;color:white
}
.container1 {
width:200px;
display:inline-block;
margin-right: 50px;
}
.modal-content, #caption {   
  
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}


@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}
h1 {
    text-align: center;
    margin-bottom: 30px;
    font-weight: 500;
    font-size: 50px !important;
  }
  h2 {
    font-weight: 500;
    font-size: 50px !important;
    display: block;
    text-align: center;
  }
    </style>
    
  
    
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
            <div class="image-layer" style="background-image:url(images/Cardflyer2.png);"></div>
            <div class="shape-1"></div>
            <div class="shape-2"></div>
            <div class="banner-inner">
                <div class="auto-container">
                    <div class="inner-container clearfix">
                        <h1>Choose Card Type</h1>
                        <div class="page-nav">
                            <ul class="bread-crumb clearfix">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="">NUKZ Smart Card</a></li>
                                <li class="active">Fill Form</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Banner Section -->


        <section class="checkout-page">
            <div class="auto-container">
                
                <div class="row">
                    <div class="container">
                      <h1>Choose your preferred Card Type</h1>
                      <h2>Click on the image</h2>
                      
                      <!-- Trigger the Modal 
                    <img id="myImg" src="images/Basic-Card(1).png" alt="Basic Card" style="width:100%;max-width:300px">
                    <img id="myImgg" src="images/Bamboo-Card(1).png" alt="Bamboo Card" style="width:100%;max-width:300px">
                    <img id="myImggg" src="images/Silver-Card(1).png" alt="Silver Card" style="width:100%;max-width:300px">
                    
                    <div id="myModal" class="modal">
                    
                      
                      <span class="close">&times;</span>
                    
                      
                      <img class="modal-content" id="img01">
                    
                      
                      <div id="caption"></div>
                    </div>
                    
                    <div id="myModall" class="modal">
                    
                      
                      <span class="closse">&times;</span>
                    
                      
                      <img class="modal-content" id="img02">
                    
                      
                      <div id="caption"></div>
                    </div>-->
                    
                    
                    <div class="container1">
    <label for="basic-card">(Click to preview)</label><br>
    <img src="images/Basic-Card(1).png" style="max-width:100%;cursor:pointer;" onclick="onClick(this)" class="modal-hover-opacity">
	
	<input name="card_type" id="card_type" type="radio" id="basic-card" style="height: 20px; width: 20px; vertical-align: middle;">
	<label for="basic-card">Basic Card</label>
  </div>
  
  <div class="container1">
    <label for="bamboo-card">(Click to preview)</label><br>
    <img src="images/Bamboo-Card-Outofstock(1).png" style="max-width:100%;cursor:pointer;" onclick="onClick(this)" class="modal-hover-opacity">
    
	<input name="card_type" id="card_type" type="radio" id="bamboo-card" style="height: 20px; width: 20px; vertical-align: middle;" disabled>
	<label for="bamboo-card">Bamboo Card</label>
  </div>
  
  <div class="container1">
      <label for="silver-card">(Click to preview)</label><br>
    <img src="images/Silver-Card(1)-Outofstock.png" style="max-width:100%;cursor:pointer;"  onclick="onClick(this)" class="modal-hover-opacity">
    
	<input name="card_type" id="card_type" type="radio" id="silver-card" style="height: 20px; width: 20px; vertical-align: middle;" disabled>
	<label for="silver-card">Silver Card</label>
  </div>
  
  <div class="container1">
      <label for="black-card">(Click to preview)</label><br>
    <img src="images/Blacknukzsmartcardblankk(1).png" style="max-width:100%;cursor:pointer;"  onclick="onClick(this)" class="modal-hover-opacity">
    
	<input name="card_type" id="card_type" type="radio" id="black-card" style="height: 20px; width: 20px; vertical-align: middle;">
	<label for="silver-card">Black Card</label>
  </div>


<div id="modal01" class="modal" onclick="this.style.display='none'">
  <span class="close">&times;&nbsp;&nbsp;&nbsp;&nbsp;</span>
  <div class="modal-content">
    <img id="img01" style="max-width:100%">
  </div>
</div>
                    
                      <!-- Container for images that will have popup effec
                      <div class="img-container">
                        <img alt=" " src="images/faviconblack.png">
                        <img alt=" " src="images/faviconorange.png">
                      </div>
                     -->
                    </div>
                    
                </div><!-- /.row -->
                
                
                <div class="text-right d-flex justify-content-end">

                            <a class="theme-btn btn-style-one" href="https://digital.nukreationz.com.ng/checkout.php">
                                <i class="btn-curve"></i>
                                <span class="btn-title">Continue Order</span>
                            </a>
                        </div>
            </div><!-- /.container -->
        </section><!-- /.checkout-page -->





        <!-- Main Footer -->
        <?php include'footer.php'; ?>

    </div>
    <!--End pagewrapper-->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>



      <script>
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
}
    </script>
    
    <!--<script src="js/popupscript.js"></script>-->
    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/TweenMax.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.fancybox.js"></script>
    <script src="js/owl.js"></script>
    <script src="js/mixitup.js"></script>
    <script src="js/knob.js"></script>
    <script src="js/appear.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/jQuery.style.switcher.min.js"></script>
    <script type="text/javascript" src="../../cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.2/js.cookie.min.js">
    </script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/wNumb.min.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/custom-script.js"></script>


    <script src="js/lang.js"></script>
    <script src="../../translate.google.com/translate_a/elementa0d8.html?cb=googleTranslateElementInit"></script>
    <script src="js/color-switcher.js"></script>
    
    

</body>



</html>