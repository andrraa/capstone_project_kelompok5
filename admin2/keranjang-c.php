<?php
include_once("db.php");
session_start();
if(isset($_POST['simpanKeranjang'])){
  $id_produk = $_POST['id_produk'];
  $email_pelanggan = $_POST['email_pelanggan'];
  $ukuran = $_POST['ukuran'];
  $jumlah = $_POST['jumlah'];
  $tanggal = $_POST['tanggal'];
  $query = "Insert into keranjang(id_produk, email_pelanggan, ukuran, jumlah, tanggal) values('$id_produk','$email_pelanggan','$ukuran','$jumlah','$tanggal')";
  $run_query = mysqli_query($con, $query);
  $_SESSION['t'] = "simpan"; 
  echo "<script>window.open('keranjang.php','_self')</script>";
}

if(isset($_POST['editKeranjang'])){
  $id_keranjang = $_POST['id_keranjang'];
  $id_produk = $_POST['id_produk'];
  $email_pelanggan = $_POST['email_pelanggan'];
  $ukuran = $_POST['ukuran'];
  $jumlah = $_POST['jumlah'];
  $tanggal = $_POST['tanggal'];
  $query = "update keranjang set id_produk='$id_produk', email_pelanggan='$email_pelanggan', ukuran='$ukuran', jumlah='$jumlah', tanggal='$tanggal' where id_keranjang='$id_keranjang'";
  $run_query = mysqli_query($con, $query);
  $_SESSION['t'] = "edit";
  echo "<script>window.open('keranjang.php','_self')</script>";
}

else if(isset($_POST['hapusKeranjang'])){
  $id_keranjang=$_POST['id_keranjang'];
  $run_query = mysqli_query($con, "DELETE FROM keranjang where id_keranjang='$id_keranjang'");
  $_SESSION['t'] = "hapus";
  echo "<script>window.open('keranjang.php','_self')</script>";
}

else if(isset($_GET['id_keranjang'])){
  $id_keranjang=$_GET['id_keranjang'];
  $query = "select * from keranjang where id_keranjang = '$id_keranjang'";
  $rows = mysqli_query($con, $query);

  while ($row = mysqli_fetch_array($rows)) {
    $haha=$row;
  }
  echo json_encode($haha);
}

?>