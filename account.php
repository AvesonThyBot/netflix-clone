<?php
ob_end_flush(); 
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- Connection and details -->
		<link rel="shortcut icon" href="/img/icon.png" type="image/x-icon" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
		<link rel="stylesheet" href="/css/account.css" />
		<link rel="stylesheet" href="/css/netflix.css" />
		<title>Login - Netflix</title>
	</head>
	<body>
		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
			<div class="container-fluid">
				<img class="navbar-brand img-fluid" src="/img/netflix.png" alt="logo" />
				<!-- Button when compressed -->
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<!-- Navbar content-->
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link navbar-sections">Login</a>
						</li>
						<li class="nav-item">
							<a class="nav-link navbar-sections active">Register</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- Login section -->
		<section class="login-section account-sections" hidden>
			<p>Login section</p>
		</section>
		<!-- Register sections -->
		<section class="register-section account-sections" hidden>
			<p>Register sections</p>
		</section>
		<!-- Scripts -->
		<script type="module" src="/scripts/account.js"></script>
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