// --------------- Import api key ---------------
import * as apikey from "./apikey.js";
let options = apikey.options;

// --------------- Global variables ---------------
// genre dictionary based off genre id
const genreObject = {
	28: "Action",
	12: "Adventure",
	16: "Animation",
	35: "Comedy",
	80: "Crime",
	99: "Documentary",
	18: "Drama",
	10751: "Family",
	14: "Fantasy",
	36: "History",
	27: "Horror",
	10402: "Music",
	9648: "Mystery",
	10749: "Romance",
	878: "Science Fiction",
	10770: "TV Movie",
	53: "Thriller",
	10752: "War",
	37: "Western",
};

// --------------- Extra function & code ---------------
// Check before displaying main
if (location.href.includes("?page_type")) {
	const url = new URL(window.location.href);
	const sectionType = url.searchParams.get("page_type");
	const sections = document.querySelectorAll(".navbar-sections");
	const selectedNavbarSection = document.querySelector(`.${sectionType}-navbar-section`);
	document.title = `${selectedNavbarSection.textContent} - Netflix`;
	// remove active
	sections.forEach((section) => {
		section.classList.remove("active");
	});
	// add active
	selectedNavbarSection.classList.add("active");
	// hide all previous netflix sections
	const netflixSection = document.querySelectorAll(".netflix-sections");
	netflixSection.forEach((section) => {
		section.setAttribute("hidden", "hidden");
	});
	// display correct section
	let selectedSection = `${sectionType}-section`;
	selectedSection = document.querySelector(`.${selectedSection}`);
	// unhide the picked section
	selectedSection.removeAttribute("hidden");
	// removed the url
	window.pageTypeProcessed = true;

	// Remove the "page_type" parameter from the URL
	url.searchParams.delete("page_type");

	// Replace the current URL with the modified one
	window.history.replaceState({}, document.title, url.toString());
} else {
	document.title = `Home - Netflix`;
	document.querySelector(".home-navbar-section").classList.add("active");
	document.querySelector(".home-section").removeAttribute("hidden");
	displayMain();
}
// function to check if its name or title
function title(data_name, type) {
	if (type == 1) {
		if (data_name.name == undefined) {
			return data_name.title.toLowerCase().replace(/ /g, "-");
		} else if (data_name.title == undefined) {
			return data_name.name.toLowerCase().replace(/ /g, "-");
		}
	} else {
		if (data_name.name == undefined) {
			return data_name.title;
		} else if (data_name.title == undefined) {
			return data_name.name;
		}
	}
}
function image(data_image) {
	if (data_image == null) {
		return "/img/null_image.png";
	} else {
		return `https://image.tmdb.org/t/p/original${data_image}`;
	}
}
// --------------- All displaying function ---------------
// ------- Main display -------
function displayMain() {
	// display hero
	function displayHero() {
		fetch("https://api.themoviedb.org/3/tv/111110", options)
			.then((data) => data.json())
			.then((data) => {
				// console.log(data);
				const heroTitle = document.querySelector(".hero-title");
				const heroDesc = document.querySelector(".hero-desc");
				const heroVideo = document.querySelector(".hero-video");

				// display series info
				heroTitle.textContent = data.name;
				heroDesc.textContent = data.overview;
				// display video
				heroVideo.src = "/img/one_piece.mp4";
				heroVideo.controls = false;
				heroVideo.muted = true;
				heroVideo.volume = 0.4;
				// turns into banner after 168 seconds
				setTimeout(function () {
					// Stop the video at 168 seconds
					heroVideo.currentTime = 169;
					// Pause the video
					heroVideo.pause();
					document.querySelector(".hero-video-container").innerHTML = `<img src="https://image.tmdb.org/t/p/original${data.poster_path}" alt="${data.name} banner"/>`;
				}, 168500);
			});
	}

	// display top rated movies/series
	function displayTopRated() {
		fetch("https://api.themoviedb.org/3/discover/tv?include_adult=false&include_null_first_air_dates=false&language=en-US&page=1&sort_by=popularity.desc&with_networks=213", options)
			.then((data) => data.json())
			.then((data) => {
				// console.log(data);
				const popularBox = document.querySelector(".popular-box");
				popularBox.textContent = "";
				for (let index = 0; index < data.results.length; index++) {
					popularBox.innerHTML += `<div class="${title(data.results[index], 1)} box-container"><img draggable="false" (dragstart)="false;" class="popular-item-image" src="${image(data.results[index].backdrop_path)}" alt="image of ${title(data.results[index], 2)}"/><span>${title(data.results[index], 2)}</span></div>`;
				}
			});
	}
	// display trending movies/series
	function displayTrending() {
		fetch("https://api.themoviedb.org/3/trending/all/day?language=en-US", options)
			.then((data) => data.json())
			.then((data) => {
				const trendingBox = document.querySelector(".trending-box");
				trendingBox.textContent = "";
				for (let index = 0; index < data.results.length; index++) {
					trendingBox.innerHTML += `<div class="${title(data.results[index], 1)} box-container"><img draggable="false" (dragstart)="false;" class="popular-item-image" src="${image(data.results[index].backdrop_path)}" alt="image of ${title(data.results[index], 2)}"/><span>${title(data.results[index], 2)}</span></div>`;
				}
			});
	}
	// display tv series
	function displaySeries() {
		fetch("https://api.themoviedb.org/3/discover/tv?include_adult=false&include_null_first_air_dates=false&language=en-US&page=1&sort_by=vote_count.desc&with_networks=213", options)
			.then((data) => data.json())
			.then((data) => {
				// console.log(data);
				const tvBox = document.querySelector(".tv-box");
				tvBox.textContent = "";
				for (let index = 0; index < data.results.length; index++) {
					tvBox.innerHTML += `<div class="${title(data.results[index], 1)} box-container"><img draggable="false" (dragstart)="false;" class="popular-item-image" src="${image(data.results[index].backdrop_path)}" alt="image of ${title(data.results[index], 2)}"/><span>${title(data.results[index], 2)}</span></div>`;
				}
				// to display image use this:
				//`<img src="https://image.tmdb.org/t/p/original${data.results[0].backdrop_path}"/>`; (swap result number with picked number, change backdrop_path with poster_path if needed)
			});
	}
	// display movies
	function displayMovies() {
		fetch("https://api.themoviedb.org/3/discover/movie?include_adult=false&include_video=false&language=en-US&page=1&sort_by=vote_count.desc", options)
			.then((data) => data.json())
			.then((data) => {
				// console.log(data);
				const filmBox = document.querySelector(".films-box");
				filmBox.textContent = "";
				for (let index = 0; index < data.results.length; index++) {
					filmBox.innerHTML += `<div class="${title(data.results[index], 1)} box-container"><img draggable="false" (dragstart)="false;" class="popular-item-image" src="${image(data.results[index].backdrop_path)}" alt="image of ${title(data.results[index], 2)}"/><span>${title(data.results[index], 2)}</span></div>`;
				}
				// to display image use this:
				//`<img src="https://image.tmdb.org/t/p/original${data.results[0].backdrop_path}"/>`; (swap result number with picked number, change backdrop_path with poster_path if needed)
			});
	}
	displayHero();
	displayTopRated();
	displayTrending();
	displayMovies();
	displaySeries();
}
// ------- Films display -------
function displayMovies() {
	// display top rated films
	function displayTopRated() {
		fetch("https://api.themoviedb.org/3/movie/top_rated", options)
			.then((data) => data.json())
			.then((data) => {
				// console.log(data);
				const popularBox = document.querySelector(".popular-box-films");
				popularBox.textContent = "";
				for (let index = 0; index < data.results.length; index++) {
					popularBox.innerHTML += `<div class="${title(data.results[index], 1)} box-container"><img draggable="false" (dragstart)="false;" class="popular-item-image" src="${image(data.results[index].backdrop_path)}" alt="image of ${title(data.results[index], 2)}"/><span>${title(data.results[index], 2)}</span></div>`;
				}
			});
	}
	// display trending films
	function displayTrending() {
		fetch("https://api.themoviedb.org/3/trending/movie/day?language=en-US", options)
			.then((data) => data.json())
			.then((data) => {
				const trendingBox = document.querySelector(".trending-box-films");
				trendingBox.textContent = "";
				for (let index = 0; index < data.results.length; index++) {
					trendingBox.innerHTML += `<div class="${title(data.results[index], 1)} box-container"><img draggable="false" (dragstart)="false;" class="popular-item-image" src="${image(data.results[index].backdrop_path)}" alt="image of ${title(data.results[index], 2)}"/><span>${title(data.results[index], 2)}</span></div>`;
				}
			});
	}
	// display currently in theatres films
	function displayPlaying() {
		fetch("https://api.themoviedb.org/3/movie/now_playing", options)
			.then((data) => data.json())
			.then((data) => {
				// console.log(data);
				const tvBox = document.querySelector(".tv-box-films");
				tvBox.textContent = "";
				for (let index = 0; index < data.results.length; index++) {
					tvBox.innerHTML += `<div class="${title(data.results[index], 1)} box-container"><img draggable="false" (dragstart)="false;" class="popular-item-image" src="${image(data.results[index].backdrop_path)}" alt="image of ${title(data.results[index], 2)}"/><span>${title(data.results[index], 2)}</span></div>`;
				}
				// to display image use this:
				//`<img src="https://image.tmdb.org/t/p/original${data.results[0].backdrop_path}"/>`; (swap result number with picked number, change backdrop_path with poster_path if needed)
			});
	}
	// display upcoming films
	function displayUpcoming() {
		fetch("https://api.themoviedb.org/3/movie/upcoming", options)
			.then((data) => data.json())
			.then((data) => {
				// console.log(data);
				const filmBox = document.querySelector(".films-box-films");
				filmBox.textContent = "";
				for (let index = 0; index < data.results.length; index++) {
					filmBox.innerHTML += `<div class="${title(data.results[index], 1)} box-container"><img draggable="false" (dragstart)="false;" class="popular-item-image" src="${image(data.results[index].backdrop_path)}" alt="image of ${title(data.results[index], 2)}"/><span>${title(data.results[index], 2)}</span></div>`;
				}
				// to display image use this:
				//`<img src="https://image.tmdb.org/t/p/original${data.results[0].backdrop_path}"/>`; (swap result number with picked number, change backdrop_path with poster_path if needed)
			});
	}
	// display all
	displayTopRated();
	displayTrending();
	displayPlaying();
	displayUpcoming();
}
// ------- Series display -------
function displaySeries() {
	// display top rated series
	function displayTopRated() {
		fetch("https://api.themoviedb.org/3/tv/top_rated", options)
			.then((data) => data.json())
			.then((data) => {
				// console.log(data);
				const popularBox = document.querySelector(".popular-box-series");
				popularBox.textContent = "";
				for (let index = 0; index < data.results.length; index++) {
					popularBox.innerHTML += `<div class="${title(data.results[index], 1)} box-container"><img draggable="false" (dragstart)="false;" class="popular-item-image" src="${image(data.results[index].backdrop_path)}" alt="image of ${title(data.results[index], 2)}"/><span>${title(data.results[index], 2)}</span></div>`;
				}
			});
	}
	// display trending series
	function displayTrending() {
		fetch("https://api.themoviedb.org/3/trending/tv/day?language=en-US", options)
			.then((data) => data.json())
			.then((data) => {
				const trendingBox = document.querySelector(".trending-box-series");
				trendingBox.textContent = "";
				for (let index = 0; index < data.results.length; index++) {
					trendingBox.innerHTML += `<div class="${title(data.results[index], 1)} box-container"><img draggable="false" (dragstart)="false;" class="popular-item-image" src="${image(data.results[index].backdrop_path)}" alt="image of ${title(data.results[index], 2)}"/><span>${title(data.results[index], 2)}</span></div>`;
				}
			});
	}
	// display currently airing series
	function displayAiringToday() {
		fetch("https://api.themoviedb.org/3/tv/airing_today?language=en-US&page=1", options)
			.then((data) => data.json())
			.then((data) => {
				// console.log(data);
				const tvBox = document.querySelector(".tv-box-series");
				tvBox.textContent = "";
				for (let index = 0; index < data.results.length; index++) {
					tvBox.innerHTML += `<div class="${title(data.results[index], 1)} box-container"><img draggable="false" (dragstart)="false;" class="popular-item-image" src="${image(data.results[index].backdrop_path)}" alt="image of ${title(data.results[index], 2)}"/><span>${title(data.results[index], 2)}</span></div>`;
				}
				// to display image use this:
				//`<img src="https://image.tmdb.org/t/p/original${data.results[0].backdrop_path}"/>`; (swap result number with picked number, change backdrop_path with poster_path if needed)
			});
	}
	// display on the air series
	function displayOnTheAir() {
		fetch("https://api.themoviedb.org/3/tv/on_the_air?language=en-US&page=1", options)
			.then((data) => data.json())
			.then((data) => {
				// console.log(data);
				const filmBox = document.querySelector(".films-box-series");
				filmBox.textContent = "";
				for (let index = 0; index < data.results.length; index++) {
					filmBox.innerHTML += `<div class="${title(data.results[index], 1)} box-container"><img draggable="false" (dragstart)="false;" class="popular-item-image" src="${image(data.results[index].backdrop_path)}" alt="image of ${title(data.results[index], 2)}"/><span>${title(data.results[index], 2)}</span></div>`;
				}
				// to display image use this:
				//`<img src="https://image.tmdb.org/t/p/original${data.results[0].backdrop_path}"/>`; (swap result number with picked number, change backdrop_path with poster_path if needed)
			});
	}
	// display all
	displayTopRated();
	displayTrending();
	displayAiringToday();
	displayOnTheAir();
}
// ------- My list display -------
function displayMyList() {
	console.log("hey");
}
// ------- Display search -------
function search(search_value) {
	// if given value is empty
	if (search_value.replace(/\s/g, "").length <= 0) {
		// Changes after searching
		document.querySelectorAll(".navbar-sections").forEach((section) => {
			section.classList.remove("active");
		});
		document.querySelector(".search-bar").value = "";
		document.querySelector(".search-title").textContent = `Invalid Search!`;
		document.title = "Search - Netflix";
		// hide all section
		document.querySelectorAll(".netflix-sections").forEach((section) => {
			section.setAttribute("hidden", "hidden");
		});
		// display search section
		document.querySelector(".search-section").removeAttribute("hidden");
		// displaying data
		document.querySelector(".search-box").innerHTML = `<div class="invalid-results">Search Again</div>`;
	} else {
		//assigned test data for now
		fetch(`https://api.themoviedb.org/3/search/multi?query=${search_value}&include_adult=false&language=en-US&page=1`, options)
			.then((data) => data.json())
			.then((data) => {
				// assign up to 100
				let fetch_limit;
				if (data.total_pages < 5) {
					fetch_limit = data.total_pages;
				} else {
					fetch_limit = 5;
				}
				if (data.total_pages <= 0) {
					// Changes after searching
					document.querySelectorAll(".navbar-sections").forEach((section) => {
						section.classList.remove("active");
					});
					document.querySelector(".search-bar").value = "";
					document.querySelector(".search-title").textContent = `Invalid Search!`;
					document.title = "Search - Netflix";
					// hide all section
					document.querySelectorAll(".netflix-sections").forEach((section) => {
						section.setAttribute("hidden", "hidden");
					});
					// display search section
					document.querySelector(".search-section").removeAttribute("hidden");
					// displaying data
					document.querySelector(".search-box").innerHTML = `<div class="invalid-results">Search Again</div>`;
				} else {
					// Changes after searching
					document.querySelectorAll(".navbar-sections").forEach((section) => {
						section.classList.remove("active");
					});
					document.querySelector(".search-bar").value = "";
					document.querySelector(".search-bar").placeholder = search_value;
					document.querySelector(".search-title").textContent = `Search results for '${search_value}'`;
					document.title = "Search - Netflix";
					// hide all section
					document.querySelectorAll(".netflix-sections").forEach((section) => {
						section.setAttribute("hidden", "hidden");
					});
					// display search section
					document.querySelector(".search-section").removeAttribute("hidden");
					// displaying data
					const searchContainer = document.querySelector(".search-box");
					searchContainer.innerHTML = "";
					// for loop to get data and save data
					for (let page = 1; page <= fetch_limit; page++) {
						fetch(`https://api.themoviedb.org/3/search/multi?query=${search_value}&include_adult=false&language=en-US&page=${page}`, options)
							.then((data) => data.json())
							.then((data) => {
								for (let index = 0; index < data.results.length; index++) {
									searchContainer.innerHTML += `<div class="box-container"><img draggable="false" (dragstart)="false;" class="popular-item-image" src="${image(data.results[index].backdrop_path)}" alt="image of ${title(data.results[index], 2)}"/><span>${title(data.results[index], 2)}</span></div>`;
								}
							});
					}
				}
			});
	}
}

