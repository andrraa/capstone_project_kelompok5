<?php
include_once("db.php");
include_once("fungsi.php");
session_start();
if(isset($_POST['simpanSlider'])){

  $nama_slider = $_POST['nama_slider'];
  $heading_slider = $_POST['heading_slider'];
  $text_slider = $_POST['text_slider'];

  if($_FILES['gambar_slider']['name']!=""){
    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $gambar_slider = getRans(5).date("YmdHis").$_FILES['gambar_slider']['name'];
    $x = explode('.', $gambar_slider);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['gambar_slider']['size'];
    $file_tmp = $_FILES['gambar_slider']['tmp_name'];  
 
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      if($ukuran < 10440700){      
        move_uploaded_file($file_tmp, 'image/gambar_slider/'.$gambar_slider);
        $query = "Insert into slider(nama_slider, gambar_slider, heading_slider, text_slider) values('$nama_slider','$gambar_slider','$heading_slider','$text_slider')";
      }else{
        echo 'ukuran file terlalu besar';
      }
    }else{
        echo 'gunakan ekstrensi file yang benar';
    }
  }else{
    $query = "Insert into slider(nama_slider, heading_slider, text_slider) values('$nama_slider','$heading_slider','$text_slider')";
  }
  $run_query = mysqli_query($con, $query);
  $_SESSION['t'] = "simpan"; 
  echo "<script>window.open('slider.php','_self')</script>";
}

if(isset($_POST['editSlider'])){
  $id_slider = $_POST['id_slider'];
  $nama_slider = $_POST['nama_slider'];
  $heading_slider = $_POST['heading_slider'];
  $text_slider = $_POST['text_slider'];
  if($_FILES['gambar_slider']['name']!=""){
    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $gambar_slider = getRans(5).date("YmdHis").$_FILES['gambar_slider']['name'];
    $x = explode('.', $gambar_slider);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['gambar_slider']['size'];
    $file_tmp = $_FILES['gambar_slider']['tmp_name'];  
 
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      if($ukuran < 10440700){      
        move_uploaded_file($file_tmp, 'image/gambar_slider/'.$gambar_slider);

        $query = "select * from slider where id_slider='$id_slider'";
        $rows = mysqli_query($con, $query);
        $row = mysqli_fetch_array($rows);
        if(file_exists('image/gambar_slider/'.$row['gambar_slider']) && $row['gambar_slider']!="")
          unlink('image/gambar_slider/'.$row['gambar_slider']);
        $query = "update slider set nama_slider='$nama_slider', gambar_slider='$gambar_slider', heading_slider='$heading_slider', text_slider='$text_slider' where id_slider='$id_slider'";
      }else{
        echo 'ukuran file terlalu besar';
      }
    }else{
        echo 'gunakan ekstrensi file yang benar';
    }
  }else{
    $query = "update slider set nama_slider='$nama_slider', heading_slider='$heading_slider', text_slider='$text_slider' where id_slider='$id_slider'";
  }
  
  $run_query = mysqli_query($con, $query);
  $_SESSION['t'] = "edit";
  echo "<script>window.open('slider.php','_self')</script>";
}

else if(isset($_POST['hapusSlider'])){
  $id_slider=$_POST['id_slider'];
  $query = "select * from slider where id_slider='$id_slider'";
  $rows = mysqli_query($con, $query);
  $row = mysqli_fetch_array($rows);
  if(file_exists('image/gambar_slider/'.$row['gambar_slider'])  && $row['gambar_slider']!="")
    unlink('image/gambar_slider/'.$row['gambar_slider']);
  $run_query = mysqli_query($con, "DELETE FROM slider where id_slider='$id_slider'");
  $_SESSION['t'] = "hapus";
  echo "<script>window.open('slider.php','_self')</script>";
}

else if(isset($_GET['id_slider'])){
  $id_slider=$_GET['id_slider'];
  $query = "select * from slider where id_slider = '$id_slider'";
  $rows = mysqli_query($con, $query);

  while ($row = mysqli_fetch_array($rows)) {
    $haha=$row;
  }
  echo json_encode($haha);
}
