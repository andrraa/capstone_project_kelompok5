<div>
    
@extends('admin.master')
@section('title', 'data siswa')
@section('menuOpenSiswa', 'menu-open')
@section('menuSiswa', 'active')
@section('content')
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Siswa</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group row" style=" float: left;margin-bottom: 10px;width:50%; min-width: 300px;">
                  <label class="col-sm-2 col-form-label">Kelas</label>
                  <div class="col-sm-10">
                    <select class="form-control select2bs4 pKelas" style="width: 100%;" name="id_kelas" wire:model="id_kelas">
                      @foreach($agamas->kelass as $kelas)
                      <option value="{{$kelas->id_kelas}}">{{$kelas->tahun_ajaran}} {{$kelas->nama_kelas}}</option>
                      @endforeach
                    </select>
                      @error('id_kelas') 
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                </div>
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
                    <th>NIS</th>
                    <th>Agama</th>
                    <th>Nama Siswa</th>
                    <th>Foto</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no=1 ?>
                    @foreach($siswas as $siswa)
                    
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$siswa->NIS}}</td>
                    <td>{{$siswa->agama}}</td>
                    <td>{{$siswa->nama_siswa}}</td>
                    <td><img src="{{asset('image/foto_siswa/'.$siswa->foto_siswa)}}" style="height:100px;max-width:600px" alt="Admin Image"></td>
                      <td><button type="button" class="btn btn-block btn-primary btnEdit" wire:click.prevent="edit({{$siswa->id_siswa}})" data-toggle="modal" data-target="#modalEditSiswa">Edit</button></td>
                      <td><button type="button" class="btn btn-block btn-danger btnHapus" wire:click.prevent="hapus({{$siswa->id_siswa}})" data-toggle="modal" data-target="#modalHapusSiswa">Hapus</button></td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                {{$siswas->links()}}
                <button id="btnTambah" type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modalTambahSiswa" wire:click.prevent="tambah()">Tambah</button>
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
    <!-- validasi -->
    @section('tambahan')

