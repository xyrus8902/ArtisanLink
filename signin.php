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
    </style>
</head>
<body>
    <div class="container-fluid mt-5">
        <div class="row mx-5 justify-content-center" style="margin-top: 10%;">
            <div class="col-md-6">
                <div class="card mobile-order">
                    <div class="card-body">
                        <h3 class="card-title text-center">Sign In</h3>
                        <form>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-danger btn-block">Sign In</button>
                        </form>
                        <div class="text-center mt-3">
                            <a href="#">Forgot your password?</a>
                        </div>
                        <div class="text-center mt-3">
                            <p>Don't have an account? <a href="#">Sign Up</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mx-3">
                <h3>Welcome to Xywinard</h3>
                <p>Empowering artists and creators through patronage.</p>
                <p>Xywinard is a platform that connects artists with patrons to support arts and communications projects.</p>
                <p>Whether you're an artist looking for support or a patron seeking to fund creative endeavors, Xywinard provides a space for collaboration and inspiration.</p>
                <a href="index.php" class="btn btn-secondary">Back to Home</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
