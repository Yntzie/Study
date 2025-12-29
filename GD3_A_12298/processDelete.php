<?php

session_start();

if (isset($_POST["hapus"])) {
    $index = $_POST["hapus"];
    unset($_SESSION["field"][$index]);
    $_SESSION["delete"] = "Lapangan Berhasil dihapus.";
    header("Location: ./dashboard.php");
}
?>