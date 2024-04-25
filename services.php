<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "art_service_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = ""; // Initialize message variable

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $type = $_POST['type'];
    $size = $_POST['size'];
    $frame = $_POST['frame'];
    $heads = $_POST['heads'];
    $cost = $_POST['cost'];
    $certify = isset($_POST['certify']) ? $_POST['certify'] : 'no';
    $payment_type = $_POST['payment_type'];
    $payment_mode = $_POST['payment_mode'];
    $delivery_type = $_POST['delivery_type'];

    // Form validation
    if (empty($name) || empty($email) || empty($contact) || empty($address) || empty($type) || empty($size) || empty($frame) || empty($heads) || empty($cost) || empty($certify) || empty($payment_type) || empty($payment_mode) || empty($delivery_type)) {
        $message = "Please fill out all required fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format.";
    } elseif (!is_numeric($heads) || !is_numeric($cost)) {
        $message = "Heads and Cost should be numeric.";
    } else {
        // Prepare SQL statement to insert data
        $sql = "INSERT INTO art_service_form (name, email, contact, address, type, size, frame, heads, cost, certify, payment_type, payment_mode, delivery_type)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare and bind parameters
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssssss", $name, $email, $contact, $address, $type, $size, $frame, $heads, $cost, $certify, $payment_type, $payment_mode, $delivery_type);

        // Execute the statement
        if ($stmt->execute()) {
            $message = "Form data successfully submitted and saved to the database.";
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Art Service Form</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <!-- Animate.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">


</head>
<body>

<header>
    <!-- Include header.html -->
    <?php include 'header.php' ?>
  </header>

  <div class="animate__animated animate__slideInLeft container mt-5">
    <h2>Art Service Form</h2>
    <?php if (!empty($message)) echo '<div class="alert alert-info">' . $message . '</div>'; ?>
    <form class="mx-5 my-3" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      
      <!-- Customer Information -->
      <div class="section-header">
        <h3>Customer Information</h3>
      </div>
      
      <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="contact">Contact Number:</label>
                <input type="text" class="form-control" id="contact" name="contact" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" id="address" name="address" required></textarea>
            </div>
        </div>
      </div>
      
      <!-- Service Information -->
      <div class="section-header">
        <h3>Service Information</h3>
      </div>
      <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="type">Type of Art:</label>
                <select class="form-control" id="type" name="type" required>
                <option value="Traditional">Traditional</option>
                <option value="Digital">Digital</option>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="size">Size:</label>
                <select class="form-control" id="size" name="size" onchange="calculateCost()" required>
                <option value="A4" data-price="500" data-heads="2">A4</option>
                <option value="A3" data-price="900" data-heads="5">A3</option>
                <option value="8x13" data-price="500" data-heads="2">8x13</option>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="frame">With Frame?</label>
                <select class="form-control" id="frame" name="frame" onchange="calculateCost()" required>
                <option value="no" data-price="0">No</option>
                <option value="yes" data-price="150">Yes</option>
                </select>
            </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-4">
            <div class="form-group" id="headsGroup">
                <label>How many Heads:</label><br>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="heads1" name="heads" value="1" onchange="calculateCost()">
                <label class="form-check-label" for="heads1">1</label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="heads2" name="heads" value="2" onchange="calculateCost()">
                <label class="form-check-label" for="heads2">2</label>
                </div>
                <!-- Additional radio buttons for A3 -->
                <div class="form-check form-check-inline" id="additionalHeadsGroup" style="display: none;">
                <input class="form-check-input" type="radio" id="heads3" name="heads" value="3" onchange="calculateCost()">
                <label class="form-check-label" for="heads3">3</label>
                </div>
                <div class="form-check form-check-inline" id="additionalHeadsGroup2" style="display: none;">
                <input class="form-check-input" type="radio" id="heads4" name="heads" value="4" onchange="calculateCost()">
                <label class="form-check-label" for="heads4">4</label>
                </div>
                <div class="form-check form-check-inline" id="additionalHeadsGroup3" style="display: none;">
                <input class="form-check-input" type="radio" id="heads5" name="heads" value="5" onchange="calculateCost()">
                <label class="form-check-label" for="heads5">5</label>
                </div>
            </div>
        </div>
        <div class="col-md-8">
        <!-- Display Cost -->
            <div class="form-group">
                <label for="cost">Cost:</label>
                <input type="text" class="form-control" id="cost" name="cost" readonly>
            </div>
        </div>
      </div>
      
      <!-- Checkbox for "I hereby certify..." -->
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="certify" name="certify" required>
        <label class="form-check-label" for="certify">I hereby certify that the information provided is true and accurate to the best of my knowledge.</label>
      </div>
      
      <!-- Image Upload -->
      <div class="form-group">
        <label for="image">Insert Image of Picture Assignment:</label>
        <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
      </div>
      
      
      
      <!-- Payment Information -->
      <div class="section-header">
        <h3>Payment Information</h3>
      </div>
      <div class="form-group">
        <label for="payment_type">Type of Payment:</label>
        <select class="form-control" id="payment_type" name="payment_type" required>
          <option value="Down Payment Policy and Last Payment on Delivery">Down Payment Policy and Last Payment on Delivery</option>
          <option value="Payment First">Payment First</option>
        </select>
      </div>
      <div class="form-group">
        <label for="payment_mode">Mode of Payment:</label>
        <select class="form-control" id="payment_mode" name="payment_mode" required>
          <option value="Cash">Cash</option>
          <option value="Gcash">Gcash</option>
          <option value="Paymaya">Paymaya</option>
        </select>
      </div>
      
      <!-- Delivery Type -->
      <div class="form-group">
        <label for="delivery_type">Delivery Type:</label>
        <select class="form-control" id="delivery_type" name="delivery_type" required>
          <option value="Lalamove">Lalamove</option>
          <option value="Meetup">Meetup</option>
        </select>
      </div>
      
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <!-- Include Footer -->
  <footer class="bg-dark text-white py-5">
    <!-- Include footer.html -->
    <?php include 'footer.php' ?>
  </footer>
  <script>
  function calculateCost() {
    var size = document.getElementById('size');
    var selectedSize = size.options[size.selectedIndex];
    var price = parseFloat(selectedSize.getAttribute('data-price'));
    
    // Get the selected value from the radio buttons
    var selectedHeads = document.querySelector('input[name="heads"]:checked');
    var heads = 0;
    if (selectedHeads) {
      heads = parseFloat(selectedHeads.value);
    }
    
    var frame = document.getElementById('frame').value;
    var framePrice = (selectedSize.value === 'A3') ? 300 : ((frame === 'yes') ? 150 : 0);
    
    var totalCost = price * heads + framePrice;
    
    document.getElementById('cost').value = totalCost.toFixed(2);
    
    // Show/hide additional heads checkboxes for A3
    if (selectedSize.value === 'A3') {
      document.getElementById('additionalHeadsGroup').style.display = 'inline-block';
      document.getElementById('additionalHeadsGroup2').style.display = 'inline-block';
      document.getElementById('additionalHeadsGroup3').style.display = 'inline-block';
    } else {
      document.getElementById('additionalHeadsGroup').style.display = 'none';
      document.getElementById('additionalHeadsGroup2').style.display = 'none';
      document.getElementById('additionalHeadsGroup3').style.display = 'none';
    }
  } 
  
  </script>

</body>
</html>
