<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ./login.php");
    exit;
}

if (!isset($_SESSION["field_list"])) {
    $_SESSION["field_list"] = [];
}
if (!isset($_SESSION["field"])) {
    $_SESSION["field"] = [];
}

$detail = [
    "name" => "Atma Verde",
    "tagline" => "Padel Court",
    "page_title" => "Atma Verde Padel Court",
    "logo" => "./assets/images/padel.png"
];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php echo $detail["page_title"]; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="<?php echo $detail["logo"]; ?>" type="image/x-icon" />

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="./assets/css/poppins.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./assets/css/style.css" />

    <style>
        .img-bukti-ngantor {
            width: 100%;
            aspect-ratio: 1 / 1;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
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
                <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Admin Panel</a></li>
                <li class="nav-item"><a href="./processLogout.php" class="nav-link text-danger">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main style="padding-top: 84px;" class="container">
        <h1 class="mt-5 mb-3 border-bottom fw-bold">Dashboard</h1>

        <?php if (isset($_SESSION["success"])) { ?>
            <div class="alert alert-success mb-4 text-start" role="alert">
                <strong>Berhasil!</strong> <?php echo $_SESSION["success"]; ?>
            </div>

        <?php
            unset($_SESSION["success"]);
        } else if (isset($_SESSION["delete"])) { ?>
            <div class="alert alert-success mb-4 text-start" role="alert">
                <strong>Berhasil!</strong> <?php echo $_SESSION["delete"]; ?>
            </div>

        <?php
            unset($_SESSION["delete"]);
        }

        ?>
        <div class="row">
            <div class="col-lg-10">
                <div class="card card-body h-100 justify-content-center">
                    <h4>Selamat datang,</h4>
                    <h1 class="fw-bold display-6 mb-3"><?php echo $_SESSION["user"]["username"]; ?></h1>

                    <p class="mb-0">Kamu sudah login sejak:</p>
                    <p class="fw-bold lead mb-0"><?php echo $_SESSION["user"]["login_at"]; ?></p>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="card card-body">
                    <p>Bukti sedang ngantor:</p>
                    <img
                        src="<?php echo $_SESSION["user"]["bukti_ngantor"]; ?>"
                        class="img-fluid rounded img-bukti-ngantor"
                        alt="Bukti ngantor (sudah dihapus)" />
                </div>
            </div>
        </div>
    </main>
</div>
<h1 class="mt-5 mb-3 border-bottom fw-bold">Daftar Lapangan</h1>
        <p class="mb-0">Saat ini terdapat <strong><?php echo count($_SESSION["field"]) ?></strong> Lapangan yang dibooking.</p>
        <a href="./tambahLapangan.php" class="btn w-10 fw-bold text-light" role="button" style="background-color: #138A55;">Tambah Lapangan</a>
        <div class="container mt-4">
            <div class="row flex-nowrap overflow-auto">
                <?php foreach($_SESSION["field"] as $i => $field) { ?>
                <div class="col-md-3 mb-4 d-flex">
                    <div class="card h-100 d-flex flex-column">
                        <img src="<?php echo $field["foto"]; ?>" class="card-img-top" style="height: 200px; object-fit: cover;" alt="Temp Pict" />
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold"><?php echo $field["namaLapangan"] ?></h5>
                            <p class="mb-1">Tipe : <strong><?php echo $field["tipeLapangan"] ?></strong></p>
                            <p class="mb-1">Deskripsi: <?php echo $field["deskripsi"] ?></p>
                            <p class="mb-0">Tanggal Pemesanan:</p>
                            <p class="fw-bold"><?php echo $field["tanggalPemesanan"] ?></p>
                            <p class="mb-2">Harga: <strong class="fw-bold">Rp.<?php echo $field["harga"]; ?></strong></p>

                            <div class="mt-auto">
                                <form action="processDelete.php" method="POST">
                                    <input type="hidden" name="hapus" value="<?php echo $i ?>">
                                    <button type="submit" class="btn btn-danger w-100">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </main>

    <script src="./assets/js/bootstrap.min.js"></script>
</body>
</html>