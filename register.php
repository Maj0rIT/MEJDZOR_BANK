<?php

include "connect.php";

$imie = $_POST["imie"];
$nazwisko = $_POST["nazwisko"];
$mail = $_POST["mail"];
$login = $_POST["login"];
$passwordRaw = $_POST["password"];

if(!empty($imie) && !empty($nazwisko) && !empty($mail) && !empty($login) && !empty($passwordRaw))
{
    if (isset($_POST['checkbox'])) 
    {
        $stmt = mysqli_prepare($conn, "SELECT id FROM user WHERE login = ? OR email = ?");
        mysqli_stmt_bind_param($stmt, "ss", $login, $mail);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) == 0) 
        {
            $password = password_hash($passwordRaw, PASSWORD_DEFAULT);

            $stmt = mysqli_prepare($conn, "INSERT INTO user (imie, nazwisko, email, login, password) VALUES (?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "sssss", $imie, $nazwisko, $mail, $login, $password);

            if (mysqli_stmt_execute($stmt))
            {
                header("Location: logowanie.html");
                exit;
            }
            else 
            {
                echo "Błąd serwera";
            }
        }
        else
        {
            echo "Login lub email już istnieje<br>";
            echo '<a href="rejestracja.html">powrót</a>';
        }
    } 
    else 
    {
        echo "Nie zaakceptowano regulaminu<br>";
        echo '<a href="rejestracja.html">powrót</a>';
    }
}
else 
{
    echo "Nie wypełniono formularza<br>";
    echo '<a href="rejestracja.html">powrót</a>';
}

mysqli_close($conn);
?>