let toggles = document.getElementsByClassName("toggleFaqSec");
let contentDiv = document.getElementsByClassName("contentFaqSec");
let icons = document.getElementsByClassName("iconFaqSec");

const questions = document.querySelector("#faqSection .questions-cont");

for (let i = 0; i < toggles.length; i++) {
  toggles[i].addEventListener("click", () => {
    if (icons[i].classList.contains("fa-plus")) {
      // Icon
      icons[i].classList.remove("fa-plus");
      icons[i].classList.add("fa-minus");
      // Content
      toggles[i].style.margin = "0px 0px 6px 0px";
      contentDiv[i].style.opacity = 1;
      contentDiv[i].style.height = contentDiv[i].scrollHeight + 10 + "px"; // 20 -> pd bottom + pd up
    } else {
      // Icon
      icons[i].classList.remove("fa-minus");
      icons[i].classList.add("fa-plus");
      // Content
      toggles[i].style.margin = "0px 0px";
      contentDiv[i].style.height = 0;
      contentDiv[i].style.opacity = 0;
      contentDiv[i].style.padding = 0;
    }
  });
}