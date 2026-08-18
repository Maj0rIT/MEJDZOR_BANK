<?php
    session_start();
    if (isset($_SESSION['login'])) 
        {
            header("Location: panel.php");
            exit();
        }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="bank.png" type="image/x-icon">
    <title>MEJDZOR_BANK</title>
</head>
<body>
    <header>
        <h1>MEJDZOR_BANK</h1>
    </header>
    <nav>
        <a href="rejestracja.php">REJESTRACJA</a>
        <a href="logowanie.php">LOGOWANIE</a>
    </nav>
    <main>
        <h1>Załóż u nas konto bankowe</h1>
        <h2>posiadamy następujące opcje</h2>
        <ol>
            <li><h3>Przelewy 24/7/365</h3></li>
            <li><h3>Saldo 24/7/365</h3></li>
            <li><h3>Konta w PLN, EUR, USD</h3></li>
        </ol>
    </main>
    <footer>
        <h3>MEJDZOR_BANK &copy; 2026</h3>
    </footer>
</body>
</html>