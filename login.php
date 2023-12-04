<?php
require("connect-db.php");
require("opportunity-db.php");
require("user-db.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['loginBtn'])) {
      $id = getUserID($_POST['email']);
      $password = getPassword($id[0]['memberID']);
      $incoming_password = htmlspecialchars($password[0]['password']);
      $passwordHash = password_hash($incoming_password, PASSWORD_DEFAULT);
        //check password with hash
        $post_password = htmlspecialchars($_POST['password']);
      if(password_verify($post_password, $passwordHash)){
        session_start();
        $_SESSION['memberID'] = $id[0]['memberID'];
        header("Location: /main.php");
        exit();
      }
      else{
        echo '<script>alert("Password and Email do not match.")</script>'; 
      }

    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;1,200;1,300;1,400&family=Roboto:ital,wght@0,300;0,400;0,500;1,300;1,500&display=swap" rel="stylesheet">
    <style>
        .container {
            padding: 20px 20px 20px 20px;
            margin: auto;
            width: 600px;
            height: 650px;
            margin-top: 150px;
            margin-bottom: 150px;
            background-color:rgb(0, 10, 10);
        }
        h1{
            color:rgb(255, 255, 255);
        }

        label{
            color:white;
            font-family: 'Roboto', 'Poppins', Arial, Helvetica, sans-serif
        }

        .login {
            background-color:rgb(225, 225, 225);
        }

        .form-group1, .form-group2{
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
        a{
          color: rgb(230, 149, 0) ;
          text-decoration: none;
        }

    </style>
</head>
<body class = "login">
    <div class= "container">
        <h1>login.</h1> 
        <p>Do not have an account? <a class="register-link" href="register.php">register</a></p>
        <form name="loginform" action="login.php" method="post">>
            <div class="row">
                <div class = "form-group1">
                        <label for="label-email"> Email Address</label>
                        <input type="email" class="form-control" id="input-email" name="email" placeholder="Enter email address">
                </div>
            </div>

            <div class = "form-group2">
                <label for="label-password"> Enter password</label>
                <input type="password" class="form-control" id="input-password" name="password" placeholder="Enter password">
            </div>

            <input type="submit" value="Login" name="loginBtn" class="btn btn-primary"/>
        </form>


    </div>
</body>
</html>