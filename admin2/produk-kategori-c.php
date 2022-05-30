<?php
include_once("db.php");
session_start();
if(isset($_POST['simpanProdukKategori'])){
  $judul = $_POST['judul'];
  $deskripsi = $_POST['deskripsi'];
  $query = "Insert into produk_kategori(judul_produk_kategori, deskripsi_produk_kategori) values('$judul','$deskripsi')";
  $run_query = mysqli_query($con, $query);
  $_SESSION['t'] = "simpan"; 
  echo "<script>window.open('produk-kategori.php','_self')</script>";
}

if(isset($_POST['editProdukKategori'])){
  $id_produk_kategori = $_POST['id_produk_kategori'];
  $judul = $_POST['judul'];
  $deskripsi = $_POST['deskripsi'];
  $query = "update produk_kategori set judul_produk_kategori='$judul', deskripsi_produk_kategori='$deskripsi' where id_produk_kategori='$id_produk_kategori'";
  $run_query = mysqli_query($con, $query);
  $_SESSION['t'] = "edit";
  echo "<script>window.open('produk-kategori.php','_self')</script>";
}

else if(isset($_POST['hapusProdukKategori'])){
  $id_produk_kategori=$_POST['id_produk_kategori'];
  $run_query = mysqli_query($con, "DELETE FROM produk_kategori where id_produk_kategori='$id_produk_kategori'");
  $_SESSION['t'] = "hapus";
  echo "<script>window.open('produk-kategori.php','_self')</script>";
}

else if(isset($_GET['id_produk_kategori'])){
  $id_produk_kategori=$_GET['id_produk_kategori'];
  $query = "select * from produk_kategori where id_produk_kategori = '$id_produk_kategori'";
  $rows = mysqli_query($con, $query);

  while ($row = mysqli_fetch_array($rows)) {
    $haha=$row;
  }
  echo json_encode($haha);
}





else if(isset($_POST['aksi'])){
  if($_POST['aksi']=="simpan"){
    $name=$_POST['nama_mata_pelajaran'];
    $tanggal=date('Y-m-d H:i:s');
    if(!$_POST['id_mapel']==""){
      $id_mapel=$_POST['id_mapel'];
      $result = mysqli_query($mysqli, "UPDATE mata_pelajarans set nama_mata_pelajaran='$name',updated_at='$tanggal' where id_mata_pelajaran='$id_mapel'");
    }
    else{
      $result = mysqli_query($mysqli, "INSERT INTO mata_pelajarans(nama_mata_pelajaran, created_at, updated_at) values('$name','$tanggal','$tanggal')");
    }
  }
  else if($_POST['aksi']=="hapus"){
    $id_mapel=$_POST['id_mapel'];
    $result = mysqli_query($mysqli, "DELETE FROM mata_pelajarans where id_mata_pelajaran='$id_mapel'");
  }
}
else{
  $result = mysqli_query($mysqli, "SELECT * FROM mata_pelajarans ORDER BY id_mata_pelajaran DESC");
                    $no=0;
                    while($user_data = mysqli_fetch_array($result)) { 
                    $no++; 
                      ?>
                      <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $user_data['nama_mata_pelajaran'] ?></td>
                    <td><button type='button' class='btn btn-block btn-primary btnEdit' data-id='<?php echo $user_data["id_mata_pelajaran"] ?>'>Edit</button></td>
                    <td><button type='button' class='btn btn-block btn-danger btnHapus' data-id='<?php echo $user_data["id_mata_pelajaran"] ?>'>Hapus</button></td>
                  </tr>
                <?php } 
}
?>