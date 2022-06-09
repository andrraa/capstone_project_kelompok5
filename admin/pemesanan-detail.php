<?php
require_once('config.php');
include('db.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Tabel Pemesanan Detail</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="resource/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="resource/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="resource/plugins/select2/css/select2.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="resource/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

  
  <link rel="stylesheet" href="resource/plugins/fontawesome-free/css/all.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="resource/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="resource/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="resource/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini">
  
<div class="wrapper">
  <?php 
  $menuPemesanan = "menu-open";
  $menuPA = "active";
  $menuPemesananDetail = "active";
  include 'header.php';
  ?>
  <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Pemesanan Detail</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                  <?php
                          $cari="";
                          $pemesanan="";
                          if(isset($_GET['cari'])){ 
                            $cari=$_GET['cari'];
                          }
                          if(isset($_GET['pemesanan'])){ 
                            $pemesanan=$_GET['pemesanan'];
                          }
                          ?>
                  <div class="form-group row" style=" float: left;margin-bottom: 10px;width:50%; min-width: 300px;">
                    <label class="col-sm-3 col-form-label">Pemesanan</label>
                    <div class="col-sm-9">
                      <form class="form-horizontal" method="get" action="">
                        <div class="form-group row">
                        <select class="form-control select2bs4 col-sm-6" style="width: 80%;" name="pemesanan" id="pemesanan">
                          <?php 
                          $query = "select * from pemesanan join pelanggan on pemesanan.id_pelanggan=pelanggan.id_pelanggan order by id_pemesanan desc";
                          $rows = mysqli_query($con, $query);
                          while ($row = mysqli_fetch_array($rows)) {
                          ?>
                          <option value="<?php echo $row['id_pemesanan']; ?>"><?php echo $row['nama_pelanggan']." (".$row['tanggal'].")"; ?></option>
                          <?php
                          }
                          ?>

                        </select>
                        <div class="col-sm-0" style="margin-right:1%"></div>
                        <input type="submit" class="btn btn-primary col-sm-2" id="btnPilih" value="Pilih">
                        </div>
                      </form>

                    </div>
                  </div>
                  <div class="form-group row" style=" float: right;margin-bottom: 10px;width:50%; min-width: 300px;">
                    <label class="col-sm-3 col-md-2 col-form-label">Cari : </label>
                    <div class="col-sm-9 col-md-10">
                      <form class="form-horizontal" method="get" action="">
                        <div class="form-group row">

                        <input type="text" name="cari" class="form-control col-sm-7" placeholder="Cari.." value = "<?php echo $cari; ?>">
                        <div class="col-sm-0" style="margin-right:1%"></div>
                        <input type="submit" class="btn btn-primary col-sm-2" id="btnCari" value="Cari">
                        <div class="col-sm-0" style="margin-right:1%"></div>
                        <a class="btn btn-secondary col-sm-2" href="pemesanan-detail.php">Reset</a>
                        </div>
                      </form>
                    </div>
                  </div>
                  <table id="tabelData" class="table table-bordered table-hover" style="margin-bottom: 15px;">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Pemesanan</th>
                      <th>Judul Produk</th>
                      <th>Ukuran</th>
                      <th>Jumlah</th>
                      <th>Harga Produk</th>
                      <th>Edit</th>
                      <th>Hapus</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      $ukurans = array('S','M','L','XL');
        $batas = 5;
        $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
        $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  

        $previous = $halaman - 1;
        $next = $halaman + 1;
        if($pemesanan==""){
        $data = mysqli_query($con,"select * from pemesanan_detail join produk on pemesanan_detail.id_produk=produk.id_produk join pemesanan on pemesanan.id_pemesanan=pemesanan_detail.id_pemesanan join pelanggan on pelanggan.id_pelanggan=pemesanan.id_pelanggan where nama_pelanggan like '%$cari%' or judul_produk like '%$cari%' or ukuran like '%$cari%' or jumlah like '%$cari%' or pemesanan_detail.harga_produk like '%$cari%'");
        }
        else{
          $data = mysqli_query($con,"select * from pemesanan_detail join produk on pemesanan_detail.id_produk=produk.id_produk join pemesanan on pemesanan.id_pemesanan=pemesanan_detail.id_pemesanan join pelanggan on pelanggan.id_pelanggan=pemesanan.id_pelanggan where pemesanan_detail.id_pemesanan=$pemesanan and (nama_pelanggan like '%$cari%' or judul_produk like '%$cari%' or ukuran like '%$cari%' or jumlah like '%$cari%' or pemesanan_detail.harga_produk like '%$cari%')");
        }
        $jumlah_data = mysqli_num_rows($data);
        $total_halaman = ceil($jumlah_data / $batas);
        $no = $halaman_awal+1;

        if($pemesanan==""){
    $query = "select *, pemesanan_detail.harga_produk as pdharga_produk from pemesanan_detail join produk on pemesanan_detail.id_produk=produk.id_produk join pemesanan on pemesanan.id_pemesanan=pemesanan_detail.id_pemesanan join pelanggan on pelanggan.id_pelanggan=pemesanan.id_pelanggan where nama_pelanggan like '%$cari%' or judul_produk like '%$cari%' or ukuran like '%$cari%' or jumlah like '%$cari%' or pemesanan_detail.harga_produk like '%$cari%' order by id_pemesanan_detail desc limit $halaman_awal, $batas";
  }
    else{
      $query = "select *, pemesanan_detail.harga_produk as pdharga_produk from pemesanan_detail join produk on pemesanan_detail.id_produk=produk.id_produk join pemesanan on pemesanan.id_pemesanan=pemesanan_detail.id_pemesanan join pelanggan on pelanggan.id_pelanggan=pemesanan.id_pelanggan where pemesanan_detail.id_pemesanan=$pemesanan and (nama_pelanggan like '%$cari%' or judul_produk like '%$cari%' or ukuran like '%$cari%' or jumlah like '%$cari%' or pemesanan_detail.harga_produk like '%$cari%') order by id_pemesanan_detail desc limit $halaman_awal, $batas";
    }

    $rows = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($rows)) {
    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $row['nama_pelanggan']." (".$row['tanggal'].")"; ?></td>
                      <td><?php echo $row['judul_produk']; ?></td>
                      <td><?php echo $row['ukuran']; ?></td>
                      <td><?php echo $row['jumlah']; ?></td>
                      <td><?php echo $row['pdharga_produk']; ?></td>
                      <td><button type="button" class="btn btn-block btn-primary btnEdit" data-toggle="modal" data-target="#modalEdit"  data-id=<?php echo $row["id_pemesanan_detail"] ?>>Edit</button></td>
                      <td><button type="button" class="btn btn-block btn-danger btnHapus" data-toggle="modal" data-target="#modalHapus" data-id=<?php echo $row["id_pemesanan_detail"] ?>>Hapus</button></td>
                    </tr>
                  <?php
                  }
                  ?>

                    </tbody>
                  </table>
                  <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modalTambah" >Tambah</button>
                  <br>
                  <nav aria-label="...">
                    <ul class="pagination">
                      <li class="page-item <?php if($halaman <= 1) echo "disabled";  ?>">
                        <a class="page-link" <?php if($halaman > 1){ if(isset($_GET['cari'])){ echo "href='?halaman=$previous&cari=$cari'";} else{echo "href='?halaman=$previous'";} } ?>>Previous</a>
                      </li>

                      <?php 
                        for($x=1;$x<=$total_halaman;$x++){
                      ?> 
                      <li class="page-item <?php if($halaman == $x) echo "active";  ?>" >
                        <a class="page-link" href="?halaman=<?php echo $x; if(isset($_GET['cari'])){ ?>&cari=<?php echo $cari; }?>"><?php echo $x; ?></a>
                      </li>
                      <?php
                        }
                      ?>
                      <li class="page-item <?php if($halaman >= $total_halaman) echo "disabled";  ?>">
                        <a class="page-link" <?php if($halaman < $total_halaman) { if(isset($_GET['cari'])){echo "href='?halaman=$next&cari=$cari'";} else{echo "href='?halaman=$next'";} } ?>>Next</a>
                      </li>
                    </ul>
                  </nav>
                </div>

                <!-- /.card-body -->

              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  
  

  </div>
