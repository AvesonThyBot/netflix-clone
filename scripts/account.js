// --------------- Event listeners ---------------
// display sections event listener
document.addEventListener("DOMContentLoaded", function () {
	const sections = document.querySelectorAll(".navbar-sections");
	sections.forEach((section) => {
		section.addEventListener("click", function () {
			// change title of web
			console.log(section.textContent);
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
