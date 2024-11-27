<?php
include 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        echo "Sikeres bejelentkezés!";
    } else {
        echo "Hibás email vagy jelszó!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bejelentkezés</title>
</head>
<body>
    <h2>Bejelentkezés</h2>
    <form method="POST" action="login.php">
        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        <label>Jelszó:</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit">Bejelentkezés</button>
    </form>
</body>
</html>
