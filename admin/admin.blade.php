<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ini judul</title>

	<!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">

  
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">
	

<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="admin/index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
      @if(Session::get('admin'))
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/admin/logout" class="nav-link">Logout</a>
        </li>
      @elseif(Session::get('guru'))
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/guru/logout" class="nav-link">Logout</a>
        </li>
      @endif
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="admin/index3.html" class="brand-link">
      <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin SISku</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          @if(Session::get('admin'))
        <div class="image">
          <img src="{{asset('image/foto_admin/'.Session::get('admin')->foto_admin)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Session::get('admin')->nama_depan_admin}} {{Session::get('admin')->nama_belakang_admin}}</a>
        </div>
        @elseif(Session::get('guru'))
        <div class="image">
          <img src="{{asset('image/foto_guru/'.Session::get('guru')->foto_guru)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Session::get('guru')->nama_guru}}</a>
        </div>
        @endif
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
      @if(Session::get('admin'))

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item @yield('menuOpenSiswa')">
            <a href="#" class="nav-link @yield('menuSiswa') @yield('menuAbsenSiswa') @yield('menuOrangTua') @yield('menuNilaiEkstrakulikuler') @yield('menuNilaiMapel') @yield('menuKelas')">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Siswa
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.siswa') }}" class="nav-link @yield('menuSiswa')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.absenSiswa') }}" class="nav-link @yield('menuAbsenSiswa')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Absen Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.orangTua') }}" class="nav-link @yield('menuOrangTua')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Orang Tua</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.nilaiMapel') }}" class="nav-link @yield('menuNilaiMapel')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nilai Mata Pelajaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.nilaiEkstrakulikuler') }}" class="nav-link @yield('menuNilaiEkstrakulikuler')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nilai Ekstrakulikuler</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.kelas') }}" class="nav-link @yield('menuKelas')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kelas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/laporan-data-siswa" class="nav-link  @yield('menuLaporanSiswa')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cetak Data Siswa</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item @yield('menuOpenGuru')">
            <a href="#" class="nav-link @yield('menuGuru') @yield('menuRiwayatPendidikan') @yield('menuAbsenGuru')">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Guru
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.guru') }}" class="nav-link @yield('menuGuru')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Guru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.riwayatPendidikan') }}" class="nav-link @yield('menuRiwayatPendidikan')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat Pendidikan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.absenGuru') }}" class="nav-link @yield('menuAbsenGuru')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Absen Guru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/laporan-guru" target="_blank" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cetak Laporan Data Guru</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item @yield('menuOpenJadwal')">
            <a href="#" class="nav-link @yield('menuJadwalPelajaran') @yield('menuJadwalUjian')">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Jadwal
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.jadwalPelajaran') }}" class="nav-link @yield('menuJadwalPelajaran')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jadwal Pelajaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.jadwalUjian') }}" class="nav-link @yield('menuJadwalUjian')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jadwal Ujian</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item @yield('menuOpenInformasiSekolah')">
            <a href="#" class="nav-link @yield('menuProfilSekolah') @yield('menuVisiMisi') @yield('menuInformasiSekolah') @yield('menuGaleri') @yield('menuGaleriDetail') @yield('menuSlideShow')">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Informasi Sekolah
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.profilSekolah') }}" class="nav-link @yield('menuProfilSekolah')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profil Sekolah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.visiMisi') }}" class="nav-link @yield('menuVisiMisi')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Visi Misi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.informasiSekolah') }}" class="nav-link @yield('menuInformasiSekolah')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Informasi Sekolah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.Galeri') }}" class="nav-link @yield('menuGaleri')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Galeri</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.galeriDetail') }}" class="nav-link @yield('menuGaleriDetail')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Galeri Detail</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.slideShow') }}" class="nav-link @yield('menuSlideShow')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Slide Show</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item @yield('menuOpenOperasional')">
            <a href="#" class="nav-link @yield('menuAdmin') @yield('menuAgama') @yield('menuJabatan') @yield('menuJurusan') @yield('menuSemester') @yield('menuMapel') @yield('menuMapelSemester') @yield('menuEkstrakulikuler') @yield('menuEkstrakulikulerSemester')">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Operasional
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.admin') }}" class="nav-link @yield('menuAdmin')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.agama') }}" class="nav-link @yield('menuAgama')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agama</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.jabatan') }}" class="nav-link @yield('menuJabatan')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jabatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.jurusan') }}" class="nav-link @yield('menuJurusan')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jurusan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.semester') }}" class="nav-link @yield('menuSemester')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Semester</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.mapel') }}" class="nav-link @yield('menuMapel')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mata Pelajaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.mapelSemester') }}" class="nav-link @yield('menuMapelSemester')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mata Pelajaran Semester</p>
                </a>
              </li>
              <!-- //Sonia -->
              <li class="nav-item">
                <a href="{{ route('admin.ekstrakulikuler') }}" class="nav-link @yield('menuEkstrakulikuler')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ekstrakulikuler</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.ekstrakulikulerSemester') }}" class="nav-link @yield('menuEkstrakulikulerSemester')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ekstrakulikuler Semester</p>
                </a>
              </li>
              
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
      @elseif(Session::get('guru'))<!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item @yield('menuOpenSiswa')">
            <a href="#" class="nav-link @yield('menuSiswa') @yield('menuAbsenSiswa') @yield('menuOrangTua') @yield('menuNilaiEkstrakulikuler') @yield('menuNilaiMapel') @yield('menuKelas')">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Siswa
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('guru.siswa') }}" class="nav-link @yield('menuSiswa')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('guru.absenSiswa') }}" class="nav-link @yield('menuAbsenSiswa')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Absen Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('guru.orangTua') }}" class="nav-link @yield('menuOrangTua')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Orang Tua</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('guru.nilaiMapel') }}" class="nav-link @yield('menuNilaiMapel')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nilai Mata Pelajaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('guru.kelas') }}" class="nav-link @yield('menuKelas')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kelas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/guru/laporan-data-siswa" class="nav-link  @yield('menuLaporanSiswa')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cetak Data Siswa</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item @yield('menuOpenGuru')">
            <a href="#" class="nav-link @yield('menuGuru') @yield('menuRiwayatPendidikan') @yield('menuAbsenGuru')">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Guru
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('guru.guru') }}" class="nav-link @yield('menuGuru')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Guru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('guru.riwayatPendidikan') }}" class="nav-link @yield('menuRiwayatPendidikan')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat Pendidikan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('guru.absenGuru') }}" class="nav-link @yield('menuAbsenGuru')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Absen Guru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/guru/laporan-guru" target="_blank" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cetak Laporan Data Guru</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item @yield('menuOpenJadwal')">
            <a href="#" class="nav-link @yield('menuJadwalPelajaran') @yield('menuJadwalUjian')">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Jadwal
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('guru.jadwalPelajaran') }}" class="nav-link @yield('menuJadwalPelajaran')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jadwal Pelajaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('guru.jadwalUjian') }}" class="nav-link @yield('menuJadwalUjian')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jadwal Ujian</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
      @endif
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tabel Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tabel Data</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div>
  <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Visi Misi</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="form-group row"style=" float: right;margin-bottom: 10px;width:40%; min-width: 300px;">
                    <label class="col-sm-3 col-md-2 col-form-label">Cari : </label>
                    <div class="col-sm-9 col-md-10">
                      <input type="text"  class="form-control" placeholder="Cari.." wire:model.debounce.200ms="cari" >
                    </div>
                  </div>
                  <table id="tabelData" class="table table-bordered table-hover" style="margin-bottom: 15px;">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Text</th>
                      <th>Jenis Visi Misi</th>
                      <th>Edit</th>
                      <th>Hapus</th>
                    </tr>
                    </thead>
                    <tbody>
                      
                    <tr>
                      <td>dfsdf</td>
                      <td>sdfsdf</td>
                      <td>fgfgfgfgfgsdfsd</td>
                      <td><button type="button" class="btn btn-block btn-primary btnEdit" data-toggle="modal" data-target="#modalEditVisiMisi">Edit</button></td>
                      <td><button type="button" class="btn btn-block btn-danger btnHapus" data-toggle="modal" data-target="#modalHapusVisiMisi">Hapus</button></td>
                    </tr>
                    </tbody>
                  </table>
                  <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modalTambahVisiMisi" >Tambah</button>
                  
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
      @endsection
      @section('tambahan')
  
  <!-- ./wrapper -->
      <div wire:ignore.self  class="modal fade" id="modalTambahVisiMisi">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="judulModal">Tambah Visi Misi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" method="post" >
                  <input type="hidden" id="id_visi_misi" name="id_visi_misi">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Text</label>
                      <div class="col-sm-10">
                        <input type="text" name="text" class="form-control" placeholder="text" wire:model="text" >
                        @error('text') 
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jenis</label>
                      <div class="col-sm-10">
                        <select class="form-control select2bs4 pjenis_visi_misi" style="width: 100%;" name="jenis_visi_misi" wire:model="jenis_visi_misi">
                          @foreach($jenis_visi_misis as $jenis_visi_misi)
                          <option>{{$jenis_visi_misi}}</option>
                          @endforeach
                        </select>
                        @error('jenis_visi_misi') 
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="btnSimpan" style="margin-right: 0%;width:20%" wire:click.prevent="store()">Simpan</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
  
        <div wire:ignore.self class="modal fade" id="modalEditVisiMisi">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="judulModal">Edit Text</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" method="post">
                  <input type="hidden" id="id_visi_misi" name="id_visi_misi" wire:model="id_visi_misi">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Text</label>
                      <div class="col-sm-10">
                        <input type="text" name="text" class="form-control" placeholder="text" wire:model="text">
                        @error('text') 
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jenis</label>
                      <div class="col-sm-10">
                        <select class="form-control select2bs4 pjenis_visi_misi"  style="width: 100%;" name="jenis_visi_misi" wire:model="jenis_visi_misi">
                          @foreach($jenis_visi_misis as $jenis_visi_misi)
                          <option>{{$jenis_visi_misi}}</option>
                          @endforeach
                        </select>
                        @error('jenis_visi_misi') 
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="btnSimpan" style="margin-right: 0%;width:20%" wire:click.prevent="update()">Edit</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
  
        <div wire:ignore.self class="modal fade" id="modalHapusVisiMisi">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="judulModal">Apakah Anda yakin untuk menghapus data ini?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" method="post">
                  <input type="hidden" name="id_visi_misi" wire:model="id_visi_misi">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Text</label>
                      <div class="col-sm-10">
                        <input type="text" name="text" class="form-control" wire:model="text" placeholder="text" readonly="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jenis</label>
                      <div class="col-sm-10">
                        <input type="text" name="jenis_visi_misi" class="form-control"  placeholder="jenis visi misi" readonly="" wire:model="jenis_visi_misi">
                      </div>
                    </div>
                  </div>
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="hbtnHapus" style="margin-right: 0%;width:20%" wire:click.prevent="delete()">Hapus</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminSISku</a>.</strong> Kelompok 1, Pemrograman Basis Data
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
@yield('tambahan')






	
		<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>

<!-- validasi -->
<script src="{{asset('admin/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('admin/plugins/jquery-validation/additional-methods.min.js')}}"></script>
<!-- alert -->
<script src="{{asset('admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>

<!-- bs-custom-file-input -->
<script src="{{asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>


<!-- InputMask -->
<script src="{{asset('admin/moment-with-locales.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
</body>
</html>

