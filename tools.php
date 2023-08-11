<?php
session_start();

$currentPage = 'tools';
include "user-header.php";

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

?>


<div class="tools-header">
    <h2>QR Code Solutions and Services</h2>
</div>

<div class="tools">
    <div class="tool-cards">
        <div class="tools-card-1">
            <a style="color: #000;" href="zoomqrcode.php">
            <div style=" position: absolute; margin-left: 20px;">
            <i class="bi bi-camera-reels"></i>
                <p style="font-weight: 800; margin-top: -5px;" >Zoom Meeting</p>
            </div>
            <img src="./img/zoomMeeting.png" alt="">
            </a>
            <p style="font-size: 13px; padding: 9px; margin-left: 20px; margin-top: 4px;">Zoom meetings are extremely popular. Now it would be extremely easy for you to promote your Zoom meeting with these fast and simple QR codes.</p>
        </div>
        

        
        <div class="tools-card-1">
            <a style="color: #000;" href="whatsappqrcode.php">
            <div style=" position: absolute; margin-left: 20px; ">
            <i class="bi bi-whatsapp"></i>
                <p style="font-weight: 800; margin-top: -5px;" >WhatsApp</p>
            </div>
            <img src="./img/whatsapp image.png" alt="">
            </a>
            <p style="font-size: 13px; padding: 9px; margin-left: 20px; margin-top: 4px;">Let your customers WhatsApp you from the offline world by scanning your WhatsApp QR Code. Builds the customer connections and increases customer satisfaction.</p>
        </div>

        <div class="tools-card-1">
            <a style="color: #000;" href="qrcode.php">
            <div style=" position: absolute; margin-left: 20px; ">
            <i class="bi bi-globe"></i>
                <p style="font-weight: 800; margin-top: -5px;" >URL</p>
            </div>
            <img src="./img/link-rq.png" alt="">
            </a>
            <p style="font-size: 13px; padding: 9px; margin-left: 20px; margin-top: 4px;">Create QR code to let your customer scan and access your business website or landing page.</p>
            
        </div>
       


        
    </div>

    
</div>

<?php
include('footer.php');

?>