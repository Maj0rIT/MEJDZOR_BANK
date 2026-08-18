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
        <a href="index.php">STRONA GŁÓWNA</a>
        <a href="logowanie.php">LOGOWANIE</a>
    </nav>
    <main>
        <h1>REJESTRACJA</h1>
        <form action="register.php" method="POST">
            <h3>IMIĘ: <input type="text" name="imie"></h3>
            <h3>NAZWISKO: <input type="text" name="nazwisko"></h3>
            <h3>E-MAIL: <input type="email" name="mail"></h3>
            <h3>LOGIN: <input type="text" name="login"></h3>
            <h3>HASŁO: <input type="password" name="password"></h3>
            <br>
            <h3>Potwierdz regulamin   <input type="checkbox" name="checkbox"></h3>
            <br>
            <input type="submit" value="ZAREJESTRUJ SIĘ">
        </form>
    </main>
    <footer>
        <h3>MEJDZOR_BANK &copy; 2026</h3>
    </footer>
</body>
</html>