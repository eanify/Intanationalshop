<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username === 'Gayson00' && $password === 'Gayson0707') {
        $_SESSION['admin'] = true;
        header("Location: admin_dashboard.php");
        exit;
    } else {
        echo "Invalid admin login";
    }
}
?>
<form method="POST">
    <input name="username" placeholder="Admin Username" required><br>
    <input name="password" placeholder="Password" type="password" required><br>
    <button type="submit">Login as Admin</button>
</form>