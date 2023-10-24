		<!-- Scripts -->
		<script type="module" src="/scripts/netflix.js"></script>
		<!-- Popper js -->
		<script src="https://unpkg.com/@popperjs/core@2"></script>
		<script>
			window.onload = function () {
				const button = document.querySelector(".dropdown-toggle");
				const tooltip = document.querySelector(".dropdown-menu");

				// Pass the button, the tooltip, and some options, and Popper will do the
				// magic positioning for you:
				Popper.createPopper(button, tooltip, {
					placement: "bottom-start",
				});
			};
		</script>
		<!-- bootstrap -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	</body>
</html>