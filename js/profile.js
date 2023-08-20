const item1 = document.querySelector(".item1");
const item2 = document.querySelector(".item2");
const item3 = document.querySelector(".item3");
const profile1 = document.querySelector(".profile1");
const profile2 = document.querySelector(".profile2");
const profile3 = document.querySelector(".profile3");
var prototypeContent = document.querySelector(".prototype");

item1.addEventListener("click", function () {
    profile1.value = "profile2";
  var associatedPrototype = this.getAttribute("data-prototype");
  if (associatedPrototype === "prototype1") {
    $.ajax({
      url: "prototype.php",
      success: function (data) {
        $(".prototype").find(".prototype-content").html(data);
      },
    });
  }
});
item2.addEventListener("click", function () {
    profile2.value = "profile3";
  var associatedPrototype = this.getAttribute("data-prototype");
  if (associatedPrototype === "prototype2") {
    $.ajax({
      url: "prototype2.php",
      success: function (data) {
        $(".prototype").find(".prototype-content").html(data);
      },
    });
  }
});
item3.addEventListener("click", function () {
    profile3.value = "profile5";
  var associatedPrototype = this.getAttribute("data-prototype");
  if (associatedPrototype === "prototype3") {
    $.ajax({
      url: "prototype3.php",
      success: function (data) {
        $(".prototype").find(".prototype-content").html(data);
      },
    });
  }
});
