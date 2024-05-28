<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist Dashboard - ArtisanLink</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            position: fixed;
            top: 56px; /* Height of the navbar */
            bottom: 0;
            left: 0;
            z-index: 1000;
            padding: 4px 0 0; /* Space for navbar */
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, 0.1);
        }
        .content {
            margin-left: 250px; /* Width of the sidebar */
            padding: 20px;
            padding-top: 76px; /* Space for navbar */
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">ArtisanLink</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login/signin.html">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="d-flex">
    <div class="sidebar bg-dark">
        <div class="list-group list-group-flush">
            <a href="#announcements" class="list-group-item list-group-item-action bg-dark text-white">Announcements</a>
            <a href="#patron-requests" class="list-group-item list-group-item-action bg-dark text-white">Patron Requests</a>
            <a href="#pending-requests" class="list-group-item list-group-item-action bg-dark text-white">Pending Requests</a>
            <a href="#mentor-offers" class="list-group-item list-group-item-action bg-dark text-white">Mentor Offers</a>
            <a href="#my-courses" class="list-group-item list-group-item-action bg-dark text-white">My Courses</a>
            <a href="#commissions" class="list-group-item list-group-item-action bg-dark text-white">Commissions</a>
        </div>
    </div>
    <div class="content container">
        <h1 class="text-center">Welcome, John Doe</h1>

        <div id="announcements" class="mt-4">
            <h3>Announcements</h3>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Drawings: 10</h5>
                    <h5 class="card-title">Pending Requests: 5</h5>
                    <h5 class="card-title">Rating: 4.5/5</h5>
                </div>
            </div>
        </div>

        <div id="patron-requests" class="mt-4">
            <h3>Patron Requests</h3>
            <div class="card">
                <div class="card-body">
                    <p class="card-text">List of patron requests will be displayed here.</p>
                </div>
            </div>
        </div>

        <div id="pending-requests" class="mt-4">
            <h3>Pending Requests</h3>
            <div class="card">
                <div class="card-body">
                    <p class="card-text">List of pending requests will be displayed here.</p>
                </div>
            </div>
        </div>

        <div id="mentor-offers" class="mt-4">
            <h3>Mentor Offers</h3>
            <div class="card">
                <div class="card-body">
                    <p class="card-text">List of mentor offers will be displayed here.</p>
                </div>
            </div>
        </div>

        <div id="my-courses" class="mt-4">
            <h3>My Courses</h3>
            <div class="card">
                <div class="card-body">
                    <p class="card-text">List of courses you have taken will be displayed here.</p>
                </div>
            </div>
        </div>

        <div id="commissions" class="mt-4">
            <h3>Commissions</h3>
            <div class="card">
                <div class="card-body">
                    <p class="card-text">List of commissions will be displayed here.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
