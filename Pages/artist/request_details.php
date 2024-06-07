<?php
// Database credentials
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

// Check if request_id is set in the URL
if(isset($_GET['request_id'])) {
    $request_id = $_GET['request_id'];
    
    // Construct SQL query to fetch request details based on request_id
    $sql = "SELECT * FROM requests WHERE id = $request_id";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Request Details</title>
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <style>
                /* Add custom styles here */
            </style>
        </head>
        <body>
        <?php include '../../header/artist_header.php'; ?>
        
        <div class="container-fluid px-5 mt-5 py-5">
            <div class="row">
                <div class="col-lg-9">
                    <h2>Request Details</h2>
                    <div class="card mb-1">
                        <img src="<?php echo $row["image"]; ?>" class="card-img-top" alt="Sample Image" style="width: auto; height: 120px;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row["name"]; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $row["category"]; ?></h6>
                            <p class="card-text"><strong>Size:</strong> <?php echo $row["size"]; ?></p>
                            <p class="card-text"><strong>Contact:</strong> <?php echo $row["contact"]; ?></p>
                            <p class="card-text"><strong>Description:</strong> <?php echo $row["description"]; ?></p>
                            <!-- Back button -->
                            <a href="http://localhost/ArtisanLink/pages/artist/artist_patronage.php" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </body>
        </html>
        <?php
    } else {
        echo "Request not found.";
    }
} else {
    echo "Request ID not provided.";
}

$conn->close();
?>
