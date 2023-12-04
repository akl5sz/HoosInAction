<?php
session_start();
session_destroy();
header("Location: /main.php");
echo '<script>alert("Successfully logged out!")</script>'
?>