<?php
    $server="mysql";
    $user="root";
    $pass="root";
    $db="bank";

    $conn = mysqli_connect($server,$user,$pass,$db);

    if (!$conn) 
    {
        die("Błąd połączenia");
    }
?>