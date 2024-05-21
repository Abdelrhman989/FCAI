const card_wrapper = document.querySelector(".card-wrapper");
const prev_btn = document.querySelector(".prev");
const next_btn = document.querySelector(".next");
const desc = document.querySelector(".description");

var swiper = new Swiper(".slide-content", {
  slidesPerView: 3,
  spaceBetween: 25,
  loop: false,
  centerSlide: "true",
  fade: "true",
  grabCursor: "true",
  // pagination: {
  //   el: ".swiper-pagination",
  //   clickable: true,
  //   dynamicBullets: true,
  // },
  navigation: {
    nextEl: ".next",
    prevEl: ".prev",
  },

  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    800: {
      slidesPerView: 2,
    },
    1200: {
      slidesPerView: 3,
    },
  },
});

// Functions to check if slider in the beginning of in the end
const isBeg = () => {
  next_btn.classList.add("active");
  if (swiper.isBeginning) {
    next_btn.classList.add("active");
    prev_btn.classList.remove("active");
    prev_btn.disabled = true;
  }
};

const isEnd = () => {
  prev_btn.classList.add("active");
  if (swiper.isEnd) {
    next_btn.classList.remove("active");
    prev_btn.classList.add("active");
    next_btn.disabled = true;
  }
};

// Events
prev_btn.addEventListener("click", () => {
  isBeg();
});

next_btn.addEventListener("click", () => {
  isEnd();
});

swiper.on("slideChange", function () {
  if (swiper.isBeginning) {
    isBeg();
  } else if (swiper.isEnd) {
    isEnd();
  } else {
    next_btn.classList.add("active");
    prev_btn.classList.add("active");
  }
});
