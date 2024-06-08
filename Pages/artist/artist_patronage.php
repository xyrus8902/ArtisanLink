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

// Initialize filter and search variables
$categoryFilter = isset($_GET['category']) ? $_GET['category'] : '';
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

// Construct the SQL query with filter and search
$sql = "SELECT * FROM requests WHERE 1=1";
if ($categoryFilter) {
    $sql .= " AND category = '$categoryFilter'";
}
if ($searchTerm) {
    $sql .= " AND (name LIKE '%$searchTerm%' OR description LIKE '%$searchTerm%')";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patron Requests</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/simplePagination.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            font-size: 14px;
        }
        body {
            font-size: 12px;
            background-color: #eae7e6;
        }
        .navbar, .btn-primary, .modal-header, .modal-footer {
            background-color: #ff4d4d;
        }
        .btn-primary, .modal-header .close, .modal-footer .btn {
            border-color: #ff4d4d;
        }
        .btn-primary:hover, .modal-header .close:hover, .modal-footer .btn:hover {
            background-color: #ff1a1a;
            border-color: #ff1a1a;
        }
        .btn-primary:focus, .modal-header .close:focus, .modal-footer .btn:focus {
            box-shadow: 0 0 0 0.2rem rgba(255, 77, 77, 0.5);
        }
        .modal-content {
            border-color: #ff4d4d;
        }
        .form-control:focus {
            border-color: #ff4d4d;
            box-shadow: 0 0 0 0.2rem rgba(255, 77, 77, 0.25);
        }
        .card-columns {
            column-count: 3;
        }
        .card {
            margin-bottom: 20px;
        }
        .pagination-container {
            margin-top: 20px;
        }

        .progress-circle {
    width: 100px;
    height: 100px;
    position: relative;
}

.progress-circle-left,
.progress-circle-right {
    width: 50%;
    height: 100%;
    background-color: #ff4d4d;
    position: absolute;
    border-radius: 50%;
}

.progress-circle-left {
    z-index: 1;
    transform: rotate(<?php echo min($percentage, 50); ?>deg);
    clip: rect(auto, auto, auto, 50px);
}

.progress-circle-right {
    z-index: 2;
    transform: rotate(<?php echo max($percentage - 50, 0); ?>deg);
}

.progress-circle-inner {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    overflow: hidden;
    position: absolute;
    left: 0;
    top: 0;
}

.progress-circle-text {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    font-size: 20px;
    font-weight: bold;
    position: absolute;
    top: 0;
    left: 0;
}

    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.min.js"></script>
    <script>
        $(document).ready(function(){
            var items = $(".card");
            var numItems = items.length;
            var perPage = 3;

            // Only show the first 4 items initially
            items.slice(perPage).hide();

            // Setup pagination
            $(".pagination-container").pagination({
                items: numItems,
                itemsOnPage: perPage,
                prevText: "&laquo;",
                nextText: "&raquo;",
                onPageClick: function(pageNumber) {
                    var showFrom = perPage * (pageNumber - 1);
                    var showTo = showFrom + perPage;
                    items.hide().slice(showFrom, showTo).show();
                }
            });
        });
    </script>
</head>
<body>
<?php include '../../header/artist_header.php'; ?>

