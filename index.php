<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xywinard - Arts and Communications Platform</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
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
            <a class="navbar-brand" href="#">Xywinard</a>
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
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link btn btn-sm btn-danger text-white" href="signin.php">Sign In</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid py-5 px-5" style="background: linear-gradient(135deg, #FFFF00, #333333);" id="about">
        <div class="text-left">
            <h1 class="display-4">Welcome to Xywinard</h1>
            <p class="lead mx-3">Empowering artists and creators through patronage</p>
            <p class="mx-3">Xywinard is a platform that connects artists with patrons to support arts and communications projects.</p>
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
                            <li class="list-item mb-1"><i class="fas fa-phone me-2"></i> +63-9731-231-312</li>
                            <li class="list-item mb-1"><i class="fas fa-envelope me-2"></i> eventmangementunit@gmail.com</li>
                            <li class="list-item mb-2"><i class="fab fa-facebook me-2"></i> eventmanagementunit</li>
                        </ul>
                    </div>
                <hr>
    <div class="col-md-12 mb-3 text-center">
        <small class="text-light">Designed and developed by Xyrus Marvin Duyanen. &copy; <?php echo date("Y"); ?> Xywinard. All rights reserved.</small>
    </div>

        </div>
    </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body
