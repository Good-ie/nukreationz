<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
    exit();
}

$currentPage = 'tools';
include "conn.php";
include "home-header.php";

$user_id = $_SESSION["user_id"];
$sql = "SELECT * FROM user WHERE user_id = $user_id";
$result = mysqli_query($db, $sql);

$user_plan = "free";
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $user_plan = $row["plan"] ?? "free";
}
$user_plan = strval($user_plan);
?>

<div class="tools-header">
    <h2>QR Code Solutions and Services</h2>
</div>

<div class="all-tools" style="display: flex;">
    <div class="tools">
        <div class="tool-cards">
            <div class="tools-card-1">
                <a style="color: #000;" href="card_details.php">
                    <div style="display: flex; justify-content: space-between;">
                        <div style="margin-top: 20px; margin-left: 20px;">
                            <i class="bi bi-person-vcard"></i>
                            <p style="font-weight: 800; margin-top: -5px;">Vcard</p>
                        </div>
                    </div>
                    <img style="width: 250px;" src="./img/vcardWeb.png" alt="">
                </a>
                <p style="font-size: 13px; padding: 9px; margin-left: 20px; margin-top: 4px;">vCard Plus helps you generate stunning profile pages for business cards.</p>
            </div>

            <div class="tools-card-1">
                <a style="color: #000;" href="zoomqrcode.php">
                    <div style="margin-left: 20px; margin-top: 20px;">
                        <i class="bi bi-camera-reels"></i>
                        <p style="font-weight: 800; margin-top: -5px;">Zoom Meeting</p>
                    </div>
                    <img src="./img/zoomMeeting.png" alt="">
                </a>
                <p style="font-size: 13px; padding: 9px; margin-left: 20px; margin-top: 4px;">Promote your Zoom meeting with fast and simple QR codes.</p>
            </div>

            <div class="tools-card-1">
                <a style="color: #000;" href="whatsappqrcode.php">
                    <div style="margin-top: 20px; margin-left: 20px;">
                        <i class="bi bi-whatsapp"></i>
                        <p style="font-weight: 800; margin-top: -5px;">WhatsApp</p>
                    </div>
                    <img src="./img/whatsapp image.png" alt="">
                </a>
                <p style="font-size: 13px; padding: 9px; margin-left: 20px; margin-top: 4px;">Let your customers WhatsApp you from the offline world.</p>
            </div>

            <div class="tools-card-1">
                <a style="color: #000;" href="qrcode.php">
                    <div style="margin-top: 20px; margin-left: 20px;">
                        <i class="bi bi-globe"></i>
                        <p style="font-weight: 800; margin-top: -5px;">URL</p>
                    </div>
                    <img src="./img/link-rq.png" alt="">
                </a>
                <p style="font-size: 13px; padding: 9px; margin-left: 20px; margin-top: 4px;">Create QR code for your business website or landing page.</p>
            </div>

            <div class="tools-card-1">
                <a style="color: #000;" href="wifi.php">
                    <div style="margin-top: 20px; margin-left: 20px;">
                        <i class="bi bi-wifi"></i>
                        <p style="font-weight: 800; margin-top: -5px;">Wifi</p>
                    </div>
                    <img src="./img/qrwifi.png" alt="">
                </a>
                <p style="font-size: 13px; padding: 9px; margin-left: 20px; margin-top: 4px;">Create QR code for your company wifi access.</p>
            </div>

            <div class="tools-card-1">
                <a style="color: #000;" href="googlemap.php">
                    <div style="margin-top: 20px; margin-left: 20px;">
                        <i class="bi bi-geo-alt-fill"></i>
                        <p style="font-weight: 800; margin-top: -5px;">Google Map</p>
                    </div>
                    <img style="width: 250px;" src="./img/googleMaps.png" alt="">
                </a>
                <p style="font-size: 13px; padding: 9px; margin-left: 20px; margin-top: 4px;">Take consumers to your location easily with QR codes.</p>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>

<script src="js/main.js"></script>
</body>
</html>
