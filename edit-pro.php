<?php

    if(!isset($_SESSION)) 

    { 

        session_start(); 



    } 

    if (!isset($_SESSION['loggedin'])) {

        header('Location: login.php');

        exit;

    }

    $currentPage = 'createCard';
    

    include("user-header.php");

    $id=$_GET['id'];
    $user = $_GET['user'];
    $user_id = $_SESSION["user_id"];
    if($user_id != $user){
        echo"you cant edit this profile";
        header('Location: login.php');
        exit;
    }

    if (!isset($_SESSION['username'])) {

        $_SESSION['msg'] = "You must log in first";

        header('location: login.php');

    }

    include("card-details-handler.php");

    
    

    $plan = strval($plan);
    $maximage = 1;

    if($plan === "free"){

        $maximage = 1;

    }elseif($plan === "starter"){

        $maximage = 5;

    }elseif($plan === "business"){

        $maximage = 8;

    }elseif($plan === "ultimal"){

        $maximage = 10;

    }




?>

<style type="text/css">
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
</style>





<div class="main-container-card">

    <?php

                $sql2 = mysqli_query($db, "SELECT * from card_details WHERE card_id = $id ");

                if(mysqli_num_rows($sql2)>0){

                

                    while($row = mysqli_fetch_assoc($sql2)){

                

                        $id = $row['card_id'];                           

                        $fname = $row['firstname'];

                        $lname = $row['lastname'];

                        $email = $row['email'];

                        $phone = $row['phone'];
                        $color = $row['color'];
                        $sec_color = $row['sec_colr'];
                        $text_color = $row['text_color'];

                        $date = $row['created_on'];

                        $jobtitle = $row['jobtitle'];

                        $address = $row['caddress'];

                        $summary = $row['psummary'];

                        $website = $row['website_link'];

                        $company = $row['company_name'];
                        $profileimage = $row['images'];

                        $profilepage = $row['profile_page'];

                        $date_created = $row['created_on'];

    ?>
    <div style="margin-top: 30px; width: 65%; padding: 20px;" class="container">

        <div class="card-content" style="overflow: hidden;">

            <form action="card_details.php" method="POST" enctype="multipart/form-data" class="info">



                <h2 class="head">Digital Card</h2>



                <div class="basic-info">

                    <div class="basic-info-text">

                        <p style="padding-left: 10px;" class="text">Design & Customize</p>

                        <img class="close1" src="img/Vector.png" alt="">

                    </div>



                    <div style="margin-top: 30px;">

                        <label for="">Page Templates</label>

                        <div style="margin-left: 100px;">

                            <?php

                                    include('slider.php');

                                ?>

                        </div>



                    </div>

                    <div style="display: block;" class="color-custom first-close">

                        <label for="">Colors</label>

                        <div class="customize">

                            <div class="color-body color-body1">

                                <div class="color color1" style="background: #608FFF"></div>

                            </div>

                            <div class="color-body color-body2">

                                <div class="color color2" style="background: #D51A47"></div>

                            </div>

                            <div class="color-body color-body3">

                                <div class="color color3" style="background: #374793"></div>

                            </div>

                            <div class="color-body color-body4">

                                <div class="color color4" style="background: #FF8F03"></div>

                            </div>

                            <div class="color-body color-body5">

                                <div class="color color5" style="background: #FF8B3B"></div>

                            </div>

                            <div class="color-body color-body6">

                                <div class="color color6" style="background: #E61313"></div>

                            </div>

                        </div>



                        <div style="display: flex; margin-top: 21px;">

                            <div class="">

                                <label style="margin-left: 130px;">Primary color</label><br>

                                <div>

                                    <div class="color-picker-icon"><i class="bi bi-eyedropper"></i></div>

                                    <input class="color-input" value="<?php echo $color; ?>" type="text"
                                        name="color-input" placeholder="">

                                </div>



                            </div>

                            <div>

                                <label style="margin-left: 130px;">Secondary color</label><br>

                                <div class="color-picker-icon"><i class="bi bi-eyedropper"></i></div>

                                <input class="color-input-sec" value="<?php echo $sec_color; ?>" type="text"
                                    name="color-input-sec" placeholder="">



                            </div>



                        </div>



                        <label style="margin-left: 130px;">Text color</label><br>

                        <div class="color-picker-icon"><i class="bi bi-eyedropper"></i></div>

                        <input class="text-color-input" value="<?php echo $text_color; ?>" type="text"
                            name="text-color-input" placeholder="">



                    </div>



                </div>



                <div class="basic-info">

                    <div class="basic-info-text">

                        <p style="padding-left: 10px;" class="text">Basic Information</p>

                        <img class="close1" src="img/Vector.png" alt="">

                    </div>

                    <div style="display: block;" class="first-close">

                        <div style="margin-top: 50px;" class="name">

                            <input class="u-fname" type="text" value="<?php echo $fname; ?>" name="fname" id=""
                                placeholder="First Name">

                            <input class="u-lname" type="text" value="<?php echo $lname; ?>" name="lname" id=""
                                placeholder="Last Name">

                        </div>

                        <div class="contact">

                            <input class="u-email" type="email" value="<?php echo $email; ?>" name="email" id=""
                                placeholder="Email">

                            <input class="u-phone" type="text" value="<?php echo $phone; ?>" name="phone" id=""
                                placeholder="Phone Number">

                        </div>

                        <input class="u-address" type="text" value="<?php echo $address; ?>" name="address" id=""
                            placeholder="Address"><br>

                        <input class="company" type="text" value="<?php echo $company; ?>" name="cname" id=""
                            placeholder="Company Name"><br>

                        <textarea class="u-psmmary" style="margin-bottom: 30px;" name="psummary" id="" cols="30"
                            rows="10" placeholder="Professional Summary">
                        <?php echo $summary; ?>
                        </textarea><br>

                        <input class="u-website" type="text" value="<?php echo $website; ?>" name="website" id=""
                            placeholder="Website">

                        <input class="u-jobtitle" type="text" value="<?php echo $jobtitle; ?>" name="jobtitle" id=""
                            placeholder="Job Title">

                        <!-- <input class="save-change" type="submit" value="SAVE CHANGES"> -->

                    </div>



                </div>



                <div class="basic-info-text">

                    <p style="padding-left: 10px;" class="text">Weblinks</p>

                    <img class="close2" src="img/Vector.png" alt="">

                </div>

                <div style="display: flex;" class="social-icon second-close">

                    <div style="margin-left: 0px;" class="facebook social-icons">

                        <img src="img/facebook.png" alt="">

                    </div>

                    <div class="instagram social-icons">

                        <img src="img/insta.png" alt="">

                    </div>

                    <div class="whatsapp social-icons">

                        <img src="img/whatsapp.png" alt="">

                    </div>

                    <div class="linkedin social-icons">

                        <img src="img/link.png" alt="">

                    </div>

                    <div class="twitter social-icons">

                        <img src="img/twitter.png" alt="">

                    </div>

                    <div class="pintrest social-icons">

                        <img src="img/pin.png" alt="">

                    </div>

                    <div class="youtube social-icons">

                        <img src="img/youtube.png" alt="">

                    </div>

                </div>

                <div class="form-content">



                    <div class="social-buttons">

                        <div style="margin-left: 0; display: none;" class="facebook-input social-button">

                            <label for="social-check"> <img src="img/facebook.png" alt=""></label>

                            <input id="social-check" type="text" name="facebook-link"
                                placeholder="https://facebook.com/profilename" value="">



                        </div>

                        <div class="instagram-input social-button" style="display: none;">

                            <label for="vehicle2"> <img src="img/instagram.png"> </label>

                            <input class="social-check" type="text" id="vehicle2" name="instagram-link"
                                placeholder="https://instagram.com/profilename" value="">



                        </div>

                        <div class="twitter-input social-button" style="display: none;">

                            <label for="vehicle2"> <img src="img/twitter.png"> </label>

                            <input class="social-check" type="text" id="vehicle2" name="twitter-link"
                                placeholder="https://twitter.com/username" value="">



                        </div>



                    </div>

                    <div class="social-buttons">

                        <div style="margin-left: 0; display: none;" class="whatsapp-input social-button">

                            <label for="vehicle1"> <img src="img/whatsapp.png" alt=""> </label>

                            <input class="social-check" type="text" id="vehicle1" name="whatsapp-link"
                                placeholder="whatsapp chat link" value="">



                        </div>

                        <div class="linkedin-input social-button" style="display: none;">

                            <label for="vehicle2"> <img src="img/link.png" alt=""> </label>

                            <input class="social-check" type="text" id="vehicle2" name="linkedin-link" value=""
                                placeholder="https://instagram.com/username">



                        </div>

                        <div class="pintrest-input social-button" style="display: none;">

                            <label for="vehicle2"> <img src="img/pin.png" alt=""> </label>

                            <input class="social-check" type="text" id="vehicle2" name="pin-link" value=""
                                placeholder="https://pintrest.com/username">



                        </div>



                    </div>

                    <div style="margin-left: 0px; display: none;" class="socila-button">

                        <div style="margin-left: 0px;" class="youtube-input social-button" style="display: none;">

                            <label for="vehicle2"> <img src="img/youtube.png"> </label>

                            <input class="social-check" type="text" id="vehicle2" name="youtube-link" value=""
                                placeholder="https://youtube.com/username">



                        </div>

                    </div>



                </div>



                <div class="image-slider">

                    <div class="basic-info-text">

                        <p style="padding-left: 10px;" class="text">Profile Photo</p>

                        <img class="close3" src="img/Vector.png" alt="">

                    </div>

                    <div style="margin-top: 55px; display: block" class="images image third-close">



                        <img src="./uploads/<?php echo $profileimage; ?>" id="pimage2" class="profile-image"
                            style="width: 180px; height: 180px; object-fit: cover; border-radius: 50%; border: 5px solid #686868;">

                        <input style="opacity: 0; margin-top: -100px;position: absolute;"
                            onchange="display_image(this.files[0])" id="p-files pimage" name="my_image" type="file"
                            class="image" accept="image/jpeg, imgae/png, image/jpg">

                        <!-- <output id="result"></output> -->

                    </div>

                </div>

        </div>





        <div class="image-slider">

            <div class="basic-info-text">

                <p style="padding-left: 10px;" class="text">Professional Photo</p>

                <img src="img/Vector.png" alt="">

            </div>

            <div style="margin-top: 55px;" class="pro-images">

                <input class="img-files" name="files[]" type="file" multiple accept="image/jpeg, imgae/png, image/jpg">

                <output id="result"></output>

            </div>

        </div>

        <div class="submit-card-button">

            <input type="submit" name="reg_user" value="UPDATE">

        </div>

    </div>
    <?php
                    }
                }
    ?>


    </form>



    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="modalLabel">Crop image</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">×</span>

                    </button>

                </div>

                <div class="modal-body">

                    <div class="img-container">

                        <div class="row">

                            <div class="col-md-8">

                                <!--  default image where we will set the src via jquery-->

                                <img id="image1">

                            </div>

                            <div class="col-md-4">

                                <div class="preview"></div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                    <button type="button" class="btn btn-primary" id="crop">Crop</button>

                </div>

            </div>

        </div>

    </div>







    <div class="prototype">

        <div class="prototype-frame">

            <div class="device-header"></div>

            <div class="prototype-content">

                <?php include 'prototype.php'; ?>

            </div>

        </div>

    </div>



