// --------------- Event listeners ---------------
// display correct section based query string
document.addEventListener("DOMContentLoaded", function () {
	let webUrl = window.location.search;
	webUrl = new URLSearchParams(webUrl);
	webUrl = webUrl.get("type");
	if (webUrl == "login" || webUrl == "register") {
		const sectionType = `${webUrl.toLowerCase()}-section`;
		const selectedSection = document.querySelector(`.${sectionType}`);
		selectedSection.removeAttribute("hidden", "hidden");
		const sections = document.querySelectorAll(".navbar-sections");
		// remove active
		sections.forEach((section) => {
			section.classList.remove("active");
		});
		// add active
		document.querySelector(`.${webUrl}-section`).classList.add("active");
	} else {
		document.querySelector(".login-section").removeAttribute("hidden");
		const sections = document.querySelectorAll(".navbar-sections");
		// remove active
		sections.forEach((section) => {
			section.classList.remove("active");
		});
		// add active
		document.querySelector(".navbar-sections").classList.add("active");
	}
});

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
			// display correct section
			const netflixSection = document.querySelectorAll(".account-sections");
			// hide all previous netflix sections
			netflixSection.forEach((section) => {
				section.setAttribute("hidden", "hidden");
			});
			let selectedSection = section.textContent;
			// format the name
			selectedSection = `${selectedSection.toLowerCase().replace(/\s+/g, "-")}-section`;
			selectedSection = document.querySelector(`.${selectedSection}`);
			// unhide the picked section
			selectedSection.removeAttribute("hidden", "hidden");
		});
	});
});
