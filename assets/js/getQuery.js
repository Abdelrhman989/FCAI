let amValue = document.getElementById("amValue");
let wantValue = document.getElementById("wantValue");

const URLParams = new URLSearchParams(window.location.href);

amValue.innerHTML = URLParams.get("am");
wantValue.innerHTML = URLParams.get("want");
