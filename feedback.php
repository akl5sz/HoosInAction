<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require("connect-db.php");
require("feedback-db.php");

$organizationID = $_GET['organizationID'];
$list_of_feedback = getFeedbackPerOrg($organizationID);
//  echo $organizationID;
//  var_dump($list_of_feedback);

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (!empty($_POST['addBtn']))
    {
        addFeedback($_POST['name'],$_POST['orgoID'],$_POST['description']);
        $list_of_opportunities = getFeedbackPerOrg($organizationID);
    }
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
                    <?php if ($_SESSION['user_type'] == "Student") : ?>
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
                    <h1 class="" style="display: inline-block;"><?php echo $organizationID; ?></h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Picture Header -->

    <!-- Feedback Cards -->
    <main>
        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <?php foreach ($list_of_feedback as $feedback) : ?>
                    <div class="row p-3">
                        <div class="col">
                            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col p-4 d-flex flex-column position-static">
                                    <strong class="d-inline-block mb-2 text-primary-emphasis text-left"><?php echo $feedback['studentID']; ?></strong>
                                    <p class="card-text mb-auto"><?php echo $feedback['Comments']; ?></p>
                                    <!-- <div class="d-flex justify-content-end">
                                        <form action="feedback.php" method="post">
                                        <input type="submit" name="updateBtn" value="Update" class="btn btn-secondary" />
                                        <input type="hidden" name="org_to_update" value="<?php echo $opportunity['organizationID']; ?>" />
                                        <input type="hidden" name="date_to_update" value="<?php echo $opportunity['Date']; ?>" />
                                        <input type="hidden" name="start_time_to_update" value="<?php echo $opportunity['Start Time']; ?>" />
                                        <input type="hidden" name="end_time_to_update" value="<?php echo $opportunity['End Time']; ?>" />
                                        <input type="hidden" name="location_to_update" value="<?php echo $opportunity['Location']; ?>" />
                                        <input type="hidden" name="name_to_update" value="<?php echo $opportunity['Name']; ?>" />
                                        <input type="hidden" name="spots_to_update" value="<?php echo $opportunity['Number_Of_Spots']; ?>" />
                                        <input type="hidden" name="deadline_to_update" value="<?php echo $opportunity['Sign_Up_Deadline']; ?>" />
                                        <input type="hidden" name="description_to_update" value="<?php echo $opportunity['Description']; ?>" />
                                        </form>
                                    </div>  -->
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- <div class="row p-3">
                    <div class="col d-flex justify-content-center">
                        <button type="button" class="btn btn-outline-primary">Add Comment</button>
                    </div>
                </div> -->
            </div>
        </div>
    </main>
    <!-- Feedback Cards -->
    <div class="container">
        <p></p>
        <h1> Add a Comment</h1>
        <form name="feedbackForm" action="feedback.php" method="post">
            <div class="row mb-3 mx-3">
                Username:
                <input type="text" class="form-control" name="name" required value="<?php echo $_SESSION['user'] ?>" readonly/>
            </div>
            <div class="row mb-3 mx-3">
                Organization Id:
                <input type="text" class="form-control" name="orgoID" required value="<?php echo $organizationID ?>" readonly/>
            </div>
            <div class="row mb-3 mx-3">
                Description:
                <input type="text" class="form-control" name="description" required value="<?php echo $_POST['description_to_update']; ?>"/>
            </div>
            <div class="row mb-3 mx-3">
                <input type="submit" value="Add Comment" name="addBtn" class="btn btn-primary" title="Add a comment" />
            </div>
            <!-- <div class="row mb-3 mx-3">
                <input type="submit" value="Update Feedback" name="updateBtnConfirm" class="btn btn-secondary" title="Update event" />
            </div> -->
        </form> 
    </div>
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