// --------------- Event listeners ---------------
// display sections event listener
document.addEventListener("DOMContentLoaded", function () {
	const sections = document.querySelectorAll(".navbar-sections");
	sections.forEach((section) => {
		section.addEventListener("click", function () {
			// change title of web
			document.title = `${section.textContent} - Netflix`;
			// remove active
			sections.forEach((section) => {
				section.classList.remove("active");
			});
			// add active
			section.classList.add("active");
			// display correct secion
			const netflixSection = document.querySelectorAll(".netflix-sections");
			// hide all previous netflix sections
			netflixSection.forEach((section) => {
				section.setAttribute("hidden", "hidden");
			});
			let selectedSection = section.textContent;
			// format the name
			selectedSection = `${selectedSection.toLowerCase().replace(/\s+/g, "-")}-section`;
			selectedSection = document.querySelector(`.${selectedSection}`);
			// unhide the picked section
			selectedSection.removeAttribute("hidden");
			if (selectedSection !== "home-section" && document.querySelector(".hero-video-container").firstElementChild.tagName.toLowerCase() == "video") {
				document.querySelector(".hero-video").muted = true;
				const volumeMute = `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="ltr-4z3qvp e1svuwfo1" data-name="VolumeOff" aria-hidden="true"><path fill-rule="evenodd" clip-rule="evenodd" d="M11 4.00003C11 3.59557 10.7564 3.23093 10.3827 3.07615C10.009 2.92137 9.57889 3.00692 9.29289 3.29292L4.58579 8.00003H1C0.447715 8.00003 0 8.44774 0 9.00003V15C0 15.5523 0.447715 16 1 16H4.58579L9.29289 20.7071C9.57889 20.9931 10.009 21.0787 10.3827 20.9239C10.7564 20.7691 11 20.4045 11 20V4.00003ZM5.70711 9.70714L9 6.41424V17.5858L5.70711 14.2929L5.41421 14H5H2V10H5H5.41421L5.70711 9.70714ZM15.2929 9.70714L17.5858 12L15.2929 14.2929L16.7071 15.7071L19 13.4142L21.2929 15.7071L22.7071 14.2929L20.4142 12L22.7071 9.70714L21.2929 8.29292L19 10.5858L16.7071 8.29292L15.2929 9.70714Z" fill="currentColor"></path></svg>`;
				document.querySelector(".btn-volume").innerHTML = volumeMute;
			}
			// Run certain function depending on page
			displayMain();
			displaySeries();
			displayMovies();
			displayMyList();
		});
	});
});

