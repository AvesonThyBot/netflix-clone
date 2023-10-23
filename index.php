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
		<link rel="stylesheet" href="/css/netflix.css" />
		<title>Home - Netflix</title>
	</head>
	<body>
		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg bg-body-tertiary">
			<div class="container-fluid">
				<img class="navbar-brand img-fluid" src="/img/netflix.png" alt="logo" />
				<!-- Button when compressed -->
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<!-- Navbar content-->
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- navbar list -->
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link navbar-sections active" aria-current="page">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link navbar-sections">Series</a>
						</li>
						<li class="nav-item">
							<a class="nav-link navbar-sections">Films</a>
						</li>
						<li class="nav-item">
							<a class="nav-link navbar-sections">My List</a>
						</li>
					</ul>
					<!-- Search bar -->
					<!-- <form class="d-flex" role="search">
						<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
						<button class="btn btn-outline-success" type="submit">Search</button>
					</form> -->
					<!-- Account dropdown -->
					<li class="nav-item dropdown d-flex align-items-center">
						<button class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="/img/icon.png" alt="profile picture" />
						</button>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="/account.php">Login</a></li>
							<li><hr class="dropdown-divider" /></li>
							<li><a class="dropdown-item" href="/account.php">Register</a></li>
						</ul>
					</li>
				</div>
			</div>
		</nav>

		<!-- Main netflix display -->
		<main class="home-section netflix-sections">
			<!-- Hero -->
			<div class="hero">
				<!-- background video -->
				<div class="hero-video-container">
					<video src="/img/one_piece.mp4" class="hero-video" autoplay playsinline></video>
				</div>
				<!-- hero content -->
				<div class="px-4 py-5 my-5 content-container">
					<!-- title -->
					<h2 class="display-5 fw-bold mx-xxl-5 hero-title"></h2>
					<br /><br /><br /><br /><br />
					<div class="col-lg-6 mx-xxl-5">
						<!-- description -->
						<p class="lead mb-3 hero-desc"></p>
						<br />
						<div class="d-grid gap-3 d-sm-flex">
							<!-- Play button -->
							<button type="button" class="btn btn-lg px-4 gap-3 btn-play">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="ltr-4z3qvp e1svuwfo1" data-name="Play" aria-hidden="true"><path d="M5 2.69127C5 1.93067 5.81547 1.44851 6.48192 1.81506L23.4069 11.1238C24.0977 11.5037 24.0977 12.4963 23.4069 12.8762L6.48192 22.1849C5.81546 22.5515 5 22.0693 5 21.3087V2.69127Z" fill="currentColor"></path></svg> Play
							</button>
							<!-- More info button -->
							<button type="button" class="btn btn-lg px-4 btn-more-info">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="ltr-4z3qvp e1svuwfo1" data-name="CircleI" aria-hidden="true">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2ZM0 12C0 5.37258 5.37258 0 12 0C18.6274 0 24 5.37258 24 12C24 18.6274 18.6274 24 12 24C5.37258 24 0 18.6274 0 12ZM13 10V18H11V10H13ZM12 8.5C12.8284 8.5 13.5 7.82843 13.5 7C13.5 6.17157 12.8284 5.5 12 5.5C11.1716 5.5 10.5 6.17157 10.5 7C10.5 7.82843 11.1716 8.5 12 8.5Z" fill="currentColor"></path>
								</svg>
								More Info
							</button>
							<!-- Volume button -->
							<button type="button" class="btn btn-sm px-4 btn-volume position-absolute end-0 me-xl-5">
								<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="ltr-4z3qvp e1svuwfo1" data-name="VolumeOff" aria-hidden="true">
									<path
										fill-rule="evenodd"
										clip-rule="evenodd"
										d="M11 4.00003C11 3.59557 10.7564 3.23093 10.3827 3.07615C10.009 2.92137 9.57889 3.00692 9.29289 3.29292L4.58579 8.00003H1C0.447715 8.00003 0 8.44774 0 9.00003V15C0 15.5523 0.447715 16 1 16H4.58579L9.29289 20.7071C9.57889 20.9931 10.009 21.0787 10.3827 20.9239C10.7564 20.7691 11 20.4045 11 20V4.00003ZM5.70711 9.70714L9 6.41424V17.5858L5.70711 14.2929L5.41421 14H5H2V10H5H5.41421L5.70711 9.70714ZM15.2929 9.70714L17.5858 12L15.2929 14.2929L16.7071 15.7071L19 13.4142L21.2929 15.7071L22.7071 14.2929L20.4142 12L22.7071 9.70714L21.2929 8.29292L19 10.5858L16.7071 8.29292L15.2929 9.70714Z"
										fill="currentColor"
									></path>
								</svg>
							</button>
						</div>
					</div>
				</div>
			</div>

			<!-- Main film displaying -->
			<div class="main-display">
				<!-- Popular On Netflix -->
				<div class="popular">
					<h2>Popular On Netflix</h2>
					<div class="scroll-container">
						<button class="scroll-button scrollLeft">
							<svg fill="#fff" width="800px" height="800px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<g data-name="Layer 2">
									<g data-name="arrow-ios-back">
										<rect width="24" height="24" transform="rotate(90 12 12)" opacity="0" />

										<path d="M13.83 19a1 1 0 0 1-.78-.37l-4.83-6a1 1 0 0 1 0-1.27l5-6a1 1 0 0 1 1.54 1.28L10.29 12l4.32 5.36a1 1 0 0 1-.78 1.64z" />
									</g>
								</g>
							</svg>
						</button>
						<div class="scrollable-div popular-box"></div>
						<button class="scroll-button scrollRight">
							<svg fill="#fff" width="800px" height="800px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<g data-name="Layer 2">
									<g data-name="arrow-ios-forward">
										<rect width="24" height="24" transform="rotate(-90 12 12)" opacity="0" />

										<path d="M10 19a1 1 0 0 1-.64-.23 1 1 0 0 1-.13-1.41L13.71 12 9.39 6.63a1 1 0 0 1 .15-1.41 1 1 0 0 1 1.46.15l4.83 6a1 1 0 0 1 0 1.27l-5 6A1 1 0 0 1 10 19z" />
									</g>
								</g>
							</svg>
						</button>
					</div>
				</div>
				<!-- Trending Now -->
				<div class="trending">
					<h2>Trending Now</h2>
					<div class="scrollable-div trending-box"></div>
				</div>
				<!-- TV -->
				<div class="tv">
					<h2>TV</h2>
					<div class="scrollable-div tv-box"></div>
				</div>
				<!-- Films -->
				<div class="films">
					<h2>Films</h2>
					<div class="scrollable-div films-box"></div>
				</div>
			</div>
		</main>
		<!-- Series section -->
		<section class="series-section netflix-sections" hidden>
			<p>series section</p>
		</section>
		<!-- Film sections -->
		<section class="films-section netflix-sections" hidden>
			<p>films section</p>
		</section>
		<!-- My list section -->
		<section class="my-list-section netflix-sections" hidden>
			<p>my list</p>
		</section>
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
