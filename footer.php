<?php //include'newsletter.php'; 
?>
<footer class="main-footer">
            <div class="auto-container">
                <!--Widgets Section-->
                <div class="widgets-section">
                    <div class="row clearfix">

                        <!--Column-->
                        <div class="column col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget logo-widget">
                                <div class="widget-content">
                                    <div class="logo">
                                        <a href="index.php"><img id="fLogo" style="height: 50px;" src="images/nukdigital_logowhite.png" alt="" /></a>
                                    </div>
                                    <div class="text">Welcome to our Digital Marketing Website.</div>
                                    <ul class="social-links clearfix">
                                        <li><a target="_blank" href="https://www.facebook.com/nukreationzdigital"><span class="fab fa-facebook-square"></span></a></li>
                                        <li><a target="_blank" href="https://www.twitter.com/nukdigital"><span class="fab fa-twitter"></span></a></li>
                                        <li><a target="_blank" href="https://www.instagram.com/nukreationzdigital"><span class="fab fa-instagram"></span></a></li>
                                        <li><a target="_blank" href="https://linkedin.com/company/79466052"><span class="fab fa-linkedin"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!--Column-->
                        <div class="column col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <div class="widget-content">
                                    <h6>Explore</h6>
                                    <div class="row clearfix">
                                        <div class="col-md-6 col-sm-12">
                                            <ul>
                                                <li><a href="#">About</a></li>
                                                <li><a href="#">Meet Our Team</a></li>
                                                <li><a href="#">Our Portfolio</a></li>
                                                <li><a href="#">Latest News</a></li>
                                                <li><a href="contact.php">Contact Us</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <ul>
                                                <li><a href="#">Support</a></li>
                                                <li><a href="#">Privacy Policy</a></li>
                                                <li><a href="#">Terms of Use</a></li>
                                                <li><a href="#">FAQ</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Column-->
                        <div class="column col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget info-widget">
                                <div class="widget-content">
                                    <h6>Contact</h6>
                                    <ul class="contact-info">
                                        <li class="address"><span class="icon flaticon-pin-1"></span> 33, Shipeolu Street, Somolu, <br>Lagos, Nigeria.</li>
                                        <li><span class="icon flaticon-call"></span><a href="tel:+2348092800247">+234 (0) 809 280 0247</a></li>
                                        <li><span class="icon flaticon-call"></span><a href="tel:+19294305462">+1  (929) 430 5462</a></li>
                                        <li><span class="icon flaticon-email-2"></span><a
                                                href="mailto:digital@nukreationz.com.ng">digital@nukreationz.com.ng</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!--Column-->
                        <div class="column col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget newsletter-widget">
                                <div class="widget-content">
                                    <h6>Newsletter</h6>
                                    <div class="newsletter-form">
                                        <form method="post" action="" >
                                            <div class="form-group clearfix">
                                                <input type="email" name="email" placeholder="Email Address"
                                                    required>
                                                <button type="submit" name="join_newsletter" class="theme-btn"><span
                                                        class="fa fa-envelope"></span></button>
                                            </div>
                                        </form>
                                        
                                        
<?php 
                                    if(isset($_POST['join_newsletter'])){
                                        include 'conn.php';
                                        $email = $_POST['email'];  
                                        
                                        
                                        

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

    $date = date('Y-m-d H:i:s'); 
    
$create_sql = mysqli_query($conn, "INSERT INTO newsletter (code, email, date_created) VALUES ('$code', '$email', '$date')") or die(mysqli_error($conn));

if($create_sql){

    
    	echo "<script type='text/javascript'>alert('Successfully Subscribed!.')</script>";
  
}

if(!$create_sql){

    	echo "<script type='text/javascript'>alert('ERROR!.')</script>";
  
    
}
    

}
                                       
                                    ?>
                                    </div>
                                    <div class="text">Sign up for our latest news & articles.</div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="auto-container">
                    <div class="inner clearfix">
                        <div class="copyright">&copy; copyright 2021 - <?php echo date("Y");?> by <a href="https://www.digital.nukreationz.com.ng/">NuKreationz Digital Solutions</a></div>
                    </div>
                </div>
            </div>

        </footer>