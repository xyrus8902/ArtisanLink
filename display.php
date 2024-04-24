<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Localhost Data Table</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Your custom styles can still be added here */
        /* table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        } */
    </style>
</head>
<body>
    <div class="container-fluid">
        <h2>Localhost Data Table</h2>
        <table class="table table-striped table-bordered" id="data-table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Type</th>
                    <th>Size</th>
                    <th>Frame</th>
                    <th>Heads</th>
                    <th>Cost</th>
                    <th>Certify</th>
                    <th>Payment Type</th>
                    <th>Payment Mode</th>
                    <th>Delivery Type</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody id="table-body">
                <?php
                // Database connection parameters
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "art_service_db";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // SQL query to fetch data from art_service_form table
                $sql = "SELECT * FROM art_service_form";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td>".$row['contact']."</td>";
                        echo "<td>".$row['address']."</td>";
                        echo "<td>".$row['type']."</td>";
                        echo "<td>".$row['size']."</td>";
                        echo "<td>".$row['frame']."</td>";
                        echo "<td>".$row['heads']."</td>";
                        echo "<td>".$row['cost']."</td>";
                        echo "<td>".$row['certify']."</td>";
                        echo "<td>".$row['payment_type']."</td>";
                        echo "<td>".$row['payment_mode']."</td>";
                        echo "<td>".$row['delivery_type']."</td>";
                        echo "<td>".$row['image']."</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "0 results";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS (Optional, only needed for some features like dropdowns, etc.) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
