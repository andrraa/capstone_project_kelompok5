<?php
require_once('config.php');
include('db.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Tabel Admin</title>

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
  $menuAdmin = "active";
  include 'header.php';
  ?>
  <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Admin</h3>
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
                        <a class="btn btn-secondary col-sm-2" href="admin.php">Reset</a>
                        </div>
                      </form>
                    </div>
                  </div>
                  <table id="tabelData" class="table table-bordered table-hover" style="margin-bottom: 15px;">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Foto</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Alamat</th>
                      <th>Jenis Kelamin</th>
                      <th>Edit</th>
                      <th>Hapus</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php

                      $jenis_kelamins = array('Laki-laki','Perempuan');
        $batas = 5;
        $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
        $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  

        $previous = $halaman - 1;
        $next = $halaman + 1;
        
        $data = mysqli_query($con,"select * from admin where nama_admin like '%$cari%' or email_admin like '%$cari%' or alamat_admin like '%$cari%' or jenis_kelamin_admin like '%$cari%'");
        $jumlah_data = mysqli_num_rows($data);
        $total_halaman = ceil($jumlah_data / $batas);
        $no = $halaman_awal+1;


    $query = "select * from admin where nama_admin like '%$cari%' or email_admin like '%$cari%' or alamat_admin like '%$cari%' or jenis_kelamin_admin like '%$cari%' order by id_admin desc limit $halaman_awal, $batas";
    $rows = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($rows)) {
    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td style="text-align: center;"><img src="image/foto_admin/<?php echo $row['foto_admin']; ?>" style="height:100px;max-width:600px"></td>
                      <td><?php echo $row['nama_admin']; ?></td>
                      <td><?php echo $row['email_admin']; ?></td>
                      <td><?php echo $row['alamat_admin']; ?></td>
                      <td><?php echo $row['jenis_kelamin_admin']; ?></td>
                      <td><button type="button" class="btn btn-block btn-primary btnEdit" data-toggle="modal" data-target="#modalEditVisiMisi"  data-id=<?php echo $row["id_admin"] ?>>Edit</button></td>
                      <td><button type="button" class="btn btn-block btn-danger btnHapus" data-toggle="modal" data-target="#modalHapusVisiMisi" data-id=<?php echo $row["id_admin"] ?>>Hapus</button></td>
                    </tr>
                  <?php
                  }
                  ?>

                    </tbody>
                  </table>
                  <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modalTambahVisiMisi" >Tambah</button>
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
      <div class="modal fade" id="modalTambahVisiMisi">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="judulModal">Tambah Admin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" method="post" action="admin-c.php" enctype="multipart/form-data">
                  <input type="hidden" name="simpanAdmin">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Foto Admin</label>
                      <div class="col-sm-10">
                        <div class="custom-file"> 
                          <input type="file" name = "foto_admin" class="custom-file-input">
                          <label class="custom-file-label" for="foto_admin">Choose file</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control" placeholder="Nama"> 
                        <span class="text-danger">salah tulis</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="text" name="email" class="form-control" placeholder="Email"> 
                        <span class="text-danger">salah tulis</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" placeholder="Password"> 
                        <span class="text-danger">salah tulis</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Alamat</label>
                      <div class="col-sm-10">
                        <input type="text" name="alamat" class="form-control" placeholder="Alamat"> 
                        <span class="text-danger">salah tulis</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                      <div class="col-sm-10">
                        <select class="form-control select2bs4" style="width: 100%;" name="jenis_kelamin">
                          <?php foreach($jenis_kelamins as $jenis_kelamin){
                            echo "<option>$jenis_kelamin</option>";
                          }
                          ?>
                          
                        </select>
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
  
        <div class="modal fade" id="modalEditVisiMisi">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="judulModal">Edit Admin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" method="post" action="admin-c.php" enctype="multipart/form-data">
                  <input type="hidden" name="editAdmin" >
                  <input type="hidden" name="id_admin" id="eid_admin">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Foto Admin</label>
                      <div class="col-sm-10">
                        <div class="custom-file"> 
                          <input type="file" id="efoto_admin" name="foto_admin" class="custom-file-input">
                          <label class="custom-file-label" for="foto_admin">Choose file</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row"> 
                      <label class="col-sm-2 col-form-label">Foto Saat ini</label> 
                      <div class="col-sm-10">
                        <div class="custom-file"id="esifoto_admin">
                          <img src="image/foto_admin/sablon.png" style="margin-bottom: 120px;height:150px;max-width:800px">
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="text" id="enama" name="nama" class="form-control" placeholder="Nama"> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="text" id="eemail" name="email" class="form-control" placeholder="Email"> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" id="epassword" name="password" class="form-control" placeholder="Password"> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Alamat</label>
                      <div class="col-sm-10">
                        <input type="text" id="ealamat" name="alamat" class="form-control" placeholder="Alamat"> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                      <div class="col-sm-10">
                        <select class="form-control select2bs4" style="width: 100%;" id="ejenis_kelamin" name="jenis_kelamin">
                          <?php foreach($jenis_kelamins as $jenis_kelamin){
                            echo "<option>$jenis_kelamin</option>";
                          }
                          ?>
                          
                        </select>
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
  
        <div class="modal fade" id="modalHapusVisiMisi">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="judulModal">Apakah Anda yakin untuk menghapus data ini?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" method="post" action="admin-c.php">
                  <input type="hidden" name="hapusAdmin" >
                  <input type="hidden" name="id_admin" id="hid_admin">
                  <div class="card-body">
                    <div class="form-group row"> 
                      <label class="col-sm-2 col-form-label">Foto Admin</label> 
                      <div class="col-sm-10">
                        <div class="custom-file"id="hsifoto_admin">
                          <img src="image/foto_admin/sablon.png" style="margin-bottom: 120px;height:150px;max-width:800px">
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="text" id="hnama" name="nama" class="form-control" placeholder="Nama" readonly=""> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="text" id="hemail" name="email" class="form-control" placeholder="Email" readonly=""> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" id="hpassword" name="password" class="form-control" placeholder="Password" readonly=""> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Alamat</label>
                      <div class="col-sm-10">
                        <input type="text" id="halamat" name="alamat" class="form-control" placeholder="Alamat" readonly=""> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                      <div class="col-sm-10">
                        <input type="text" id="hjenis_kelamin" name="jenis_kelamin" class="form-control" placeholder="Jenis Kelamin" readonly=""> 
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

    var id_admin = $(this).data("id");
    $.ajax({
        data: {
          'id_admin': id_admin,
        },
        url: "admin-c.php",
        type: "GET",
            success: function (data) {
              myObj = JSON.parse(data);
              $('#eid_admin').val(myObj.id_admin);
              $('#esifoto_admin').html("<img src='image/foto_admin/"+myObj.foto_admin+"' style='margin-bottom: 120px;height:150px;max-width:800px'>");
              $('#enama').val(myObj.nama_admin);
              $('#eemail').val(myObj.email_admin);
              $('#epassword').val(myObj.password_admin);
              $('#ealamat').val(myObj.alamat_admin);
              
              var jk = <?php echo json_encode($jenis_kelamins); ?>;
              let txt = "";
              jk.forEach(jkfungsi);
              function jkfungsi(value) {
                if(value==myObj.jenis_kelamin_admin)
                  txt +=  "<option selected>"+value+"</option>";
                else
                  txt +=  "<option>"+value+"</option>";
              }

              $('#ejenis_kelamin').html(txt);

            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
  });


  $('body').on('click', '.btnHapus', function () {

    var id_admin = $(this).data("id");
    $.ajax({
        data: {
          'id_admin': id_admin,
        },
        url: "admin-c.php",
        type: "GET",
            success: function (data) {
              myObj = JSON.parse(data);
              $('#hid_admin').val(myObj.id_admin);
              $('#hsifoto_admin').html("<img src='image/foto_admin/"+myObj.foto_admin+"' style='margin-bottom: 120px;height:150px;max-width:800px'>");
              $('#hnama').val(myObj.nama_admin);
              $('#hemail').val(myObj.email_admin);
              $('#hpassword').val(myObj.password_admin);
              $('#halamat').val(myObj.alamat_admin);
              $('#hjenis_kelamin').val(myObj.jenis_kelamin_admin);

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

