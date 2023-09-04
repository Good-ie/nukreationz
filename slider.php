<!DOCTYPE html>

<html>



<head>

    <title></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css">

    <link rel="stylesheet" href="./css/style.css">

    <style>
    body {

        padding: 0;

        margin: 0;

    }



    .slider-container {

        position: relative;

        overflow-x: hidden;

        height: 188px;

    }



    .slider-width {

        position: absolute;

        display: flex;

        align-items: start;

        justify-content: space-around;

        left: 0;

        top: 0;

        transition: 0.4s ease-in-out;

    }



    .item {

        display: flex;

        justify-content: center;

        align-items: center;

        width: 100px !important;

        /* height: 200px; */

        /* background: rgb(23 147 83); */

        margin: 10px 10px;

        color: #fff;

        text-align: center;

        font-size: 40px;

        font-weight: 800;

        cursor: pointer;

    }



    .item img {

        height: 150px;

        border-radius: 10px;

    }



    .btn-container {

        position: absolute;

        top: 50%;

        transform: translateY(-50%);

        width: 100%;

        display: flex;

        justify-content: space-between;

        align-items: center;

    }



    .btn {

        background: rgb(245 24 24);

        border: none;

        outline: none;

        color: #fff;

        font-size: 20px;

        padding: 6px 12px;

        cursor: pointer;

        margin: 0 10px;

    }



    .checked img {

        border: 5px solid orange;

    }

    .item:hover {

        transition: all 300ms ease-in;

        scale: 1.15;

    }
    </style>

</head>



<body>

    <div class="slider-container" item-display-d="4" item-display-t="3" item-display-m="1">

        <div class="slider-width">

            <div data-prototype="prototype1" class="item item1">

                <img src="img/profile1.png" alt="">

                <input type="text" class="profile1" name="profile1" value="" hidden>

            </div>

            <div data-prototype="prototype2" class="item item2">

                <img src="img/profile3.png" alt="">

                <input type="text" class="profile2" name="profile2" value="" hidden>

            </div>

            <div data-prototype="prototype3" class="item item3">

                <img src="img/profile5.png" alt="">

                <input type="text" class="profile3" name="profile3" value="" hidden>

            </div>

            <!-- <div class="item">4</div>

            <div class="item">5</div>

            <div class="item">6</div>

            <div class="item">7</div>

            <div class="item">8</div>

            <div class="item">9</div>

            <div class="item">10</div>

            <div class="item">11</div>

            <div class="item">12</div>

            <div class="item">13</div>

            <div class="item">14</div>

            <div class="item">15</div>

            <div class="item">16</div> -->

        </div>

        <!-- <div class="btn-container">

            <button type="button" class="prev" onclick="prev()">Prev</button>

            <button type="button" class="next" onclick="next()">Next</button>

        </div> -->

    </div>



    <script>
    const myitems = document.querySelectorAll('.item');



    myitems.forEach(item => {

        item.addEventListener('click', function() {

            myitems.forEach(item => item.classList.remove('checked'));

            this.classList.add('checked');

        });

    });



    function prev() {

        const slider = document.querySelector('.slider-width');

        slider.scrollLeft -= slider.offsetWidth;

    }



    function next() {

        const slider = document.querySelector('.slider-width');

        slider.scrollLeft += slider.offsetWidth;

    }
    </script>











    <script>
    var count = 0;

    var inc = 0;

    margin = 0;

    var slider = document.getElementsByClassName("slider-width")[0];

    var itemDisplay = 0;

    if (screen.width > 990) {

        itemDisplay = document.getElementsByClassName("slider-container")[0].getAttribute("item-display-d");

        margin = itemDisplay * 5;

    }

    if (screen.width > 700 && screen.width < 990) {

        itemDisplay = document.getElementsByClassName("slider-container")[0].getAttribute("item-display-t");

        margin = itemDisplay * 6.8;

    }

    if (screen.width > 280 && screen.width < 700) {

        itemDisplay = document.getElementsByClassName("slider-container")[0].getAttribute("item-display-m");

        margin = itemDisplay * 20;

    }





    var items = document.getElementsByClassName("item");

    var itemleft = items.length % itemDisplay;

    var itemslide = Math.floor(items.length / itemDisplay) - 1;

    for (let i = 0; i < items.length; i++) {

        items[i].style.width = (screen.width / itemDisplay) - margin + "px";

    }



    function next() {

        if (inc !== itemslide + itemleft) {

            if (inc == itemslide) {

                inc = inc + itemleft;

                count = count - (screen.width / itemDisplay) * itemleft;

            } else {

                inc++;

                count = count - screen.width;

            }

        }

        slider.style.left = count + "px";

    }



    function prev() {

        if (inc !== 0) {

            if (inc == itemleft) {

                inc = inc - itemleft;

                count = count + (screen.width / itemDisplay) * itemleft;

            } else {

                inc--;

                count = count + screen.width;

            }

        }

        console.log(inc)

        slider.style.left = count + "px";

    }
    </script>



</body>



</html>