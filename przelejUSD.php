<?php
    session_start();
    include "connect.php";
    $sql="SELECT id,saldoUSD FROM user WHERE id='".$_SESSION["login"]."'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $howmuch=$_POST["howmuch"];
    $whom=$_POST["whom"];
    if($row["saldoUSD"]>$howmuch)
        {
            $result1 = mysqli_query($conn, "UPDATE user SET saldoUSD = saldoUSD - $howmuch WHERE id = " . $row["id"]);
            $result2 = mysqli_query($conn, "UPDATE user SET saldoUSD = saldoUSD + $howmuch WHERE id = $whom");
            header("Location: panel.php");
            exit;
        }
    else
        {
            header("Location: panel.php");
            exit;
        }
?>