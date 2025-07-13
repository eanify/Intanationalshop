<?php
include 'db.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    if ($result && password_verify($password, $result['password'])) {
        $_SESSION['user'] = $result;
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Invalid login";
    }
}
?>
<form method="POST">
    <input name="username" placeholder="Username" required><br>
    <input name="password" placeholder="Password" type="password" required><br>
    <button type="submit">Login</button>
</form>