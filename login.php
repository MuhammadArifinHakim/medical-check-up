<?php
session_start();
require_once 'load/function.php';

if (isset($_COOKIE['laundry']) && isset($_COOKIE['ku'])) {
  $cek = $_COOKIE['cek'];     // id dari tbl_karyawan
  $medical = $_COOKIE['medical'];               // username dari tbl_karyawan

  // Ambil username berdasarkan id
  $result = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan WHERE id = '$cek'");
  $data = mysqli_fetch_assoc($result);

  if ($ku ===  hash('sha256', $data['username'])) {
    $_SESSION['login'] = true;
    $_SESSION['id'] = $data['id'];
  }
}

if (isset($_SESSION['login'])) {
  header("Location: index.php");
  exit;
}

if (isset($_POST['login'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];

  // Menghindari SQL injection
  $username = mysqli_real_escape_string($koneksi, $username);

  // Query untuk mencari username dan password yang cocok
  $query = "SELECT * FROM tbl_karyawan WHERE username = '$username'";
  $result = mysqli_query($koneksi, $query);

  // Memeriksa jumlah baris yang ditemukan
  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    // Memeriksa kecocokan password dengan MD5
    if (md5($password) === $row['password']) {
      echo "Username dan password cocok!";
      $_SESSION['login'] = true;
      $_SESSION['id'] = $row['id'];

      // Cek remember me
      if (isset($_POST['remember'])) {
        setcookie('cek', $row['id'], time() + (60 * 60 * 24 * 5));                       // id dari tbl_karyawan
        setcookie('medical', hash('sha256', $row['username']), time() + (60 * 60 * 24 * 5));      // username dari tbl_karyawan
      }

      header("Location: index.php");
      exit;
    }
  }
  $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGIN</title>

  <link rel="shortcut icon" href="asset/img/favicon.png" type="image/x-icon">

  <!-- Boostrap 4 -->
  <link rel="stylesheet" href="asset/vendor/bootstrap-4.5.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="asset/css/login.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="asset/vendor/fontawesome/css/all.min.css">
</head>

<body>
  <div class="container">
    <form class="form-signin" action="" method="post">
      <div class="text-center mb-4">
        <!-- <img class="mb-4" src="asset/img/" alt="" width="100" height="100"> -->
        <h1 class="h3 mb-3 font-weight-normal">LOGIN</h1>
        <?php if (isset($error)) : ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Username atau Password salah...
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
      </div>

      <div class="form-label-group">
        <input type="text" id="username" name="username" class="form-control form-control-lg" placeholder="Username" required="" autofocus="">
        <label for="username">Username</label>
      </div>

      <div class="form-label-group">
        <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password" required="">
        <label for="password">Password</label>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" name="remember"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
      <p class="mt-5 mb-3 text-muted text-center">© MPTI-2023</p>
    </form>

</body>
<script src="asset/vendor/jquery-3.5.1/jquery-3.5.1.min.js"></script>
<script src="asset/vendor/bootstrap-4.5.3/js/bootstrap.min.js"></script>
<script src="asset/js/login.js"></script>

</html>