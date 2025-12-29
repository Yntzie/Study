<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ./login.php");
    exit;
}

if (!isset($_SESSION["field_list"])) {
    $_SESSION["field_list"] = [];
}

$detail = [
    "name" => "Atma Verde",
    "tagline" => "Padel Court",
    "page_title" => "Atma Verde Padel Court",
    "logo" => "./PAW4_PHP_Assets/images/padel.png"
];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php echo $detail["page_title"]; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="<?php echo $detail["logo"]; ?>" type="image/x-icon" />

    <link rel="stylesheet" href="./PAW4_PHP_Assets/css/bootstrap.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="./PAW4_PHP_Assets/css/poppins.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./PAW4_PHP_Assets/css/style.css" />

</head>
<body>
    <header class="fixed-top scrolled" id="navbar">
        <nav class="container nav-top py-2">
            <a href="./" class="rounded bg-white py-2 px-3 d-flex align-items-center nav-home-btn">
                <img src="<?php echo $detail["logo"]; ?>" class="crown-logo" />
                <div>
                    <p class="mb-0 fs-5 fw-bold"><?php echo $detail["name"]; ?></p>
                    <p class="small mb-0"><?php echo $detail["tagline"]; ?></p>
                </div>
            </a>
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="./" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="./dashboard.php" class="nav-link active" aria-current="page">Admin Panel</a></li>
                <li class="nav-item"><a href="./processLogout.php" class="nav-link text-danger">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main style="padding-top: 84px;" class="container">
    <h1 class="mt-5 mb-3 border-bottom fw-bold">Tambah Lapangan</h1>
    <form action="./processAdd.php" method="POST" id="formAuth" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="namalapangan" class="form-label">Nama Lapangan</label>
            <input type="text" class="form-control" id="namalapangan" name="nama_lapangan" required>
        </div>

        <div class="mb-3">
            <label for="deskripsilapangan" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsilapangan" name="deskripsi" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal Pemesanan</label>
            <input type="date" class="form-control" id="inputTanggal" name="tanggal" required>
        </div>

        <div class="mb-3">
            <label for="tipelapangan" class="form-label">Tipe Lapangan</label>
            <select class="form-select" id="tipelapangan" name="tipe_lapangan" required>
                <option value="">Pilih Tipe Lapangan</option>
                <option value="Standard">Standard</option>
                <option value="Premium">Premium</option>
                <option value="Scenic">Scenic</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="hargalapangan" class="form-label">Harga Lapangan (Rp)</label>
            <input type="number" class="form-control" id="hargalapangan" name="biaya" required>
        </div>

        <div>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Simpan
            </button>
            <input type="hidden" name="menambah_lapangan" value="1" />
        </div>
    </form>
</main>

<script src="./assets/js/bootstrap.min.js"></script>
</body>
</html>