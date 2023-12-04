<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require("connect-db.php");
require("opportunity-db.php");
$list_of_opportunities = getAllOpportunities();
// var_dump($list_of_users);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body data-new-gr-c-s-check-loaded="14.1136.0" data-gr-ext-installed="" data-new-gr-c-s-loaded="14.1136.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Navbar -->
    <div class="p-3" style="background-color: #141e3c;">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><img src="https://logos-world.net/wp-content/uploads/2021/11/UVA-Symbol.png" height="40px"></li>
                    <li><a href="#" class="nav-link px-2 text-light">Home</a></li>
                    <?php if($_SESSION['user_type']=="Student") : ?>
                    <li><a href="#" class="nav-link px-2 text-white">My Opportunities</a></li>
                    <?php else : ?>
                    <li><a href="#" class="nav-link px-2 text-white">Organization's Opportunities</a></li>
                    <li><a href="/add.php" class="nav-link px-2 text-white">Add/Modify Opportunities</a></li>
                    <?php endif; ?>
                </ul>
                <div class="text-end">
                    <?php if (!$_SESSION['user_type']) : ?>
                        <a href="login.php"><button href="login.php" type="button" class="btn btn-outline-light me-2">Login</button> </a>
                    <?php else : ?>
                        <a href="logout.php"><button href="logout.php" type="button" class="btn btn-outline-light me-2">Logout</button> </a>
                    <?php endif; ?>
                </div>

            </div>
        </div>

    </div>
    <!-- Navbar -->

    <!-- Picture Header -->
    <div class="position-relative">
        <div class="p-5 text-center bg-image" style="background-image: url('https://fieldmethods.iath.virginia.edu/rotonda/sites/default/files/media/images/rotunda_night_summer_17_ss_header_5-2.jpg'); height: 400px; background-repeat: no-repeat; background-size: cover; background-position: center;">
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.6); position: absolute; top: 0; left: 0; height: 100%; width: 100%;">
            </div>
            <div class="position-absolute top-50 start-50 translate-middle" style="transform: translate(-50%, -50%);">
                <div class="text-white">
                    <h1 class="" style="display: inline-block;">HoosInAction</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Picture Header -->

    <!-- Volunteer Cards -->
    <main>
        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <?php foreach ($list_of_opportunities as $opportunity) : ?>
                    <div class="row p-3">
                        <div class="col">
                        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col p-4 d-flex flex-column position-static">
                                <strong class="d-inline-block mb-2 text-primary-emphasis text-left">@<?php echo $opportunity['organizationID']; ?></strong>
                                <h3 class="mb-0"><?php echo $opportunity['Name']; ?></h3>
                                <div class="mb-1 text-body-secondary"><?php echo $opportunity['Date']; ?> • <?php echo $opportunity['Start Time']; ?> to <?php echo $opportunity['End Time']; ?></div>
                                <p class="card-text mb-auto"><?php echo $opportunity['Description']; ?></p>
                                <small class="text-body-secondary">at <?php echo $opportunity['Location']; ?></small>   
                                <?php if($_SESSION['user_type']=="Student") : ?>
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-sm btn-outline-primary">Sign Up</button>
                                </div> 
                                <?php endif; ?>
                            </div>
                            <div class="col-auto d-none d-lg-block">
                                <svg class="bd-placeholder-img" width="300" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c"></rect>
                                    <text x="50%" y="50%" fill="#eceeef" text-anchor="middle" dominant-baseline="middle">Thumbnail</text>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <?php endforeach; ?> -->
            </div>
        </div>
    </main>
    <!-- Volunteer Cards -->

    <!-- Footer -->
    <footer class="text-body-secondary py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#">Back to top</a>
            </p>
            <p class="mb-1">©HoosInAction 2023</p>
        </div>
    </footer>
    <!-- Footer -->

    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>