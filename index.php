<?php
session_start();
switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
   case '/':                   // URL (without file name) to a default screen
      require 'main.php';
      break; 
   case '/main.php':
      require 'main.php';
      break;
   case '/register.php':     // if you plan to also allow a URL with the file name 
      require 'register.php';
      break;              
   case '/login.php':
      require 'login.php';
      break;
   case '/add.php':
      require 'add.php';
      break;
   case '/logout.php':
      require 'logout.php';
      break;
   case '/feedback.php':
      require 'feedback.php';
      break;
   case '/myopportunity.php':
      require 'myopportunity.php';
      break;
   case '/organizationopportunity.php':
      require 'organizationopportunity.php';
      break;
   default:
      http_response_code(404);
      exit('Not Found');
}  
?>
