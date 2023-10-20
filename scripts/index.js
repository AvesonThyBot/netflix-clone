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
