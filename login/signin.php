<?php
session_start();

// Database connection details
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
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT id, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password, $role);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            // Password is correct, set session and redirect based on role
            $_SESSION['user_id'] = $id;
            $_SESSION['role'] = $role;

            switch ($role) {
                case 'admin':
                    header("Location: admin_dashboard.php");
                    break;
                case 'patron':
                    header("Location: patron_dashboard.php");
                    break;
                case 'artist':
                    header("Location: artist_dashboard.php");
                    break;
                case 'mentor':
                    header("Location: mentor_dashboard.php");
                    break;
                default:
                    session_destroy();
                    header("Location: signin.php");
                    break;
            }
            exit;
        } else {
            $error = "Invalid email or password.";
        }
    } else {
        $error = "Invalid email or password.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Xywinard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @media (max-width: 768px) {
            .mobile-order {
                order: -1;
            }
        }
        
        body {
        background-image: url('bg.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed; /* Keeps the background fixed while scrolling */
        font-size: 14px;
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
        </div>
    </nav>
    <div class="container-fluid mt-5">
        <div class="row mx-5 justify-content-center" style="margin-top: 7%;">
            <div class="col-md-6">
                <div class="card mobile-order">
                    <div class="card-body">
                        <h3 class="card-title text-center">Sign In</h3>
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>
                        <form action="signin.php" method="post">
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
                            <p>Don't have an account? <a href="signup-selectrole.php">Sign Up</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mx-3 py-5 px-5 card shadow-lg bg-light">
                <h3>Welcome to Xywinard</h3>
                <p>Empowering artists and creators through patronage.</p>
                <p>Xywinard is a platform that connects artists with patrons to support arts and communications projects.</p>
                <p>Whether you're an artist looking for support or a patron seeking to fund creative endeavors, Xywinard provides a space for collaboration and inspiration.</p>
                <a href="../index.php" class="btn btn-secondary" style="width: 200px;">Back to Home</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
