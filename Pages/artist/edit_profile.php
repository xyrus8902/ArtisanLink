<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'artist') {
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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle profile picture upload
    if ($_FILES['profilePicture']['size'] > 0) {
        $targetDir = "../../uploads/";
        $fileName = basename($_FILES["profilePicture"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Validate file type
        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
        if (!in_array($fileType, $allowedTypes)) {
            die("Error: Only JPG, JPEG, PNG, GIF files are allowed.");
        }

        // Upload file to server
        if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $targetFilePath)) {
            // Update profile picture path in the database
            $profilePicture = $targetFilePath;

            $stmt = $conn->prepare("UPDATE users SET profile_picture = ? WHERE id = ?");
            if ($stmt === false) {
                die("Prepare failed: " . $conn->error);
            }

            $stmt->bind_param("si", $profilePicture, $user_id);
            $stmt->execute();
            $stmt->close();

            // Update $user variable to reflect new profile picture path
            $user['profile_picture'] = $profilePicture;
        } else {
            die("Error uploading file.");
        }
    }

    // Continue updating other user data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $occupation = $_POST['occupation'];
    $education_background = $_POST['education_background'];
    $languages_spoken = implode(',', $_POST['languages_spoken'] ?? []);
    $hobbies_interests = implode(',', $_POST['hobbies_interests'] ?? []);
    $achievements = $_POST['achievements'];
    $art_style = implode(',', $_POST['art_style'] ?? []);
    $exhibitions_exposures = $_POST['exhibitions_exposures'];
    $bio = $_POST['bio'];

    // Update user data in the database
    $stmt = $conn->prepare("UPDATE users SET firstName = ?, lastName = ?, gender = ?, birthday = ?, contact = ?, address = ?, occupation = ?, education_background = ?, languages_spoken = ?, hobbies_interests = ?, achievements = ?, art_style = ?, exhibitions_exposures = ?, bio = ? WHERE id = ?");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ssssssssssssssi", $firstName, $lastName, $gender, $birthday, $contact, $address, $occupation, $education_background, $languages_spoken, $hobbies_interests, $achievements, $art_style, $exhibitions_exposures, $bio, $user_id);
    $stmt->execute();
    $stmt->close();

    // Redirect to profile page after updating
    header("Location: artist_profile.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - ArtisanLink</title>
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
        .profile-picture {
            max-width: 200px;
            max-height: 200px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php include '../../header/artist_header.php'; ?>

    <div class="content container">
        <div class="profile-header">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Edit Profile</h2> <hr>
                </div>
            </div>

        <div class="row">
            <div class="col-md-3">
                <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="profilePicture">Profile Picture:</label><br>
                        <?php if (!empty($user['profile_picture'])): ?>
                        <img src="<?php echo '../uploads/' . htmlspecialchars($user['profile_picture']); ?>" alt="Profile Picture" class="profile-picture"><br>
                        <?php else: ?>
                        <img src="../../uploads/defaultpic.png" alt="Default Profile Picture" class="profile-picture"><br>
                        <?php endif; ?>
                        <input type="file" class="form-control-file" id="profilePicture" name="profilePicture">
                </div>
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-sm-7">
                <div class="form-group">
                    <label for="firstName">First Name:</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo htmlspecialchars($user['firstName']); ?>">
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name:</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo htmlspecialchars($user['lastName']); ?>">
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <input type="text" class="form-control" id="gender" name="gender" value="<?php echo htmlspecialchars($user['gender']); ?>">
                </div>
                <div class="form-group">
                    <label for="birthday">Birthday:</label>
                    <input type="text" class="form-control" id="birthday" name="birthday" value="<?php echo htmlspecialchars($user['birthday']); ?>">
                </div>
                <div class="form-group">
                    <label for="contact">Contact:</label>
                    <input type="text" class="form-control" id="contact" name="contact" value="<?php echo htmlspecialchars($user['contact']); ?>">
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlspecialchars($user['address']); ?>">
                </div>
                <div class="form-group">
                    <label for="occupation">Occupation:</label>
                    <input type="text" class="form-control" id="occupation" name="occupation" value="<?php echo htmlspecialchars($user['occupation']); ?>">
                </div>
                <div class="form-group">
                    <label for="education_background">Education Background:</label>
                    <input type="text" class="form-control" id="education_background" name="education_background" value="<?php echo htmlspecialchars($user['education_background']); ?>">
                </div>

                <div class="form-group">
                    <label for="languages_spoken">Languages Spoken:</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="english" name="languages_spoken[]" value="English" <?php echo in_array('English', explode(',', $user['languages_spoken'])) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="english">English</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="spanish" name="languages_spoken[]" value="Spanish" <?php echo in_array('Spanish', explode(',', $user['languages_spoken'])) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="spanish">Spanish</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="french" name="languages_spoken[]" value="French" <?php echo in_array('French', explode(',', $user['languages_spoken'])) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="french">French</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="hobbies_interests">Hobbies/Interests:</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="painting" name="hobbies_interests[]" value="Painting" <?php echo in_array('Painting', explode(',', $user['hobbies_interests'])) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="painting">Painting</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="drawing" name="hobbies_interests[]" value="Drawing" <?php echo in_array('Drawing', explode(',', $user['hobbies_interests'])) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="drawing">Drawing</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="photography" name="hobbies_interests[]" value="Photography" <?php echo in_array('Photography', explode(',', $user['hobbies_interests'])) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="photography">Photography</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="achievements">Achievements:</label>
                    <textarea class="form-control" id="achievements" name="achievements"><?php echo htmlspecialchars($user['achievements']); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="art_style">Art Style:</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="abstract" name="art_style[]" value="Abstract" <?php echo in_array('Abstract', explode(',', $user['art_style'])) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="abstract">Abstract</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="realism" name="art_style[]" value="Realism" <?php echo in_array('Realism', explode(',', $user['art_style'])) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="realism">Realism</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="impressionism" name="art_style[]" value="Impressionism" <?php echo in_array('Impressionism', explode(',', $user['art_style'])) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="impressionism">Impressionism</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exhibitions_exposures">Exhibitions/Exposures:</label>
                    <textarea class="form-control" id="exhibitions_exposures" name="exhibitions_exposures"><?php echo htmlspecialchars($user['exhibitions_exposures']); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="bio">Bio:</label>
                    <textarea class="form-control" id="bio" name="bio"><?php echo htmlspecialchars($user['bio']); ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>                
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>