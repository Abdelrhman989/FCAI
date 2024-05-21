// ===================> [ NAVBAR ] <===================
let linksCont = document.querySelector(".links.for-phone");
let menuIcon = document.querySelector("nav .fa-bars");
let closeIcon = document.querySelector(".links.for-phone .fa-xmark");

menuIcon.addEventListener("click", () => {
  linksCont.classList.add("opened");
});
closeIcon.addEventListener("click", () => {
  linksCont.classList.remove("opened");
});

// ===================> [ DROPDOWN desktop ] <===================
let dropdownTitles = document.querySelectorAll("nav .dropdown-title");
let dropdownContents = document.querySelectorAll("nav .dropdown-content");

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
// done
const dropDownBlur = () => {
  closeAllDropdowns();
  dropdownTitles[dropdownTitles.length - 1].classList.add("active");
};

// [ MAIN LOOP ] // done
for (let i = 0; i < dropdownTitles.length; i++) {
  // Dropdown onClick
  dropdownTitles[i].addEventListener("click", () => dropDownClick(i));
  // Dropdown onBlur
  //dropdownTitles[i].addEventListener("blur", dropDownBlur);
}

// ===================> [ DROPDOWN phone ] <===================
let dropdownTitles2 = document.querySelectorAll(
  ".links.for-phone .dropdown-title"
);
let dropdownContents2 = document.querySelectorAll(
  ".links.for-phone .dropdown-content"
);

// dropdown functions
const closeAllDropdowns2 = () => {
  dropdownContents2.forEach((ele) => ele.classList.remove("active"));
  dropdownTitles2.forEach((ele) => ele.classList.remove("active"));
};
const isActive2 = (i) => {
  return dropdownContents2[i].classList.contains("active");
};
const dropDownClick2 = (i) => {
  if (isActive2(i)) {
    dropdownTitles2[i].classList.remove("active");
    dropdownContents2[i].classList.remove("active");
  } else {
    closeAllDropdowns2();
    dropdownTitles2[i].classList.add("active");
    dropdownContents2[i].classList.add("active");
  }
};
// done
const dropDownBlur2 = () => {
  closeAllDropdowns2();
  dropdownTitles2[dropdownTitles2.length - 1].classList.add("active");
};

// [ MAIN LOOP ] // done
for (let i = 0; i < dropdownTitles2.length; i++) {
  // Dropdown onClick
  dropdownTitles2[i].addEventListener("click", () => dropDownClick2(i));
  // Dropdown onBlur
 // dropdownTitles2[i].addEventListener("blur", dropDownBlur2);
}
