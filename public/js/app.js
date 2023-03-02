const seats = document.querySelectorAll(".seat");
const showtimeContainer = document.querySelector(".showtime-container");
const showtime = document.querySelector(".showtime");
const movieSeats = document.getElementById("movie_seats");
const times = document.querySelectorAll(".time");

// Add Active class on the selected seat
var selected = "";
seats.forEach((seat) => {
    seat.addEventListener("click", () => {
        seat.classList.toggle("selected-seat");
        seat.style.pointerEvents = "none";
        let dataId = seat.getAttribute("data-id");
        selected += dataId + "|";
        movieSeats.value = selected;
    });
});
// Add Active class on the selected show time
showtimeContainer.addEventListener("click", (e) => {
    const clicked = e.target.closest(".time");
    times.forEach((c) => c.classList.remove("selected-seat"));
    clicked.classList.add("selected-seat");
    showtime.value = clicked.innerText;

});
