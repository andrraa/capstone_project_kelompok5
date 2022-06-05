<?php
session_start();
// require_once('config.php');
include('db.php');

if (isset($_SESSION['email_admin'])){
  echo "<script>window.open('produk.php','_self')</script>";
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Admin SISKu</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="resource/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="resource/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="resource/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index2.html" class="h1">Login <b>Admin</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Login untuk menjadi admin Fashops</p>
      <?php
        $t="";
        if(isset($_SESSION['lgagal'])) {
            $t=$_SESSION['lgagal'];
            unset($_SESSION['lgagal']);
        }

        ?>

      <form action="config.php" method="POST">
        <div class="input-group mb-3">
          <input type="text" name="email_admin" class="form-control <?php echo $t=='gagal' ? 'is-invalid' : '' ?>" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <span class="invalid-feedback">masukkan email yang valid</span>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password_admin" class="form-control <?php echo $t=='gagal' || $t=='password' ? 'is-invalid' : '' ?>" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <span class="invalid-feedback">masukkan password yang valid</span>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->

        </div>
        <?php
        if($t=="gagal") {
          echo "<div class='alert alert-danger mt-1'>
                  <div>Kombinasi email dan password salah</div>
                </div>";
        }
        else if($t=="password"){
          echo "<div class='alert alert-danger mt-2'>
                  <div>password salah</div>
                </div>";
        }

        ?>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="resource/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="resource/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="resource/dist/js/adminlte.min.js"></script>
</body>
</html>
