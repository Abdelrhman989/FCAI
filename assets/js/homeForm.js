// ELEMENTS
let meInput = document.getElementById("meInput");
let wantInput = document.getElementById("wantInput");

// OPTIONS
const meOptions = [
  { name: "طالب", value: "student" },
  { name: "زائر", value: "visitor" },
  { name: "هيئة التدريس", value: "assistant" },
  { name: "خريج", value: "graduated" },
];

const wantOptions = {
  student: ["one", "two"],
  visitor: ["tree", "four", "five"],
  assistant: ["six", "seven"],
  graduated: ["eight", "nine", "ten"],
};

// FUNCTIONS
meOptions.forEach((opt) => {
  meInput.innerHTML += `<option value="${opt.value}">${opt.name}</option>`;
});

wantInput.addEventListener("change", () => {
  sendRequest();
});

meInput.addEventListener("change", () => {
  displayWantOptions(meInput.value);
});

function sendRequest() {
  const currentURL = window.location.origin; // current url => https://localhost:2611
  const page = "/details.html"; // details page => details.php
  const query = `?type=services&am=${meInput.value}&want=${wantInput.value}`; // values of select inputs
  window.location = currentURL + page + query; // change the url
}

function displayWantOptions(key = "") {
  wantInput.disabled = false;
  wantInput.innerHTML = "";
  console.log(key);
  const data = wantOptions[key];
  data.forEach((opt) => {
    wantInput.innerHTML += `<option value="${opt}">${opt}</option>`;
  });
}
