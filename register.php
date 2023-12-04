<?php
session_start();

require("connect-db.php");
require("opportunity-db.php");
require("user-db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (!empty($_POST['addBtn'])) {
    addUser($_POST['memberID'], $_POST['password']);
    addStudent($_POST['memberID'],$_POST['fname'], $_POST['lname']);
    addUser_emails($_POST['memberID'],$_POST['email']);
    addStudent_phone($_POST['memberID'],$_POST['phone']);

    $_SESSION['memberID'] = $id[0]['memberID'];
    $_SESSION['user'] = $id[0]['memberID'];
    $_SESSION['user_type'] = "Student";
  }

  if (!empty($_POST['addBtn2'])) {
    addUser($_POST['OrgID'], $_POST['password']);
    addOrganization($_POST['OrgID'],$_POST['OrgName'], $_POST['description']);
    addUser_emails($_POST['OrgID'],$_POST['email']);
    $_SESSION['memberID'] = $id[0]['memberID'];
    $_SESSION['user'] = $id[0]['memberID'];
    $_SESSION['user_type'] = "Organization";
  }
  header("Location: /main.php");
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;1,200;1,300;1,400&family=Roboto:ital,wght@0,300;0,400;0,500;1,300;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    $(document).ready( function() {
        $("a#org").click( function (){
            var student = document.getElementById('stu');
            $(student).removeClass("active");
            $(student).addClass("inactive");
            
            
            $(this).addClass('active');
            $(this).removeClass('inactive');
            
            
            var orgform = document.getElementById('organizationform');
            orgform.hidden= false;

            var stuform = document.getElementById('studentform');
            stuform.hidden= true;
            
        });

        $("a#stu").click( function (){ 
            var orgform = document.getElementById('organizationform');
            orgform.hidden= true;

            var stuform = document.getElementById('studentform');
            stuform.hidden= false;
      
            $(this).addClass("active");
            $(this).removeClass('inactive');
            

            var org = document.getElementById('organization');
            $(org).removeClass("active");
            $(org).addClass("inactive");
        
        
            
      
         });

        $("a#org").on("mouseover", function() {
            $(this).addClass("orange");
            $(this).removeClass("gray");
            var student = document.getElementById("stu");
            $(student).addClass("gray");
            $(student).removeClass("orange");
        });

        $("a#org").on("mouseout", function() {
            $(this).removeClass("orange");
            $(this).removeClass("gray");
            var student = document.getElementById("stu");
            $(student).removeClass("gray");
            $(student).removeClass("orange");
        });

        $("a#stu").on("mouseover", function() {
            $(this).addClass("orange");
            $(this).removeClass("gray");
            var student = document.getElementById("org");
            $(student).addClass("gray");
            (student).removeClass("orange");
        });

        $("a#stu").on("mouseout", function() {
            $(this).removeClass("orange");
            $(this).removeClass("gray");
            var student = document.getElementById("org");
            $(student).removeClass("gray");
            $(student).removeClass("orange");
        });

    });
</script>
    <style>
        .container {
            padding: 20px 20px 20px 20px;
            margin: auto;
            width: 600px;
            height: 650px;
            margin-top: 150px;
            margin-bottom: 150px;
            background-color:#2a3656;
        }
        h1{
            color:rgb(255, 255, 255);
        }

        label{
            color:white;
            font-family: 'Roboto', 'Poppins', Arial, Helvetica, sans-serif
        }

        .register {
            background-color:rgb(225, 225, 225);
        }

        h2{
            margin-top: -20px;
            margin-left: 45px;
        }

        .col-6{
            padding-bottom: 20px;
        }

        .btn-primary:hover {
            background-color: rgb(255, 188, 62) !important;
            border-color: rgb(255, 188, 62) !important;
           
        }

        .btn-primary{
            margin-bottom: 100px !important;
            right: 100px !important;
            background-color: rgb(230, 149, 0)  !important;
            border-color:  rgb(230, 149, 0) !important;
        }

        p{
          color: white;
        }
        a.login-link{
          color: rgb(230, 149, 0) ;
        }
        
        .orgclass:hover {
            text-decoration: none;           
        }

        #stu:hover {
            text-decoration: none;           
        }
        .active{
                    color: rgb(230, 149, 0)  !important;
                }
        .inactive{
            color: gray !important;
        }
        
        
       
        /* .active{
            color: rgb(230, 149, 0)  !important;
        }
        .inactive{
            color: gray  !important;
        } */

        .gray{
            color: gray !important;
        }

        .orange{
            color: rgb(230, 149, 0)  !important;
        }

        #buttonform #stubutton{
            margin-top: 20px  !important;
        }

        .form-group04{
            margin-top: 20px;
        }
        #phoneinfo{
            color: white  !important;
        }
        a.stuclass a.orgclass{
            color: gray !important;
        }
        

    </style>
