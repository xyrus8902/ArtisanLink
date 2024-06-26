<!-- patron_header.php -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand mx-5" href="index.html">ArtisanLink</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" style="padding-left: 50px;">
                <li class="nav-item">
                    <a class="nav-link" href="patron_profile.php">My Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="patron_artists.php">Artists</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="patron_my_offers.php">My Offers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="patron_messages.php">Messages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="patron_favorites.php">Favorites</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php
                        $profile_picture = isset($user['profile_picture']) ? $user['profile_picture'] : '../../uploads/defaultpic.png';
                        ?>
                        <img src="<?php echo '../uploads/' . htmlspecialchars($profile_picture); ?>" class="rounded-circle mr-2" style="width: 30px; height: 30px;" alt="Profile Image">
                        <?php echo htmlspecialchars($user['lastName']) . ' (' . htmlspecialchars($user['role']) . ')'; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Edit Profile</a>
                        <a class="dropdown-item" href="#">Help Desk</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../../logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
