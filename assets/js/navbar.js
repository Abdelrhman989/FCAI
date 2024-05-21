// [ ELEMENTS ]
let dropdownTitles = document.querySelectorAll(".dropdown-title");
let dropdownContents = document.querySelectorAll(".dropdown-content");
let linksCont = document.querySelector("nav ul.links");
let menuIcon = document.querySelector("nav .fa-bars");
let closeIcon = document.querySelector("nav .fa-xmark");

// [ FUNCTIONS ]
// dropdown functions
const closeAllDropdowns = () => {
  dropdownContents.forEach((ele) => ele.classList.remove("active"));
  dropdownTitles.forEach((ele) => ele.classList.remove("active"));
};
const isActive = (i) => {
  return dropdownContents[i].classList.contains("active");
};
const dropDownClick = (i) => {
  if (isActive(i)) {
    dropdownTitles[i].classList.remove("active");
    dropdownContents[i].classList.remove("active");
  } else {
    closeAllDropdowns();
    dropdownTitles[i].classList.add("active");
    dropdownContents[i].classList.add("active");
  }
};
const dropDownBlur = () => {
  closeAllDropdowns();
  dropdownTitles[dropdownTitles.length - 1].classList.add("active");
};

// mobile navbar functions
menuIcon.addEventListener("click", () => {
  linksCont.classList.add("opened");
});
closeIcon.addEventListener("click", () => {
  linksCont.classList.remove("opened");
});

// [ MAIN LOOP ]
for (let i = 0; i < dropdownTitles.length; i++) {
  // Dropdown onClick
  dropdownTitles[i].addEventListener("click", () => dropDownClick(i));
  // Dropdown onBlur
 // dropdownTitles[i].addEventListener("blur", dropDownBlur);
}
