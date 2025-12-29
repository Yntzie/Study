<?php 
session_start();

if(isset($_SESSION["user"])){
  header("location: ./dashboard.php");
  exit;
}

$detail = [
  "name" => "Atma Verda",
  "tagline" => "Padel Court",
  "page_title" => "Atma Verda Padel Court",
  "logo" => "./assets/images/padel.png"
];

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php  $detail['page_title'] ?></title>

  <link rel="stylesheet" href="./assets/css/bootstrap.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="./assets/css/poppins.min.css" rel="stylesheet">

  <link rel="stylesheet" href="./assets/css/style.css">

  <style>
    #formAuth{
      max-width: 576px;
      margin: 0 auto;
    }
  </style>
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
                <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Admin Login</a></li>
            </ul>
        </nav>
    </header>
    <main style="padding-top: 84px;" class="container">
      <h1 class="text-center mt-5 display-4">Welcome Admin!</h1>
      <p class="text-center lead">
          Untuk memastikan identitas, silakan isi form berikut:
      </p>

      <hr class="featurette-divider" />

      <form action="./processLogin.php" method="POST" id="formAuth" enctype="multipart/form-data">

          <!-- https://getbootstrap.com/docs/5.3/components/alerts/ -->
          <div class="alert alert-info mb-4 text-center" role="alert">
              <strong>Info!</strong> Username dan password bebas, yang penting diisi.
          </div>

          <!-- Kita bisa menggunakan $_SESSION untuk menyimpan error dari form yang disubmit -->
          <?php if (isset($_SESSION["error"])) { ?>
              <div class="alert alert-danger mb-4 text-center" role="alert">
                  <strong>Error!</strong> <?php echo $_SESSION["error"]; ?>
              </div>
          <?php
              unset($_SESSION["error"]); // Hapus error dari session
          } ?>

          <!-- https://getbootstrap.com/docs/5.3/forms/floating-labels/ -->
          <div class="form-floating mb-4">
              <input type="text" class="form-control" id="inputUsername" placeholder="Username" name="username" />
              <label for="inputUsername">Username</label>
          </div>

          <div class="form-floating mb-4">
              <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" />
              <label for="inputPassword">Password</label>
          </div>

          <!-- https://getbootstrap.com/docs/5.3/forms/form-control/#file-input -->
          <div class="mb-4">
              <label for="inputFile" class="form-label d-block text-center">Bukti sedang ngantor:</label>
              <input class="form-control" id="inputFile" type="file" accept=".jpg,.jpeg,.png" name="bukti_ngantor" />
          </div>

          <div>
              <button type="submit" class="btn btn-primary w-100 fw-bold">Login</button>

              <!-- Kita mengirimkan "mencoba_login" ke form sebagai indikator bahwa user sudah mencoba login -->
              <input type="hidden" name="mencoba_login" value="1" />
          </div>
      </form>
  </main>

</body>
</html>