</div>



<?php

        include("footer.php");

    ?>

<div style="display: none" class="maximage-modal">



    <h1><i class="bi bi-exclamation-triangle"></i></h1>

    <p>You can only upload a maximum of<b> <?php echo $maximage; ?> </b>image for your current plan.</p><br>

    <p>Upgrade your plan to upload more images</p>

    <button class="modal-cancel" style="background: grey; color: #fff;">Cancle</button>

    <a href="pricing.php">

        <button>Upgrade</button>

    </a>



</div>

<div style="display: none" class="overlay"></div>
<script src="./js/page.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script src="cropperjs/cropper.min.js" type="text/javascript"></script>

<script src="./js/main.js"></script>







<script src="./js/profile.js"></script>

<script>
var bs_modal = $('#modal');

var image = document.getElementById('image1');

var img2 = document.getElementById('pimage2');

var cropper, reader, file;


$("body").on("change", ".image", function(e) {

    var files = e.target.files;

    var done = function(url) {

        image.src = url;

        bs_modal.modal('show');

    };

    if (files && files.length > 0) {

        file = files[0];

        if (URL) {

            done(URL.createObjectURL(file));

        } else if (FileReader) {

            reader = new FileReader();

            reader.onload = function(e) {

                done(reader.result);

            };

            reader.readAsDataURL(file);

        }

    }

});

