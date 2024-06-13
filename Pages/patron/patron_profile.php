<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'patron') {
    header("Location: ../index.php");
    exit();
}

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "artisan_link";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];

// Fetch user data
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if (!$user) {
    die("User not found");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patron Dashboard - ArtisanLink</title>
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
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .portfolio-item {
            margin-bottom: 20px;
        }
        .skills-list {
            list-style-type: none;
            padding: 0;
        }
    </style>
</head>
<body>
    <?php include '../../header/patron_header.php'; ?>

    <div class="content container">
        <div class="profile-header">
            <div class="row">
                <div class="col-lg-4 text-center">
                    <img src="<?php echo '../uploads/' . htmlspecialchars($user['profile_picture']); ?>" class="rounded-circle shadow" alt="Profile Picture" style="width: 200px; height: 200px;">
                <hr class="mb-0"></div> 
                <div class="col-lg-5 pt-5">
                    <h2 class="mt-3"><?php echo htmlspecialchars($user['firstName'] . ' ' . htmlspecialchars($user['lastName'])); ?> <span class="lead">(Patron)</span></h2>
                    <p><strong>Bio:</strong> <?php echo htmlspecialchars($user['bio']); ?></p>
                </div>
                <div class="col-lg-3 d-flex flex-column justify-content-end">
                    <a href="edit_profile.php" class="btn btn-primary mb-3">Edit Profile</a>
                </div>
            </div>
        </div>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Personal Information</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pictures-tab" data-toggle="tab" href="#pictures" role="tab" aria-controls="pictures" aria-selected="false">Pictures</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                Personal Information
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><i class="fas fa-envelope"></i> <strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                                        <p><i class="fas fa-user"></i> <strong>First Name:</strong> <?php echo htmlspecialchars($user['firstName']); ?></p>
                                        <p><i class="fas fa-user"></i> <strong>Last Name:</strong> <?php echo htmlspecialchars($user['lastName']); ?></p>
                                        <p><i class="fas fa-venus-mars"></i> <strong>Gender:</strong> <?php echo htmlspecialchars($user['gender']); ?></p>
                                        <p><i class="fas fa-birthday-cake"></i> <strong>Birthday:</strong> <?php echo htmlspecialchars($user['birthday']); ?></p>
                                        <p><i class="fas fa-phone"></i> <strong>Contact:</strong> <?php echo htmlspecialchars($user['contact']); ?></p>
                                        <p><i class="fas fa-map-marker-alt"></i> <strong>Address:</strong> <?php echo htmlspecialchars($user['address']); ?></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><i class="fas fa-briefcase"></i> <strong>Occupation:</strong> <?php echo isset($user['occupation']) ? htmlspecialchars($user['occupation']) : "N/A"; ?></p>
                                        <p><i class="fas fa-graduation-cap"></i> <strong>Education Background:</strong> <?php echo isset($user['education_background']) ? htmlspecialchars($user['education_background']) : "N/A"; ?></p>
                                        
                                        <p><i class="fas fa-language"></i> <strong>Languages Spoken:</strong> 
                                            <?php 
                                            if (isset($user['languages_spoken'])) {
                                                $languages = explode(',', $user['languages_spoken']);
                                                echo htmlspecialchars(implode(', ', $languages));
                                            } else {
                                                echo "N/A";
                                            }
                                            ?>
                                        </p>
                                        
                                        <p><i class="fas fa-heart"></i> <strong>Hobbies/Interests:</strong> 
                                            <?php 
                                            if (isset($user['hobbies_interests'])) {
                                                $hobbies = explode(',', $user['hobbies_interests']);
                                                echo htmlspecialchars(implode(', ', $hobbies));
                                            } else {
                                                echo "N/A";
                                            }
                                            ?>
                                        </p>
                                        
                                        <p><i class="fas fa-trophy"></i> <strong>Achievements:</strong> <?php echo isset($user['achievements']) ? htmlspecialchars($user['achievements']) : "N/A"; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                Social Media Links
                            </div>
                            <div class="card-body">
                                <p><strong>Instagram:</strong> <a href="<?php echo isset($user['instagram_url']) ? htmlspecialchars($user['instagram_url']) : "#"; ?>" target="_blank"><?php echo isset($user['instagram_url']) ? htmlspecialchars($user['instagram_url']) : "N/A"; ?></a></p>
                                <p><strong>Facebook:</strong> <a href="<?php echo isset($user['facebook_url']) ? htmlspecialchars($user['facebook_url']) : "#"; ?>" target="_blank"><?php echo isset($user['facebook_url']) ? htmlspecialchars($user['facebook_url']) : "N/A"; ?></a></p>
                                <p><strong>Twitter:</strong> <a href="<?php echo isset($user['twitter_url']) ? htmlspecialchars($user['twitter_url']) : "#"; ?>" target="_blank"><?php echo isset($user['twitter_url']) ? htmlspecialchars($user['twitter_url']) : "N/A"; ?></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="pictures" role="tabpanel" aria-labelledby="pictures-tab">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Pictures
                            </div>
                            <div class="card-body">
                                <!-- Display patron's pictures here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../../header/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
