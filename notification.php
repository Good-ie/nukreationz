<?php
session_start();
include('conn.php');

$currentPage = 'notification';
include "profile-header.php";

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

$user_id = $_SESSION["user_id"];


?>
<div class="profile-settings-body">
    <div class="profile-set-first">
        <h2>Settings</h2>
        <div class="profile-set-side">
            <ul>
                <a href="profileSettings.php">
                    <li>
                        <i class="bi bi-person-circle"></i>Profile
                    </li>
                </a>
                <a href="passwordSettings.php">
                    <li>
                        <i class="bi bi-shield-lock"></i>Password
                    </li>
                </a>
                <a href="billing.php">
                    <li>
                        <i class="bi bi-cash"></i>Billing
                    </li>
                </a>
                <a class="active-set" href="notification.php">
                    <li>
                        <i class="bi bi-bell"></i>Notification <span>0</span>
                    </li>
                </a>
            </ul>
        </div>
    </div>

    <!-- <div style="display: center; margin-left: 16%; ">
        <p>No Notification!</p>
    </div> -->
</div>





<script src="js/main.js"></script>