bs_modal.on('shown.bs.modal', function() {

    cropper = new Cropper(image, {

        aspectRatio: 1,

        viewMode: 3,

        preview: '.preview'

    });

}).on('hidden.bs.modal', function() {

    cropper.destroy();

    cropper = null;

});

crop.addEventListener('click', function() {

    console.log('clicked');

    canvas = cropper.getCroppedCanvas({

        width: 160,

        height: 160,

    })

    var croppedCanvas = cropper.getCroppedCanvas();

    var imageData = croppedCanvas.toDataURL();

    img2.src = imageData;

    bs_modal.modal('hide');

    // Get the cropped canvas

});





var mainContent = document.querySelector('.main-container-card ');

var modal = document.querySelector('.maximage-modal');

var overlay = document.querySelector('.overlay');

var fileInput = document.querySelector('.img-files');



fileInput.addEventListener('change', function() {

    var fileCount = this.files.length;

    console.log(fileCount);

    if (fileCount > <?php echo $maximage; ?>) {

        modal.style.display = "block";

        mainContent.classList.add('main-container-card-modal');

        overlay.style.display = "block";





        fileInput.value = null;



    }

});





if (window.File && window.FileReader && window.FileList && window.Blob) {

    const files = e.target.files;

    const output = document.querySelector("#result");



    output.innerHTML = '';



    for (let i = 0; i < files.length; i++) {

        if (!files[i].type.match("image")) continue;

        const picReader = new FileReader();

        picReader.addEventListener("load", function(event) {

            const picFile = event.target;

            const div = document.createElement("div");

            div.innerHTML =

                `<img class="thumbnail" src="${picFile.result}" title="${picFile.name}"/>`;

            output.appendChild(div);

            const numImages = output.querySelectorAll('img').length;

            if (numImages > <?php echo $maximage; ?>) {



                modal.style.display = "block";

                mainContent.classList.add('main-container-card-modal');

                overlay.style.display = "block";





                const removeLastImage = () => {

                    const output = document.querySelector("#result");

                    const lastChild = output.lastChild;

                    if (lastChild) {

                        output.removeChild(lastChild);

                    }

                };

                removeLastImage();
            }

        });

        picReader.readAsDataURL(files[i]);

    }

} else {

    alert("Your brower does not support the File API");

}





var cancel_modal_btn = document.querySelector('.modal-cancel');

cancel_modal_btn.addEventListener("click", function() {

    modal.style.display = "none";

    mainContent.classList.remove('main-container-card-modal');

    overlay.style.display = "none";

})
</script>



</body>

</html>