</head>
<body class = "register">
    <div class= "container">
        <h1>register.</h1> 
        <h2 id="student"><a class = "stuclass active" id="stu">as a student</a></h2>
        <h2 id="organization"><a class = "orgclass inactive" id="org">as an organization</a></h2>
        <p>Already have an account?<a class="login-link" href="login.php">Login</a></p>
        <form name="registerform" id = "studentform" action="register.php" method="post">
        <div class="row">
        <div class="col-6">
            <div class = "form-group1">
                <label for="label-fname"> First Name</label>
                <input type="text" class="form-control" id="input-fname" name="fname" placeholder="Enter first name">
            </div>
        </div>
        <div class="col-6">
            <div class = "form-group2">
                <label for="label-lname"> Last Name</label>
                <input type="text" class="form-control" id="input-lname" name="lname" placeholder="Enter last name">
            </div>
        </div>
        <div class="col-6">
            <div class = "form-group3">
                <label for="label-id"> Enter Student ID</label>
                <input type="text" class="form-control" id="input-id" name="memberID" placeholder="Enter student id">
                </div>
        </div>
        <div class="col-6">
            <div class = "form-group4">
                <label for="label-phone"> Enter Phone Number</label>
                <input type="tel" class="form-control" id="input-phone" name="phone" placeholder="Enter phone number">
                <small id="phoneinfo" class="form-text text-muted">You'll be able to enter more phone numbers later.</small>
            </div>
        </div>
        <div class = "form-group" id = "adjust">
            <label for="label-email"> Email Address</label>
            <input type="email" class="form-control" id="input-email" name="email" placeholder="Enter email address">
        </div>
        <div class = "form-group">
            <label for="label-password"> Enter password</label>
            <input type="password" class="form-control" id="input-password" name="password" placeholder="Enter password">
            </div>
        </div>
            <input type="submit" id="stubutton" value="Add user" name="addBtn" class="btn btn-primary"/>
        </form>

        <form name="registerform" id = "organizationform" action="register.php" method="post" hidden>
            <div class="row">
                <div class="col-6">
                    <div class = "form-group01">
                        <label for="label-oname"> Organization Name</label>
                        <input type="text" class="form-control" id="input-oname" name="OrgName" placeholder="Enter organization name">
                    </div>
                </div>
                <div class="col-6">
                    <div class = "form-group02">
                        <label for="label-oidname"> Organization ID</label>
                        <input type="text" class="form-control" id="input-oidname" name="OrgID" placeholder="Enter organization ID">
                    </div>
                </div>
                <div class = "form-group03">
                        <label for="label-text"> Description</label>
                        <textarea class="form-control" id="input-description" name="description" placeholder="Enter organization description" rows="3"></textarea>
                </div>
                <div class = "form-group04">
                        <label for="label-email"> Email Address</label>
                        <input type="email" class="form-control" id="input-email" name="email" placeholder="Enter email address">
                </div>
                    <div class = "form-group05">
                        <label for="label-password"> Enter password</label>
                        <input type="password" class="form-control" id="input-password" name="password" placeholder="Enter password">
                    </div>
                </div>

                <input id = "buttonform" type="submit" value="Add user" name="addBtn2" class="btn btn-primary" style=" margin-top: 20px;"/>
            
        </form>

    </div>
</body>
</html>