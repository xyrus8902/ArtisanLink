<?php
// Enable error reporting for debugging purposes
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

// Function to sanitize user input
function sanitize_input($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Sanitize and get user inputs
$role = sanitize_input($_POST['role']);
$firstName = sanitize_input($_POST['firstName']);
$lastName = sanitize_input($_POST['lastName']);
$gender = sanitize_input($_POST['gender']);
$birthday = sanitize_input($_POST['birthday']);
$email = sanitize_input($_POST['email']);
$contact = sanitize_input($_POST['contact']);
$address = sanitize_input($_POST['address']);
$password = password_hash(sanitize_input($_POST['password']), PASSWORD_DEFAULT);

// File upload settings
$target_dir = "../uploads/";
$validId_file = $target_dir . basename($_FILES["validId"]["name"]);
$attachment_file = $target_dir . basename($_FILES["attachment"]["name"]);
$uploadOk = 1;

// Validate and upload files
$allowed_types = array("jpg", "jpeg", "png", "gif", "pdf");
$validId_fileType = strtolower(pathinfo($validId_file, PATHINFO_EXTENSION));
$attachment_fileType = strtolower(pathinfo($attachment_file, PATHINFO_EXTENSION));

// Check if files are of valid type
if (!in_array($validId_fileType, $allowed_types) || !in_array($attachment_fileType, $allowed_types)) {
    echo "Sorry, only JPG, JPEG, PNG, GIF & PDF files are allowed.";
    $uploadOk = 0;
}

// Check file size (optional, 5MB max example)
if ($_FILES["validId"]["size"] > 5000000 || $_FILES["attachment"]["size"] > 5000000) {
    echo "Sorry, your files are too large.";
    $uploadOk = 0;
}

if ($uploadOk && move_uploaded_file($_FILES["validId"]["tmp_name"], $validId_file) && move_uploaded_file($_FILES["attachment"]["tmp_name"], $attachment_file)) {
    // Insert user data into database
    $sql = "INSERT INTO users (role, firstName, lastName, gender, birthday, email, contact, address, password, validId, attachment)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssss", $role, $firstName, $lastName, $gender, $birthday, $email, $contact, $address, $password, $validId_file, $attachment_file);

    if ($stmt->execute()) {
        echo "New record created successfully";
        // Redirect to success page
        header("Location: signup_success.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Sorry, there was an error uploading your files.";
}

$conn->close();
?>
