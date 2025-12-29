<?php
session_start();

// Cek apakah ada bukti ngantor pada session
if (isset($_SESSION["user"]["bukti_ngantor"])) {
    // Hapus file bukti ngantor
    unlink($_SESSION["user"]["bukti_ngantor"]);
}

// Hapus semua session user
session_destroy();

// Redirect ke halaman login
header("Location: ./login.php");