<?php
include_once("db.php");
include_once("fungsi.php");
session_start();
if(isset($_POST['simpanAdmin'])){
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $alamat = $_POST['alamat'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  if($_FILES['foto_admin']['name']!=""){
    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $foto_admin = getRans(5).date("YmdHis").$_FILES['foto_admin']['name'];
    $x = explode('.', $foto_admin);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['foto_admin']['size'];
    $file_tmp = $_FILES['foto_admin']['tmp_name'];  
 
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      if($ukuran < 10440700){      
        move_uploaded_file($file_tmp, 'image/foto_admin/'.$foto_admin);
         $query = "Insert into admin(foto_admin, nama_admin, email_admin, password_admin, alamat_admin, jenis_kelamin_admin) values('$foto_admin','$nama','$email','$password','$alamat','$jenis_kelamin')";
      }else{
        echo 'ukuran file terlalu besar';
      }
    }else{
        echo 'gunakan ekstrensi file yang benar';
    }
  }else{
     $query = "Insert into admin(nama_admin, email_admin, password_admin, alamat_admin, jenis_kelamin_admin) values('$nama','$email','$password','$alamat','$jenis_kelamin')";
  }
 
  $run_query = mysqli_query($con, $query);
  $_SESSION['t'] = "simpan"; 
  echo "<script>window.open('admin.php','_self')</script>";
}

if(isset($_POST['editAdmin'])){
  $id_admin = $_POST['id_admin'];
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $alamat = $_POST['alamat'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  if($_FILES['foto_admin']['name']!=""){
    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $foto_admin = getRans(5).date("YmdHis").$_FILES['foto_admin']['name'];
    $x = explode('.', $foto_admin);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['foto_admin']['size'];
    $file_tmp = $_FILES['foto_admin']['tmp_name'];  
 
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      if($ukuran < 10440700){      
        move_uploaded_file($file_tmp, 'image/foto_admin/'.$foto_admin);

        $query = "select * from admin where id_admin='$id_admin'";
        $rows = mysqli_query($con, $query);
        $row = mysqli_fetch_array($rows);
        if(file_exists('image/foto_admin/'.$row['foto_admin']))
          unlink('image/foto_admin/'.$row['foto_admin']);
        $query = "update admin set foto_admin='$foto_admin', nama_admin='$nama', email_admin='$email', password_admin='$password', alamat_admin='$alamat', jenis_kelamin_admin='$jenis_kelamin' where id_admin='$id_admin'";
      }else{
        echo 'ukuran file terlalu besar';
      }
    }else{
        echo 'gunakan ekstrensi file yang benar';
    }
  }else{
    $query = "update admin set nama_admin='$nama', email_admin='$email', password_admin='$password', alamat_admin='$alamat', jenis_kelamin_admin='$jenis_kelamin' where id_admin='$id_admin'";
  }
  
  $run_query = mysqli_query($con, $query);
  $_SESSION['t'] = "edit";
  echo "<script>window.open('admin.php','_self')</script>";
}

else if(isset($_POST['hapusAdmin'])){
  $id_admin=$_POST['id_admin'];
  $query = "select * from admin where id_admin='$id_admin'";
  $rows = mysqli_query($con, $query);
  $row = mysqli_fetch_array($rows);
  if(file_exists('image/foto_admin/'.$row['foto_admin']) && $row['foto_admin']!=""){
    unlink('image/foto_admin/'.$row['foto_admin']);
  }
  $run_query = mysqli_query($con, "DELETE FROM admin where id_admin='$id_admin'");
  $_SESSION['t'] = "hapus";
  echo "<script>window.open('admin.php','_self')</script>";
}

else if(isset($_GET['id_admin'])){
  $id_admin=$_GET['id_admin'];
  $query = "select * from admin where id_admin = '$id_admin'";
  $rows = mysqli_query($con, $query);

  while ($row = mysqli_fetch_array($rows)) {
    $haha=$row;
  }
  echo json_encode($haha);
}