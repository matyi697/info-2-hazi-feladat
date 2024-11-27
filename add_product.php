<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];

    $stmt = $conn->prepare("INSERT INTO products (name, price, description, stock) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $price, $description, $stock]);

    echo "Új termék hozzáadva!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Új Termék</title>
</head>
<body>
<?php include 'includes/header.php'; ?>


<main>
    <h2>Új Termék Hozzáadása</h2>
    <form method="POST" action="add_product.php">
        <label>Név:</label><br>
        <input type="text" name="name" required><br>
        <label>Ár:</label><br>
        <input type="number" step="0.01" name="price" required><br>
        <label>Leírás:</label><br>
        <textarea name="description"></textarea><br>
        <label>Készlet:</label><br>
        <input type="number" name="stock" required><br><br>
        <button type="submit">Termék Hozzáadása</button>
    </form>
</main>
</body>
</html>