// btn-volume event listener
const btnVolume = document.querySelector(".btn-volume");
btnVolume.onclick = () => {
	const heroVideo = document.querySelector(".hero-video");
	const volumeHigh = `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="ltr-4z3qvp e1svuwfo1" data-name="VolumeHigh" aria-hidden="true"><path fill-rule="evenodd" clip-rule="evenodd" d="M24 12C24 8.28693 22.525 4.72597 19.8995 2.10046L18.4853 3.51468C20.7357 5.76511 22 8.81736 22 12C22 15.1826 20.7357 18.2348 18.4853 20.4852L19.8995 21.8995C22.525 19.2739 24 15.713 24 12ZM11 3.99995C11 3.59549 10.7564 3.23085 10.3827 3.07607C10.009 2.92129 9.57889 3.00685 9.29289 3.29285L4.58579 7.99995H1C0.447715 7.99995 0 8.44767 0 8.99995V15C0 15.5522 0.447715 16 1 16H4.58579L9.29289 20.7071C9.57889 20.9931 10.009 21.0786 10.3827 20.9238C10.7564 20.7691 11 20.4044 11 20V3.99995ZM5.70711 9.70706L9 6.41417V17.5857L5.70711 14.2928L5.41421 14H5H2V9.99995H5H5.41421L5.70711 9.70706ZM16.0001 12C16.0001 10.4087 15.368 8.88254 14.2428 7.75732L12.8285 9.17154C13.5787 9.92168 14.0001 10.9391 14.0001 12C14.0001 13.0608 13.5787 14.0782 12.8285 14.8284L14.2428 16.2426C15.368 15.1174 16.0001 13.5913 16.0001 12ZM17.0709 4.92889C18.9462 6.80426 19.9998 9.3478 19.9998 12C19.9998 14.6521 18.9462 17.1957 17.0709 19.071L15.6567 17.6568C17.157 16.1565 17.9998 14.1217 17.9998 12C17.9998 9.87823 17.157 7.8434 15.6567 6.34311L17.0709 4.92889Z" fill="currentColor"></path></svg>`;
	const volumeMute = `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="ltr-4z3qvp e1svuwfo1" data-name="VolumeOff" aria-hidden="true"><path fill-rule="evenodd" clip-rule="evenodd" d="M11 4.00003C11 3.59557 10.7564 3.23093 10.3827 3.07615C10.009 2.92137 9.57889 3.00692 9.29289 3.29292L4.58579 8.00003H1C0.447715 8.00003 0 8.44774 0 9.00003V15C0 15.5523 0.447715 16 1 16H4.58579L9.29289 20.7071C9.57889 20.9931 10.009 21.0787 10.3827 20.9239C10.7564 20.7691 11 20.4045 11 20V4.00003ZM5.70711 9.70714L9 6.41424V17.5858L5.70711 14.2929L5.41421 14H5H2V10H5H5.41421L5.70711 9.70714ZM15.2929 9.70714L17.5858 12L15.2929 14.2929L16.7071 15.7071L19 13.4142L21.2929 15.7071L22.7071 14.2929L20.4142 12L22.7071 9.70714L21.2929 8.29292L19 10.5858L16.7071 8.29292L15.2929 9.70714Z" fill="currentColor"></path></svg>`;
	if (btnVolume.children[0].getAttribute("data-name") === "VolumeHigh") {
		btnVolume.innerHTML = volumeMute;
		heroVideo.muted = true;
	} else {
		btnVolume.innerHTML = volumeHigh;
		heroVideo.muted = false;
		heroVideo.volume = 0.4;
	}
};

