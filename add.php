<!-- <?php echo "HoosInAction" ?> -->
<?php
require("connect-db.php");
require("opportunity-db.php");
$list_of_opportunities = getAllOpportunities();
$list_of_orgs = getAllOrganizations();
// var_dump($list_of_users);

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (!empty($_POST['addBtn']))
    {
        addOpportunity($_POST['org'],$_POST['date'],$_POST['start_time'],$_POST['end_time'],$_POST['location'],$_POST['name'],$_POST['num_spots'],$_POST['deadline'], $_POST['description']);
        $list_of_opportunities = getAllOpportunities();
    }
    else if (!empty($_POST['updateBtnConfirm']))
    {
        updateOpportunity($_POST['org'],$_POST['date'],$_POST['start_time'],$_POST['end_time'],$_POST['location'],$_POST['name'],$_POST['num_spots'],$_POST['deadline'], $_POST['description']);
        $list_of_opportunities = getAllOpportunities();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        h1 {text-align: center;}
    </style>
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



    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check2" viewBox="0 0 16 16">
            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"></path>
        </symbol>
        <symbol id="circle-half" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"></path>
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
            <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"></path>
            <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"></path>
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"></path>
        </symbol>
    </svg>

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
        <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (light)">
            <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
                <use href="#sun-fill"></use>
            </svg>
            <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="light" aria-pressed="true">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#sun-fill"></use>
                    </svg>
                    Light
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#moon-stars-fill"></use>
                    </svg>
                    Dark
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="auto" aria-pressed="false">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#circle-half"></use>
                    </svg>
                    Auto
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
        </ul>
    </div>

    <header class="p-3 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">My Opportunities</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
                </form>

                <div class="text-end">
                    <a href="login.php"><button href="login.php" type="button" class="btn btn-outline-light me-2">Login</button> </a>
                    <a href="register.php" class="btn btn-warning" role="button">Sign-up</a>
                </div>
            </div>
        </div>
    </header>

    <main> 
    <div class="container">
        <p></p>
        <h1> Add an Opportunity</h1>
        <form name="Opportunities" action="add.php" method="post">
            <div class="row mb-3 mx-3">
                <label for="org"> Organization: </label>
                <select name="org" required value="<?php echo $_POST['org_to_update']; ?>">
                <?php foreach ($list_of_orgs as $org) : ?>
                    <option> <?php echo $org['organizationID']; ?></option>
                <?php endforeach; ?>
                </select>
            </div> 
            <div class="row mb-3 mx-3">
                Date:
                <input type="date" class="form-control" name="date" required value="<?php echo $_POST['date_to_update']; ?>"/>
            </div>
            <div class="row mb-3 mx-3">
                Start Time:
                <input type="time" class="form-control" name="start_time" required value="<?php echo $_POST['start_time_to_update']; ?>"/>                
            </div>
            <div class="row mb-3 mx-3">
                   End Time:
            <input type="time" class="form-control" name="end_time" required value="<?php echo $_POST['end_time_to_update']; ?>"/>
            </div>
            <div class="row mb-3 mx-3">
                Location:
                <input type="text" class="form-control" name="location" required value="<?php echo $_POST['location_to_update']; ?>"/>
            </div>
            <div class="row mb-3 mx-3">
                Name:
                <input type="text" class="form-control" name="name" required value="<?php echo $_POST['name_to_update']; ?>"/>
            </div>
            <div class="row mb-3 mx-3">
                Number of Spots:
                <input type="number" class="form-control" name="num_spots" required value="<?php echo $_POST['spots_to_update']; ?>"/>
            </div>
            <div class="row mb-3 mx-3">
                Sign Up Deadline:
                <input type="date" class="form-control" name="deadline" required value="<?php echo $_POST['deadline_to_update']; ?>"/>
            </div>
            <div class="row mb-3 mx-3">
                Description:
                <input type="text" class="form-control" name="description" required value="<?php echo $_POST['description_to_update']; ?>"/>
            </div>
            <div class="row mb-3 mx-3">
                <input type="submit" value="Add Opportunity" name="addBtn" class="btn btn-primary" title="Add an opportunity" />
            </div>
            <div class="row mb-3 mx-3">
                <input type="submit" value="Update Event" name="updateBtnConfirm" class="btn btn-secondary" title="Update event" />
            </div>
        </form> 
    </div>

    <div class="container">
    <div class="album py-5 bg-body-tertiary">
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">Organization ID</th>
                <th scope="col">Date</th>
                <th scope="col">Start Time</th>
                <th scope="col">End Time</th>
                <th scope="col">Location</th>
                <th scope="col">Name</th>
                <th scope="col">Number Of Spots</th>
                <th scope="col">Sign Up Deadline</th>
                <th scope="col">Description</th>
                <th scope="col">Edit</th>
            </tr>
        </thead>
        <?php foreach ($list_of_opportunities as $opportunity) : ?>
            <tr>
                <td><?php echo $opportunity['organizationID']; ?></td>
                <td><?php echo $opportunity['Date']; ?></td>
                <td><?php echo $opportunity['Start Time']; ?></td>
                <td><?php echo $opportunity['End Time']; ?></td>
                <td><?php echo $opportunity['Location']; ?></td>
                <td><?php echo $opportunity['Name']; ?></td>
                <td><?php echo $opportunity['Number_Of_Spots']; ?></td>
                <td><?php echo $opportunity['Sign_Up_Deadline']; ?></td>
                <td><?php echo $opportunity['Description']; ?></td>
                <td>
                <form action="add.php" method="post">
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