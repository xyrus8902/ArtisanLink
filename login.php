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

// Form submission (Login)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query to fetch user from database
    $sql = "SELECT * FROM users WHERE username = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Authentication successful, set session variables
            $_SESSION["username"] = $username;
            $_SESSION["usertype"] = $user['usertype']; // Assuming the user type is stored in the 'usertype' column
            // Redirect to the appropriate dashboard based on the user's role
            switch ($user['usertype']) {
                case 'student':
                    header("Location: student_dashboard.php");
                    break;
                case 'manager':
                    header("Location: manager_dashboard.php");
                    break;
                case 'teamleader':
                    header("Location: teamleader_dashboard.php");
                    break;
                default:
                    // Handle unknown user types
                    header("Location: unknown_role_dashboard.php");
                    break;
            }
            exit();
        } else {
            // Invalid password
            $login_error = "Invalid password.";
        }
    } else {
        // User not found
        $login_error = "User not found.";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">Login</h2>
                <?php if(isset($login_error)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $login_error; ?>
                    </div>
                <?php endif; ?>
                <form id="loginForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                </form>
                <p class="mt-3">Don't have an account? <a href="signup.php">Sign Up</a></p>
            </div>
        </div>
    </div>
</body>
</html>
