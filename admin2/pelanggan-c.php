<?php
include_once("db.php");
include_once("fungsi.php");
session_start();
if(isset($_POST['simpanPelanggan'])){
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $alamat = $_POST['alamat'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  if($_FILES['foto_pelanggan']['name']!=""){
    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $foto_pelanggan = getRans(5).date("YmdHis").$_FILES['foto_pelanggan']['name'];
    $x = explode('.', $foto_pelanggan);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['foto_pelanggan']['size'];
    $file_tmp = $_FILES['foto_pelanggan']['tmp_name'];
 
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      if($ukuran < 10440700){      
        move_uploaded_file($file_tmp, 'image/foto_pelanggan/'.$foto_pelanggan);
        $query = "Insert into pelanggan(foto_pelanggan, nama_pelanggan, email_pelanggan, password_pelanggan, alamat_pelanggan, jenis_kelamin_pelanggan) values('$foto_pelanggan','$nama','$email','$password','$alamat','$jenis_kelamin')";
      }else{
        echo 'ukuran file terlalu besar';
      }
    }else{
        echo 'gunakan ekstrensi file yang benar';
    }
  }else{
    $query = "Insert into pelanggan(nama_pelanggan, email_pelanggan, password_pelanggan, alamat_pelanggan, jenis_kelamin_pelanggan) values('$nama','$email','$password','$alamat','$jenis_kelamin')";
  }

  
  $run_query = mysqli_query($con, $query);
  $_SESSION['t'] = "simpan"; 
  echo "<script>window.open('pelanggan.php','_self')</script>";
}

if(isset($_POST['editPelanggan'])){
  $id_pelanggan = $_POST['id_pelanggan'];
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $alamat = $_POST['alamat'];
  $jenis_kelamin = $_POST['jenis_kelamin'];

  if($_FILES['foto_pelanggan']['name']!=""){
    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $foto_pelanggan = getRans(5).date("YmdHis").$_FILES['foto_pelanggan']['name'];
    $x = explode('.', $foto_pelanggan);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['foto_pelanggan']['size'];
    $file_tmp = $_FILES['foto_pelanggan']['tmp_name'];  
 
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      if($ukuran < 10440700){      
        move_uploaded_file($file_tmp, 'image/foto_pelanggan/'.$foto_pelanggan);

        $query = "select * from pelanggan where id_pelanggan='$id_pelanggan'";
        $rows = mysqli_query($con, $query);
        $row = mysqli_fetch_array($rows);
        if(file_exists('image/foto_pelanggan/'.$row['foto_pelanggan']) && $row['foto_pelanggan']!="")
          unlink('image/foto_pelanggan/'.$row['foto_pelanggan']);
        $query = "update pelanggan set foto_pelanggan='$foto_pelanggan', nama_pelanggan='$nama', email_pelanggan='$email', password_pelanggan='$password', alamat_pelanggan='$alamat', jenis_kelamin_pelanggan='$jenis_kelamin' where id_pelanggan='$id_pelanggan'";
      }else{
        echo 'ukuran file terlalu besar';
      }
    }else{
        echo 'gunakan ekstrensi file yang benar';
    }
  }else{
    $query = "update pelanggan set nama_pelanggan='$nama', email_pelanggan='$email', password_pelanggan='$password', alamat_pelanggan='$alamat', jenis_kelamin_pelanggan='$jenis_kelamin' where id_pelanggan='$id_pelanggan'";
  }
  
  $run_query = mysqli_query($con, $query);
  $_SESSION['t'] = "edit";
  echo "<script>window.open('pelanggan.php','_self')</script>";
}

else if(isset($_POST['hapusPelanggan'])){
  $id_pelanggan=$_POST['id_pelanggan'];
  $query = "select * from pelanggan where id_pelanggan='$id_pelanggan'";
  $rows = mysqli_query($con, $query);
  $row = mysqli_fetch_array($rows);
  if(file_exists('image/foto_pelanggan/'.$row['foto_pelanggan']) && $row['foto_pelanggan']!="")
    unlink('image/foto_pelanggan/'.$row['foto_pelanggan']);
  $run_query = mysqli_query($con, "DELETE FROM pelanggan where id_pelanggan='$id_pelanggan'");
  $_SESSION['t'] = "hapus";
  echo "<script>window.open('pelanggan.php','_self')</script>";
}

else if(isset($_GET['id_pelanggan'])){
  $id_pelanggan=$_GET['id_pelanggan'];
  $query = "select * from pelanggan where id_pelanggan = '$id_pelanggan'";
  $rows = mysqli_query($con, $query);

  while ($row = mysqli_fetch_array($rows)) {
    $haha=$row;
  }
  echo json_encode($haha);
}