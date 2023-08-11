"use strict";

const inputs = document.querySelectorAll(".otp-input input");

inputs.forEach((input, index) => {
  input.addEventListener("keyup", (e) => {
    const inputLength = input.value.length;
    if (inputLength === 1) {
      if (index !== inputs.length - 1) {
        inputs[index + 1].focus();
      } else {
        inputs[index].blur();
      }
    } else if (inputLength === 0) {
      if (index !== 0) {
        inputs[index - 1].focus();
      }
    }
  });
});

const button = document.querySelector(".pin");
const paybutton = document.querySelector(".pay");
const modal = document.querySelector(".pin-modal");
const errorMessage = document.getElementById("error-message");
paybutton.addEventListener("click", function (event) {
  var amountInput = document.getElementById("amount");
  var bankInput = document.getElementById("bank");
  var acctInput = document.getElementById("acct");

  if (
    amountInput.value.trim() === "" ||
    bankInput.value.trim() === "" ||
    acctInput.value.trim() === ""
  ) {
    // Prevent the default behavior of the button
    event.preventDefault();
    window.location.href = "index.html";

    errorMessage.style.display = "block";
  }
  //   } else {
});

button.addEventListener("click", function () {
  modal.classList.add("hidden");
  const loader = document.querySelector(".loader");
  loader.classList.remove("hidden");
  setTimeout(function () {
    loader.classList.add("hidden");
    window.location.href = "approved.html";
  }, 4000);
});
