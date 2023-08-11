<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="utf-8">
	<title>NuKreationz Digital Solutions Website | Contact Us</title>
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
		<?php include 'header.php'; ?>
		<!-- End Main Header -->

		<!--Mobile Menu-->
		<?php include 'mobile_menu.php'; ?>

		<!--Search Popup-->
		<?php include 'popup.php'; ?>

		<!-- Banner Section -->
		<section class="page-banner">
			<div class="image-layer" style="background-image:url(images/contactus.png);"></div>
			<div class="shape-1"></div>
			<div class="shape-2"></div>
			<div class="banner-inner">
				<div class="auto-container">
					<div class="inner-container clearfix">
						<h1>Contact Us</h1>
						<div class="page-nav">
							<ul class="bread-crumb clearfix">
								<li><a href="index.php">Home</a></li>
								<li class="active">Contact</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--End Banner Section -->

		<!--Contact Section-->
		<section class="contact-section contact-two" id="contact_form">
			<div class="auto-container">
				<div class="row">
					<div class="col-lg-4">
						<div class="contact-two__content">
							<div class="sec-title">
								<h2>We look forward to hearing from you <span class="dot">.</span></h2>
							</div>
							<p class="contact-two__text">Have a question or want to learn more about how we can support your business?</p>
							<!-- /.contact-two__text -->
							<div class="contact-two__social">
								<a target="_blank" href="https://www.twitter.com/nukdigital" class="fab fa-twitter"></a>
								<a target="_blank" href="https://www.facebook.com/nukreationzdigital" class="fab fa-facebook"></a>
								<a target="_blank" href="https://linkedin.com/company/79466052" class="fab fa-linkedin-in"></a>
								<a target="_blank" href="https://www.instagram.com/nukreationzdigital" class="fab fa-instagram"></a>
							</div><!-- /.contact-two__social -->
						</div><!-- /.contact-two__content -->
					</div><!-- /.col-lg-4 -->
					<div class="col-lg-8" >
						<div class="form-box">
							<div class="default-form">
								<form method="POST" action="" id="contact-form">
									<div class="row clearfix">
										<div class="form-group col-lg-6 col-md-6 col-sm-12">
											<div class="field-inner">
												<input type="text" name="name" id="name" placeholder="Your Name"
													required="">
											</div>
										</div>
										<div class="form-group col-lg-6 col-md-6 col-sm-12">
											<div class="field-inner">
												<input type="email" name="email" id="email" placeholder="Email Address"
													required="">
											</div>
										</div>
										
										<div class="form-group col-lg-12 col-md-6 col-sm-12">
											<div class="field-inner">
												<input type="text" name="phone" id="phone" placeholder="Phone Number">
											</div>
										</div>
										<div class="form-group col-lg-12 col-md-12 col-sm-12">
											<div class="field-inner">
												<textarea name="message" id="message" placeholder="Write Message"
													required=""></textarea>
											</div>
										</div>
										<div class="form-group col-lg-12 col-md-12 col-sm-12">
											<button type="submit" name="send_info" id="send_info" class="theme-btn btn-style-one">
												<i class="btn-curve"></i>
												<span class="btn-title">Send message</span>
											</button>
										</div>
									</div>
								</form>
								
								<?php 
                                    if(isset($_POST['send_info'])){
                                        include 'conn.php';
                                        $name = $_POST['name'];  
                                        $email = $_POST['email']; 
                                        $phone = $_POST['phone']; 
                                        $message = $_POST['message']; 
                                        
                                        

                                        function generateRandomString($length = 64){
        $characters = '0123456789qwertyuiopasdfghjklzxvcbnmQWERTYUIOPASDFGHJKLZXCVBNMabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i=0; $i < $length; $i++) { 
            $randomString .= $characters[rand(0, $charactersLength -1)];

        }
        return $randomString;
    }
    
    $code = generateRandomString();

    $date = date('Y-m-d H-s-a'); 

