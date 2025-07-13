<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (fullname, username, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $fullname, $username, $password);
    if ($stmt->execute()) {
        echo "Registered successfully. <a href='login.php'>Login</a>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
<form method="POST">
    <input name="fullname" placeholder="Full Name" required><br>
    <input name="username" placeholder="Username" required><br>
    <input name="password" placeholder="Password" type="password" required><br>
    <button type="submit">Register</button>
</form>