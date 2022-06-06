<?php
session_start();
include('db.php');
if(isset($_POST['email_admin'])){
  unset($_SESSION['email_admin']);
  $email_admin = $_POST['email_admin'];
  $password_admin = $_POST['password_admin'];

  $query = "select * from admin where email_admin='$email_admin' and password_admin='$password_admin'";
  $rows = mysqli_query($con, $query);
  while ($row = mysqli_fetch_array($rows)) {
    $_SESSION['email_admin']=$row['email_admin'];
    echo "<script>window.open('produk.php','_self')</script>";

  }

  if (!isset($_SESSION['email_admin'])){
    $_SESSION['lgagal'] ="gagal";
    $query = "select * from admin where email_admin='$email_admin' ";
    $rows = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($rows)) {
      $_SESSION['lgagal']='password';
    }
  }
  echo "sesi".$_SESSION['email_admin'];
  echo "<script>window.open('login.php','_self')</script>";


}

if (!isset($_SESSION['email_admin'])){
  echo "<script>window.open('login.php','_self')</script>";
}

if(isset($_GET['logout'])){
  unset($_SESSION['email_admin']);
  echo "<script>window.open('login.php','_self')</script>";
}

?>