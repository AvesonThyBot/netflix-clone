<?php

require "config/database.php";

// signout
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == "logout") {
        // assign cookie id
        if (isset($_COOKIE['user_id'])) {
            $id = $_COOKIE['user_id'];
            $sql = "SELECT * FROM account WHERE user_id = '$id'";
            $result = mysqli_query($conn, $sql);
            // Check if the query was successful
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $email = $row["email"];
                    setcookie('email', $email, time() - 86400); // 1 day, email
                    setcookie('user_id', $id, time() - 86400); // 1 day, user_id
                    setcookie('is_logged_in', true, time() - 86400); // 1 day, logged in
                }
                // Redirect after setting cookies
                header("Location: index.php");
            } else {
                echo "Error executing the SQL query: " . mysqli_error($conn);
            }
        }
    }
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
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <!-- Search bar -->
            </div>
            <div class="navbar-nav me-auto">
                <!-- Account dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/img/icon.png" alt="profile picture" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end w-100 mw-100">
                        <?php if (isset($_COOKIE["is_logged_in"])) { ?>
                            <li><a class="dropdown-item" href="/profile.php">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="?action=logout">Log out</a></li>
                        <?php } else { ?>
                            <li><a class="dropdown-item" href="/account.php?type=login">Login</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="/account.php?type=register">Register</a></li>
                        <?php } ?>
                    </ul>
                </li>
            </div>
        </div>
    </nav>