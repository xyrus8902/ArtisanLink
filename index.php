<?php
// Database connection
$servername = "localhost";
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "artisan_link";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                setTimeout(function() {
                    swal({
                        title: 'Success!',
                        text: 'Your message has been sent.',
                        type: 'success'
                    }, function() {
                        window.location = window.location.href;
                    });
                }, 100);
              </script>";
    } else {
        echo "<script>
                setTimeout(function() {
                    swal({
                        title: 'Error!',
                        text: 'There was an error sending your message.',
                        type: 'error'
                    });
                }, 100);
              </script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtisanLink - Arts and Communications Platform</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
     <!-- Include SweetAlert CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

    <style>
        * {
            font-size: 14px;
            font-family: 'Roboto', sans-serif;
        }
        body {
            background-color: #f8f9fa; /* Light gray background */
            font-size: 14px;
        }
        footer {
            background-color: #343a40; /* Dark gray background */
            color: #fff; /* White text */
            padding: 20px 0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ArtisanLink</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#messageus">Message Us</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link btn btn-sm btn-danger text-white" href="login/signin.php">Sign In</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid py-5 px-5" style="background: linear-gradient(135deg, #FFFF00, #333333);" id="about">
        <div class="text-left">
            <h1 class="display-4">Welcome to ArtisanLink</h1>
            <p class="lead mx-3">Empowering artists and creators through patronage</p>
            <p class="mx-3">Artisan Link is a platform that connects artists with patrons to support arts and communications projects.</p>
            <p class="mx-3">Whether you're an artist looking for support or a patron seeking to fund creative endeavors, Xywinard provides a space for collaboration and inspiration.</p>
            <a class="btn btn-lg btn-danger text-white mx-3" href="#" role="button">Be Part of Us</a>
        </div>
    </div>

    <div class="my-5 mx-5">
    <ul class="nav nav-tabs" id="userTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="patrons-tab" data-toggle="tab" href="#patrons" role="tab" aria-controls="patrons" aria-selected="true">Patrons</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="artists-tab" data-toggle="tab" href="#artists" role="tab" aria-controls="artists" aria-selected="false">Artists</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="mentors-tab" data-toggle="tab" href="#mentors" role="tab" aria-controls="mentors" aria-selected="false">Mentors</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="admins-tab" data-toggle="tab" href="#admins" role="tab" aria-controls="admins" aria-selected="false">Admins</a>
        </li>
    </ul>
    <div class="tab-content" id="userTabsContent">
        <div class="tab-pane fade show active" id="patrons" role="tabpanel" aria-labelledby="patrons-tab">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mt-3">
                        <div class="card-body">
                            <h4>Patrons</h4>
                            <p>Support artists financially, discover new talents and projects, engage with the arts community</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mt-3">
                        <div class="card-body">
                            <h4>What Patrons Can Do:</h4>
                            <ul>
                                <li>Support artists financially</li>
                                <li>Discover new talents and projects</li>
                                <li>Engage with the arts community</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="artists" role="tabpanel" aria-labelledby="artists-tab">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mt-3">
                        <div class="card-body">
                            <h4>Artists</h4>
                            <p>Showcase their artworks, connect with patrons for support, collaborate with other artists</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mt-3">
                        <div class="card-body">
                            <h4>What Artists Can Do:</h4>
                            <ul>
                                <li>Showcase their artworks</li>
                                <li>Connect with patrons for support</li>
                                <li>Collaborate with other artists</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="mentors" role="tabpanel" aria-labelledby="mentors-tab">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mt-3">
                        <div class="card-body">
                            <h4>Mentors</h4>
                            <p>Provide guidance and advice, help artists develop their skills, share industry insights and experiences</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mt-3">
                        <div class="card-body">
                            <h4>What Mentors Can Do:</h4>
                            <ul>
                                <li>Provide guidance and advice</li>
                                <li>Help artists develop their skills</li>
                                <li>Share industry insights and experiences</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="admins" role="tabpanel" aria-labelledby="admins-tab">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mt-3">
                        <div class="card-body">
                            <h4>Admins</h4>
                            <p>Oversee the platform’s operations, manage user accounts, handle technical issues, maintain the overall integrity of the community</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mt-3">
                        <div class="card-body">
                            <h4>What Admins Can Do:</h4>
                            <ul>
                                <li>Oversee the platform’s operations</li>
                                <li>Manage user accounts</li>
                                <li>Handle technical issues</li>
                                <li>Maintain the overall integrity of the community</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><hr>
    <div id="messageus" class="container-fluid py-5" style="background-color: #f8f9fa;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Message Us</h2>
                    <form action="#" method="POST">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4 shadow d-flex align-items-center justify-content-center">
            <div class="text-center">
                <img src="images/messageus.png" alt="">
                <p class="lead mb-0">Have any questions, suggestions or feedback?</p>
                <p class="lead">We'd love to hear from you!</p>
            </div>
        </div>
    </div>
</div>



</div>


    <footer>
    <div class="container-fluid bg-dark">
        <div class="col-10 text-white m-auto ">
            <div class="row g-6">
                <div class="col-md-8 mt-4 ">
                    <span><img src="../../images/QCU Logo.png" alt="" class="img-fluid mb-2 me-2" style="max-width: 40px;"></span>
                    <span class="fs-6">Artisan Link</span>

                    <div>
                        <p class="mt-1 col-lg-9 col-12" style="font-size: 13px;">The Quezon City University Event Management System optimizes event planning, execution, and evaluation processes, fostering seamless collaboration and engagement within the university community.
                    </div>
                </div>
                <div class="col-md-4 mt-4 m-auto justify-content-center">
                    <div class="fs-6 mb-2"> Contact Us</div>
                        <ul class="list-group list-unstyled" style="font-size: 13px;">
                            <li class="list-item mb-1"><i class="fas fa-map-marker-alt me-2"></i> 673 Quirino Hwy, Novaliches, Quezon City</li>
                            <li class="list-item mb-1"><i class="fas fa-phone me-2"></i> +63-948</li>
                            <li class="list-item mb-1"><i class="fas fa-envelope me-2"></i> xyrusmarvin.duyanen@gmail.com</li>
                            <li class="list-item mb-2"><i class="fab fa-facebook me-2"></i> eventmanagementunit</li>
                        </ul>
                    </div>
                <hr>
    <div class="col-md-12 mb-3 text-center">
        <small class="text-light">Designed and developed by Xyrus Marvin Duyanen. &copy; <?php echo date("Y"); ?> ArtisanLink. All rights reserved.</small>
    </div>

        </div>
    </div>
    </footer>

    <!-- Include SweetAlert JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>