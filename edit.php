<?php
include("conn.php");
$id=$_GET['id'];



$plan = null; 
$user_id = null;
$query = "SELECT user_id FROM card_details WHERE card_id = $id";
$stmt = mysqli_prepare($db, $query);
mysqli_stmt_bind_param($stmt, "i", $card_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $user_id = $row['user_id'];
  
}


$newplan = mysqli_query($db, "SELECT * FROM user where user_id = $user_id ");

if(mysqli_num_rows($newplan)>0){

    while($row = mysqli_fetch_assoc($newplan)){        

        $plan = $row['plan'];

    }  

}

$maximage2 = null;

    if($plan === "free"){

        $maximage2 = 1;

    }elseif($plan === "starter"){

        $maximage2 = 5;

    }elseif($plan === "business"){

        $maximage2 = 8;

    }elseif($plan === "ultimal"){

        $maximage2 = 10;

    }

$imglist2 = mysqli_query($db, "SELECT * FROM images WHERE card_id = $id");

$alreadyuploadedimg = mysqli_num_rows($imglist2);
    

?>





<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">

    <link rel="preconnect" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">

    <link rel="preconnect" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Login</title>

</head>



<body>

    <style>
    html {

        scroll-behavior: smooth;

    }



    body {

        font-family: 'Montserrat', sans-serif;

    }

    .confirm-edit:target {

        transform: scaleY(1);



    }

    .confirm-edit {

        transition: all .5s ease-in-out;

        transform-origin: left top;



        /* transform: scaleY(0); */

    }

    .social {

        pointer-events: none;

        /* cursor: default; */

    }



    a {

        text-decoration: none;

        color: #000;

        font-weight: 600;

    }
    </style>

    <div class="container rounded bg-white mt-5 mb-5">

        <?php

                $sql2 = mysqli_query($db, "SELECT * from card_details WHERE card_id = $id ");

                if(mysqli_num_rows($sql2)>0){

                

                    while($row = mysqli_fetch_assoc($sql2)){

                

                        $id = $row['card_id'];                           

                        $fname = $row['firstname'];

                        $lname = $row['lastname'];

                        $email = $row['email'];

                        $phone = $row['phone'];

                        $date = $row['created_on'];

                        $jobtitle = $row['jobtitle'];

                        $address = $row['caddress'];

                        $summary = $row['psummary'];

                        $website = $row['website_link'];

                        $company = $row['company_name'];

                        $date_created = $row['created_on'];

                

                        

                

                                                

            ?>

        <div class="row">

            <div class="col-md-3 border-right">

                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                        width="150px" id="edited-img" style="height: 170px; width: 170px; object-fit: cover;"
                        src="uploads/<?=$row['images'] ?>" alt="gyhfast">

                    <button id="edit-image-button" style="top: 226px;"
                        class="position-absolute top-0 end-0 btn btn-sm btn-primary" type="button">

                        <i class="bi bi-pencil"></i>

                        Edit Image

                    </button>

                    <form action="<?php echo "edit-img?id=$id"?>" method="post" enctype="multipart/form-data">

                        <input type="file" id="image-input" name="editted-img" accept="image/jpeg, imgae/png, image/jpg"
                            style="display: none;" onchange="display_image(this.files[0])">

                        <input
                            style="padding: 6px 6px; border: none; border-radius: 8px; margin-bottom: 25px; margin-top: 5px; background: #ff8b3b; color: #fff;"
                            type="submit" value="save image" name="change-img">

                    </form>

                    <span class="font-weight-bold"><?php echo $fname; ?></span><span
                        class="text-black-50"><?php echo $email; ?></span><span> </span>
                </div>





                <form action="<?php echo "social_edit?id=$id"?>" method="POST">

                    <?php

                        $sql33 = mysqli_query($db, "SELECT * from user_social_link WHERE card_id = $id ");

                            if(mysqli_num_rows($sql33)>0){

                            

                                while($row = mysqli_fetch_assoc($sql33)){



                                    $facebook = $row['facebook'];

                                    $instagram = $row['instagram'];

                                    $linkedin = $row['linkedin'];

                                    $twitter = $row['twitter'];

                                    $whatsapp = $row['whatsapp'];

                                    $pintrest = $row['pintrest'];

                                    $youtube = $row['youtube'];



                        ?>





                    <div class="col-md-12"><label class="labels"><i style="color: blue;" class="bi bi-facebook "></i>

                            &nbsp; Facebook </label><input type="text" class="form-control" placeholder=""
                            name="facebook" value="<?php echo $facebook; ?>">

                    </div>











                    <div class="col-md-12"><label class="labels"><i style="color: #fa7e1e;" class="bi bi-instagram"></i>

                            &nbsp; Instagram </label><input type="text" class="form-control" placeholder=""
                            name="instagram" value="<?php echo $instagram; ?>">

                    </div>







                    <div class="col-md-12"><label class="labels"><i class="bi bi-linkedin"></i> &nbsp;

                            LinkedIn

                        </label><input type="text" class="form-control" placeholder="" name="linkedin"
                            value="<?php echo $linkedin; ?>">

                    </div>









                    <div class="col-md-12"><label class="labels"><i style="color: blue;" class="bi bi-twitter"></i>

                            &nbsp; Twitter </label><input type="text" class="form-control" placeholder="" name="twitter"
                            value="<?php echo $twitter; ?>">

                    </div>











                    <div class="col-md-12"><label class="labels"><i style="color: green;" class="bi bi-whatsapp"></i>

                            &nbsp; WhatsApp </label><input type="text" class="form-control" placeholder=""
                            name="whatsapp" value="<?php echo $whatsapp; ?>">

                    </div>









                    <div class="col-md-12"><label class="labels"><i style="color: #FF0000;" class="bi bi-pinterest"></i>

                            &nbsp; Pinterest </label><input type="text" class="form-control" placeholder=""
                            name="pintrest" value="<?php echo $pintrest; ?>">

                    </div>







                    <div class="col-md-12"><label class="labels"><i style="color: #FF0000;" class="bi bi-youtube"></i>

                            &nbsp; Youtube</label><input type="text" class="form-control" placeholder="" name="youtube"
                            value="<?php echo $youtube; ?>">

                    </div>

                    <input
                        style="padding: 8px 15px; border: none; cursor: pointer; background: #ff8f03; color: #fff; margin-top: 20px; border-radius: 6px; margin-bottom: 20px;"
                        type="submit" name="reg_user" value="Save">

                    <?php

                }

            }

            ?>

                </form>

            </div>

            <div class="col-md-5 border-right">



                <div class="p-3 py-5">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <h4 class="text-right">Card Details</h4>

                    </div>

                    <form action="<?php echo "edit-handler.php?id=$id"?>" method="POST">

                        <div class="row mt-2">

                            <div class="col-md-6"><label class="labels">Name</label><input type="text" name="fname"
                                    class="form-control" placeholder="" value="<?php echo $fname; ?>"></div>

                            <div class="col-md-6"><label class="labels">Surname</label><input type="text" name="lname"
                                    class="form-control" value="<?php echo $lname; ?>" placeholder="surname"></div>

                        </div>

                        <div class="row mt-3">

                            <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text"
                                    name="phone" class="form-control" placeholder="enter phone number"
                                    value="<?php echo $phone; ?>"></div>

                            <div class="col-md-12"><label class="labels">Email </label><input type="text" name="email"
                                    class="form-control" placeholder="" value="<?php echo $email; ?>"></div>

                            <div class="col-md-12"><label class="labels">Address </label><input type="text"
                                    name="address" class="form-control" placeholder="" value="<?php echo $address; ?>">
                            </div>

                            <div class="col-md-12"><label class="labels">Job TItle</label><input type="text"
                                    name="jobtitle" class="form-control" placeholder=""
                                    value="<?php echo $jobtitle; ?>"></div>

                            <div class="col-md-12"><label class="labels">Company Name</label><input type="text"
                                    name="cname" class="form-control" placeholder="" value="<?php echo $company; ?>">
                            </div>

                            <div class="col-md-12"><label class="labels">Profile Summary</label><textarea type="text"
                                    name="psummary" class="form-control" placeholder="<?php echo $summary; ?>"
                                    value=""></textarea></div>

                            <!-- <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value=""></div>

                    <div class="col-md-12"><label class="labels">Education</label><input type="text" class="form-control" placeholder="education" value=""></div> -->

                        </div>

                        <div class="row mt-3">

                            <div class="col-md-6"><label class="labels">Website</label><input type="text" name="website"
                                    class="form-control" placeholder="country" value="<?php echo $website; ?>"></div>

                            <div class="col-md-6"><label class="labels">Date Created</label><input type="text" readonly
                                    class="form-control" value="<?php echo $date_created; ?>" placeholder="state"></div>

                        </div>





                        <div style="display: none; top: 0; left: 0; right: 0; justify-content: center; align-items: center; position: fixed; background: #fff; padding: 15px; box-shadow: 0px 0px 13px rgba(0, 0, 0, 0.09); border-radius: 6px; text-align: center;"
                            class="confirm-edit">

                            <div>

                                <h2 style="margin-bottom: 15px; font-size: 16px;">Confirm Edit</h2>

                                <div style="display: flex; justify-content: space-between;">

                                    <div>

                                        <button
                                            style="color: #fff; border: none; background: #FF8B3B; border-radius: 8px;"
                                            type="submit" name="reg_user">Yes</button>

                                    </div>

                                    <div>

                                        <button style="color: #fff; border: none; background: #000; border-radius: 8px;"
                                            type="button" class="discard-edit">No</button>

                                    </div>



                                </div>

                            </div>

                        </div>

                    </form>

                    <div style="display: flex; justify-content: space-between;">

                        <div class="mt-5 text-center"><button class="btn btn-primary save-edit profile-button">Save
                                Profile</button></div>

                        <a href="card_details_view2.php">

                            <div class="mt-5 text-center"><button style="background: #000 !important;"
                                    class="btn btn-primary save-edit profile-button">Back</button></div>

                        </a>

                    </div>

                </div>



            </div>

            <div class="col-md-4">

                <div class="p-3 py-5">

                    <div class="d-flex justify-content-between align-items-center experience"><span>User Link & QR Code

                            Section</span></div><br>



                    <?php

                 

                    $userlink = "https://nukreationzdigital.com/qr/profile2?id=$id"; // example user profile link



                    // Get the index of the fourth backslash

                    $index = strpos($userlink, '/', strpos($userlink, '/', strpos($userlink, '/', strpos($userlink, '/') + 1) + 1) + 1);



                    // Get the substring before and after the fourth backslash

                    $before = substr($userlink, 0, $index);

                    $after = substr($userlink, $index);



                    // Output the link with the first part as a readonly input field and the second part as an editable input field

                    echo '<div style="display: none;" class="split-link col-md-12"><label class="labels">User Profile Link</label><div style="display:flex;" ><input type="text" readonly class="form-control" value="' . $before . '"><input type="text" class="form-control" value="' . $after . '"></div></div>';

                    ?>





                    <div style="display: block;" class="custom-link col-md-12"><label class="labels">User Profile

                            Link</label><input type="text" readonly class="form-control"
                            value="<?php echo "https://nukreationzdigital.com/qr/profile2?id=$id" ?>">

                    </div>

                    <div class="customize-link">

                        <button class="link-btn"
                            style="border: none; background: #ff8b3b; margin-top: 15px; color: #fff; padding: 6px 10px; border-radius: 6px;">Customize

                            Link</button>

                    </div>



                </div>

                <!-- ---------- QR CODE GENERATION ----------------- -->



                <div style="margin-left: 20px;;" class="col-md-12"><label class="labels">User QR CODE</label></div>

                <?php

                // Include the PHP QR Code library

                include "phpqrcode/qrlib.php";

                

                // Set the link for the user's profile

                $link = "https://nukreationzdigital.com/qr/profile2.php?id=$id";



                // Set the file path for the QR code image

                $file_path = "qr_codes/$fname$lname$id.png";



                // Generate the QR code image

                $qrCode = QRcode::png($link, $file_path);



                // Display the QR code image

                echo '<img class="qr-image" style=" width: 196px;

                height: 196px; margin-left: 20px; margin-top: 20px; padding: 8px;

                background: #FFFFFF;

                box-shadow: 0px 0px 13px rgba(0, 0, 0, 0.09);" src="'.$file_path.'" />';

                

            

            ?>

            </div>

        </div>

    </div>

    </div>



    <div class="container rounded bg-white mt-5 mb-5">



        <div>

            <h4 style="padding-top: 30px; padding-left: 20px;" class="text-left">Professional Photos</h4>

            <div class="vcard-img-list">



                <?php 

        $imglist = mysqli_query($db, "SELECT * FROM images WHERE card_id = $id");

        if(mysqli_num_rows($imglist)>=0){

            $alreadyuploadedimg = mysqli_num_rows($imglist);

            

            while($row = mysqli_fetch_assoc($imglist)){

                $img = $row['file_name'];

                $imgid = $row['id'];



            ?>

                <div id="single-img-img" class="single-img">



                    <img style="width: 200px; height: 200px; object-fit: cover; display: inline-block;"
                        src="<?php echo $img ?>" alt="">

                    <a style="justify-self: end;" href="<?php echo "del-pro-img.php?id=$imgid&card=$id" ?>">

                        <i class="bi bi-trash3-fill"></i>

                    </a>





                </div>

                <?php

            }

        }

        ?>

                <div class="add-more-img2"></div>

                <div class="add-more-img">

                    <label style="position: relative;">

                        <i class="bi bi-cloud-arrow-up"></i>

                        <form action="<?php echo "edit-card-img.php?id=$id" ?>" method="POST"
                            enctype="multipart/form-data">

                            <input class="img-files" name="files[]" type="file" required
                                style="position: absolute; top: 0; left: 0; opacity: 0;" multiple
                                accept="image/jpeg, image/png, image/jpg" onchange="previewImage(event)" />





                            <button type="submit"> Save</button>

                        </form>

                    </label>



                </div>





            </div>

        </div>





    </div>



    <?php 

                    }

                    }

            ?>

    </div>

    </div>





    <div style="display: none" class="maximage-modal">



        <h1><i class="bi bi-exclamation-triangle"></i></h1>

        <p>You can only upload a maximum of<b> <?php echo $maximage2; ?> </b>image for your current plan.</p><br>

        <p>Upgrade your plan to upload more images</p>

        <button class="modal-cancel" style="background: grey; color: #fff;">Cancle</button>

        <a href="pricing.php">

            <button>Upgrade</button>

        </a>



    </div>

    <div style="display: none" class="overlay"></div>





    <script>
    const save_edit = document.querySelector('.save-edit');

    const confirm_edit = document.querySelector('.confirm-edit');

    const discard_edit = document.querySelector('.discard-edit');



    save_edit.addEventListener('click', function() {

        if (confirm_edit.style.display === "none") {

            confirm_edit.style.display = 'flex';

        }

    })



    discard_edit.addEventListener('click', function() {

        if (confirm_edit.style.display === 'flex') {

            confirm_edit.style.display = 'none';

        }

    });



    const editImageButton = document.getElementById('edit-image-button');

    const imageInput = document.getElementById('image-input');



    editImageButton.addEventListener('click', () => {

        imageInput.click();

    });



    function display_image(file) {

        var img = document.querySelector("#image-input");

        var prototype_img = document.querySelector("#edited-img");

        img.src = URL.createObjectURL(file);

        prototype_img.src = URL.createObjectURL(file);

    }







    const singleimg = document.querySelector('.single-img');

    var modal = document.querySelector('.maximage-modal');

    var mainContent = document.querySelector('.container');

    var overlay = document.querySelector('.overlay');



    function previewImage(event) {

        var files = event.target.files;

        var addMoreImgDiv = document.querySelector('.add-more-img2');

        var maximage = '<?php echo $maximage2 ?>'

        var alreadyuploadedimg = '<?php echo $alreadyuploadedimg ?>';

        var alreadyuploadedimgInt = parseInt(alreadyuploadedimg);



        var currentCount = addMoreImgDiv.childElementCount; // current number of uploaded images

        var numFiles = files.length;

        var counter = 0;



        function onImageAdded() {

            counter++;

            const numImages = addMoreImgDiv.querySelectorAll('.preview-container').length;

            const totalimg = numImages + alreadyuploadedimgInt

            console.log(numImages, totalimg);

            if (totalimg > maximage) {

                modal.style.display = "block";

                mainContent.classList.add('main-container-card-modal');

                overlay.style.display = "block";



                const removeLastImage = () => {

                    const newImages = addMoreImgDiv.querySelectorAll('.preview-container:not(.old-image)');

                    const lastNewImage = newImages[newImages.length - 1];

                    if (lastNewImage) {

                        lastNewImage.remove();

                        onImageRemoved();

                    }

                };

                removeLastImage();

            }

            console.log(numImages);

        }



        function onImageRemoved() {

            counter--;

            const numImages = addMoreImgDiv.querySelectorAll('.preview-container:not(.old-image)').length;

            console.log(numImages);

        }



        for (var i = 0; i < files.length; i++) {

            var reader = new FileReader();

            reader.onload = function(event) {

                var imgElement = document.createElement('img');

                imgElement.src = event.target.result;

                imgElement.style.width = '200px';

                imgElement.style.height = '200px';



                var containerDiv = document.createElement('div');

                containerDiv.classList.add('preview-container');

                containerDiv.appendChild(imgElement);



                var deleteButton = document.createElement('button');

                deleteButton.innerHTML = '<i class="bi bi-trash3-fill"></i>';

                deleteButton.classList.add('delete-button');

                deleteButton.addEventListener('click', function() {

                    containerDiv.remove();

                    onImageRemoved();

                });



                containerDiv.appendChild(deleteButton);



                addMoreImgDiv.appendChild(containerDiv);

                onImageAdded();

            };



            reader.readAsDataURL(files[i]);

        }

    }



    var cancel_modal_btn = document.querySelector('.modal-cancel');

    cancel_modal_btn.addEventListener("click", function() {

        console.log('cancel clicked');

        modal.style.display = "none";

        mainContent.classList.remove('main-container-card-modal');

        overlay.style.display = "none";

    })

    const custom_btn = document.querySelector('.customize-link');

    const link_btn = document.querySelector('.link-btn');

    const link_input = document.querySelector('.custom-link');

    const split_link = document.querySelector('.split-link');

    custom_btn.addEventListener('click', function() {

        if (split_link.style.display === 'none') {

            split_link.style.display = 'block';

            link_input.style.display = 'none';

            link_btn.innerHTML = 'Save Customization';

        } else {

            split_link.style.display = 'none';

            link_input.style.display = 'block';

            link_btn.innerHTML = 'Customize Link';

        }





    })
    </script>