$create_sql = mysqli_query($conn, "INSERT INTO contact_form (code, name, email, phone, date_created, message) VALUES ('$code', '$name', '$email', '$phone', '$date', '$message')") or die(mysqli_error($conn));

if($create_sql){

    	echo "<script type='text/javascript'>alert('Contact Message Sent!.')</script>";
    	
    	require 'mailing.php'   ;
                                     $to = "profgared@gmail.com";
                                     //$to2 = "iselowodavis9@gmail.com";
                                     //$to2 = "agbale.alice04@gmail.com";
                                     //$to2 = "tobbycooty@gmail.com";
                                 $subject = "New Contact Message |-| Nukreationz Digitl Solutions";
                                 
                                 $headers  = "From: <digital@nukreationz.com.ng>\r\n"; 
    $headers .= "Reply-To: digital@nukreationz.com.ng\r\n"; 
    $headers .= "Return-Path: digital@nukreationz.com.ng\r\n"; 
                                 $headers = "MIME-Version: 1.0" . "\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

//$htmlContent = file_get_contents("newsletter.html");
$msg = "
<!doctype html>
<html>
  <head>
    <title>Nukreationz Digital Solutions - New Contact Message</title>
    <style type='text/css' id='hs-inline-css'>
      /*<![CDATA[*/
      /* everything in this style tag will be inlined onto matching elements */
      h1 div {
        font-size: 68px !important;
        line-height: 80px;
        letter-spacing: -1px;
        color: #333;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif;
        margin: 0;
        padding: 0;
      }
      h3 {
        font-size: 22px;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif;
        color: #333;
        margin: 0;
        text-align: left;
      }
      p {
        font-size: 18px;
        line-height: 26px;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif;
        color: #333;
        margin: 0;
        text-align: left;
      }
      ul {
        list-style: none;
        margin: 0;
        padding: 0 0 30px;
      }
      ul li {
        font-size: 16px;
        line-height: 26px;
        text-align: left;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif;
        margin: 0;
        padding: 0;
        color: #333;
      }
      ul li.list_padding {
        padding-bottom: 15px;
      }
      ul li span.image {
        width: 24px;
        height: 24px;
        background: url('https://pages.flock.com/hubfs/Flock_April2019/images/right-tick-5447a8a0.png') no-repeat;
        display: inline-block;
        background-size: 24px 24px;
        vertical-align: middle;
        padding-right: 16px;
      }
      ul li span.text {
        padding-left: 16px;
        display: inline-block;
      }
      #hs_cos_wrapper_text_field {
        font-size: 18px !important;
        line-height: 26px !important;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif !important;
        margin: 0 !important;
        padding: 0 0 15px !important;
        color: #333 !important;
      }
      .padding_30_bottom {
        padding-bottom: 30px;
      }
      span.dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: #d9d9d9;
        display: inline-block;
        margin: 0 5px;
      }
      .h-row {
        display: block;
        background: #dedede;
        width: 100%;
        height: 3px;
      }
      @media (max-width: 400px) {
        h1 div {
          font-size: 36px !important;
        }
      }
      /*]]>*/
    </style>
    <meta name='generator' content='HubSpot'>
    <meta property='og:url' content='http://flock-4323997.hs-sites.com/-temporary-slug-20f8917e-e54d-453e-af33-982ecef34e99'>
    <meta name='x-apple-disable-message-reformatting'>
    <meta name='robots' content='noindex,follow'>
  </head>
  <body style='background-color: #081124; margin:0px; padding: 0px 10px; font-family: -apple-system, BlinkMacSystemFont,'Segoe UI', 'Roboto', 'Oxygen','Ubuntu', 'Cantarell', 'Fira Sans','Droid Sans', 'Helvetica Neue', sans-serif;'>
    <table cellpadding='0' cellspacing='0' border='0' align='center' width='100%' height='100%' style='width: 100%; height: 100%; text-align: center;'>
      <tbody>
        <tr>
          <td>
            <table width='100%' style='max-width:600px; width: 100%; margin: 0 auto' cellpadding='0' cellspacing='0' border='0'>
              <tbody>
                <tr>
                  <td>

                    <!--                     code here -->

                    <!--                     header start -->

                    <!-- Begin partial -->
                    <table cellpadding='0' cellspacing='0' border='0' style='border-collapse: collapse; width: 100%;'>
                      <tbody>
                        <tr>
                          <td style='padding: 30px;'>
                            <div id='hs_cos_wrapper_executive_image' class='hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_linked_image' style='color: inherit; font-size: inherit; line-height: inherit;' data-hs-cos-general-type='widget' data-hs-cos-type='linked_image'><a href='https://cwsT104.na1.hubspotlinks.com/Btc/DK+113/cwsT104/VW_Xm2808d8NW4QW68p3YySk_W4lQ0X34FL4VRN5SJSl_3q8_QV1-WJV7CgVmCW5lkgVy2rGK7sW6PDDPT37bbRjV4KZTb4gmNLmW8JwH7k94PW5nN1jhHFQvM042W5x3_sH92_FXTW2DQs3S2rv4gzW1lP6C099fFPPN4zN7-4xHQcPW26FFhn4wLP8ZW29L2rX2hFGQ3VHGX0m4yvvqxW29yLrG5b_Pd2W4m_Y5q4MMQ5YW75SBNP1MFxSKVty0Gs6Zb15YW2mF30L2c7cklW2r07S33XcD20W4hjP9N7xmsr9W6q-GjL6r7gvjMp82pYqztdzW3JBPk-3WFDKV3mvd1' target='_blank' id='hs-link-executive_image' rel='noopener' style='border-width:0px;border:0px;' data-hs-link-id='0'><img src='https://www.digital.nukreationz.com.ng/images/nukdigital_logowhite1.png' class='hs-image-widget ' style='border-width:0px;border:0px;width: 160px;' width='160' alt='flock logo' title='flock logo' srcset='https://www.digital.nukreationz.com.ng/images/nukdigital_logowhite1.png 260w' sizes='(max-width: 160px) 100vw, 160px'></a></div>
                          </td>
                        </tr>
                      </tbody>
                    </table>

                    <!-- End partial -->

                    <!--                     header end  -->
                    <table cellpadding='0' cellspacing='0' border='0' style='border-collapse: collapse; width: 100%'>
                      <tbody>
                        <tr>
                          <td style='background: #fff;'>
                            <table cellpadding='0' cellspacing='0' border='0' style='border-collapse: collapse; width: 100%;'>
                              <tbody>
                                <tr>
                                  <td style='background-color: #fff; padding: 40px 15px;'>
                                    <table align='center' width='100%' style=' max-width: 520px; width: 100%; border-collapse: collapse;' cellpadding='0' cellspacing='0' border='0'>
                                      <tbody>
                                        <tr>
                                          <td>
                                            <h1>
                                              <div id='hs_cos_wrapper_banner' class='hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_image' style='letter-spacing:-1px; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif; margin:0; padding:0; color:inherit; font-size:inherit; line-height:inherit' data-hs-cos-general-type='widget' data-hs-cos-type='image'><h3 style='font-size:25px; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif; color:#333333; margin:0; text-align:center' align='center'>NEW CONTACT MESSAGE.</h3></div>
                                            </h1>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <table cellpadding='0' cellspacing='0' border='0' style='border-collapse: collapse; width: 100%'>
                              <tbody>
                                <tr>
                                  <td style='background-color: #fff; padding: 0 15px 35px;'>
                                    <table align='center' width='100%' style=' max-width: 520px; width: 100%; border-collapse: collapse;' cellpadding='0' cellspacing='0' border='0'>
                                      <tbody>
                                        <tr>
                                          <td>
                                            <table cellpadding='0' cellspacing='0' border='0' style='border-collapse: collapse; display: inline-block; min-width: 49%; max-width: 100%; width: calc((400px - 100%) * 400); vertical-align: middle;'>
                                              <tbody>
                                                <tr>
                                                  <td>
                                                    <div id='hs_cos_wrapper_ruby' class='hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_image' style='color: inherit; font-size: inherit; line-height: inherit;' data-hs-cos-general-type='widget' data-hs-cos-type='image'><img src='https://pages.flock.com/hs-fs/hubfs/emailsImages/meet-ruby.png?width=1000&amp;upscale=true&amp;name=meet-ruby.png' class='hs-image-widget ' style='max-height:500px; border-width:0px;border:0px;width: 100% !important;' width='500' alt='meet-ruby' title='meet-ruby' srcset='https://pages.flock.com/hs-fs/hubfs/emailsImages/meet-ruby.png?upscale=true&amp;width=1000&amp;upscale=true&amp;name=meet-ruby.png 500w, https://pages.flock.com/hs-fs/hubfs/emailsImages/meet-ruby.png?upscale=true&amp;width=2000&amp;upscale=true&amp;name=meet-ruby.png 1000w' sizes='(max-width: 500px) 100vw, 500px'></div>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                            <table cellpadding='0' cellspacing='0' border='0' style='border-collapse: collapse; display: inline-block; min-width: 49%; max-width: 100%; width: calc((400px - 100%) * 400);vertical-align: middle;'>
                                              <tbody>
                                                <tr>
                                                  <td style='padding: 0 0 0 20px;'>
                                                    <div id='hs_cos_wrapper_rich_text' class='hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text' style='color: inherit; font-size: inherit; line-height: inherit;' data-hs-cos-general-type='widget' data-hs-cos-type='rich_text'>
                                                      <h3 style='font-size:22px; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif; color:#333333; margin:0; text-align:left' align='left'>Contact Details:</h3>
                                                      <p style='margin-bottom: 1em; font-size:18px; line-height:26px; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif; color:#333333; margin:0; text-align:left' align='left'>Name: $name<br> Email: $email<br> Phone Numer: $phone<br> Message: $message.</p>
                                                    </div>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <table cellpadding='0' cellspacing='0' border='0' style='border-collapse: collapse; width: 100%;'>
                              <tbody>
                                <tr>
                                  <td style='background-color: #fff; padding: 35px 15px 30px;'>
                                    <table align='center' width='100%' style=' max-width: 520px; width: 100%; border-collapse: collapse;' cellpadding='0' cellspacing='0' border='0'>
                                      <tbody>
                                        <tr>
                                          <td>
                                            <table cellpadding='0' cellspacing='0' border='0' style='border-collapse: collapse;  width: 100%;'>
                                              <tbody>
                                                <tr>
                                                  <td class='padding_30_bottom' style='padding-bottom:30px'>
                                                    <div id='hs_cos_wrapper_joana-on-sharing' class='hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_image' style='color: inherit; font-size: inherit; line-height: inherit;' data-hs-cos-general-type='widget' data-hs-cos-type='image'><img src='https://pages.flock.com/hs-fs/hubfs/emailsImages/joanna-sharing.png?width=2080&amp;upscale=true&amp;name=joanna-sharing.png' class='hs-image-widget ' style='max-height:600px; border-width:0px;border:0px;width: 100% !important;' width='1040' alt='joanna-sharing' title='joanna-sharing' srcset='https://pages.flock.com/hs-fs/hubfs/emailsImages/joanna-sharing.png?upscale=true&amp;width=2080&amp;upscale=true&amp;name=joanna-sharing.png 1040w, https://pages.flock.com/hs-fs/hubfs/emailsImages/joanna-sharing.png?upscale=true&amp;width=4160&amp;upscale=true&amp;name=joanna-sharing.png 2080w' sizes='(max-width: 1040px) 100vw, 1040px'></div>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                            <table cellpadding='0' cellspacing='0' border='0' style='border-collapse: collapse;  width: 100%;'>
                                              <tbody>
                                                <tr>
                                                  <td style='padding: 0px;'>
                                                    <div id='hs_cos_wrapper_rich_text4' class='hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text' style='color: inherit; font-size: inherit; line-height: inherit;' data-hs-cos-general-type='widget' data-hs-cos-type='rich_text'>
                                                      <p style='margin-bottom: 1em; font-size:18px; line-height:26px; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif; color:#333333; margin:0; text-align:center' align='center'></p>
                                                    </div>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <table cellpadding='0' cellspacing='0' border='0' style='border-collapse: collapse;  width: 100%;'>
                              <tbody>
                                <tr>
                                  <td style='background: #fff; padding: 0px;'>
                                    <table align='center' width='100%' style=' max-width: 520px; width: 100%; border-collapse: collapse;' cellpadding='0' cellspacing='0' border='0'>
                                      <tbody>
                                        <tr>
                                          <td>
                                            <span class='dot' style='width:10px; height:10px; border-radius:50%; background:#d9d9d9; display:inline-block; margin:0 5px' width='10' height='10'></span><span class='dot' style='width:10px; height:10px; border-radius:50%; background:#d9d9d9; display:inline-block; margin:0 5px' width='10' height='10'></span><span class='dot' style='width:10px; height:10px; border-radius:50%; background:#d9d9d9; display:inline-block; margin:0 5px' width='10' height='10'></span>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <table cellpadding='0' cellspacing='0' border='0' style='border-collapse: collapse;  width: 100%;'>
                              <tbody>
                                <tr>
                                  <td style='background: #fff; padding: 30px 15px 30px;;'>
                                    <table align='center' width='100%' style=' max-width: 520px; width: 100%; border-collapse: collapse;' cellpadding='0' cellspacing='0' border='0'>
                                      <tbody>
                                        <tr>
                                          <td>
                                            <div id='hs_cos_wrapper_rich_text5' class='hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text' style='color: inherit; font-size: inherit; line-height: inherit;' data-hs-cos-general-type='widget' data-hs-cos-type='rich_text'>
                                              <p style='margin-bottom: 1em; font-size:18px; line-height:26px; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif; color:#333333; margin:0; text-align:center' align='center'><br><br><span style='color: #0abe51;'><strong><a href='https://cwsT104.na1.hubspotlinks.com/Btc/DK+113/cwsT104/VW_Xm2808d8NW4QW68p3YySk_W4lQ0X34FL4VRN5SJSmB3q90pV1-WJV7CgPv4W7QcS5Y7SLw-FW4FyVcP1Q09W9W1DschL631p07N3Cpnd4508M9W3bSGF03Vp-dYW7LhFPF7CrhNXW7cJwc54j7885N8flR1CBQhtwW5My1Tg6J1x0WN74HbCV7fT9XN1ZK6MhX275RW4fVZ6D6f-lnCVqzQ5V11k_WBW8yBc2m5l9fVLW48_cfq3mhGyPV2ykBP9cnHDgW1qh0cW48Y-mDW7bQLBw5TX98vW9fhkyj8f4NSGW7SnL2f40mYC6W2qJLCj1NctKSW4mbQh03hydjXN3C7wx9KZ_3jW5Q7pll3bLb_ZVHz6db8bD3x5W4pGGFw3bhpQN3k5r1' style='text-decoration: none; color: #fff; background: #ff8b3b; font-size: 16px; padding: 13px 20px; border-radius: 5px;' rel=' noopener' data-hs-link-id='0' target='_blank'>Contact the Person Now!</a></strong></span></p>
                                            </div>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                                <tr>
                                  <td style='background: #fff; padding: 0 15px 40px;'>
                                    <table align='center' width='100%' style=' max-width: 520px; width: 100%; border-collapse: collapse;' cellpadding='0' cellspacing='0' border='0'>
                                      <tbody>
                                        <tr>
                                          <td>
                                            <div id='hs_cos_wrapper_lone_wolvws_CTA_1' class='hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_cta' style='color: inherit; font-size: inherit; line-height: inherit;' data-hs-cos-general-type='widget' data-hs-cos-type='cta'></div>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                                <tr>
                                  <td style='padding: 40px 0px'>
                                    <table align='center' width='100%' style=' width: 100%; border-collapse: collapse;' cellpadding='0' cellspacing='0' border='0'>
                                      <tbody>
                                        <tr>
                                          <td>
                                            <table border='0' cellpadding='0' style='width: 100%; border-collapse: collapse; background: #FCCC8F;'>
                                              <tbody>
                                                <tr>
                                                  <td style='padding: 20px 40px 0;'>
                                                    <p style='margin-bottom: 1em; line-height:26px; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif; color:#333333; margin:0; text-align:left; font-size:14px !important' align='left'>You dont want to miss out on the vital informations that is waiting for you. </p>
                                                    <p style='margin-bottom: 1em; line-height:26px; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif; color:#333333; margin:0; text-align:left; font-size:14px !important' align='left'>&nbsp;</p>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>

                    <!-- End partial -->

                    <!--                     footer -->
                    <div id='hs_cos_wrapper_module_1565193748822110' class='hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module' style='color: inherit; font-size: inherit; line-height: inherit;' data-hs-cos-general-type='widget' data-hs-cos-type='module'>
                      <table cellspacing='0' colspan='0' rowspan='0' style='width: 100%; border-collapse: collapse; '>
                        <tbody>
                          <tr>
                            <td align='center' style='padding: 20px 40px 60px;'>
                              <p style='margin-bottom: 1em; margin:0; color:#fff; padding:0; text-align:center; font-size:14px; line-height:1.71; font-family:-apple-system, BlinkMacSystemFont,'Segoe UI', 'Roboto', 'Oxygen','Ubuntu', 'Cantarell', 'Fira Sans','Droid Sans', 'Helvetica Neue', sans-serif' align='center'>
                                Sent with Love from your Nukreationz Digital Solutions
                              </p>
                              <p style='margin-bottom: 1em; margin:0; color:#fff; padding:0; text-align:center; font-size:14px; line-height:1.71; font-family:-apple-system, BlinkMacSystemFont,'Segoe UI', 'Roboto', 'Oxygen','Ubuntu', 'Cantarell', 'Fira Sans','Droid Sans', 'Helvetica Neue', sans-serif' align='center'>
                                33, Shipeolu Street, Opposite Akeju Street, Somolu, Lagos State, Nigeria.
                              </p>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <!--                     footer end -->
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
  
    </body>
