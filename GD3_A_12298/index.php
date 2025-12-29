<?php 
session_start();

$detail = [
  "name" => "Atma Verda",
  "tagline" => "Padel Court",
  "page_title" => "Atma Verda Padel Court",
  "logo" => "./PAW4_PHP_Assets/images/padel.png"
];

$gambar = [
  "./assets/images/padel1.jpg",
  "./assets/images/padel2.jpg",
  "./assets/images/padel3.jpg"
];

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php  $detail['page_title'] ?></title>

  <link rel="icon" href="<?php $detail['logo'] ?>" type="image/x-icon">

  <link rel="stylesheet" href="./assets/css/bootstrap.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="./assets/css/poppins.min.css" rel="stylesheet">

  <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
  <header class="fixed-top" id="navbar">
        <nav class="container nav-top py-2">
            <a href="./" class="rounded bg-white py-2 px-3 d-flex align-items-center nav-home-btn">
                <img src="<?php echo $detail["logo"]; ?>" class="crown-logo" />
                <div>
                    <p class="mb-0 fs-5 fw-bold"><?php echo $detail["name"]; ?></p>
                    <p class="small mb-0"><?php echo $detail["tagline"]; ?></p>
                </div>
            </a>
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="./login.php" class="nav-link text-bg-success">Admin Login</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <!-- Carousel -->
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php foreach ($gambar as $i => $gbr) { ?>
                    <button
                        type="button"
                        data-bs-target="#myCarousel"
                        data-bs-slide-to="<?php echo $i; ?>"
                        class="<?php echo $i == 0 ? "active" : ""; ?>"
                        aria-label="Slide <?php echo $i+1; ?>"
                    ></button>
                <?php } ?>
            </div>

            <div class="carousel-inner">
                <?php foreach ($gambar as $i => $gbr) { ?>
                    <div class="carousel-item <?php echo $i == 0 ? "active" : ""; ?>">
                        <img
                            src="<?php echo $gbr; ?>"
                            class="carousel-img"
                            role="img"
                            aria-label="Gambar ke-<?php echo ($i + 1); ?>"
                            focusable="false"
                        />
                    </div>
                <?php } ?>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="container">
            <!-- Featurettes -->
            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading fw-normal">
                        The first and only padel court <strong>with an authentic natural atmosphere</strong>.
                    </h2>
                    <p class="lead">
                        Diciptakan oleh <strong>[NAMA LENGKAP]</strong>,
                        mahasiswa Universitas Atma Jaya Yogyakarta dari program studi Informatika.
                    </p>
                    <p class="lead">Nomor Pokok Mahasiswa: <strong>[NPM LENGKAP]</strong>.</p>
                </div>
                <div class="col-md-5">
                    <img
                        src="./assets/images/featurette-padel1.webp"
                        class="featurette-image img-fluid mx-auto rounded shadow"
                        role="img"
                        aria-label="Gambar featurette 1"
                        focusable="false"
                    />
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading fw-normal">
                        Feel the energy of nature, <strong>play padel surrounded by greenery</strong>.
                    </h2>
                    <p class="lead">
                        Our padel courts are designed to blend seamlessly with nature, offering a refreshing, aesthetic,
                        and tranquil playing experience with breathtaking greenery views.
                    </p>
                </div>
                <div class="col-md-5 order-md-1">
                    <img
                        src="./assets/images/featurette-padel2.jpeg"
                        class="featurette-image img-fluid mx-auto rounded shadow"
                        role="img"
                        aria-label="Gambar featurette 2"
                        focusable="false"
                    />
                </div>
            </div>
        </div>

        <!-- FOOTER -->
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <div class="col-md-4 d-flex align-items-center">
                    <span class="mb-3 mb-md-0 text-body-secondary">© 2025 <?php echo $detail["name"]; ?></span>
                </div>
            </footer>
        </div>
    </main>

    <!-- Bootstrap 5.3 JS -->
    <script src="./assets/js/bootstrap.min.js"></script>

    <!-- Custom JS untuk Navbar -->
    <script src="./assets/js/home-nav.js"></script>
</body>
</html>