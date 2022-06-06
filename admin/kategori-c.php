<?php
include_once("db.php");
include_once("fungsi.php");
session_start();
if(isset($_POST['simpanKategori'])){
  $judul = $_POST['judul'];
  $deskripsi = $_POST['deskripsi'];
  if($_FILES['gambar_kategori']['name']!=""){
    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $gambar_kategori = getRans(5).date("YmdHis").$_FILES['gambar_kategori']['name'];
    $x = explode('.', $gambar_kategori);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['gambar_kategori']['size'];
    $file_tmp = $_FILES['gambar_kategori']['tmp_name'];  
 
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      if($ukuran < 10440700){      
        move_uploaded_file($file_tmp, 'image/gambar_kategori/'.$gambar_kategori);
        $query = "Insert into kategori(judul_kategori, gambar_kategori, deskripsi_kategori) values('$judul','$gambar_kategori','$deskripsi')";
      }else{
        echo 'ukuran file terlalu besar';
      }
    }else{
        echo 'gunakan ekstrensi file yang benar';
    }
  }else{
    $query = "Insert into kategori(judul_kategori, deskripsi_kategori) values('$judul','$deskripsi')";
  }
  
  $run_query = mysqli_query($con, $query);
  $_SESSION['t'] = "simpan"; 
  echo "<script>window.open('kategori.php','_self')</script>";
}

if(isset($_POST['editKategori'])){
  $id_kategori = $_POST['id_kategori'];
  $judul = $_POST['judul'];
  $deskripsi = $_POST['deskripsi'];
  if($_FILES['gambar_kategori']['name']!=""){
    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $gambar_kategori = getRans(5).date("YmdHis").$_FILES['gambar_kategori']['name'];
    $x = explode('.', $gambar_kategori);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['gambar_kategori']['size'];
    $file_tmp = $_FILES['gambar_kategori']['tmp_name'];  
 
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      if($ukuran < 10440700){      
        move_uploaded_file($file_tmp, 'image/gambar_kategori/'.$gambar_kategori);

        $query = "select * from kategori where id_kategori='$id_kategori'";
        $rows = mysqli_query($con, $query);
        $row = mysqli_fetch_array($rows);
        if(file_exists('image/gambar_kategori/'.$row['gambar_kategori']) && $row['gambar_kategori']!="")
          unlink('image/gambar_kategori/'.$row['gambar_kategori']);
        $query = "update kategori set judul_kategori='$judul', gambar_kategori='$gambar_kategori', deskripsi_kategori='$deskripsi' where id_kategori='$id_kategori'";
      }else{
        echo 'ukuran file terlalu besar';
      }
    }else{
        echo 'gunakan ekstrensi file yang benar';
    }
  }else{
    $query = "update kategori set judul_kategori='$judul', deskripsi_kategori='$deskripsi' where id_kategori='$id_kategori'";
  }
  
  $run_query = mysqli_query($con, $query);
  $_SESSION['t'] = "edit";
  echo "<script>window.open('kategori.php','_self')</script>";
}

else if(isset($_POST['hapusKategori'])){
  $id_kategori=$_POST['id_kategori'];
  $query = "select * from kategori where id_kategori='$id_kategori'";
  $rows = mysqli_query($con, $query);
  $row = mysqli_fetch_array($rows);
  if(file_exists('image/gambar_kategori/'.$row['gambar_kategori']) && $row['gambar_kategori']!=""){
    unlink('image/gambar_kategori/'.$row['gambar_kategori']);
  }
  $run_query = mysqli_query($con, "DELETE FROM kategori where id_kategori='$id_kategori'");
  $_SESSION['t'] = "hapus";
  echo "<script>window.open('kategori.php','_self')</script>";


}

else if(isset($_GET['id_kategori'])){
  $id_kategori=$_GET['id_kategori'];
  $query = "select * from kategori where id_kategori = '$id_kategori'";
  $rows = mysqli_query($con, $query);

  while ($row = mysqli_fetch_array($rows)) {
    $haha=$row;
  }
  echo json_encode($haha);
}

