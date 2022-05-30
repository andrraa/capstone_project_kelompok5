<?php
include_once("db.php");
session_start();
if(isset($_POST['simpanPemesanan'])){
  $id_pelanggan = $_POST['id_pelanggan'];
  $alamat_pengiriman = $_POST['alamat_pengiriman'];
  $jenis_pengiriman = $_POST['jenis_pengiriman'];
  $status = $_POST['status'];
  $tanggal = $_POST['tanggal'];
  $query = "Insert into pemesanan(id_pelanggan, alamat_pengiriman,jenis_pengiriman, status,tanggal) values('$id_pelanggan','$alamat_pengiriman','$jenis_pengiriman','$status','$tanggal')";
  $run_query = mysqli_query($con, $query);
  $_SESSION['t'] = "simpan"; 
  echo "<script>window.open('pemesanan.php','_self')</script>";
}

if(isset($_POST['editPemesanan'])){
  $id_pemesanan = $_POST['id_pemesanan'];
  $id_pelanggan = $_POST['id_pelanggan'];
  $alamat_pengiriman = $_POST['alamat_pengiriman'];
  $jenis_pengiriman = $_POST['jenis_pengiriman'];
  $status = $_POST['status'];
  $tanggal = $_POST['tanggal'];
  $query = "update pemesanan set id_pelanggan='$id_pelanggan', alamat_pengiriman='$alamat_pengiriman', jenis_pengiriman='$jenis_pengiriman', status='$status', tanggal='$tanggal' where id_pemesanan='$id_pemesanan'";
  $run_query = mysqli_query($con, $query);
  $_SESSION['t'] = "edit";
  echo "<script>window.open('pemesanan.php','_self')</script>";
}

else if(isset($_POST['hapusPemesanan'])){
  $id_pemesanan=$_POST['id_pemesanan'];
  $run_query = mysqli_query($con, "DELETE FROM pemesanan where id_pemesanan='$id_pemesanan'");
  $_SESSION['t'] = "hapus";
  echo "<script>window.open('pemesanan.php','_self')</script>";
}

else if(isset($_GET['id_pemesanan'])){
  $id_pemesanan=$_GET['id_pemesanan'];
  $query = "select * from pemesanan where id_pemesanan = '$id_pemesanan'";
  $rows = mysqli_query($con, $query);

  while ($row = mysqli_fetch_array($rows)) {
    $haha=$row;
  }
  echo json_encode($haha);
}




?>