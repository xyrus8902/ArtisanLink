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
            background-color: #eae7e6;
            font-size: 12px;
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
    <div class="row mx-5 justify-content-center">
        <div class="col-md-6">
            <div class="card mobile-order">
                <div class="card-body">
                    <h3 class="card-title text-center">Sign Up</h3>
                    <!-- Sign Up Form -->
                    <form action="signup_process.php" method="post">
                        <div class="form-group">
                            <label for="role">Select Role</label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="" selected disabled>Select Role</option>
                                <option value="patron">Patron - Explanation of Patron role...</option>
                                <option value="artist">Artist - Explanation of Artist role...</option>
                                <option value="mentor">Mentor - Explanation of Mentor role...</option>
                            </select>
                        </div>
                        <div id="additionalFields" style="display: none;">
                            <!-- Additional Fields -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group" id="firstNameField" style="display: none;">
                                        <label for="firstName">First Name</label>
                                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group" id="lastNameField" style="display: none;">
                                        <label for="lastName">Last Name</label>
                                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group" id="genderField" style="display: none;">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option value="" selected disabled>Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="form-group" id="birthdayField" style="display: none;">
                                <label for="birthday">Birthday</label>
                                <input type="date" class="form-control" id="birthday" name="birthday" required>
                            </div>
                            <div class="form-group" id="emailField" style="display: none;">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                            </div>
                            <div class="form-group" id="contactField" style="display: none;">
                                <label for="contact">Contact Number</label>
                                <input type="tel" class="form-control" id="contact" name="contact" placeholder="Contact Number" required>
                            </div>
                            <div class="form-group" id="addressField" style="display: none;">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                            </div>
                            <div class="form-group" id="idField" style="display: none;">
                                <label for="id">Choose Valid ID</label>
                                <input type="file" class="form-control-file" id="id" name="id" accept="image/*" required>
                            </div>
                            <div class="form-group" id="passwordField" style="display: none;">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="form-group" id="confirmPasswordField" style="display: none;">
                                <label for="confirmPassword">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
                            </div>
                        </div>
                        <button type="button" class="btn btn-danger btn-block" id="nextBtn">Next</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $("#role").change(function(){
            var role = $(this).val();
            if(role){
                $("#additionalFields").show();
                // Show additional fields based on selected role
                if(role === "patron"){
                    $("#firstNameField").show();
                    $("#lastNameField").show();
                    $("#genderField").show();
                    $("#birthdayField").show();
                    $("#emailField").show();
                    $("#contactField").show();
                    $("#addressField").show();
                    $("#idField").show();
                    $("#passwordField").show();
                    $("#confirmPasswordField").show();
                } else if(role === "artist"){
                    $("#firstNameField").show();
                    $("#lastNameField").show();
                    $("#genderField").show();
                    $("#birthdayField").show();
                    $("#emailField").show();
                    $("#contactField").show();
                    $("#addressField").show();
                    $("#idField").show();
                    $("#passwordField").show();
                    $("#confirmPasswordField").show();
                } else if(role === "mentor"){
                    $("#firstNameField").show();
                    $("#lastNameField").show();
                    $("#genderField").show();
                    $("#birthdayField").show();
                    $("#emailField").show();
                    $("#contactField").show();
                    $("#addressField").show();
                    $("#idField").show();
                    $("#passwordField").show();
                    $("#confirmPasswordField").show();
                }
            } else {
                $("#additionalFields").hide();
            }
        });

        $("#nextBtn").click(function(){
            var role = $("#role").val();
            if(role){
                window.location.href = "signup_process.php?role=" + role;
            }
        });
    });
</script>
</body>
</html>