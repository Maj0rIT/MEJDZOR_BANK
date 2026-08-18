<?php
session_start();
include "connect.php";

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}

$sql="SELECT imie,nazwisko,email,id,saldoPLN,saldoEUR,saldoUSD FROM user WHERE id='".$_SESSION["login"]."'";
$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_array($result);

if (!$row) {
    exit("Brak użytkownika");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="bank.png" type="image/x-icon">
    <title>MEJDZOR_BANK</title>
</head>
<body>
    <header>
        <h1>MEJDZOR_BANK_PANEL_KLIENTA</h1>
    </header>

    <nav>
        <a href="logout.php">WYLOGUJ_SIĘ</a>
    </nav>

    <main>
        <h1>Witaj <?php echo $row["imie"]; ?></h1>

        <div class="flex">
            <div class="panel">
                <h1>Numer Konta: <?php echo $row["id"]; ?></h1>
                <h2>Aktualne środki na koncie:</h2>
                <h2><?php echo $row["saldoPLN"]; ?> PLN</h2> 
                <h2><?php echo $row["saldoEUR"]; ?> EUR</h2> 
                <h2><?php echo $row["saldoUSD"]; ?> USD</h2> 
            </div>
            
            <div class="flex2">
                <div class="panel">
                    <h1>Przelej PLN</h1>

                    <form action="przelejPLN.php" method="post">
                        Kwota: <input type="number" name="howmuch">
                        <br>
                        Nr Konta: <input type="number" name="whom">
                        <br>
                        <input type="submit" value="PRZELEJ">
                    </form>
                </div>
                <div class="panel">
                    <h1>Przelej EUR</h1>

                    <form action="przelejEUR.php" method="post">
                        Kwota: <input type="number" name="howmuch">
                        <br>
                        Nr Konta: <input type="number" name="whom">
                        <br>
                        <input type="submit" value="PRZELEJ">
                    </form>
                </div>
                <div class="panel">
                    <h1>Przelej USD</h1>

                    <form action="przelejUSD.php" method="post">
                        Kwota: <input type="number" name="howmuch">
                        <br>
                        Nr Konta: <input type="number" name="whom">
                        <br>
                        <input type="submit" value="PRZELEJ">
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <h3>MEJDZOR_BANK &copy; 2026</h3>
    </footer>
</body>
</html>