</html>
";

// send email HTML
$send_mail = mail($to, $subject, $msg, $headers); 
//$send_mail2 = mail($to2, $subject, $msg, $headers); 

        if (isset($send_mail)) {
            echo "Email Sent";
            //echo "<script type='text/javascript'>alert('Email Sent!.')</script>";
        }
        if (!isset($send_mail)) {
            echo $mail->ErrorInfo;
            echo $e->getMessage();
        }


  
}

if(!$create_sql){

    	echo "<script type='text/javascript'>alert('ERROR!.')</script>";
  
    
}
    

}
                                       
                                    ?>
								
								
							</div>
						</div>
					</div><!-- /.col-lg-8 -->
				</div><!-- /.row -->

			</div>
		</section>


		<section class="contact-info-two">
			<div class="auto-container">
				<div class="row">
					<div class="col-md-12 col-lg-5">
						<div class="contact-info-two__card wow fadeInUp" data-wow-duration="1500ms">
							<i class="fa fa-map-marker-alt"></i>
							<a href="#">33, Shipeolu Street, Somolu, Lagos, Nigeria</a>
						</div><!-- /.contact-info-two__card -->
					</div><!-- /.col-md-12 col-lg-4 -->
					<div class="col-md-12 col-lg-3">
						<div class="contact-info-two__card wow fadeInUp" data-wow-duration="1500ms"
							data-wow-delay="300ms">
							<i class="fa fa-envelope"></i>
							<a href="mailto:digital@nukreationz.com.ng">digital@nukreationz.com.ng</a>
						</div><!-- /.contact-info-two__card -->
					</div><!-- /.col-md-12 col-lg-4 -->
					<div class="col-md-12 col-lg-4">
						<div class="contact-info-two__card wow fadeInUp" data-wow-delay="600ms"
							data-wow-duration="1500ms">
							<i class="fa fa-phone"></i>
							<a href="tel:+2348092800247">+234 809 280 0247</a>
						</div><!-- /.contact-info-two__card -->
					</div><!-- /.col-md-12 col-lg-4 -->
				</div><!-- /.row -->
			</div><!-- /.auto-container -->
		</section><!-- /.contact-info-two -->
		
		
		<br>
		<br>

		<section class="contact-info-two">
			<div class="auto-container">
				<div class="row">
					<div class="col-md-12 col-lg-4">
						<div class="contact-info-two__card wow fadeInUp" data-wow-duration="1500ms">
							<i class="fa fa-map-marker-alt"></i>
							<a href="#">New York Office</a>
						</div><!-- /.contact-info-two__card -->
					</div><!-- /.col-md-12 col-lg-4 -->
					<div class="col-md-12 col-lg-5">
						<div class="contact-info-two__card wow fadeInUp" data-wow-duration="1500ms"
							data-wow-delay="300ms">
							<i class="fa fa-envelope"></i>
							<a href="mailto:us-office@nukreationz.com.ng">us-office@nukreationz.com.ng</a>
						</div><!-- /.contact-info-two__card -->
					</div><!-- /.col-md-12 col-lg-4 -->
					<div class="col-md-12 col-lg-3">
						<div class="contact-info-two__card wow fadeInUp" data-wow-delay="600ms"
							data-wow-duration="1500ms">
							<i class="fa fa-phone"></i>
							<a href="tel:+19294305462">+1(929)4305462 </a>
						</div><!-- /.contact-info-two__card -->
					</div><!-- /.col-md-12 col-lg-4 -->
				</div><!-- /.row -->
			</div><!-- /.auto-container -->
		</section><!-- /.contact-info-two -->
		
		<br>
		<br>
		<br>

		<div class="map-box">
			<iframe  class="map-iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.872962557937!2d3.366222813796839!3d6.537723224813976!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8da335c4a05d%3A0xcefbf01df6508cfe!2sNukreationz%20Digital%20Solutions!5e0!3m2!1sen!2sng!4v1644589883522!5m2!1sen!2sng" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
		</div>

		<?php include 'footer.php'; ?>
		<div class="footer-nine__bottom">
			<div class="auto-container">
				<p class="footer-nine__copyright">© copyright 2021 by NuKreationz Digital Solutions</p>
				<!-- /.footer-nine__copyright -->
				<div class="footer-nine__social">
					<a target="_blank" href="https://www.facebook.com/nukreationzdigital" class="fab fa-facebook"></a>
					<a target="_blank" href="https://www.twitter.com/nukdigital" class="fab fa-twitter"></a>
					<a target="_blank" href="https://www.instagram.com/nukreationzdigital" class="fab fa-instagram"></a>
					<a target="_blank" href="https://linkedin.com/company/79466052" class="fab fa-linkedin"></a>
				</div><!-- /.footer-nine__social -->
			</div><!-- /.auto-container -->
		</div><!-- /.footer-nine__bottom -->

	</div>
	<!--End pagewrapper-->

	<a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>



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
	<script type="text/javascript" src="../../cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.2/js.cookie.min.js">
	</script>
	<script src="js/jquery.easing.min.js"></script>
	<script src="js/custom-script.js"></script>


	<script src="js/lang.js"></script>
	<script src="../../translate.google.com/translate_a/elementa0d8.html?cb=googleTranslateElementInit"></script>

</body>


</html>