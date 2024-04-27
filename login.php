<?php
//koneksi ke database
include './assets/func.php';
$air = new klas_air;
$koneksi = $air->koneksi();
$encrypt = $air->enkrip_pass();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign in & Sign up Form</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
  <main>
    <div class="box">
      <div class="inner-box">
        <div class="forms-wrap">
          <form autocomplete="off" class="sign-in-form needs-validation" method="post">

            <div class="logo">
              <img src="assets/img/nature.png" alt="easyclass" />
              <h2 style="margin-top: 7px;">Air</h2>
            </div>

            <div class="heading">
              <h2>Selamat Datang</h2>
            </div>

            <?php
            // if (isset($_GET['pesan'])) {
            //   if ($_GET['pesan'] == "gagal") {
            //     echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
            //   }
            // }
            if (isset($_POST['tombol'])) {
              $username = $_POST['user'];
              $password = $_POST['password'];

              $qc = mysqli_query($koneksi, "SELECT username, password FROM user WHERE username = '$username'");
              $dc = mysqli_fetch_row($qc);
              if (!empty($dc[0])) $user_cek = $dc[0];

              if (!empty($user_cek)) {
                $pass_cek = $dc[1];

                if (password_verify($password, $pass_cek)) {
                  session_start();
                  $_SESSION['username'] = $username;
                  $_SESSION['password'] = $password;

                  echo "<script>window.location.replace('./login/index.php')</script>";
                } else {
                  echo "
                  <div class=\"alert alert-danger alert-dismissible fade show\">
                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                    <strong>Password</strong> salah!
                  </div>
                  ";
                }
              } else {
                echo "
                <div class=\"alert alert-danger alert-dismissible fade show\">
                  <button type=button class=btn-close data-bs-dismiss=alert></button>
                  <strong>Username</strong> tidak ada!
                </div>
                ";
              }
            }
            ?>
            <div class="actual-form">
              <div class="input-wrap">
                <input type="text" name="user" minlength="4" class="input-field" autocomplete="off" required />
                <label>Name</label>
              </div>

              <div class="input-wrap">
                <input type="password" name="password" minlength="4" class="input-field" autocomplete="off" required />
                <label>Password</label>
              </div>

              <input type="submit" value="Login" name="tombol" class="sign-btn" />

              <p class="text">
                Forgotten your password or you login datails?
                <a href="#">Get help</a> signing in
              </p>
            </div>
        </div>

        <div class="carousell">
          <div class="images-wrapper">
            <img src="assets/img/water-tap.png" class="image img-1 show" alt="" />
            <img src="assets/img/bill.png" class="image img-2" alt="" />
            <img src="assets/img/robot.png" class="image img-3" alt="" />
          </div>

          <div class="text-slider">
            <div class="text-wrap">
              <div class="text-group">
                <h2>Saluran Air yang berkualitas</h2>
                <h2>Bayar dimana saja</h2>
                <h2>Pelayanan cepat</h2>
              </div>
            </div>

            <div class="bullets">
              <span class="active" data-value="1"></span>
              <span data-value="2"></span>
              <span data-value="3"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Javascript file -->

  <script src="js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>