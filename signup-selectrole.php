<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Xywinard</title>
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
            background-attachment: fixed;
            font-size: 14px;
        }

        .card {
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
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

<div class="container mt-5">
    <div class="bg-light pt-3 px-5 pb-4 rounded shadow-lg border">
        <div class="row mb-0">
            <div class="col-md-4 mb-0">
                <h5 class="mb-0" style="font-weight: bold;">Select Role</h5>
            </div>
            <div class="col-md-6 mb-0">
                
            </div>
            <div class="col-md-2 mb-0">
                <a class="navbar-text ml-auto mb-0" href="signin.php"><i class="fas fa-arrow-left"></i> Back to Sign In</a>
            </div>
        </div>
        <hr class="my-1">
        <h6 class="mb-3 mx-3">Select a role that you want to become part of:</h6>
        <div class="row">
            <div class="col-md-6 mt-3 mb-3 d-flex align-items-stretch">
                <div class="card text-center" onclick="selectRole('card1')" style="background-color: #E8E4C9;">
                    <div class="card-body">
                        <h5 class="card-title">Patron</h5>
                        <p class="card-text">Patrons, also known as Art Enthusiasts, are individuals who have a keen interest in supporting and promoting the arts. They provide financial support, commissions, and opportunities for artists to create and showcase their work.</p>
                        <a href="signup.php" class="btn btn-danger">SELECT THIS ROLE</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-3 mb-3 d-flex align-items-stretch">
                <div class="card text-center" onclick="selectRole('card2')" style="background-color: #E8E4C9;">
                    <div class="card-body">
                        <h5 class="card-title">Artist</h5>
                        <p class="card-text mb-4">Artists are creative individuals who produce visual, performing, or literary artworks. They fulfill commissions, engage with potential students, and communicate ideas, emotions, and perspectives through their creations.</p>
                        <a href="signup.php" class="btn btn-danger">SELECT THIS ROLE</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6 mt-3 mb-3">
                <div class="card text-center" onclick="selectRole('card3')" style="background-color: #E8E4C9;">
                    <div class="card-body">
                        <h5 class="card-title">Mentor</h5>
                        <p class="card-text">Mentors are experienced individuals who provide guidance, support, and instruction to aspiring artists. They offer mentorship programs, workshops, and constructive feedback to aid in artistic growth and professional development.</p>
                        <a href="signup.php" class="btn btn-danger">SELECT THIS ROLE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function selectRole(card) {
        var cardLinks = {
            "card1": "signup.php",
            "card2": "signup.php",
            "card3": "signup.php"
        };

        var selectedLink = cardLinks[card];

        window.location.href = selectedLink;
    }
</script>
</body>
</html>
