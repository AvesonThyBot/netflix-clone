<?php 
// send back to login if they arent logged in.
if (count($_COOKIE) == 0) {
    header("Location:account.php?type=login");
}
?>

<!-- Header -->
<?php include "inc/header.php"; ?>
		<!-- Main netflix display -->
		<main class="home-section netflix-sections" hidden>
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
						<!-- Scroll box -->
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
					<div class="scroll-container">
						<!-- Scroll box -->
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
						<div class="scrollable-div trending-box"></div>
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
				<!-- TV -->
				<div class="tv">
					<h2>Series</h2>
					<div class="scroll-container">
						<!-- Scroll box -->
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
						<div class="scrollable-div tv-box"></div>
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
				<!-- Films -->
				<div class="films">
					<h2>Films</h2>
					<div class="scroll-container">
						<!-- Scroll box -->
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
						<div class="scrollable-div films-box"></div>
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
			</div>
		</main>
		<!-- Series section -->
		<section class="series-section netflix-sections" hidden>
			<div class="series-display">
				<!-- Popular On Netflix -->
				<div class="popular-series">
					<h2>Popular On Netflix</h2>
					<div class="scroll-container">
						<!-- Scroll box -->
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
				<div class="trending-series">
					<h2>Trending Now</h2>
					<div class="scroll-container">
						<!-- Scroll box -->
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
						<div class="scrollable-div trending-box"></div>
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
				<!-- Playing currently -->
				<div class="playing-series">
					<h2>Series</h2>
					<div class="scroll-container">
						<!-- Scroll box -->
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
						<div class="scrollable-div tv-box"></div>
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
				<!-- Upcoming Films -->
				<div class="upcoming-series">
					<h2>Films</h2>
					<div class="scroll-container">
						<!-- Scroll box -->
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
						<div class="scrollable-div films-box"></div>
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
			</div>
		</section>
		<!-- Film sections -->
		<section class="films-section netflix-sections" hidden>
			<div class="films-display">
				<!-- Popular On Netflix -->
				<div class="popular-films">
					<h2>Popular Films</h2>
					<div class="scroll-container">
						<!-- Scroll box -->
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
				<div class="trending-films">
					<h2>Trending Films</h2>
					<div class="scroll-container">
						<!-- Scroll box -->
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
						<div class="scrollable-div trending-box"></div>
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
				<!-- Playing currently -->
				<div class="playing-films">
					<h2>Newly Released Films</h2>
					<div class="scroll-container">
						<!-- Scroll box -->
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
						<div class="scrollable-div tv-box"></div>
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
				<!-- Upcoming Films -->
				<div class="upcoming-films">
					<h2>Upcoming Films</h2>
					<div class="scroll-container">
						<!-- Scroll box -->
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
						<div class="scrollable-div films-box"></div>
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
			</div>
		</section>
		<!-- My list section -->
		<section class="my-list-section netflix-sections" hidden>
			<p>my list</p>
		</section>
<!-- Footer -->
<?php include "inc/footer.php"; ?>