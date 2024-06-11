<?php
session_start();

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user inputs (email and password)
    $email = sanitize_input($_POST['email']);
    $password = sanitize_input($_POST['password']);

    // Prepare and execute SQL query to fetch user data based on email
    $stmt = $conn->prepare("SELECT id, role, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // User found, verify password
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];

            // Redirect to the appropriate dashboard based on user's role
            switch ($user['role']) {
                case 'patron':
                    echo "<script>window.location.href = '../Pages/patron/patron_profile.php';</script>";
                    exit();
                case 'artist':
                    echo "<script>window.location.href = '../Pages/artist/artist_profile.php';</script>";
                    exit();
                case 'mentor':
                    echo "<script>window.location.href = '../Pages/mentor/mentor_profile.php';</script>";
                    exit();
                case 'admin':
                    echo "<script>window.location.href = '../Pages/admin/admin_profile.php';</script>";
                    exit();
                case 'staff':
                    echo "<script>window.location.href = '../Pages/staff/staff_profile.php';</script>";
                    exit();
                default:
                    // Redirect to a default dashboard or homepage if role is unknown
                    echo "<script>window.location.href = 'default_home.php';</script>";
                    exit();
            }
        } else {
            // Incorrect password
            echo "<script>alert('Invalid password!');</script>";
        }
    } else {
        // User not found
        echo "<script>alert('User not found!');</script>";
    }
    $stmt->close();
}

// Function to sanitize user input
function sanitize_input($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - ArtisanLink</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        @media (max-width: 768px) {
            .mobile-order {
                order: -1;
            }
        }
        
        body {
            background-color: #eae7e6;
            font-size: 12px;
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
        </div>
    </nav>
    <div class="container-fluid mt-5">
        <div class="row mx-3 justify-content-center" style="margin-top: 7%;">
            <div class="col-md-6 mb-1">
                <div class="card mobile-order">
                    <div class="card-body">
                        <h3 class="card-title text-center">Sign In</h3>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" autocomplete="off">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-danger btn-block">Sign In</button>
                        </form>
                        <div class="text-center mt-3">
                            <a href="#">Forgot your password?</a>
                        </div>
                        <div class="text-center mt-3">
                            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 text-center mx-3 py-5 px-5 card shadow-lg bg-light">
                <h3>Welcome to ArtisanLink</h3>
                <p>Empowering artists and creators through patronage.</p>
                <p>ArtisanLink is a platform that connects artists with patrons to support arts and communications projects.</p>
                <p>Whether you're an artist looking for support or a patron seeking to fund creative endeavors, ArtisanLink provides a space for collaboration and inspiration.</p>
                <center><a href="../index.php" class="btn btn-primary btn-lg w-50 mt-4"><i class="fas fa-home me-2"></i> Back to Home</a></center>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        window.onload = function() {
            if(performance.navigation.type == 1) {
                location.href = location.href;
            }
        }
    </script>
</body>
</html>
