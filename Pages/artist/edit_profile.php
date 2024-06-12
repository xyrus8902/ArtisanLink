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
    // Validate and update user data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $occupation = $_POST['occupation'];
    $education_background = $_POST['education_background'];
    $languages_spoken = $_POST['languages_spoken'];
    $hobbies_interests = $_POST['hobbies_interests'];
    $achievements = $_POST['achievements'];
    $art_style = $_POST['art_style'];
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
    </style>
</head>
<body>
    <?php include '../../header/artist_header.php'; ?>

    <div class="content container">
        <div class="profile-header">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Edit Profile</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form method="POST">
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
                        <label for="languages_spoken">Languages Spoken:</label>
                        <input type="text" class="form-control" id="languages_spoken" name="languages_spoken" value="<?php echo htmlspecialchars($user['languages_spoken']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="hobbies_interests">Hobbies/Interests:</label>
                        <input type="text" class="form-control" id="hobbies_interests" name="hobbies_interests" value="<?php echo htmlspecialchars($user['hobbies_interests']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="achievements">Achievements:</label>
                        <input type="text" class="form-control" id="achievements" name="achievements" value="<?php echo htmlspecialchars($user['achievements']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="art_style">Art Style:</label>
                        <input type="text" class="form-control" id="art_style" name="art_style" value="<?php echo htmlspecialchars($user['art_style']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="exhibitions_exposures">Exhibitions/Exposures:</label>
                        <input type="text" class="form-control" id="exhibitions_exposures" name="exhibitions_exposures" value="<?php echo htmlspecialchars($user['exhibitions_exposures']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="bio">Bio:</label>
                        <textarea class="form-control" id="bio" name="bio" rows="5"><?php echo htmlspecialchars($user['bio']); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
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
