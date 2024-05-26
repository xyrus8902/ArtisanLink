<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Xywinard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
            <div class="col-md-8" style="max-height: 500px; overflow-y: auto;">
                <div class="card mobile-order">
                    <div class="card-body" style="background-color: #E8E4C9;">
                        <div class="row mb-0">
                            <div class="col-md-4 mb-0">
                                <h5 class="mb-0" style="font-weight: bold;">Sign Up</h5>
                                <hr>
                            </div>
                            <div class="col-md-5 mb-0">
                                <!-- Empty column for spacing -->
                            </div>
                            <div class="col-md-3 mb-0">
                                <a class="navbar-text ml-auto mb-0" href="signup-selectrole.php"><i class="fas fa-arrow-left"></i> Back to Role Selection</a>
                            </div>
                        </div>
                        <form id="signupForm" action="signup_processing.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName">First Name</label>
                                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter first name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lastName">Last Name</label>
                                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter last name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="middleName">Middle Name (optional)</label>
                                        <input type="text" class="form-control" id="middleName" name="middleName" placeholder="Enter middle name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="suffix">Suffix (optional)</label>
                                        <select class="form-control" id="suffix" name="suffix">
                                            <option value="" selected disabled>Select suffix</option>
                                            <option value="Jr.">Jr.</option>
                                            <option value="Sr.">Sr.</option>
                                            <option value="II">II</option>
                                            <option value="III">III</option>
                                            <option value="IV">IV</option>
                                            <option value="V">V</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select class="form-control" id="gender" name="gender" required>
                                            <option value="" selected disabled>Select gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="birthday">Birthday</label>
                                        <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Enter birthday" required>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="age">Age</label>
                                        <input type="number" class="form-control" id="age" name="age" placeholder="Enter age" disabled>
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
                                        <input type="number" class="form-control" id="contactNo" name="contactNo" placeholder="Enter contact number" required>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="idType">Type of ID</label>
                                <select class="form-control" id="idType" name="idType" required onchange="toggleIdInputs()">
                                    <option value="" selected disabled>Select type of ID</option>
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
                                <label for="otherIdImage">Upload Valid ID Image</label>
                                <input type="file" class="form-control-file" id="otherIdImage" name="otherIdImage" accept="image/*" required>
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
                            <button type="submit" value="Submit" class="btn btn-danger btn-block">Sign Up</button>
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
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include SweetAlert library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    // Function to check if all required fields are filled up
    function areFieldsFilled() {
        var firstName = document.getElementById("firstName").value;
        var lastName = document.getElementById("lastName").value;
        var gender = document.getElementById("gender").value;
        var birthday = document.getElementById("birthday").value;
        var email = document.getElementById("email").value;
        var contactNo = document.getElementById("contactNo").value;
        var idType = document.getElementById("idType").value;
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value;

        // Check if any required field is empty
        if (firstName === "" || lastName === "" || gender === "" || birthday === "" || email === "" || contactNo === "" || idType === "" || password === "" || confirmPassword === "") {
            return false; // Not all required fields are filled up
        }
        return true; // All required fields are filled up
    }

    // Function to calculate age based on birthday
    function calculateAge() {
        var birthday = document.getElementById("birthday").value;
        if (birthday) {
            var today = new Date();
            var birthDate = new Date(birthday);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            document.getElementById("age").value = age;
        }
    }

    // Add event listener for birthday change
    document.getElementById("birthday").addEventListener("change", calculateAge);
    
    // Function to handle Sign Up button click
    function handleSignUp(event) {
        event.preventDefault(); // Prevent form submission

        if (areFieldsFilled()) {
            // Show SweetAlert for successful sign up
            Swal.fire({
                icon: 'success',
                title: 'Sign Up Successful!',
                text: 'Thank you for signing up with Xywinard.',
                showConfirmButton: false,
                timer: 2000 // Automatically close after 2 seconds
            });
        } else {
            // Show SweetAlert for empty required fields
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please fill in all required fields before signing up!',
            });
        }
    }

    // Add event listener for Sign Up button click
    document.querySelector("#signupForm button[type='submit']").addEventListener("click", handleSignUp);

    // Add event listener for input event on contact number field
    document.getElementById("contactNo").addEventListener("input", function() {
        if (this.value.length > 11) {
            // Limit to 11 characters
            this.value = this.value.slice(0, 11);
            // Show SweetAlert for contact number error
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please enter only 11 digits for the contact number!',
            });
        }
    });

    // Function to handle input event on first name and last name fields
    function handleNameInput() {
        var firstName = document.getElementById("firstName");
        var lastName = document.getElementById("lastName");
        var maxLength = 50; // Max length for first name and last name
        
        // Check if first name exceeds max length
        if (firstName.value.length > maxLength) {
            // Truncate first name to max length
            firstName.value = firstName.value.slice(0, maxLength);
            // Show SweetAlert for first name error
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please enter a maximum of ' + maxLength + ' characters for the first name!',
            });
        }
    }

    // Add event listeners for input event on first name and last name fields
    document.getElementById("firstName").addEventListener("input", handleNameInput);
    document.getElementById("lastName").addEventListener("input", handleNameInput);

    // Function to toggle ID inputs based on selected type
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

    // Add event listener for ID type change
    document.getElementById("idType").addEventListener("change", toggleIdInputs);

    // Initial call to toggle ID inputs based on default selected type
    toggleIdInputs();
</script>

</body>
</html>