</div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminFashops</a>.</strong> Kelompok 5, Capstone Project
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->








<!-- ./wrapper -->
      <div class="modal fade" id="modalTambah">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="judulModal">Tambah Pemesanan Detail</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" method="post" action="pemesanan-detail-c.php">
                  <input type="hidden" name="simpanPemesananDetail">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">ID Pemesanan</label>
                      <div class="col-sm-10">
                        <input type="text" name="id_pemesanan" class="form-control" placeholder="ID Pemesanan"> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Judul Produk</label>
                      <div class="col-sm-10">
                        <select class="form-control select2bs4" style="width: 100%;" name="id_produk">
                          <?php 
                          $query = "select * from produk order by id_produk desc";
                            $rows = mysqli_query($con, $query);
                            while ($row = mysqli_fetch_array($rows)) {
                              ?>
                            <option value="<?php echo $row["id_produk"]?>"><?php echo $row['judul_produk'] ?></option>
                            <?php
                          }
                          ?>
                          
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Ukuran</label>
                      <div class="col-sm-10">
                        <input type="text" name="ukuran" class="form-control" placeholder="Ukuran"> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jumlah</label>
                      <div class="col-sm-10">
                        <input type="text" name="jumlah" class="form-control" placeholder="Jumlah"> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Harga Produk</label>
                      <div class="col-sm-10">
                        <input type="text" name="harga_produk" class="form-control" placeholder="Harga Produk"> 
                      </div>
                    </div>
                  </div>
                </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="btnSimpan" style="margin-right: 0%;width:20%">Simpan</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
  
        <div class="modal fade" id="modalEdit">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="judulModal">Edit Pemesanan Detail</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" method="post" action="pemesanan-detail-c.php">
                  <input type="hidden" name="editPemesananDetail" >
                  <input type="hidden" name="id_pemesanan_detail" id="eid_pemesanan_detail">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">ID Pemesanan</label>
                      <div class="col-sm-10">
                        <input type="text" id="eid_pemesanan" name="id_pemesanan" class="form-control" placeholder="ID Pemesanan"> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Judul Produk</label>
                      <div class="col-sm-10">
                        <select class="form-control select2bs4" style="width: 100%;" id="eid_produk" name="id_produk">
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Ukuran</label>
                      <div class="col-sm-10">
                        <input type="text" id="eukuran" name="ukuran" class="form-control" placeholder="Ukuran"> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jumlah</label>
                      <div class="col-sm-10">
                        <input type="text" id="ejumlah" name="jumlah" class="form-control" placeholder="Jumlah"> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Harga Produk</label>
                      <div class="col-sm-10">
                        <input type="text" id="eharga_produk" name="harga_produk" class="form-control" placeholder="Harga Produk"> 
                      </div>
                    </div>
                  </div>
                </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="btnSimpan" style="margin-right: 0%;width:20%" >Edit</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
  
        <div class="modal fade" id="modalHapus">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="judulModal">Apakah Anda yakin untuk menghapus data ini?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" method="post" action="pemesanan-detail-c.php">
                  <input type="hidden" name="hapusPemesananDetail" >
                  <input type="hidden" name="id_pemesanan_detail" id="hid_pemesanan_detail">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">ID Pemesanan</label>
                      <div class="col-sm-10">
                        <input type="text" id="hid_pemesanan" name="id_pemesanan" class="form-control" placeholder="ID  Pemesanan" readonly=""> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">ID Produk</label>
                      <div class="col-sm-10">
                        <input type="text" id="hid_produk" name="id_produk" class="form-control" placeholder="ID Produk" readonly=""> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Ukuran</label>
                      <div class="col-sm-10">
                        <input type="text" id="hukuran" name="ukuran" class="form-control" placeholder="Ukuran" readonly=""> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jumlah</label>
                      <div class="col-sm-10">
                        <input type="text" id="hjumlah" name="jumlah" class="form-control" placeholder="Jumlah" readonly=""> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Harga Produk</label>
                      <div class="col-sm-10">
                        <input type="text" id="hharga_produk" name="harga_produk" class="form-control" placeholder="Harga Produk" readonly=""> 
                      </div>
                    </div>
                  </div>
                </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-danger" id="hbtnHapus" style="margin-right: 0%;width:20%">Hapus</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>




  
    <!-- jQuery -->
