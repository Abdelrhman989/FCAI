// Declarations
const dayDate = document.querySelector(".event-appointment")
const daysByNums = document.querySelector(".daysByNums")
let newDate = new Date();
const months = [
  "يناير",
  "فبراير",
  "مارس",
  "أبريل",
  "مايو",
  "يونيو",
  "يوليو",
  "أغسطس",
  "سبتمبر",
  "أكتوبر",
  "نوفمبر",
  "ديسمبر"]


// Function of rendering the calendar
const renderCalendar = (eventDay, eventMonth, eventYear) => {
  eventMonth--;
  newDate.setFullYear(eventYear, eventMonth);
  const currYear = newDate.getFullYear();
  const currmonth = newDate.getMonth();

  const firstDayofMonth = new Date(currYear, currmonth, 1).getDay();
  const lastDateofMonth = new Date(currYear, currmonth + 1, 0).getDate(); // Getting last day of month

  dayDate.innerHTML = `<span>${eventYear}</span>, <span>${months[currmonth]}</span>`; // Render date[year + month]

  if (firstDayofMonth !== 6) {
    for (let i = firstDayofMonth + 1; i > 0; i--) {
      daysByNums.innerHTML += `<div class="day"><span>-</span></div>`;
    }
  }

  for (let i = 1; i <= lastDateofMonth; i++) { // Render days in order
    daysByNums.innerHTML += `<div class="day"><span>${i}</span></div>`;
  }

  const days = document.querySelectorAll(".daysByNums .day span") // Must be catched here after renderCalendar
  // Call event day to active day 22
  days.forEach(day => {
    day.classList.remove("eventDay")
    // Active event day;
    if (+day.innerHTML === eventDay) {
      day.classList.add("eventDay");
    }
  })
}
// Function to render the calendar
const eventDate = document
  .getElementById("eventsSection")
  .getAttribute("event-date")
  .split("-"); // => 4-5-2023
renderCalendar(+eventDate[2], +eventDate[1], +eventDate[0]);
