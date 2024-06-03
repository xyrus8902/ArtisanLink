<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist Dashboard - ArtisanLink</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #eae7e6;
            font-size: 12px;
        }
        .content {
            padding: 20px;
            padding-top: 76px; /* Space for navbar */
        }
        .profile-header {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
        }
        .profile-header img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #fff;
            margin-right: 20px;
        }
        .profile-header h4 {
            margin-top: 0;
        }
        .asd {
            color: black !important;
        }
        .asd.active {
            color: red !important;
        }
    </style>
</head>
<body>

<?php include '../../header/artist_header.php'; ?>

<div class="content container-fluid px-5 mt-0">
    <div class="row mt-4">
        <div class="col-lg-5 mb-3 overflow-auto" style="max-height: 80vh;">
            <!-- Profile Card Section -->
            <div class="card">
                <div class="card-body">
                <div class="profile-header bg-light p-3 rounded">
            <div class="row align-items-center">
                <div class="col-12 col-sm-4 text-center text-sm-start mb-3 mb-sm-0">
                    <img src="../../images/profpic.jpg" alt="Profile Image" class="img-fluid rounded-circle">
                </div>
                <div class="col-12 col-sm-8">
                    <h5>Welcome, Xyrus Marvin!</h5>
                        <p class="mx-3">I'm a passionate artist specializing in digital illustrations and character design. I love creating art that tells a story and brings characters to life.</p>
                                <p class="mb-0 mx-1"><strong>Joined:</strong> January 2023</p>
                    
                    <div class="d-flex flex-row-reverse">
                        <button class="btn btn-danger" data-bs-toggle="tooltip" title="Edit profile"><i class="fas fa-edit mr-1"></i></button>
                    </div>
                </div>
            </div>
        </div>

                    <!-- Tabbed Content Section -->
                    <ul class="nav nav-tabs mx-3" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link asd active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link asd" id="portfolio-tab" data-toggle="tab" href="#portfolio" role="tab" aria-controls="portfolio" aria-selected="false">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link asd" id="skills-tab" data-toggle="tab" href="#skills" role="tab" aria-controls="skills" aria-selected="false">Skills</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="p-3">
                                <h5>Personal Information</h5>
                                <p class="mb-0 mx-3"><strong><i class="fas fa-envelope"></i> :</strong> xyrusmarvin.duyanen@gmail.com</p>
                                <p class="mb-0 mx-3"><strong><i class="fas fa-map-marker-alt"></i> :</strong> 34 ROTC, Hunters St. Cluster 5, Tatalon, Quezon City</p>
                                <p class="my-0 mx-3"><strong><i class="fas fa-phone"></i> :</strong> +63XXXXXXXXXX</p>
                                <p class="my-0 mx-3"><strong><i class="fas fa-birthday-cake"></i> :</strong> August 9, 2002</p>
                                <p class="my-0 mx-3"><strong><i class="fas fa-venus-mars"></i> :</strong> Male</p>
                                <p class="my-0 mx-3"><strong><i class="fas fa-user"></i> :</strong> Single</p>
                                <p class="my-0 mx-3"><strong><i class="fas fa-passport"></i> :</strong> Filipino</p>
                           
                                <!-- Social Media Links -->
                                <div class="text-center">
                                    <p class="my-0"><strong>Social Media:</strong></p>
                                    <ul class="list-inline mx-3 d-inline-block">
                                        <li class="list-inline-item"><a href="https://www.facebook.com/xyrusmarvin.duyanen"><i class="fab fa-facebook" style="color: #3b5998;"></i></a></li>
                                        <li class="list-inline-item"><a href="https://www.instagram.com/xyrusmarvin"><i class="fab fa-instagram" style="color: #e4405f;"></i></a></li>
                                        <li class="list-inline-item"><a href="https://twitter.com/xyrusmarvin"><i class="fab fa-twitter" style="color: #1da1f2;"></i></a></li>
                                        <!-- Idagdag ang iba pang social media links dito kung meron -->
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Add this code inside the tab-pane with id="portfolio" -->
                        <div class="tab-pane fade overflow-auto" style="max-height: 36vh;" id="portfolio" role="tabpanel" aria-labelledby="portfolio-tab">
                            <div class="card">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="https://via.placeholder.com/150" class="card-img" alt="Image">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Card Title</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="https://via.placeholder.com/150" class="card-img" alt="Image">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Card Title</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="https://via.placeholder.com/150" class="card-img" alt="Image">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Card Title</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="https://via.placeholder.com/150" class="card-img" alt="Image">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Card Title</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="skills" role="tabpanel" aria-labelledby="skills-tab">
                            <div class="p-3">
                                <h5>Skills</h5>
                                <p><strong>Skills:</strong> Digital Illustration, Character Design, Concept Art, Graphic Design</p>
                                <!-- Add more detailed skill information or a skills list here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dashboard Cards -->
        <div class="col-lg-7">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 text-center">
                    <div class="card text-white bg-primary mb-3">
                        <small class="card-header font-weight-bold"><i class="fas fa-check-circle"></i> Finished Artworks</small>
                        <div class="card-body">
                            <h5 class="card-title my-0">10</h5>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 text-center">
                    <div class="card text-white bg-warning mb-3">
                        <small class="card-header font-weight-bold"><i class="fas fa-exclamation-triangle"></i> Pending Offers</small>
                        <div class="card-body">
                            <h5 class="card-title my-0">5</h4>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 text-center">
                    <div class="card text-white bg-danger mb-3">
                        <small class="card-header font-weight-bold"><i class="fas fa-clock"></i> Commissions</small>
                        <div class="card-body">
                            <h5 class="card-title my-0">9</h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 text-center">
                    <div class="card text-white bg-success mb-3">
                        <small class="card-header font-weight-bold"><i class="fas fa-star"></i> Ratings</small>
                        <div class="card-body">
                            <h5 class="card-title my-0">4.5/5</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-3">
                <div class="col-lg-5">
                    <h5 class="mb-0"><i class="fas fa-bullhorn"></i> Announcement!</h5> <hr class="my-1">
                    <div class="overflow-auto mb-5" style="max-height: 50vh;">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">New Feature: Real-Time Collaboration</h6>
                <p class="card-text">We're excited to announce the launch of our new real-time collaboration feature! Now you can collaborate with other artists on projects in real-time, making the creative process more seamless than ever.</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Enhanced Security Measures</h6>
                <p class="card-text">We've bolstered our security protocols to ensure your data remains safe and protected. Your privacy is our priority.</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Expanded Resource Library</h6>
                <p class="card-text">Introducing an extensive collection of new resources to inspire your creativity and fuel your projects. Access a wealth of materials at your fingertips.</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Improved User Interface</h6>
                <p class="card-text">Experience a sleeker, more intuitive user interface designed to streamline your workflow and enhance your overall user experience.</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Exclusive Membership Benefits</h6>
                <p class="card-text">Unlock exclusive perks and benefits by becoming a member. Enjoy priority access to new features, special discounts, and more.</p>
            </div>
        </div>
    </div>
                </div>
                <div class="col-lg-7">
                    <h5 class="mb-0"><i class="fas fa-user-friends"></i> Other Artists</h5> <hr class="my-1">
                    <div class="list-group overflow-auto" style="max-height: 50vh;">
                        <div class="list-group-item">
                            <img src="https://via.placeholder.com/50" alt="Jane Doe" class="rounded-circle mr-2" style="width: 50px; height: 50px;">
                            <strong>Jenwyn Angelica</strong> - Illustrator
                            <button type="button" class="btn btn-info float-right" ><i class="fas fa-eye"></i></button>
                        </div>
                        <div class="list-group-item">
                            <img src="https://via.placeholder.com/50" alt="John Smith" class="rounded-circle mr-2" style="width: 50px; height: 50px;">
                            <strong>Sam Lennard</strong> - Animator
                            <button type="button" class="btn btn-info float-right" data-bs-toggle="tooltip" title="View Profile"><i class="fas fa-eye"></i></button>
                        </div>
                        <div class="list-group-item">
                            <img src="https://via.placeholder.com/50" alt="Mary Johnson" class="rounded-circle mr-2" style="width: 50px; height: 50px;">
                            <strong>Mary An</strong> - Graphic Designer
                            <button type="button" class="btn btn-info float-right" data-bs-toggle="tooltip" title="View Profile"><i class="fas fa-eye"></i></button>
                        </div>
                        <div class="list-group-item">
                            <img src="https://via.placeholder.com/50" alt="David Brown" class="rounded-circle mr-2" style="width: 50px; height: 50px;">
                            <strong>David Brown</strong> - Photographer
                            <button type="button" class="btn btn-info float-right" data-bs-toggle="tooltip" title="View Profile"><i class="fas fa-eye"></i></button>
                        </div>
                        <div class="list-group-item">
                            <img src="https://via.placeholder.com/50" alt="Emily White" class="rounded-circle mr-2" style="width: 50px; height: 50px;">
                            <strong>Emily White</strong> - Sculptor
                            <button type="button" class="btn btn-info float-right" data-bs-toggle="tooltip" title="View Profile"><i class="fas fa-eye"></i></button>
                        </div>
                        <div class="list-group-item">
                            <img src="https://via.placeholder.com/50" alt="Michael Green" class="rounded-circle mr-2" style="width: 50px; height: 50px;">
                            <strong>Michael Green</strong> - Web Designer
                            <button type="button" class="btn btn-info float-right" data-bs-toggle="tooltip" title="View Profile"><i class="fas fa-eye"></i></button>
                        </div>
                        <div class="list-group-item">
                            <img src="https://via.placeholder.com/50" alt="Sarah Black" class="rounded-circle mr-2" style="width: 50px; height: 50px;">
                            <strong>Sarah Black</strong> - Painter
                            <button type="button" class="btn btn-info float-right" data-bs-toggle="tooltip" title="View Profile"><i class="fas fa-eye"></i></button>
                        </div>
                        <div class="list-group-item">
                            <img src="https://via.placeholder.com/50" alt="Matthew Gray" class="rounded-circle mr-2" style="width: 50px; height: 50px;">
                            <strong>Matthew Gray</strong> - Fashion Designer
                            <button type="button" class="btn btn-info float-right" data-bs-toggle="tooltip" title="View Profile"><i class="fas fa-eye"></i></button>
                        </div>
                        <div class="list-group-item">
                            <img src="https://via.placeholder.com/50" alt="Olivia Brown" class="rounded-circle mr-2" style="width: 50px; height: 50px;">
                            <strong>Olivia Brown</strong> - Film Director
                            <button type="button" class="btn btn-info float-right" data-bs-toggle="tooltip" title="View Profile"><i class="fas fa-eye"></i></button>
                        </div>
                        <div class="list-group-item">
                            <img src="https://via.placeholder.com/50" alt="Daniel Johnson" class="rounded-circle mr-2" style="width: 50px; height: 50px;">
                            <strong>Daniel Johnson</strong> - Musician
                            <button type="button" class="btn btn-info float-right" data-bs-toggle="tooltip" title="View Profile"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>

        <!-- Add more co-artist entries as needed -->
                </div>
            </div>
            </div></div></div>

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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>