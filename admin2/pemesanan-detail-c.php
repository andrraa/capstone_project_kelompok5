<?php
include_once("db.php");
session_start();
if(isset($_POST['simpanPemesananDetail'])){
  $id_pemesanan = $_POST['id_pemesanan'];
  $id_produk = $_POST['id_produk'];
  $ukuran = $_POST['ukuran'];
  $jumlah = $_POST['jumlah'];
  $harga_produk = $_POST['harga_produk'];
  $query = "Insert into pemesanan_detail(id_pemesanan, id_produk, ukuran, jumlah, harga_produk) values('$id_pemesanan','$id_produk','$ukuran','$jumlah','$harga_produk')";
  $run_query = mysqli_query($con, $query);
  $_SESSION['t'] = "simpan"; 
  echo "<script>window.open('pemesanan-detail.php','_self')</script>";
}

if(isset($_POST['editPemesananDetail'])){
  $id_pemesanan_detail = $_POST['id_pemesanan_detail'];
  $id_pemesanan = $_POST['id_pemesanan'];
  $id_produk = $_POST['id_produk'];
  $ukuran = $_POST['ukuran'];
  $jumlah = $_POST['jumlah'];
  $harga_produk = $_POST['harga_produk'];
  $query = "update pemesanan_detail set id_pemesanan='$id_pemesanan', id_produk='$id_produk', ukuran='$ukuran', jumlah='$jumlah', harga_produk='$harga_produk' where id_pemesanan_detail='$id_pemesanan_detail'";
  $run_query = mysqli_query($con, $query);
  $_SESSION['t'] = "edit";
  echo "<script>window.open('pemesanan-detail.php','_self')</script>";
}

else if(isset($_POST['hapusPemesananDetail'])){
  $id_pemesanan_detail=$_POST['id_pemesanan_detail'];
  $run_query = mysqli_query($con, "DELETE FROM pemesanan_detail where id_pemesanan_detail='$id_pemesanan_detail'");
  $_SESSION['t'] = "hapus";
  echo "<script>window.open('pemesanan-detail.php','_self')</script>";
}

else if(isset($_GET['id_pemesanan_detail'])){
  $id_pemesanan_detail=$_GET['id_pemesanan_detail'];
  $query = "select * from pemesanan_detail where id_pemesanan_detail = '$id_pemesanan_detail'";
  $rows = mysqli_query($con, $query);

  while ($row = mysqli_fetch_array($rows)) {
    $haha=$row;
  }

  $tproduk=array();

  $query = "select * from produk order by id_produk desc";
  $rows = mysqli_query($con, $query);
  while ($row = mysqli_fetch_array($rows)) {
    array_push($tproduk, $row);
  }

  $haha['tproduk']=$tproduk;

  echo json_encode($haha);
}




?>