<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>XyWinArd - Traditional Graphite Arts</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <!-- Include Header -->
  <header>
    <!-- Include header.html -->
    <?php include 'header.php' ?>
  </header>

  <!-- Hero Section -->
  <section id="hero" class="py-5" style="background-image: url('https://via.placeholder.com/1200x600');">
    <div class="container text-center text-white my-5">
      <h1>Welcome to XyWinArd</h1>
      <p class="lead">Experience the beauty of Traditional Graphite Arts</p>
      <a href="#" class="btn btn-primary btn-lg">Explore Gallery</a>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="bg-light py-5">
    <div class="container py-5">
      <h2 class="text-center">About XyWinArd</h2>
      <p>XyWinArd is a haven for traditional graphite art lovers. We specialize in showcasing stunning artworks crafted with meticulous attention to detail using graphite pencils. Our gallery features a diverse collection of graphite masterpieces, from portraits to landscapes and more.</p>
      <p>Whether you're an art enthusiast, collector, or looking for inspiration, XyWinArd is the place to immerse yourself in the world of traditional graphite arts.</p>
    </div>
  </section>

  <!-- Services Section -->
  <section id="services" class="py-5">
    <div class="container">
      <h2 class="text-center mb-4">Our Services</h2>
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Art Exhibitions</h5>
              <p class="card-text">Join us for our regular art exhibitions featuring talented graphite artists from around the world.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Art Classes</h5>
              <p class="card-text">Explore your creativity with our art classes tailored for beginners and experienced artists alike.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Commissioned Artworks</h5>
              <p class="card-text">Get a custom graphite artwork created by our talented artists to cherish forever.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Include Footer -->
  <footer class="bg-dark text-white py-5">
    <!-- Include footer.html -->
    <?php include 'footer.php' ?>
  </footer>

  <!-- Bootstrap JS, Popper.js, and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
