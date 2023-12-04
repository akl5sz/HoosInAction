<!-- <?php echo "HoosInAction" ?> -->
<?php
session_start();
require("connect-db.php");
require("opportunity-db.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['deletebtn'])) {
        deleteOpp($_POST['organizationID'], $_POST['Date'], $_POST['Start'], $_POST['Location']);
    }
  }
if($_SESSION['memberID']){
    $id = $_SESSION['memberID'];
    $list_of_opportunities = getOrgOpportunity($id);
// var_dump($list_of_users);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<script>


</script>

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
                    <li><a href="/#" class="nav-link px-2 text-light">Home</a></li>
                    <?php if ($_SESSION['user_type'] == "Student") : ?>
                        <li><a href="/myopportunity.php" class="nav-link px-2 text-white">My Opportunities</a></li>
                    <?php elseif ($_SESSION['user_type'] == "Organization") : ?>
                        <li><a href="/organizationopportunity.php" class="nav-link px-2 text-white">Organization's Opportunities</a></li>
                        <li><a href="/add.php" class="nav-link px-2 text-white">Add/Modify Opportunities</a></li>
                    <?php endif; ?>
                </ul>
                <div class="text-end">
                    <?php if (!$_SESSION['user_type']) : ?>
                        <a href="/login.php"><button href="login.php" type="button" class="btn btn-outline-light me-2">Login</button> </a>
                    <?php else : ?>
                        <a href="/logout.php"><button href="logout.php" type="button" class="btn btn-outline-light me-2">Logout</button> </a>
                        <a href="/account.php"><button href="account.php" type="button" class="btn btn-outline-light me-2">Account</button> </a>
                    <?php endif; ?>
                </div>

            </div>
        </div>

    </div>
    <!-- Navbar -->

<!-- Background image -->
<div class="position-relative">
        <div class="p-5 text-center bg-image" style="background-image: url('https://fieldmethods.iath.virginia.edu/rotonda/sites/default/files/media/images/rotunda_night_summer_17_ss_header_5-2.jpg'); height: 400px; background-repeat: no-repeat; background-size: cover; background-position: center;">
          <div class="mask" style="background-color: rgba(0, 0, 0, 0.6); position: absolute; top: 0; left: 0; height: 100%; width: 100%;">
          </div>
          <div class="position-absolute top-50 start-50 translate-middle" style="transform: translate(-50%, -50%);">
            <div class="text-white">
                <!-- <img src="https://logos-world.net/wp-content/uploads/2021/11/UVA-Symbol.png" height="100px" style="display: inline-block;"> -->
                <h1 class="" style="display: inline-block;">HoosInAction</h1>
            </div>
          </div>
        </div>  
      </div>
     <!-- Background image -->
        
    <main>
    <div class="album py-5 bg-body-tertiary">
            <!-- DO NOT DELETE THIS -->
            <div class="container">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Organization ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Start Time</th>
                        <th scope="col">End Time</th>
                        <th scope="col">Location</th>
                        <th scope="col">Number Of Spots</th>
                        <th scope="col">Sign Up Deadline</th>
                    </tr>
                </thead>
                <?php foreach ($list_of_opportunities as $opportunity) : ?>
                    <tr>
                        <td><?php echo $opportunity['organizationID']; ?></td>
                        <td><?php echo $opportunity['Name']; ?></td>
                        <td><?php echo $opportunity['Date']; ?></td>
                        <td><?php echo $opportunity['Start Time']; ?></td>
                        <td><?php echo $opportunity['End Time']; ?></td>
                        <td><?php echo $opportunity['Location']; ?></td>
                        <td><?php echo $opportunity['Number_Of_Spots']; ?></td>
                        <td><?php echo $opportunity['Sign_Up_Deadline']; ?></td>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            </div>
        </div>
    </main>

    <footer class="text-body-secondary py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#">Back to top</a>
            </p>
            <p class="mb-1">©HoosInAction 2023</p>
            <!-- <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="/docs/5.3/getting-started/introduction/">getting started guide</a>.</p> -->
        </div>
    </footer>
    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>
