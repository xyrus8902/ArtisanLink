<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Xywinard</title>
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
    <div class="container-fluid mt-5 pb-5">
        <div class="row mx-5 justify-content-center">
            <div class="col-md-8">
                <div class="card mobile-order">
                    <div class="card-body">
                        <h3 class="card-title text-center">Sign Up</h3>
                        <form action="signup_processing.php" method="POST">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter first name" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="lastName">Full Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter full name" required>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="contactNo">Contact No.</label>
                <input type="contactNo" class="form-control" id="contactNo" name="contactNo" placeholder="Enter contact numb" required>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <label for="idType">Type of ID</label>
        <select class="form-control" id="idType" name="idType" required onchange="toggleIdInputs()">
            <option value="Student ID">Student ID</option>
            <option value="Driver's License">Driver's License</option>
            <option value="Passport">Passport</option>
            <option value="Others">Others</option>
        </select>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group" id="idNumberInput">
                <label for="idNumber">ID Number</label>
                <input type="text" class="form-control" id="idNumber" name="idNumber" placeholder="Enter ID Number" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group" id="idImageInput">
                <label for="idImage">Upload Valid ID Image</label>
                <input type="file" class="form-control-file" id="idImage" name="idImage" accept="image/*" required>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="form-group" id="otherIdInput" style="display: none;">
        <label for="otherId">Other Type of ID</label>
        <input type="text" class="form-control" id="otherId" name="otherId" placeholder="Enter other ID description">
        <label for="otherIdNumber">ID Number</label>
        <input type="text" class="form-control" id="otherIdNumber" name="otherIdNumber" placeholder="Enter ID Number">
        <label for="idImage">Upload Valid ID Image</label>
        <input type="file" class="form-control-file" id="idImage" name="idImage" accept="image/*" required>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
        </div>
        <div class="col-md-6">
           <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
            </div> 
        </div>
    </div>
    
    
    
    
    <button type="submit" class="btn btn-danger btn-block">Sign Up</button>
</form>
                        <div class="text-center mt-3">
                            <p>Already have an account? <a href="signin.php">Sign In</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mx-3 py-5 px-5 card shadow-lg bg-light">
                <h3>Welcome to Xywinard</h3>
                <p>Empowering artists and creators through patronage.</p>
                <p>Xywinard is a platform that connects artists with patrons to support arts and communications projects.</p>
                <p>Whether you're an artist looking for support or a patron seeking to fund creative endeavors, Xywinard provides a space for collaboration and inspiration.</p>
                <a href="index.php" class="btn btn-secondary" style="width: 200px;">Back to Home</a>
            </div>
        </div></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    function toggleIdInputs() {
        var idType = document.getElementById("idType").value;
        var idNumberInput = document.getElementById("idNumberInput");
        var idImageInput = document.getElementById("idImageInput");
        var otherIdInput = document.getElementById("otherIdInput");

        if (idType === "Others") {
            idNumberInput.style.display = "none";
            idImageInput.style.display = "none";
            otherIdInput.style.display = "block";
        } else {
            idNumberInput.style.display = "block";
            idImageInput.style.display = "block";
            otherIdInput.style.display = "none";
        }
    }
</script>
</body>
</html>
