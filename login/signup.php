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
        
        * {
            font-size: 12px;
        }
        body {
            background-color: #eae7e6;
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
<div class="container-fluid mt-3">
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
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="form-group" id="genderField" style="display: none;">
                                        <label for="gender">Gender</label>
                                        <select class="form-control" id="gender" name="gender" required>
                                            <option value="" selected disabled>Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group" id="birthdayField">
                                        <label for="birthday">Birthday</label>
                                        <input type="date" class="form-control" id="birthday" name="birthday" required>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group" id="ageField">
                                        <label for="age">Age</label>
                                        <input type="number" class="form-control" id="age" name="age" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group" id="emailField" style="display: none;">
                                        <label for="email">Email Address</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group" id="contactField" style="display: none;">
                                        <label for="contact">Contact Number</label>
                                        <input type="tel" class="form-control" id="contact" name="contact" placeholder="Contact Number" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="addressField" style="display: none;">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group" id="idField" style="display: none;">
                                        <label for="id">Choose Valid ID</label>
                                        <input type="file" class="form-control-file" id="id" name="id" accept="image/*" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group" id="attachmentField">
                                        <label for="attachment">Proof of Being Artist/Mentor (PDF only)</label>
                                        <input type="file" class="form-control-file" id="attachment" name="attachment" accept=".pdf" required>
                                        <small class="form-text text-muted">You may include your portfolios and certificates here.</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group" id="passwordField" style="display: none;">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group" id="confirmPasswordField" style="display: none;">
                                        <label for="confirmPassword">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
                                    </div>
                                </div>
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
                if(role === "patron" || role === "artist" || role === "mentor"){
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
                // Disable the Next button if no role is selected
                $("#nextBtn").prop('disabled', true);
            }
        });

        $("#nextBtn").click(function(){
            var role = $("#role").val();
            var firstName = $("#firstName").val();
            var lastName = $("#lastName").val();
            var gender = $("#gender").val();
            var birthday = $("#birthday").val();
            var email = $("#email").val();
            var contact = $("#contact").val();
            var address = $("#address").val();
            var id = $("#id").val();
            var password = $("#password").val();
            var confirmPassword = $("#confirmPassword").val();

            // Check if all fields are filled
            if(role && firstName && lastName && gender && birthday && email && contact && address && id && password && confirmPassword){
                window.location.href = "signup_success.php?role=" + role;
            } else {
                alert("Please fill up all fields.");
            }
        });

        $("#birthday").on("change", function() {
            var dob = new Date(this.value);
            var today = new Date();
            var age = today.getFullYear() - dob.getFullYear();
            var monthDiff = today.getMonth() - dob.getMonth();
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
                age--;
            }
            document.getElementById('age').value = age;

            if (age < 12) {
                alert("Age must be 12 years old or above.");
                this.value = ''; // Clear the input field
                document.getElementById('age').value = ''; // Clear the age field
            }
        });

        $("#email").on("input", function(){
            var email = $(this).val();
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                $(this).addClass("is-invalid");
            } else {
                $(this).removeClass("is-invalid");
            }
        });

        $("#confirmPassword").on("input", function(){
            var password = $("#password").val();
            var confirmPassword = $(this).val();
            if (password !== confirmPassword) {
                $(this).addClass("is-invalid");
            } else {
                $(this).removeClass("is-invalid");
            }
        });

        $("#contact").on("input", function(){
            var contact = $(this).val();
            var contactRegex = /^\d{11}$/; // Assuming 10-digit phone number
            if (!contactRegex.test(contact)) {
                $(this).addClass("is-invalid");
            } else {
                $(this).removeClass("is-invalid");
            }
        });
    });
</script>
</body>
</html>