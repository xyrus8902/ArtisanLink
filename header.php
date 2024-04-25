<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>XyWinArd</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">XyWinArd</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#termsModal">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="display.php">Order Status</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Gallery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Artists</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About Us</a>
          </li>
          <li class="nav-item mx-5">
            <a class="nav-link" href="#"><i class="fas fa-sign-in-alt"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Terms and Conditions Modal -->
<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Add your terms and conditions here -->
        <p>This is where your terms and conditions content goes.</p>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="acceptCheckbox">
          <label class="form-check-label" for="acceptCheckbox">
            I have read and agree to the terms and conditions
          </label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="acceptTermsBtn" disabled>Accept</button>
      </div>
    </div>
  </div>
</div>

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  $(document).ready(function() {
    // Listen for changes in the checkbox
    $('#acceptCheckbox').change(function() {
      // If checkbox is checked, enable the accept button
      if ($(this).is(':checked')) {
        $('#acceptTermsBtn').prop('disabled', false);
      } else {
        // If checkbox is unchecked, disable the accept button
        $('#acceptTermsBtn').prop('disabled', true);
      }
    });

    $('#acceptTermsBtn').click(function() {
      // Show loading animation for 2 seconds using SweetAlert
      Swal.fire({
        title: 'Loading...',
        timer: 2000,
        timerProgressBar: true,
        showConfirmButton: false,
        allowOutsideClick: false,
        didOpen: () => {
          Swal.showLoading()
        },
        willClose: () => {
          // Redirect to services.php after loading animation
          window.location.href = 'services.php';
        }
      });
    });
  });
</script>
</body>

</html>
