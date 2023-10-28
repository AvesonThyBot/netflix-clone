<?php 
// send back to login if they arent logged in.
if (count($_COOKIE) == 0) {
    header("Location:account.php?type=login");
}
?>
<!-- Header -->
<?php include "inc/header.php"; ?>

        <!-- Footer -->
        <script src="/scripts/profile.js"></script>
		<!-- bootstrap -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	</body>
</html>