// Scrolling frame for each section
document.addEventListener("DOMContentLoaded", function () {
	// get all scrollable boxs
	const scrollableBoxs = document.querySelectorAll(".scroll-button");
	scrollableBoxs.forEach((scrollBox) => {
		// assign clicked div
		const selectedScrollableDiv = scrollBox.parentElement.children[1];
		const scrollableDiv = document.querySelector(`.${selectedScrollableDiv.classList[1]}`); //picks the 2nd class, aka box class name
		const scrollLeftButton = selectedScrollableDiv.parentElement.querySelector(".scrollLeft");
		const scrollRightButton = selectedScrollableDiv.parentElement.querySelector(".scrollRight");
		// assign the currently used div
		// Add click event listeners
		scrollLeftButton.onclick = () => {
			scrollableDiv.scrollBy({
				left: -scrollableDiv.clientWidth, // scroll by one view
				behavior: "smooth",
			});
		};
		scrollRightButton.onclick = () => {
			scrollableDiv.scrollBy({
				left: scrollableDiv.clientWidth, // scroll by one view
				behavior: "smooth",
			});
		};
	});
});

// Search on click and enter
document.querySelector(".search-btn").onclick = () => {
	// givei t the value
	search(document.querySelector(".search-bar").value);
};
// press enter to search
document.querySelector(".search-bar").addEventListener("keydown", function (event) {
	if (event.key === "Enter") {
		event.preventDefault();
		search(document.querySelector(".search-bar").value);
	}
});
