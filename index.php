<?php
// Főoldal: index.php
include 'includes/header.php';
?>

<main>
    <h1>Üdvözöljük a Bútorlap Szabászat weboldalán!</h1>
    <p>Itt kezelheti rendeléseit, böngészhet a termékek között, és új termékeket adhat hozzá a rendszerhez.</p>

    <section>
        <h2>Gyors elérés</h2>
        <div class="quick-links">
            <a href="add_product.php" class="button">Új termék hozzáadása</a>
            <a href="register.php" class="button">Regisztráció</a>
            <a href="order_list.php" class="button">Rendelések listája</a>
        </div>
    </section>

    <section>
        <h2>Legújabb termékek</h2>
        <?php
        // Adatbázis kapcsolat betöltése
        include 'includes/db_connect.php';

        // Legújabb 3 termék lekérdezése
        $query = "SELECT name, price, description FROM products ORDER BY id DESC LIMIT 3";
        $result = $conn->query($query);

        if ($result && $result->num_rows > 0):
            while ($row = $result->fetch_assoc()):
        ?>
            <div class="product">
                <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                <p><?php echo htmlspecialchars($row['description']); ?></p>
                <p><strong>Ár:</strong> <?php echo number_format($row['price'], 2); ?> Ft</p>
            </div>
        <?php
            endwhile;
        else:
        ?>
            <p>Nincsenek elérhető termékek.</p>
        <?php endif; ?>
    </section>
</main>

<?php
include 'includes/footer.php';
?>
