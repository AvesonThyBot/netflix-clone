// --------------- Import api key ---------------
import * as apikey from "./apikey.js";

// --------------- Displaying data ---------------
let url = "https://watchmode.p.rapidapi.com/list-titles/?types=movie%2Ctv_series&page=5&release_date_start=20010101&release_date_end=20201211";
let options = apikey.options;

// displays the given data
function displayData() {
	fetch(url, options)
		.then((data) => data.json())
		.then((data) => {
			console.log(data);
		});
}

// displayData();

// --------------- Event listeners ---------------

// btn-volume event listener
const btnVolume = document.querySelector(".btn-volume");
btnVolume.onclick = () => {
	if (btnVolume.children[0].currentSrc == "http://127.0.0.1:5500/img/volume_high.svg") {
		btnVolume.children[0].src = "http://127.0.0.1:5500/img/volume_mute.svg";
	} else {
		btnVolume.children[0].src = "http://127.0.0.1:5500/img/volume_high.svg";
	}
};

// Scrolling frame
document.addEventListener("DOMContentLoaded", function () {
	const scrollableDiv = document.querySelector(".scrollable-div");
	const scrollLeftButton = document.createElement("button");
	const scrollRightButton = document.createElement("button");

	scrollLeftButton.innerHTML = "&lt;";
	scrollRightButton.innerHTML = "&gt;";

	scrollLeftButton.classList.add("scroll-button");
	scrollRightButton.classList.add("scroll-button");

	scrollLeftButton.setAttribute("id", "scrollLeft");
	scrollRightButton.setAttribute("id", "scrollRight");

	scrollableDiv.parentNode.appendChild(scrollLeftButton);
	scrollableDiv.parentNode.appendChild(scrollRightButton);

	scrollLeftButton.addEventListener("click", function () {
		scrollableDiv.scrollBy({
			left: -1000, // Adjust the scroll amount
			behavior: "smooth",
		});
	});

	scrollRightButton.addEventListener("click", function () {
		scrollableDiv.scrollBy({
			left: 1000, // Adjust the scroll amount
			behavior: "smooth",
		});
	});
});

// --------------- Extra attributes ---------------
document.querySelector(".navbar-brand").setAttribute("draggable", false);

// For search and information
// https://developer.themoviedb.org/reference/intro/getting-started
