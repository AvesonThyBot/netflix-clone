// --------------- Profile ---------------
const sections = document.querySelectorAll(".navbar-sections");
sections.forEach((section) => {
	section.classList.remove("active");
});

document.title = "Profile - Netflix";

// --------------- Navbar event listeners ---------------
document.addEventListener("DOMContentLoaded", function () {
	sections.forEach((section) => {
		section.addEventListener("click", function () {
			location.href = `/index.php?page_type=${section.textContent.toLocaleLowerCase().replace(/ /g, "-")}`;
		});
	});
});
