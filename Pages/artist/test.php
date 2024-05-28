<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two Columns with Horizontal Cards and Scroll using Bootstrap</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Content for the first column with horizontal scroll -->
                <div class="overflow-auto" style="white-space: nowrap;">
                    <div class="card d-inline-block mb-3 flex-row" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Card 1</h5>
                            <p class="card-text">Content for card 1 in column 1.</p>
                        </div>
                    </div>
                    <div class="card d-inline-block mb-3 flex-row" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Card 2</h5>
                            <p class="card-text">Content for card 2 in column 1.</p>
                        </div>
                    </div>
                    <div class="card d-inline-block mb-3 flex-row" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Card 3</h5>
                            <p class="card-text">Content for card 3 in column 1.</p>
                        </div>
                    </div>
                    <div class="card d-inline-block mb-3 flex-row" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Card 4</h5>
                            <p class="card-text">Content for card 4 in column 1.</p>
                        </div>
                    </div>
                    <div class="card d-inline-block mb-3 flex-row" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Card 5</h5>
                            <p class="card-text">Content for card 5 in column 1.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Content for the second column -->
                <div class="card mb-3 flex-row">
                    <div class="card-body">
                        <h5 class="card-title">Card 1</h5>
                        <p class="card-text">Content for card 1 in column 2.</p>
                    </div>
                </div>
                <div class="card mb-3 flex-row">
                    <div class="card-body">
                        <h5 class="card-title">Card 2</h5>
                        <p class="card-text">Content for card 2 in column 2.</p>
                    </div>
                </div>
                <div class="card mb-3 flex-row">
                    <div class="card-body">
                        <h5 class="card-title">Card 3</h5>
                        <p class="card-text">Content for card 3 in column 2.</p>
                    </div>
                </div>
                <div class="card mb-3 flex-row">
                    <div class="card-body">
                        <h5 class="card-title">Card 4</h5>
                        <p class="card-text">Content for card 4 in column 2.</p>
                    </div>
                </div>
                <div class="card mb-3 flex-row">
                    <div class="card-body">
                        <h5 class="card-title">Card 5</h5>
                        <p class="card-text">Content for card 5 in column 2.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
