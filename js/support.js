"use strict";

const buttons = document.querySelectorAll(".bi");
const answers = document.querySelectorAll(".answer");

for (let i = 0; i < buttons.length; i++) {
  buttons[i].addEventListener("click", function () {
    if (
      answers[i].classList.contains("ansdisplay") ||
      buttons[i].classList.contains("bi-plus-circle")
    ) {
      answers[i].classList.remove("ansdisplay");
      buttons[i].classList.remove("bi-plus-circle");
      buttons[i].classList.add("bi-dash-circle");
    } else {
      buttons[i].classList.add("bi-plus-circle");
      for (let j = 0; j < answers.length; j++) {
        answers[j].classList.add("ansdisplay");
      }
    }
  });
}

const all_btn = document.querySelector(".all-btn");
const free_btn = document.querySelector(".free-btn");
const paid_btn = document.querySelector(".paid-btn");
const all_plan = document.querySelector(".all");
const free_plan = document.querySelector(".free-plan");
const paid_plan = document.querySelector(".paid");
const free_tool = document.querySelector(".free-tools");
const paid_tool = document.querySelector(".paid-tools");
const all_tools = document.querySelector(".all-tools");
const seg_tool = document.querySelector(".seg-tools");

function toggleDisplay(paidToolDisplay, freeToolDisplay, allToolsDisplay, segToolDisplay, activePlan, inactivePlan1, inactivePlan2) {
  paid_tool.style.display = paidToolDisplay;
  free_tool.style.display = freeToolDisplay;
  all_tools.style.display = allToolsDisplay;
  seg_tool.style.display = segToolDisplay;
  activePlan.classList.add("active-tool");
  inactivePlan1.classList.remove("active-tool");
  inactivePlan2.classList.remove("active-tool");
}

all_btn.addEventListener("click", function () {
  toggleDisplay("none", "none", "flex", "none", all_plan, free_plan, paid_plan);
});

free_btn.addEventListener("click", function () {
  toggleDisplay("none", "flex", "none", "flex", free_plan, all_plan, paid_plan);
});

paid_btn.addEventListener("click", function () {
  toggleDisplay("flex", "none", "none", "flex", paid_plan, all_plan, free_plan);
});




