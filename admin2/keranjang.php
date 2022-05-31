<?php
require_once('config.php');
include('db.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Tabel Keranjang</title>

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
  $menuMaster = "menu-open";
  $menuMA = "active";
  $menuKeranjang = "active";
  include 'header.php';
  ?>
  <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Keranjang</h3>
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
                        <a class="btn btn-secondary col-sm-2" href="keranjang.php">Reset</a>
                        </div>
                      </form>
                    </div>
                  </div>
                  <table id="tabelData" class="table table-bordered table-hover" style="margin-bottom: 15px;">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Judul Produk</th>
                      <th>Email Pelanggan</th>
                      <th>Ukuran</th>
                      <th>Jumlah</th>
                      <th>Tanggal</th>
                      <th>Edit</th>
                      <th>Hapus</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
        $batas = 5;
        $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
        $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  

        $previous = $halaman - 1;
        $next = $halaman + 1;
        
        $data = mysqli_query($con,"select * from keranjang join produk on keranjang.id_produk=produk.id_produk where judul_produk like '%$cari%' or email_pelanggan like '%$cari%' or ukuran like '%$cari%' or jumlah like '%$cari%' or tanggal like '%$cari%'");
        $jumlah_data = mysqli_num_rows($data);
        $total_halaman = ceil($jumlah_data / $batas);
        $no = $halaman_awal+1;


    $query = "select * from keranjang join produk on keranjang.id_produk=produk.id_produk where judul_produk like '%$cari%' or email_pelanggan like '%$cari%' or ukuran like '%$cari%' or jumlah like '%$cari%' or tanggal like '%$cari%' order by id_keranjang desc limit $halaman_awal, $batas";
    $rows = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($rows)) {
    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $row['judul_produk']; ?></td>
                      <td><?php echo $row['email_pelanggan']; ?></td>
                      <td><?php echo $row['ukuran']; ?></td>
                      <td><?php echo $row['jumlah']; ?></td>
                      <td><?php echo $row['tanggal']; ?></td>
                      <td><button type="button" class="btn btn-block btn-primary btnEdit" data-toggle="modal" data-target="#modalEdit"  data-id=<?php echo $row["id_keranjang"] ?>>Edit</button></td>
                      <td><button type="button" class="btn btn-block btn-danger btnHapus" data-toggle="modal" data-target="#modalHapus" data-id=<?php echo $row["id_keranjang"] ?>>Hapus</button></td>
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
                <h4 class="modal-title" id="judulModal">Tambah Keranjang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" method="post" action="keranjang-c.php">
                  <input type="hidden" name="simpanKeranjang">
                  <div class="card-body">
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
                      <label class="col-sm-2 col-form-label">Email Pelanggan</label>
                      <div class="col-sm-10">
                        <input type="text" name="email_pelanggan" class="form-control" placeholder="Email Pelanggan"> 
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
                      <label class="col-sm-2 col-form-label">Tanggal</label>
                      <div class="col-sm-10">
                        <input type="text" name="tanggal" class="form-control" placeholder="Tanggal"> 
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
                <h4 class="modal-title" id="judulModal">Edit Keranjang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" method="post" action="keranjang-c.php">
                  <input type="hidden" name="editKeranjang" >
                  <input type="hidden" name="id_keranjang" id="eid_keranjang">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Judul Produk</label>
                      <div class="col-sm-10">
                        <select class="form-control select2bs4" style="width: 100%;" id="eid_produk" name="id_produk">
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Email Pelanggan</label>
                      <div class="col-sm-10">
                        <input type="text" id="eemail_pelanggan" name="email_pelanggan" class="form-control" placeholder="Email Pelanggan">
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
                      <label class="col-sm-2 col-form-label">Tanggal</label>
                      <div class="col-sm-10">
                        <input type="text" id="etanggal" name="tanggal" class="form-control" placeholder="tanggal">
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
                <form class="form-horizontal" method="post" action="keranjang-c.php">
                  <input type="hidden" name="hapusKeranjang" >
                  <input type="hidden" name="id_keranjang" id="hid_keranjang">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Judul Produk</label>
                      <div class="col-sm-10">
                        <input type="text" id="hid_produk" name="id_produk" class="form-control" placeholder="Judul Produk" readonly="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Email Pelanggan</label>
                      <div class="col-sm-10">
                        <input type="text" id="hemail_pelanggan" name="email_pelanggan" class="form-control" placeholder="Email Pelanggan" readonly="">
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
                      <label class="col-sm-2 col-form-label">Tanggal</label>
                      <div class="col-sm-10">
                        <input type="text" id="htanggal" name="tanggal" class="form-control" placeholder="tanggal" readonly="">
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

    var id_keranjang = $(this).data("id");
    $.ajax({
        data: {
          'id_keranjang': id_keranjang,
        },
        url: "keranjang-c.php",
        type: "GET",
            success: function (data) {
              myObj = JSON.parse(data);
              $('#eid_keranjang').val(myObj.id_keranjang);
              $('#eemail_pelanggan').val(myObj.email_pelanggan);
              $('#eukuran').val(myObj.ukuran);
              $('#ejumlah').val(myObj.jumlah);
              $('#etanggal').val(myObj.tanggal);

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

    var id_keranjang = $(this).data("id");
    $.ajax({
        data: {
          'id_keranjang': id_keranjang,
        },
        url: "keranjang-c.php",
        type: "GET",
            success: function (data) {
              myObj = JSON.parse(data);
              $('#hid_keranjang').val(myObj.id_keranjang);
              $('#hemail_pelanggan').val(myObj.email_pelanggan);
              $('#hukuran').val(myObj.ukuran);
              $('#hjumlah').val(myObj.jumlah);
              $('#htanggal').val(myObj.tanggal);

              alert(myObj.id_produk);

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

