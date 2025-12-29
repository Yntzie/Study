<?php 
session_start();

if(isset($_SESSION["user"])){
  header("location: ./dashboard.php");
  exit;
}

if(isset($_POST["mencoba_login"])){
  $username = $_POST["username"];
  $password = $_POST["password"];

  if(empty($username) || empty($password)){
    $_SESSION["error"] = "Username dan password harus diisi";
    header("location: ./login.php");
    exit;
  }

  // Proses bukti sedang ngantor
  if (!isset($_FILES["bukti_ngantor"])) {
      $_SESSION["error"] = "Bukti sedang ngantor harus diisi!";
      header("Location: ./login.php");
      exit;
  }

  // Get file dari $_FILES
  $buktiNgantor = $_FILES["bukti_ngantor"];
  $tmpFile = $buktiNgantor["tmp_name"];

  $folderTujuan = "./bukti_ngantor/";
  $namaFile = $buktiNgantor["name"];
  $alamatFile = $folderTujuan . $namaFile;

  // Upload file ke folder tujuan
  if (!move_uploaded_file($tmpFile, $alamatFile)) {
      $_SESSION["error"] = "Gagal mengupload bukti sedang ngantor!";
      header("Location: ./login.php");
      exit;
  }

  // Selesai, set session user dan redirect ke halaman dashboard
  $_SESSION["user"] = [
      "username"      => $username,
      "password"      => $password,
      "bukti_ngantor" => $alamatFile,
      // Tambahkan waktu login menggunakan fungsi date()
      "login_at"      => date("Y-m-d H:i:s")
  ];

  header("Location: ./dashboard.php");
}
?>