<div class="container-fluid px-5 mt-5 py-5">
    <div class="row">
        <div class="col-lg-9">
        <h5 class="mb-0">Patron Requests</h5>
            <form method="GET" action="">
                    <div class="form-row">
                        <div class="form-group col-md-4 col-sm-4 col-8">
                            <label for="categoryFilter">This section displays the requests of our patronage.</label>
                            <select id="categoryFilter" name="category" class="form-control">
                                <option value="">All Categories</option>
                                <option value="Portrait" <?php if ($categoryFilter == 'portrait') echo 'selected'; ?>>Portrait</option>
                                <option value="Sculpture" <?php if ($categoryFilter == 'Sculpture') echo 'selected'; ?>>Sculpture</option>
                                <option value="Craft" <?php if ($categoryFilter == 'Craft') echo 'selected'; ?>>Craft</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3 col-sm-3 col-4 align-self-end">
                            <button type="submit" class="btn btn-primary">Apply Filters</button>
                        </div>
                        <div class="form-group col-md-2 col-sm-1">
                            
                        </div>
                        <div class="form-group col-md-3 col-sm-4">
                            <label for="searchTerm">Search</label>
                            <input type="text" id="searchTerm" name="search" class="form-control" value="<?php echo $searchTerm; ?>" placeholder="Search...">
                        </div>  
                    </div>
                </form>

                <div class="row" id="requestCards">
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-4 text-center">
                    <div class="card mb-3">
                        <img src="<?php echo $row["image"]; ?>" class="card-img-top" alt="Sample Image" style="width: auto; height: 150px;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row["name"]; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $row["category"]; ?></h6>
                            <p class="card-text mb-0"><strong>Size:</strong> <?php echo $row["size"]; ?></p>
                            <p class="card-text mb-0"><strong>Contact:</strong> <?php echo $row["contact"]; ?></p>
                            <p class="card-text"><strong>Description:</strong> <?php echo $row["description"]; ?></p>
                            <div class="row">
                                <div class="col-6 mb-1">
                                    <button class="btn btn-primary"><a href="request_details.php?request_id=<?php echo $row['id']; ?>" style="color: #fff; text-decoration: none;"><i class="fas fa-eye"></i> View Details</a></button>
                                </div>
                                <div class="col-6 mb-1">
                                    <button class="btn btn-primary" onclick="offerRequest()"><i class="fas fa-handshake"></i> Take Request</button>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
                <!-- Pagination -->
                <div class="pagination-container"></div>
            </div>

            <!-- Offer Modal -->
            <div class="modal fade" id="offerModal" tabindex="-1" aria-labelledby="offerModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="offerModalLabel">Submit Offer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form>
    <div class="form-group">
        <label for="priceOffer">Price Offer</label>
        <input type="number" class="form-control" id="priceOffer" placeholder="Enter your price offer">
    </div>
    <div class="form-group">
        <label for="medium">Medium</label>
        <select class="form-control" id="medium" onchange="showSpecifyInput()">
            <option value="painting">Painting</option>
            <option value="drawing">Drawing</option>
            <option value="sculpture">Sculpture</option>
            <option value="photography">Photography</option>
            <option value="digital_art">Digital Art</option>
            <option value="others">Others</option>
            <!-- Add more options as needed -->
        </select>
    </div>
    <div class="form-group" id="otherMedium" style="display: none;">
        <label for="otherMediumInput">If others, please specify</label>
        <input type="text" class="form-control" id="otherMediumInput" placeholder="Specify other medium">
    </div>
    <div class="form-group">
        <label for="offerMessage">Message</label>
        <textarea class="form-control" id="offerMessage" rows="3" placeholder="Enter your message"></textarea>
    </div>
    <button type="button" class="btn btn-primary" onclick="submitOffer()">Submit Offer</button>
</form>

<script>
    function showSpecifyInput() {
        var selectElement = document.getElementById("medium");
        var otherMediumInput = document.getElementById("otherMedium");
        if (selectElement.value === "others") {
            otherMediumInput.style.display = "block";
        } else {
            otherMediumInput.style.display = "none";
        }
    }
</script>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
    <h5>Requests Taken</h5>
    <label for="categoryFilter">This section displays the number of requests taken out of a maximum of 10.</label>
    <?php
    // Fetch taken requests count from the database
    $takenRequestsCount = 5; // Assuming you have the count stored in a variable

    // Calculate percentage of taken requests
    $percentage = ($takenRequestsCount / 10) * 100;
    ?>
    <div class="progress">
        <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $percentage; ?>%;" aria-valuenow="<?php echo $takenRequestsCount; ?>" aria-valuemin="0" aria-valuemax="10"></div>
    </div>
    <div class="text-center mt-2"><?php echo $takenRequestsCount; ?>/10 taken</div>
    <ul class="list-group mt-3" id="requestsTaken">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <h6 class="mb-1">Requester: John Doe</h6>
                <small>Price Offered: $50</small>
            </div>
            <button class="btn btn-danger cancel-btn">Cancel</button>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <h6 class="mb-1">Requester: Jane Smith</h6>
                <small>Price Offered: $75</small>
            </div>
            <button class="btn btn-danger cancel-btn">Cancel</button>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <h6 class="mb-1">Requester: Laki Fukiku</h6>
                <small>Price Offered: $45</small>
            </div>
            <button class="btn btn-danger cancel-btn">Cancel</button>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <h6 class="mb-1">Requester: Mamam Opanot</h6>
                <small>Price Offered: $95</small>
            </div>
            <button class="btn btn-danger cancel-btn">Cancel</button>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <h6 class="mb-1">Requester: Tanggol Cardo</h6>
                <small>Price Offered: $15</small>
            </div>
            <button class="btn btn-danger cancel-btn">Cancel</button>
        </li>
        <!-- Add more list items here for each taken request -->
    </ul>
</div>
    </div>
    

<script>
function offerRequest() {
    $('#offerModal').modal('show');
}

function submitOffer() {
    // Your submission logic here
    alert('Offer submitted!');
    $('#offerModal').modal('hide');
}
</script>

</body>
</html>
