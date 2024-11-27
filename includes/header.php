<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bútorlap Szabászat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Bútorlap Szabászat</h1>
        <nav>
            <ul>
                <li><a href="index.php">Kezdőlap</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="orders.php">Rendelések</a></li>
                    <?php if ($_SESSION['user_role'] == 'admin'): ?>
                        <li><a href="add_product.php">Új Termék</a></li>
                    <?php endif; ?>
                    <li><a href="logout.php">Kijelentkezés</a></li>
                <?php else: ?>
                    <li><a href="login.php">Bejelentkezés</a></li>
                    <li><a href="register.php">Regisztráció</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
