<?php
include 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO orders (user_id, product_id, quantity) VALUES (?, ?, ?)");
    $stmt->execute([$user_id, $product_id, $quantity]);

    echo "Rendelés hozzáadva!";
}

// Termékek listázása a rendelési űrlaphoz
$products = $conn->query("SELECT * FROM products")->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Új Rendelés</title>
</head>
<body>
    <h2>Új Rendelés</h2>
    <form method="POST" action="orders.php">
        <label>Termék:</label><br>
        <select name="product_id">
            <?php foreach ($products as $product): ?>
                <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
            <?php endforeach; ?>
        </select><br>
        <label>Mennyiség:</label><br>
        <input type="number" name="quantity" required><br><br>
        <button type="submit">Rendelés Leadása</button>
    </form>
</body>
</html>
