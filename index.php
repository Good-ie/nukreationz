<?php 
include("conn.php");
if(session_id() == ''){
    //session has not started
    session_start();
}



//include("login-handler.php");
    $currentPage = 'home';
    
    if (isset($_SESSION['username'])){
        include("home-header.php");
        //echo $_SESSION["user_id"];
    }else{
        //header("Location: login.php/");
        include("header.php");
    }
    
?>

<div class="new-container">
    <div class="reveal first-new-container">
        <div class="unlock">
            <h1>Unlock endless possibilities with Nukz QR codes</h1>
            <p>Whether you need a QR code for your business card, website, or product, Nukz QR has got you covered.
                Create unique and dynamic codes that lead to increased engagement and more conversions</p>
            <button>Get Started</button>
        </div>
        <div class="unlock-img"><img style="width: 100%;" src="./img/Map.png" alt=""></div>
    </div>
    <div class="reveal second-new-container">
        <div> <img src="./img/pexels-imin-technology-12935064.jpg" alt=""> </div>
        <div class="qr-sec-img"> <img src="./img/vizito-visitor-management-1IBf2TSLars-unsplash.jpg" alt="">
        </div>
    </div>
    <div class=" reveal third-new-container">
        <h1>Streamline your QR code generation</h1>
        <p>Say goodbye to slow and outdated QR code generators. Nukz QR provides fast, unique, and dynamic codes for any
            use, making it the ideal solution for businesses of all sizes.</p>
        <img src="./img/pexels-imin-technology-12935051.jpg" alt="">
    </div>
    <div class="reveal fourth-new-container">
        <div class="busines-qr">
            <h1>Unlock the Power of QR Codes for Your Business.</h1>
            <p>With Nukz QR, you can create QR codes for URLs, maps, Wi-Fi, business cards, and Zoom meetings. Use them
                to drive traffic to your website, share contact information with potential clients or customers, and
                more.</p>
            <button>Get Started</button>
        </div>
        <div class="busines-qr-img">
            <img src="./img/Nukreakionz Card Pack 1.png" alt="">
        </div>

    </div>
    <div class="reveal fifth-new-container">
        <div class="fifth-rotate">
            <h1>Revolutionize the way you use QR codes</h1>
            <p>Say goodbye to boring, static QR codes and hello to a new level of engagement with your customers</p>
            <div class="mobile-button"><button>Get Started</button></div>

        </div>
        <div class="rotate-div">
            <img class="rotate-image" src="./img/thinkstock-qr-code-100725734-orig-removebg-preview.png" alt="">
        </div>
    </div>
</div>

<?php
        include("footer.php");
    ?>
<script src="js/main.js"></script>
<script>
function revealElements() {
    var elements = document.querySelectorAll('.new-container .reveal');
    for (var i = 0; i < elements.length; i++) {
        var element = elements[i];
        if (isElementInViewport(element)) {
            element.classList.add('revealed');
        }
    }
}

function isElementInViewport(element) {
    var rect = element.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

window.addEventListener('scroll', revealElements);
window.addEventListener('resize', revealElements);
revealElements();
</script>

</body>

</html>