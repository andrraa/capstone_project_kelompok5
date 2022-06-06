<?php
require_once('config.php');
include('db.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Tabel Pemesanan</title>

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
  $menuPPemesanan = "active";
  include 'header.php';
  ?>
  <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Pemesanan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="form-group row" style=" float: right;margin-bottom: 10px;width:50%; min-width: 300px;">
                    <label class="col-sm-3 col-md-2 col-form-label">Cari : </label>
                    <div class="col-sm-9 col-md-10">
                      <form class="form-horizontal" method="get" action="">
                        <div class="form-group row">
                          <?php
                          $cari="";
                          if(isset($_GET['cari'])){ 
                            $cari=$_GET['cari'];
                          }
                          ?>
                        <input type="text" name="cari" class="form-control col-sm-7" placeholder="Cari.."
                        value = "<?php echo $cari; ?>">
                        <div class="col-sm-0" style="margin-right:1%"></div>
                        <input type="submit" class="btn btn-primary col-sm-2" id="btnCari" value="Cari">
                        <div class="col-sm-0" style="margin-right:1%"></div>
                        <a class="btn btn-secondary col-sm-2" href="pemesanan.php">Reset</a>
                        </div>
                      </form>
                    </div>
                  </div>
                  <table id="tabelData" class="table table-bordered table-hover" style="margin-bottom: 15px;">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Pelanggan</th>
                      <th>Alamat Pengiriman</th>
                      <th>Jenis Pengiriman</th>
                      <th>Status</th>
                      <th>Tanggal</th>
                      <th>Total</th>
                      <th>Detail</th>
                      <th>Edit</th>
                      <th>Hapus</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php

                      $jenis_pengirimans = array('JNE','J&T','sicepat');
                      $statuss = array('Belum dibayar','Belum Dikirim','Pejalanan','Sampai');
        $batas = 5;
        $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
        $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  

        $previous = $halaman - 1;
        $next = $halaman + 1;
        
        $data = mysqli_query($con,"select * from pemesanan join pelanggan on pemesanan.id_pelanggan=pelanggan.id_pelanggan where nama_pelanggan like '%$cari%' or alamat_pengiriman like '%$cari%' or jenis_pengiriman like '%$cari%' or status like '%$cari%' or tanggal like '%$cari%'");
        $jumlah_data = mysqli_num_rows($data);
        $total_halaman = ceil($jumlah_data / $batas);
        $no = $halaman_awal+1;


    $query = "select * from pemesanan join pelanggan on pemesanan.id_pelanggan=pelanggan.id_pelanggan where nama_pelanggan like '%$cari%' or alamat_pengiriman like '%$cari%' or jenis_pengiriman like '%$cari%' or status like '%$cari%' or tanggal like '%$cari%' order by id_pemesanan desc limit $halaman_awal, $batas";
    $rows = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($rows)) {
    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $row['nama_pelanggan']; ?></td>
                      <td><?php echo $row['alamat_pengiriman']; ?></td>
                      <td><?php echo $row['jenis_pengiriman']; ?></td>
                      <td><?php echo $row['status']; ?></td>
                      <td><?php echo $row['tanggal']; ?></td>
                      <?php
                      $id_pemesanan = $row['id_pemesanan'];
                      $query2 = "select sum(harga_produk*jumlah) as total from pemesanan_detail where id_pemesanan = $id_pemesanan";
                      $rows2 = mysqli_query($con, $query2);
                      while ($row2 = mysqli_fetch_array($rows2)) {
                        ?>
                        <td><?php echo $row2['total']; ?></td>
                        <?php
                      }
                      ?>
                      <td><button onclick="window.location.href='pemesanan-detail.php?pemesanan=<?php echo $row['id_pemesanan']; ?>'" type="button" class="btn btn-block btn-success btnHapus" data-toggle="modal" >Detail</button></td>
                      <td><button type="button" class="btn btn-block btn-primary btnEdit" data-toggle="modal" data-target="#modalEdit"  data-id=<?php echo $row["id_pemesanan"] ?>>Edit</button></td>
                      <td><button type="button" class="btn btn-block btn-danger btnHapus" data-toggle="modal" data-target="#modalHapus" data-id=<?php echo $row["id_pemesanan"] ?>>Hapus</button></td>

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
                <h4 class="modal-title" id="judulModal">Tambah Pemesanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" method="post" action="pemesanan-c.php">
                  <input type="hidden" name="simpanPemesanan">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama Pelanggan</label>
                      <div class="col-sm-10">
                        <select class="form-control select2bs4" style="width: 100%;" name="id_pelanggan">
                          <?php 
                          $query = "select * from pelanggan order by id_pelanggan desc";
                            $rows = mysqli_query($con, $query);
                            while ($row = mysqli_fetch_array($rows)) {
                              ?>
                            <option value="<?php echo $row["id_pelanggan"]?>"><?php echo $row['nama_pelanggan'] ?></option>
                            <?php
                          }
                          ?>
                          
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Alamat Pengiriman</label>
                      <div class="col-sm-10">
                        <input type="text" name="alamat_pengiriman" class="form-control" placeholder="Alamat Pengiriman"> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jenis Pengiriman</label>
                      <div class="col-sm-10">
                        <select class="form-control select2bs4" style="width: 100%;" name="jenis_pengiriman">
                          <?php foreach($jenis_pengirimans as $jenis_pengiriman){
                            echo "<option>$jenis_pengiriman</option>";
                          }
                          ?>
                          
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Status</label>
                      <div class="col-sm-10">
                        <select class="form-control select2bs4" style="width: 100%;" name="status">
                          <?php foreach($statuss as $status){
                            echo "<option>$status</option>";
                          }
                          ?>
                          
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Tanggal</label>
                      <div class="col-sm-10">
                        <input type="datetime-local" name="tanggal" class="form-control" placeholder="Tanggal"> 
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
                <h4 class="modal-title" id="judulModal">Edit Pemesanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" method="post" action="pemesanan-c.php">
                  <input type="hidden" name="editPemesanan" >
                  <input type="hidden" name="id_pemesanan" id="eid_pemesanan">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama Pelanggan</label>
                      <div class="col-sm-10">
                        <select class="form-control select2bs4" style="width: 100%;" id="eid_pelanggan" name="id_pelanggan">
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Alamat Pengiriman</label>
                      <div class="col-sm-10">
                        <input type="text" id="ealamat_pengiriman" name="alamat_pengiriman" class="form-control" placeholder="Alamat Pengiriman"> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jenis Pengiriman</label>
                      <div class="col-sm-10">
                        <select class="form-control select2bs4" style="width: 100%;" name="jenis_pengiriman" id="ejenis_pengiriman">
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Status</label>
                      <div class="col-sm-10">
                        <select class="form-control select2bs4" style="width: 100%;" name="status" id="estatus">
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Tanggal</label>
                      <div class="col-sm-10">
                        <input type="text" id="etanggal" name="tanggal" class="form-control" placeholder="Tanggal"> 
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
                <form class="form-horizontal" method="post" action="pemesanan-c.php">
                  <input type="hidden" name="hapusPemesanan" >
                  <input type="hidden" name="id_pemesanan" id="hid_pemesanan">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">ID Pelanggan</label>
                      <div class="col-sm-10">
                        <input type="text" id="hid_pelanggan" name="id_pelanggan" class="form-control" placeholder="ID Pelanggan" readonly=""> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Alamat Pengiriman</label>
                      <div class="col-sm-10">
                        <input type="text" id="halamat_pengiriman" name="alamat_pengiriman" class="form-control" placeholder="Alamat Pengiriman" readonly=""> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jenis Pengiriman</label>
                      <div class="col-sm-10">
                        <input type="text" id="hjenis_pengiriman" name="jenis_pengiriman" class="form-control" placeholder="Jenis Pengiriman" readonly=""> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Status</label>
                      <div class="col-sm-10">
                        <input type="text" id="hstatus" name="status" class="form-control" placeholder="Status" readonly=""> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Tanggal</label>
                      <div class="col-sm-10">
                        <input type="text" id="htanggal" name="tanggal" class="form-control" placeholder="Tanggal" readonly=""> 
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

  bsCustomFileInput.init();
  $('.select2bs4').select2({
        
    theme: 'bootstrap4',
    placeholder: "---Pilih---",
  });
    
  $('body').on('click', '.btnEdit', function () {

    bsCustomFileInput.init();
  $('.select2bs4').select2({
        
    theme: 'bootstrap4',
    placeholder: "---Pilih---",
  });

    var id_pemesanan = $(this).data("id");
    $.ajax({
        data: {
          'id_pemesanan': id_pemesanan,
        },
        url: "pemesanan-c.php",
        type: "GET",
            success: function (data) {
              myObj = JSON.parse(data);
              $('#eid_pemesanan').val(myObj.id_pemesanan);
              $('#ealamat_pengiriman').val(myObj.alamat_pengiriman);
              $('#etanggal').val(myObj.tanggal);

              var tpelanggan = myObj['tpelanggan'];
              let txtp ="";
              tpelanggan.forEach(tpfungsi);
              function tpfungsi(value) {
                if(value["id_pelanggan"]==myObj.id_pelanggan)
                  txtp +=  "<option value="+value['id_pelanggan']+" selected>"+value['nama_pelanggan']+"</option>";
                else
                  txtp +=  "<option value="+value['id_pelanggan']+">"+value['nama_pelanggan']+"</option>";
              }
              $('#eid_pelanggan').html(txtp);

              var jk = <?php echo json_encode($jenis_pengirimans); ?>;
              let txtjp = "";
              jk.forEach(jpfungsi);
              function jpfungsi(value) {
                if(value==myObj.jenis_pengiriman)
                  txtjp +=  "<option selected>"+value+"</option>";
                else
                  txtjp +=  "<option>"+value+"</option>";
              }

              $('#ejenis_pengiriman').html(txtjp);

              var jk = <?php echo json_encode($statuss); ?>;
              let txts = "";
              jk.forEach(sfungsi);
              function sfungsi(value) {
                if(value==myObj.status)
                  txts +=  "<option selected>"+value+"</option>";
                else
                  txts +=  "<option>"+value+"</option>";
              }

              $('#estatus').html(txts);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
  });


  $('body').on('click', '.btnHapus', function () {

    var id_pemesanan = $(this).data("id");
    $.ajax({
        data: {
          'id_pemesanan': id_pemesanan,
        },
        url: "pemesanan-c.php",
        type: "GET",
            success: function (data) {
              myObj = JSON.parse(data);
              $('#hid_pemesanan').val(myObj.id_pemesanan);
              $('#halamat_pengiriman').val(myObj.alamat_pengiriman);
              $('#hjenis_pengiriman').val(myObj.jenis_pengiriman);
              $('#hstatus').val(myObj.status);
              $('#htanggal').val(myObj.tanggal);

              var tpelanggan = myObj['tpelanggan'];
              tpelanggan.forEach(tpfungsi);
              function tpfungsi(value) {
                if(value["id_pelanggan"]==myObj.id_pelanggan)
                $('#hid_pelanggan').val(value['nama_pelanggan']);
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

