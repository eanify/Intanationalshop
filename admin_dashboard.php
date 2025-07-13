<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit;
}
echo "Welcome Admin!<br>";
echo "<a href='logout.php'>Logout</a>";
?>