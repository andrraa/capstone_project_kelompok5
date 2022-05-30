<?php
include_once("db.php");
session_start();
if(isset($_POST['simpanProduk'])){
  $id_produk_kategori = $_POST['id_produk_kategori'];
  $id_kategori = $_POST['id_kategori'];
  $judul_produk = $_POST['judul_produk'];
  $harga_produk = $_POST['harga_produk'];
  $keyword_produk = $_POST['keyword_produk'];
  $deskripsi_produk = $_POST['deskripsi_produk'];
  $query = "Insert into produk(id_produk_kategori, id_kategori, judul_produk, harga_produk, keyword_produk, deskripsi_produk) values('$id_produk_kategori','$id_kategori','$judul_produk','$harga_produk','$keyword_produk','$deskripsi_produk')";
  $run_query = mysqli_query($con, $query);
  $_SESSION['t'] = "simpan"; 
  echo "<script>window.open('produk.php','_self')</script>";
}

if(isset($_POST['editProduk'])){
  $id_produk = $_POST['id_produk'];
  $id_produk_kategori = $_POST['id_produk_kategori'];
  $id_kategori = $_POST['id_kategori'];
  $judul_produk = $_POST['judul_produk'];
  $harga_produk = $_POST['harga_produk'];
  $keyword_produk = $_POST['keyword_produk'];
  $deskripsi_produk = $_POST['deskripsi_produk'];
  $query = "update produk set id_produk_kategori='$id_produk_kategori', id_kategori='$id_kategori', judul_produk='$judul_produk', harga_produk='$harga_produk', keyword_produk='$keyword_produk', deskripsi_produk='$deskripsi_produk' where id_produk='$id_produk'";
  $run_query = mysqli_query($con, $query);
  $_SESSION['t'] = "edit";
  echo "<script>window.open('produk.php','_self')</script>";
}

else if(isset($_POST['hapusProduk'])){
  $id_produk=$_POST['id_produk'];
  $run_query = mysqli_query($con, "DELETE FROM produk where id_produk='$id_produk'");
  $_SESSION['t'] = "hapus";
  echo "<script>window.open('produk.php','_self')</script>";
}

else if(isset($_GET['id_produk'])){
  $id_produk=$_GET['id_produk'];
  $query = "select * from produk where id_produk = '$id_produk'";
  $rows = mysqli_query($con, $query);

  while ($row = mysqli_fetch_array($rows)) {
    $haha=$row;
  }
  echo json_encode($haha);
}


?>