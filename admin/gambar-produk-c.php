<?php
include_once("db.php");
include_once("fungsi.php");
session_start();
if(isset($_POST['simpanGambarProduk'])){

  $id_produk = $_POST['id_produk'];

  if($_FILES['gambar_produk']['name']!=""){
    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $gambar_produk = getRans(5).date("YmdHis").$_FILES['gambar_produk']['name'];
    $x = explode('.', $gambar_produk);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['gambar_produk']['size'];
    $file_tmp = $_FILES['gambar_produk']['tmp_name'];  
 
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      if($ukuran < 10440700){      
        move_uploaded_file($file_tmp, 'image/gambar_produk/'.$gambar_produk);
        $query = "Insert into gambar_produk(id_produk, gambar_produk) values('$id_produk','$gambar_produk')";
      }else{
        echo 'ukuran file terlalu besar';
      }
    }else{
        echo 'gunakan ekstrensi file yang benar';
    }
  }else{
    $query = "Insert into gambar_produk(id_produk) values('$id_produk')";
  }
  $run_query = mysqli_query($con, $query);
  $_SESSION['t'] = "simpan"; 
  echo "<script>window.open('gambar-produk.php','_self')</script>";
}

if(isset($_POST['editGambarProduk'])){
  $id_gambar_produk = $_POST['id_gambar_produk'];
  $id_produk = $_POST['id_produk'];
  if($_FILES['gambar_produk']['name']!=""){
    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $gambar_produk = getRans(5).date("YmdHis").$_FILES['gambar_produk']['name'];
    $x = explode('.', $gambar_produk);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['gambar_produk']['size'];
    $file_tmp = $_FILES['gambar_produk']['tmp_name'];  
 
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      if($ukuran < 10440700){      
        move_uploaded_file($file_tmp, 'image/gambar_produk/'.$gambar_produk);

        $query = "select * from gambar_produk where id_gambar_produk='$id_gambar_produk'";
        $rows = mysqli_query($con, $query);
        $row = mysqli_fetch_array($rows);
        if(file_exists('image/gambar_produk/'.$row['gambar_produk']) && $row['gambar_produk']!="")
          unlink('image/gambar_produk/'.$row['gambar_produk']);
        $query = "update gambar_produk set id_produk='$id_produk', gambar_produk='$gambar_produk' where id_gambar_produk='$id_gambar_produk'";
      }else{
        echo 'ukuran file terlalu besar';
      }
    }else{
        echo 'gunakan ekstrensi file yang benar';
    }
  }else{
    $query = "update gambar_produk set id_produk='$id_produk' where id_gambar_produk='$id_gambar_produk'";
  }
  
  $run_query = mysqli_query($con, $query);
  $_SESSION['t'] = "edit";
  echo "<script>window.open('gambar-produk.php','_self')</script>";
}

else if(isset($_POST['hapusGambarProduk'])){
  $id_gambar_produk=$_POST['id_gambar_produk'];
  $query = "select * from gambar_produk where id_gambar_produk='$id_gambar_produk'";
  $rows = mysqli_query($con, $query);
  $row = mysqli_fetch_array($rows);
  if(file_exists('image/gambar_produk/'.$row['gambar_produk'])  && $row['gambar_produk']!="")
    unlink('image/gambar_produk/'.$row['gambar_produk']);
  $run_query = mysqli_query($con, "DELETE FROM gambar_produk where id_gambar_produk='$id_gambar_produk'");
  $_SESSION['t'] = "hapus";
  echo "<script>window.open('gambar-produk.php','_self')</script>";
}

else if(isset($_GET['id_gambar_produk'])){
  $id_gambar_produk=$_GET['id_gambar_produk'];
  $query = "select * from gambar_produk where id_gambar_produk = '$id_gambar_produk'";
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
