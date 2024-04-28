<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "art_service_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission (Signup)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $usertype = $_POST["usertype"];
    $contactnumber = $_POST["contactnumber"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Check if username already exists
    $check_sql = "SELECT * FROM users WHERE username = ? LIMIT 1";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $username);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        $signup_error = "Username already exists.";
    } else {
        // Insert new user into database
        $insert_sql = "INSERT INTO users (firstname, lastname, username, email, usertype, contactnumber, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("sssssss", $firstname, $lastname, $username, $email, $usertype, $contactnumber, $password);
        if ($insert_stmt->execute()) {
            // Signup successful, set session and redirect
            $_SESSION["username"] = $username;
            header("Location: login.php");
            exit();
        } else {
            $signup_error = "Signup failed. Please try again.";
        }
    }
}

$conn->close();
?>

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">Sign Up</h2>
                <?php if(isset($signup_error)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $signup_error; ?>
                    </div>
                <?php endif; ?>
                <form id="signupForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="usertype">User Type</label>
                        <select class="form-control" id="usertype" name="usertype" required>
                            <option value="staff">Staff</option>
                            <option value="manager">Manager</option>
                            <option value="teamleader">Team Leader</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="contactnumber">Contact Number</label>
                        <input type="text" class="form-control" id="contactnumber" name="contactnumber" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                    <button type="submit" class="btn btn-success" name="signup">Sign Up</button>
                </form>
                <p class="mt-3">Already have an account? <a href="login.php">Login</a></p>
            </div>
        </div>
    </div>
</body>
</html>
