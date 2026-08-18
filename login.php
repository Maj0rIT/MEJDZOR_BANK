<?php
    session_start();
    include "connect.php";

    if (!empty($_POST["login"]) && !empty($_POST["password"])) {

        $stmt = mysqli_prepare($conn, "SELECT * FROM user WHERE login = ?");
        mysqli_stmt_bind_param($stmt, "s", $_POST["login"]);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);

            if (password_verify($_POST["password"], $row["password"])) {
                $_SESSION["login"] = $row["id"];
                header("Location: panel.php");
                exit;
            } else {
                echo '<span style="color:red;">Błędne hasło</span><br>';
                echo '<a href="logowanie.php">powrót</a>';
            }

        } else {
            echo '<span style="color:red;">Błędny login</span><br>';
            echo '<a href="logowanie.php">powrót</a>';
        }
    }
?>