<!-- ./wrapper -->
<div wire:ignore.self class="modal fade" id="modalTambahSiswa">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="judulModal">Tambah siswa</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form wire:submit.prevent="store" class="form-horizontal" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_siswa" wire:model="id_siswa">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NIS</label>
                    <div class="col-sm-10">
                      <input type="text" name="NIS" class="form-control" placeholder="NIS" wire:model="NIS">
                      @error('NIS') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-10">
                      <select class="form-control select2bs4 pAgama" style="width: 100%;" name="id_agama" wire:model="id_agama">
                        @foreach($agamas as $agama)
                        <option value="{{$agama->id_agama}}">{{$agama->agama}}</option>
                        @endforeach
                      </select>
                      @error('id_agama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Siswa</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama_siswa" class="form-control" placeholder="Nama Siswa" wire:model="nama_siswa">
                      @error('nama_siswa') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                      <select class="form-control select2bs4 pJenis_kelamin_siswa" style="width: 100%;" name="jenis_kelamin_siswa" wire:model="jenis_kelamin_siswa">
                        @foreach($agamas->jenis_kelamin_siswas as $jenis_kelamin_siswa)
                        <option>{{$jenis_kelamin_siswa}}</option>
                        @endforeach
                      </select>
                        @error('jenis_kelamin_siswa') 
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tempat Lahir </label>
                    <div class="col-sm-10">
                      <input type="text" name="tempat_lahir_siswa" class="form-control" placeholder="Tempat Lahir Siswa"  wire:model="tempat_lahir_siswa">
                      @error('tempat_lahir_siswa') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                      <div class="input-group date" id="tanggal_lahir_siswa" data-target-input="nearest">
                        <input type="text" name="tanggal_lahir_siswa" class="form-control datetimepicker-input pTanggal"
                          id="tanggal_lahir_siswa_w" data-target="#tanggal_lahir_siswa_w" placeholder="Tanggal Lahir" wire:model="tanggal_lahir_siswa">
                        <div class="input-group-append" data-target="#tanggal_lahir_siswa_w" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                      @error('tanggal_lahir_siswa')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" name="username_siswa" class="form-control" placeholder="Username" wire:model="username_siswa">
                      @error('username_siswa') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="password_siswa" class="form-control" placeholder="Password" wire:model="password_siswa">
                      @error('password_siswa') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                      <div class="custom-file"> 
                        <input type="file" name ="foto_siswa" class="custom-file-input pFotosiswa"  wire:model="foto_siswa">
                        <label class="custom-file-label" for="foto_siswa">Choose file</label>
                      </div>
                      @error('foto_siswa') <span class="text-danger">{{$message}}</span> @enderror
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
      <div wire:ignore.self class="modal fade" id="modalEditSiswa">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="judulModal">Edit siswa</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form wire:submit.prevent="update" class="form-horizontal" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_siswa" wire:model="id_siswa">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NIS</label>
                    <div class="col-sm-10">
                      <input type="text" name="NIS" class="form-control" placeholder="NIS" wire:model="NIS">
                      @error('NIS') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-10">
                      <select class="form-control select2bs4 pAgama" style="width: 100%;" name="id_agama" wire:model="id_agama">
                        @foreach($agamas as $agama)
                        <option value="{{$agama->id_agama}}">{{$agama->agama}}</option>
                        @endforeach
                      </select>
                      @error('id_agama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Siswa</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama_siswa" class="form-control" placeholder="Nama Siswa" wire:model="nama_siswa">
                      @error('nama_siswa') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                      <select class="form-control select2bs4 pJenis_kelamin_siswa" style="width: 100%;" name="jenis_kelamin_siswa" wire:model="jenis_kelamin_siswa">
                        @foreach($agamas->jenis_kelamin_siswas as $jenis_kelamin_siswa)
                        <option>{{$jenis_kelamin_siswa}}</option>
                        @endforeach
                      </select>
                        @error('jenis_kelamin_siswa') 
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tempat Lahir </label>
                    <div class="col-sm-10">
                      <input type="text" name="tempat_lahir_siswa" class="form-control" placeholder="Tempat Lahir Siswa"  wire:model="tempat_lahir_siswa">
                      @error('tempat_lahir_siswa') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                  <div class="input-group date" id="tanggal_lahir_siswa" data-target-input="nearest">
                    <input type="text" name="tanggal_lahir_siswa" class="form-control datetimepicker-input pTanggal"
                      id="tanggal_lahir_siswa_x" data-target="#tanggal_lahir_siswa_x" placeholder="Tanggal Lahir" wire:model="tanggal_lahir_siswa">
                    <div class="input-group-append" data-target="#tanggal_lahir_siswa_x" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                  @error('tanggal_lahir_siswa')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" name="username_siswa" class="form-control" placeholder="Username" wire:model="username_siswa">
                      @error('username_siswa') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="password_siswa" class="form-control" placeholder="Password" wire:model="password_siswa">
                      @error('password_siswa') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                      <div class="custom-file"> 
                        <input type="file" name ="foto_siswa" class="custom-file-input pFotosiswa"  wire:model="foto_siswa">
                        <label class="custom-file-label" for="foto_siswa">Choose file</label>
                      </div>
                      @error('foto_siswa') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row"> 
                    <label class="col-sm-2 col-form-label">Foto Saat ini</label> 
                    <div class="col-sm-10">
                      <div class="custom-file">
                        <img src="http://localhost:8000/image/foto_siswa/{{ $foto_saat_ini }}" style="margin-bottom: 100px;height:100px;max-width:600px">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" id="btnSimpan" style="margin-right: 0%;width:20%">Edit</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <div wire:ignore.self class="modal fade" id="modalHapusSiswa">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="judulModal">Apakah Anda yakin untuk menghapus data ini?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="post" enctype="multipart/form-data">
                <input type="hidden" id="hid_siswa" name="id_siswa" wire:model="id_siswa">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NIS</label>
                    <div class="col-sm-10">
                      <input type="text" name="NIS" class="form-control" placeholder="NIS" wire:model="NIS" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-10">
                      <input type="text" name="id_agama" class="form-control" placeholder="Agama" wire:model="id_agama" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Siswa</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama_siswa" class="form-control" placeholder="Nama Siswa" wire:model="nama_siswa" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                      <input type="text" name="jenis_kelamin_siswa" class="form-control" placeholder="Jenis Kelamin" wire:model="jenis_kelamin_siswa" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tempat Lahir </label>
                    <div class="col-sm-10">
                      <input type="text" name="tempat_lahir_siswa" class="form-control" placeholder="Tempat Lahir"  wire:model="tempat_lahir_siswa" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal Lahir </label>
                    <div class="col-sm-10">
                      <input type="text" name="tanggal_lahir_siswa" class="form-control" placeholder="Tanggal Lahir" wire:model="tanggal_lahir_siswa" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" name="username_siswa" class="form-control" placeholder="Username" wire:model="username_siswa" readonly="">
                    </div>
                  </div>
                  <div class="form-group row"> 
                    <label class="col-sm-2 col-form-label">Foto Saat ini</label> 
                    <div class="col-sm-10">
                      <div class="custom-file">
                        <img src="http://localhost:8000/image/foto_siswa/{{ $foto_saat_ini }}" style="margin-bottom: 100px;height:100px;max-width:600px">
                      </div>
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
@push('scripts')
<script>
  $(function () {
    //Initialize Select2 Elements
    Livewire.hook('message.processed', (message, component) => {
      $('.select2bs4').select2({
      
        theme: 'bootstrap4',
        placeholder: "---Pilih---",
      });
    });
    $('.pAgama').on('change', function (e) {
                let data = $(this).val();
                 @this.set('id_agama', data);
            });

    $('.pKelas').on('change', function (e) {
                let data = $(this).val();
                 @this.set('id_kelas', data);
            });
    $('.pJenis_kelamin_siswa').on('change', function (e) {
                let data = $(this).val();
                 @this.set('jenis_kelamin_siswa', data);
            });
    $('.pTanggal').blur( function (e) {
                let data = $(this).val();
                 @this.set('tanggal_lahir_siswa', data);
            });

    //Date picker
    $('#tanggal_lahir_siswa_w').datetimepicker({
        locale: 'id',
        format: 'DD MMMM YYYY'
    });

    $('#tanggal_lahir_siswa_x').datetimepicker({
        locale: 'id',
        format: 'DD MMMM YYYY'
    });
    $('.pTanggal').blur( function (e) {
                let data = $(this).val();
                 @this.set('tanggal_lahir_siswa', data);
            });

    bsCustomFileInput.init();
    $('.select2bs4').select2({
      
      theme: 'bootstrap4',
      placeholder: "---Pilih---",
    });

  });

</script>
@endpush
      @endsection