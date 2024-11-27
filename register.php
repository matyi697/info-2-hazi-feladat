<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $password]);

    echo "Sikeres regisztráció!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Regisztráció</title>
</head>
<body>
    <h2>Regisztráció</h2>
    <form method="POST" action="register.php">
        <label>Név:</label><br>
        <input type="text" name="name" required><br>
        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        <label>Jelszó:</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit">Regisztráció</button>
    </form>
</body>
</html>
