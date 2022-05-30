<?php
require_once('config.php');
include('db.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Tabel Produk</title>

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
  $menuProduk = "active";
  include 'header.php';
  ?>
  <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Produk</h3>
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
                        <a class="btn btn-secondary col-sm-2" href="produk.php">Reset</a>
                        </div>
                      </form>
                    </div>
                  </div>
                  <table id="tabelData" class="table table-bordered table-hover" style="margin-bottom: 15px;">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Produk Kategori</th>
                      <th>Kategori</th>
                      <th>Judul Produk</th>
                      <th>Harga</th>
                      <th>Keyword</th>
                      <th>Deskripsi</th>
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
        
        $data = mysqli_query($con,"select * from produk where id_produk_kategori like '%$cari%' or id_kategori like '%$cari%' or judul_produk like '%$cari%' or harga_produk like '%$cari%' or keyword_produk like '%$cari%' or deskripsi_produk like '%$cari%'");
        $jumlah_data = mysqli_num_rows($data);
        $total_halaman = ceil($jumlah_data / $batas);
        $no = $halaman_awal+1;


    $query = "select * from produk where id_produk_kategori like '%$cari%' or id_kategori like '%$cari%' or judul_produk like '%$cari%' or harga_produk like '%$cari%' or keyword_produk like '%$cari%' or deskripsi_produk like '%$cari%' order by id_produk desc limit $halaman_awal, $batas";
    $rows = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($rows)) {
    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $row['id_produk_kategori']; ?></td>
                      <td><?php echo $row['id_kategori']; ?></td>
                      <td><?php echo $row['judul_produk']; ?></td>
                      <td><?php echo $row['harga_produk']; ?></td>
                      <td><?php echo $row['keyword_produk']; ?></td>
                      <td><?php echo $row['deskripsi_produk']; ?></td>
                      <td><button type="button" class="btn btn-block btn-primary btnEdit" data-toggle="modal" data-target="#modalEdit"  data-id=<?php echo $row["id_produk"] ?>>Edit</button></td>
                      <td><button type="button" class="btn btn-block btn-danger btnHapus" data-toggle="modal" data-target="#modalHapus" data-id=<?php echo $row["id_produk"] ?>>Hapus</button></td>
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
                <h4 class="modal-title" id="judulModal">Tambah Produk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" method="post" action="produk-c.php">
                  <input type="hidden" name="simpanProduk">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Produk Kategori</label>
                      <div class="col-sm-10">
                        <input type="text" name="id_produk_kategori" class="form-control" placeholder="Produk Kategori">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Kategori</label>
                      <div class="col-sm-10">
                        <input type="text" name="id_kategori" class="form-control" placeholder="Kategori"> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Judul</label>
                      <div class="col-sm-10">
                        <input type="text" name="judul_produk" class="form-control" placeholder="Judul"> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Harga</label>
                      <div class="col-sm-10">
                        <input type="text" name="harga_produk" class="form-control" placeholder="Harga"> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Keyword</label>
                      <div class="col-sm-10">
                        <input type="text" name="keyword_produk" class="form-control" placeholder="Keyword"> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Deskripsi</label>
                      <div class="col-sm-10">
                        <input type="text" name="deskripsi_produk" class="form-control" placeholder="Deskripsi">
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
                <h4 class="modal-title" id="judulModal">Edit Produk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" method="post" action="produk-c.php">
                  <input type="hidden" name="editProduk" >
                  <input type="hidden" name="id_produk" id="eid_produk">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Produk Kategori</label>
                      <div class="col-sm-10">
                        <input type="text" id="eid_produk_kategori" name="id_produk_kategori" class="form-control" placeholder="Produk Kategori">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Kategori</label>
                      <div class="col-sm-10">
                        <input type="text" id="eid_kategori" name="id_kategori" class="form-control" placeholder="Kategori"> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Judul</label>
                      <div class="col-sm-10">
                        <input type="text" id="ejudul_produk" name="judul_produk" class="form-control" placeholder="Judul"> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Harga</label>
                      <div class="col-sm-10">
                        <input type="text" id="eharga_produk" name="harga_produk" class="form-control" placeholder="Harga"> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Keyword</label>
                      <div class="col-sm-10">
                        <input type="text" id="ekeyword_produk" name="keyword_produk" class="form-control" placeholder="Keyword"> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Deskripsi</label>
                      <div class="col-sm-10">
                        <input type="text" id="edeskripsi_produk" name="deskripsi_produk" class="form-control" placeholder="Deskripsi">
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
                <form class="form-horizontal" method="post" action="produk-c.php">
                  <input type="hidden" name="hapusProduk" >
                  <input type="hidden" name="id_produk" id="hid_produk">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Produk Kategori</label>
                      <div class="col-sm-10">
                        <input type="text" id="hid_produk_kategori" name="id_produk_kategori" class="form-control" placeholder="Produk Kategori" readonly="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Kategori</label>
                      <div class="col-sm-10">
                        <input type="text" id="hid_kategori" name="id_kategori" class="form-control" placeholder="Kategori" readonly=""> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Judul</label>
                      <div class="col-sm-10">
                        <input type="text" id="hjudul_produk" name="judul_produk" class="form-control" placeholder="Judul" readonly=""> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Harga</label>
                      <div class="col-sm-10">
                        <input type="text" id="hharga_produk" name="harga_produk" class="form-control" placeholder="Harga" readonly=""> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Keyword</label>
                      <div class="col-sm-10">
                        <input type="text" id="hkeyword_produk" name="keyword_produk" class="form-control" placeholder="Keyword" readonly=""> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Deskripsi</label>
                      <div class="col-sm-10">
                        <input type="text" id="hdeskripsi_produk" name="deskripsi_produk" class="form-control" placeholder="Deskripsi" readonly="">
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
    
  $('body').on('click', '.btnEdit', function () {

    var id_produk = $(this).data("id");
    $.ajax({
        data: {
          'id_produk': id_produk,
        },
        url: "produk-c.php",
        type: "GET",
            success: function (data) {
              myObj = JSON.parse(data);
              $('#eid_produk').val(myObj.id_produk);
              $('#eid_produk_kategori').val(myObj.id_produk_kategori);
              $('#eid_kategori').val(myObj.id_kategori);
              $('#ejudul_produk').val(myObj.judul_produk);
              $('#eharga_produk').val(myObj.harga_produk);
              $('#ekeyword_produk').val(myObj.keyword_produk);
              $('#edeskripsi_produk').val(myObj.deskripsi_produk);

            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
  });


  $('body').on('click', '.btnHapus', function () {

    var id_produk = $(this).data("id");
    $.ajax({
        data: {
          'id_produk': id_produk,
        },
        url: "produk-c.php",
        type: "GET",
            success: function (data) {
              myObj = JSON.parse(data);
              $('#hid_produk').val(myObj.id_produk);
              $('#hid_produk_kategori').val(myObj.id_produk_kategori);
              $('#hid_kategori').val(myObj.id_kategori);
              $('#hjudul_produk').val(myObj.judul_produk);
              $('#hharga_produk').val(myObj.harga_produk);
              $('#hkeyword_produk').val(myObj.keyword_produk);
              $('#hdeskripsi_produk').val(myObj.deskripsi_produk);

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

