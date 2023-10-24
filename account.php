<?php
// Redirect out if they are logged in
if (count($_COOKIE) > 0) {
    header("Location:index.php");
}
//  Data base require
require "config/database.php";

// Login
if (isset($_POST['btnLogin'])) {
    $email = $_POST['txtEmailAddress'];
    $pass = $_POST['txtPassword'];
    $sql = "SELECT * FROM account WHERE email = '$email'";

    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {

        $passHash = $row['password_text'];
		$id = $row['user_id'];
        if (password_verify($pass, $passHash)) {
            setcookie('email', $email, time() + (86400 * 30), "/"); // 1 day, email
            setcookie('user_id', $id, time() + (86400 * 30), "/"); // 1 day, email
            setcookie('is_logged_in', true, time() + (86400 * 30), "/"); // 1 day, logged in
            header("Location:index.php");
        } else {
            echo "Incorrect Password";
        }
    }
}
// Register
if (isset($_POST['btnRegister'])) {
    $first_name = $_POST["txtFirstName"];
    $last_name = $_POST["txtLastName"];
    $email = $_POST["txtEmailAddress"];
    $password = password_hash($_POST["txtPassword"], CRYPT_BLOWFISH);

    $sql = "INSERT INTO account (first_name, second_name, email, password_text) VALUES ('$first_name', '$last_name', '$email', '$password')";
    $result = mysqli_query($conn, $sql);
    header("Location:account.php?type='login'");
}


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
		<title>Account - Netflix</title>
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
							<a class="nav-link navbar-sections navbar-login ">Login</a>
						</li>
						<li class="nav-item">
							<a class="nav-link navbar-sections navbar-register">Register</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- Login section -->
		<section class="login-section account-sections" hidden>
			<!-- form for login -->
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<div class="input-group mb-3">
					<span class="input-group-text" id="basic-addon1">Email Address</span>
					<input type="email" class="form-control" placeholder="Email address" aria-label="emailAddress" aria-describedby="basic-addon1" name="txtEmailAddress" required />
				</div>
				<div class="input-group mb-3">
					<span class="input-group-text" id="basic-addon1">Password</span>
					<input type="password" class="form-control" placeholder="Password" aria-label="password" aria-describedby="basic-addon1" name="txtPassword" required />
				</div>
				<!-- Submit button -->
				<div>
					<input type="submit" class="btn btn-primary" value="Login" name="btnLogin" />
				</div>
			</form>
		</section>
		<!-- Register sections -->
		<section class="register-section account-sections" hidden>
			<!-- Form for register -->
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<div class="input-group mb-3">
					<span class="input-group-text" id="basic-addon1">First Name</span>
					<input type="text" class="form-control" placeholder="First name" aria-label="firstName" aria-describedby="basic-addon1" name="txtFirstName" required />
				</div>
				<div class="input-group mb-3">
					<span class="input-group-text" id="basic-addon1">Last Name</span>
					<input type="text" class="form-control" placeholder="Last name" aria-label="lastName" aria-describedby="basic-addon1" name="txtLastName" required />
				</div>
				<div class="input-group mb-3">
					<span class="input-group-text" id="basic-addon1">Email Address</span>
					<input type="email" class="form-control" placeholder="Email address" aria-label="emailAddress" aria-describedby="basic-addon1" name="txtEmailAddress" required />
				</div>
				<div class="input-group mb-3">
					<span class="input-group-text" id="basic-addon1">Password</span>
					<input type="password" class="form-control" placeholder="Password" aria-label="password" aria-describedby="basic-addon1" name="txtPassword" required />
				</div>
				<div>
					<input type="submit" class="btn btn-primary" value="Register" name="btnRegister" />
				</div>
			</form>
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
