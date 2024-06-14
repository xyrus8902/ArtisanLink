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
    header("Location: patron_profile.php");
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
    <?php include '../../header/patron_header.php'; ?>

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
                <div class="form-group">
                    <label for="bio">Bio:</label>
                    <textarea class="form-control" id="bio" name="bio"><?php echo htmlspecialchars($user['bio']); ?></textarea>
                </div>
            </div>
            <div class="col-sm-9">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="personal-tab" data-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="true">Personal Information</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="professional-tab" data-toggle="tab" href="#professional" role="tab" aria-controls="professional" aria-selected="false">Professional Information</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="social-tab" data-toggle="tab" href="#social" role="tab" aria-controls="social" aria-selected="false">Social Media</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="artistic-tab" data-toggle="tab" href="#artistic" role="tab" aria-controls="artistic" aria-selected="false">Artistic Information</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Personal Information Tab -->
        <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="firstName">First Name:</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo htmlspecialchars($user['firstName']); ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="lastName">Last Name:</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo htmlspecialchars($user['lastName']); ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="contact">Contact:</label>
                        <input type="text" class="form-control" id="contact" name="contact" value="<?php echo htmlspecialchars($user['contact']); ?>">
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="Male" <?php if ($user['gender'] === 'Male') echo 'selected'; ?>>Male</option>
                            <option value="Female" <?php if ($user['gender'] === 'Female') echo 'selected'; ?>>Female</option>
                            <option value="Others" <?php if ($user['gender'] === 'Others') echo 'selected'; ?>>Others</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="birthday">Birthday:</label>
                        <input type="date" class="form-control" id="birthday" name="birthday" value="<?php echo htmlspecialchars($user['birthday']); ?>">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input type="text" class="form-control" id="age" name="age" readonly>
                    </div>
                </div>

                <div class="col-sm-6">
                    
                </div>
                <div class="col-sm-6">
                    
                </div>
            </div>
            
            
            
            
            
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlspecialchars($user['address']); ?>">
            </div>
        </div>

        <!-- Professional Information Tab -->
        <div class="tab-pane fade" id="professional" role="tabpanel" aria-labelledby="professional-tab">
            <div class="form-group">
                <label for="occupation">Occupation:</label>
                <input type="text" class="form-control" id="occupation" name="occupation" value="<?php echo htmlspecialchars($user['occupation']); ?>">
            </div>
            <div class="form-group">
                <label for="education_background">Education Background:</label>
                <input type="text" class="form-control" id="education_background" name="education_background" value="<?php echo htmlspecialchars($user['education_background']); ?>">
            </div>
            <div class="form-group">
                <label for="certifications">Certifications:</label>
                <input type="text" class="form-control" id="certifications" name="certifications" value="<?php echo htmlspecialchars($user['certifications']); ?>">
            </div>
        </div>

        <!-- Social Media Tab -->
        <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab">
            <div class="form-group">
                <label for="website">Website/Portfolio:</label>
                <input type="url" class="form-control" id="website" name="website" value="<?php echo htmlspecialchars($user['website']); ?>">
            </div>
            <div class="form-group">
                <label for="social_media">Social Media:</label>
                <input type="url" class="form-control" id="facebook_url" name="facebook_url" placeholder="Facebook" value="<?php echo htmlspecialchars($user['facebook_url']); ?>">
                <input type="url" class="form-control" id="instagram_url" name="instagram_url" placeholder="Instagram" value="<?php echo htmlspecialchars($user['instagram_url']); ?>">
                <input type="url" class="form-control" id="twitter_url" name="twitter_url" placeholder="Twitter" value="<?php echo htmlspecialchars($user['twitter_url']); ?>">
            </div>
        </div>

        <!-- Artistic Information Tab -->
        <div class="tab-pane fade" id="artistic" role="tabpanel" aria-labelledby="artistic-tab">
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
                <label for="achievements">Achievements:</label>
                <textarea class="form-control" id="achievements" name="achievements"><?php echo htmlspecialchars($user['achievements']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="exhibitions_exposures">Exhibitions/Exposures:</label>
                <textarea class="form-control" id="exhibitions_exposures" name="exhibitions_exposures"><?php echo htmlspecialchars($user['exhibitions_exposures']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="preferred_mediums">Preferred Mediums:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="oil" name="preferred_mediums[]" value="Oil" <?php echo in_array('Oil', explode(',', $user['preferred_mediums'])) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="oil">Oil</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="watercolor" name="preferred_mediums[]" value="Watercolor" <?php echo in_array('Watercolor', explode(',', $user['preferred_mediums'])) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="watercolor">Watercolor</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="acrylic" name="preferred_mediums[]" value="Acrylic" <?php echo in_array('Acrylic', explode(',', $user['preferred_mediums'])) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="acrylic">Acrylic</label>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


                

                <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>                
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    // Kunin ang reference sa input field ng birthday
    const birthdayInput = document.getElementById('birthday');
    // Kunin ang reference sa input field ng age
    const ageInput = document.getElementById('age');

    // Function para i-compute ang edad mula sa birthday
    function calculateAge(birthday) {
        const today = new Date();
        const birthDate = new Date(birthday);
        let age = today.getFullYear() - birthDate.getFullYear();
        const monthDiff = today.getMonth() - birthDate.getMonth();
        
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        
        return age;
    }

    // Event listener para ma-update ang input field ng age kapag nagbago ang birthday
    birthdayInput.addEventListener('change', function() {
        const age = calculateAge(birthdayInput.value);
        ageInput.value = age;
    });

    // Initial calculation of age based on the current value of birthday input
    const initialAge = calculateAge(birthdayInput.value);
    ageInput.value = initialAge;
</script>
</body>
</html>