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

// Fetch data from the requests table
$sql = "SELECT * FROM requests";
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
    <style>
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
            column-count: 4;
        }
        .card {
            margin-bottom: 20px;
        }
        .pagination-container {
            margin-top: 20px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.min.js"></script>
    <script>
        $(document).ready(function(){
            var items = $(".card");
            var numItems = items.length;
            var perPage = 4;

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

<div class="container mt-5 py-5">
    <div class="card-columns text-center" id="requestCards">
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<div class="card">';
                echo '<img src="'. $row["image"] .'" class="card-img-top mt-3" alt="Sample Image" style="width: 150px; height: 150px;">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">'. $row["name"] .'</h5>';
                echo '<h6 class="card-subtitle mb-2 text-muted">'. $row["category"] .'</h6>';
                echo '<p class="card-text"><strong>Medium:</strong> '. $row["medium"] .'</p>';
                echo '<p class="card-text"><strong>Size:</strong> '. $row["size"] .'</p>';
                echo '<p class="card-text"><strong>Contact:</strong> '. $row["contact"] .'</p>';
                echo '<p class="card-text"><strong>Description:</strong> '. $row["description"] .'</p>';
                echo '<button class="btn btn-primary" onclick="offerRequest()">Take Request</button>';
                echo '</div>';
                echo '</div>';
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
                        <label for="offerMessage">Message</label>
                        <textarea class="form-control" id="offerMessage" rows="3" placeholder="Enter your message"></textarea>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="submitOffer()">Submit Offer</button>
                </form>
            </div>
        </div>
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
