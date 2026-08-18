<?php
    session_start();
    include "connect.php";
    $sql="SELECT id,saldoPLN FROM user WHERE id='".$_SESSION["login"]."'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $howmuch=$_POST["howmuch"];
    $whom=$_POST["whom"];
    if($row["saldoPLN"]>$howmuch)
        {
            $result1 = mysqli_query($conn, "UPDATE user SET saldoPLN = saldoPLN - $howmuch WHERE id = " . $row["id"]);
            $result2 = mysqli_query($conn, "UPDATE user SET saldoPLN = saldoPLN + $howmuch WHERE id = $whom");
            header("Location: panel.php");
            exit;
        }
    else
        {
            header("Location: panel.php");
            exit;
        }
?>