<script src="resource/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="resource/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="resource/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="resource/dist/js/demo.js"></script>
<!-- Page specific script -->
<script src="resource/plugins/select2/js/select2.full.min.js"></script>

<!-- validasi -->
<script src="resource/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="resource/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- alert -->
<script src="resource/plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- bs-custom-file-input -->
<script src="resource/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>


<!-- InputMask -->
<script src="resource/moment-with-locales.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="resource/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script type="text/javascript">

  var pm = <?php echo json_encode($pemesanan); ?>;
  $('#pemesanan').val(pm);

  bsCustomFileInput.init();
  $('.select2bs4').select2({
        
    theme: 'bootstrap4',
    placeholder: "---Pilih---",
  });
    
  $('body').on('click', '.btnEdit', function () {

    var id_pemesanan_detail = $(this).data("id");
    $.ajax({
        data: {
          'id_pemesanan_detail': id_pemesanan_detail,
        },
        url: "pemesanan-detail-c.php",
        type: "GET",
            success: function (data) {
              myObj = JSON.parse(data);
              $('#eid_pemesanan_detail').val(myObj.id_pemesanan_detail);
              $('#eid_pemesanan').val(myObj.id_pemesanan);
              $('#eukuran').val(myObj.ukuran);
              $('#ejumlah').val(myObj.jumlah);
              $('#eharga_produk').val(myObj.harga_produk);

              var tproduk = myObj['tproduk'];
              let txtp ="";
              tproduk.forEach(tpfungsi);
              function tpfungsi(value) {
                if(value["id_produk"]==myObj.id_produk)
                  txtp +=  "<option value="+value['id_produk']+" selected>"+value['judul_produk']+"</option>";
                else
                  txtp +=  "<option value="+value['id_produk']+">"+value['judul_produk']+"</option>";
              }
              $('#eid_produk').html(txtp);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
  });


  $('body').on('click', '.btnHapus', function () {

    var id_pemesanan_detail = $(this).data("id");
    $.ajax({
        data: {
          'id_pemesanan_detail': id_pemesanan_detail,
        },
        url: "pemesanan-detail-c.php",
        type: "GET",
            success: function (data) {
              myObj = JSON.parse(data);
              $('#hid_pemesanan_detail').val(myObj.id_pemesanan_detail);
              $('#hid_pemesanan').val(myObj.id_pemesanan);
              $('#hukuran').val(myObj.ukuran);
              $('#hjumlah').val(myObj.jumlah);
              $('#hharga_produk').val(myObj.harga_produk);

              var tpelanggan = myObj['tproduk'];
              tproduk.forEach(tpfungsi);
              function tpfungsi(value) {
                if(value["id_produk"]==myObj.id_produk)
                $('#hid_produk').val(value['judul_produk']);
              }

            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
  });

  var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });


    function berhasilHapus(){
      Toast.fire({
        icon: 'success',
        title: 'Data berhasil dihapus.'
      })
    };
    function berhasilEdit(){
      Toast.fire({
        icon: 'success',
        title: 'Data berhasil diedit.'
      })
    };
    function berhasilSimpan(){
      Toast.fire({
        icon: 'success',
        title: 'Data berhasil disimpan.'
      })
    };
    <?php

    $t="";
    if(isset($_SESSION['t'])) {
        $t = $_SESSION['t'];
        unset($_SESSION['t']);
    }

    ?>

    var t = "";
    t = "<?php echo $t; ?>";
    if(t=="simpan"){
      berhasilSimpan();
    }
    else if(t=="hapus"){
      berhasilHapus();
    }
    else if(t=="edit"){
      berhasilEdit();
    }
    
</script>
</body>

</html>

