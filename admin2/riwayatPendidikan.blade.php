<div>
    
@extends('admin.master')
@section('title', 'data riwayat pendidikan')
@section('menuOpenGuru', 'menu-open')
@section('menuRiwayatPendidikan', 'active')
@section('content')
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Riwayat Pendidikan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group row" style=" float: left;margin-bottom: 10px;width:50%; min-width: 300px;">
                    <label class="col-sm-2 col-form-label">Nama Guru</label>
                    <div class="col-sm-10">
                      <select class="form-control select2bs4 pGuru" style="width: 100%;" name="id_guru" wire:model="id_guru">
                        @foreach($gurus as $guru)
                        <option value="{{$guru->id_guru}}">{{$guru->nama_guru}}</option>
                        @endforeach
                      </select>
                        @error('id_guru') 
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                  </div>
                <div class="form-group row" style=" float: right;margin-bottom: 10px;width:40%; min-width: 300px;">
                  <label class="col-sm-3 col-md-2 col-form-label">Cari : </label>
                  <div class="col-sm-9 col-md-10">
                    <input type="text"  class="form-control" placeholder="Cari.." wire:model.debounce.200ms="cari" >
                  </div>
                </div>
                <table id="tabelData" class="table table-bordered table-hover" style="margin-bottom: 15px;">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Perguruan Tinggi</th>
                    <th>Gelar Akademik</th>
                    <th>Tahun Lulus</th>
                    <th>Jenjang</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no=1 ?>
                    @foreach($RiwayatPendidikans as $RiwayatPendidikan)
                    
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$RiwayatPendidikan->perguruan_tinggi}}</td>
                    <td>{{$RiwayatPendidikan->gelar_akademik}}</td>
                    <td>{{$RiwayatPendidikan->tahun_lulus}}</td>
                    <td>{{$RiwayatPendidikan->jenjang}}</td>
                    <td><button type="button" class="btn btn-block btn-primary btnEdit" wire:click.prevent="edit({{$RiwayatPendidikan->id_riwayat_pendidikan}})" data-toggle="modal" data-target="#modalEditRiwayatPendidikan">Edit</button></td>
                    <td><button type="button" class="btn btn-block btn-danger btnHapus" wire:click.prevent="hapus({{$RiwayatPendidikan->id_riwayat_pendidikan}})" data-toggle="modal" data-target="#modalHapusRiwayatPendidikan">Hapus</button></td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
                {{$RiwayatPendidikans->links()}}
                <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modalTambahRiwayatPendidikan" wire:click.prevent="tambah()">Tambah</button>
                
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
    <div wire:ignore.self  class="modal fade" id="modalTambahRiwayatPendidikan">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="judulModal">Tambah Riwayat Pendidikan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="post" >
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Perguruan Tinggi</label>
                    <div class="col-sm-10">
                      <input type="text" name="perguruan_tinggi" class="form-control" placeholder="Perguruan Tinggi" wire:model="perguruan_tinggi">
                      @error('perguruan_tinggi') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Gelar Akademik</label>
                    <div class="col-sm-10">
                      <input type="text" name="gelar_akademik" class="form-control" placeholder="Gelar Akademik" wire:model="gelar_akademik">
                      @error('gelar_akademik') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tahun Lulus</label>
                    <div class="col-sm-10">
                      <input type="text" name="tahun_lulus" class="form-control" placeholder="Tahun Lulus" wire:model="tahun_lulus">
                      @error('tahun_lulus') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jenjang</label>
                    <div class="col-sm-10">
                      <select class="form-control select2bs4 pJenjang" style="width: 100%;" name="jenjang" wire:model="jenjang">
                        @foreach($gurus->jenjangs as $jenjang)
                        <option>{{$jenjang}}</option>
                        @endforeach
                      </select>
                        @error('jenjang') 
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

      <div wire:ignore.self class="modal fade" id="modalEditRiwayatPendidikan">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="judulModal">Edit Riwayat Pendidikan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="post">
                <input type="hidden" name="id_riwayat_pendidikan" wire:model="id_riwayat_pendidikan">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Perguruan Tinggi</label>
                    <div class="col-sm-10">
                      <input type="text" name="perguruan_tinggi" class="form-control" placeholder="Perguruan Tinggi" wire:model="perguruan_tinggi">
                      @error('perguruan_tinggi') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Gelar Akademik</label>
                    <div class="col-sm-10">
                      <input type="text" name="gelar_akademik" class="form-control" placeholder="Gelar Akademik" wire:model="gelar_akademik">
                      @error('gelar_akademik') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tahun Lulus</label>
                    <div class="col-sm-10">
                      <input type="text" name="tahun_lulus" class="form-control" placeholder="Tahun Lulus" wire:model="tahun_lulus">
                      @error('tahun_lulus') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jenjang</label>
                    <div class="col-sm-10">
                      <select class="form-control select2bs4 pJenjang" style="width: 100%;" name="jenjang" wire:model="jenjang">
                        @foreach($gurus->jenjangs as $jenjang)
                        <option>{{$jenjang}}</option>
                        @endforeach
                      </select>
                        @error('jenjang') 
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

      <div wire:ignore.self class="modal fade" id="modalHapusRiwayatPendidikan">
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
                <input type="hidden" name="id_riwayat_pendidikan" wire:model="id_riwayat_pendidikan">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Guru</label>
                    <div class="col-sm-10">
                      <select class="form-control select2bs4 pGuru" style="width: 100%;" name="id_guru" wire:model="id_guru" disabled="">
                        @foreach($gurus as $guru)
                        <option value="{{$guru->id_guru}}">{{$guru->nama_guru}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Perguruan Tinggi</label>
                    <div class="col-sm-10">
                      <input type="text" name="perguruan_tinggi" class="form-control" placeholder="Perguruan Tinggi" wire:model="perguruan_tinggi" readonly="" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Gelar Akademik</label>
                    <div class="col-sm-10">
                      <input type="text" name="gelar_akademik" class="form-control" placeholder="Gelar Akademik" wire:model="gelar_akademik" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tahun Lulus</label>
                    <div class="col-sm-10">
                      <input type="text" name="tahun_lulus" class="form-control" placeholder="Tahun Lulus" wire:model="tahun_lulus" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jenjang</label>
                    <div class="col-sm-10">
                      <select class="form-control select2bs4 pJenjang" style="width: 100%;" name="jenjang" wire:model="jenjang" disabled="">
                        @foreach($gurus->jenjangs as $jenjang)
                        <option>{{$jenjang}}</option>
                        @endforeach
                      </select>
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
    // @this.set('id_guru', $('.pGuru').val());
    Livewire.hook('message.processed', (message, component) => {
      $('.pJenjang').select2({
      
        theme: 'bootstrap4',
        placeholder: "---Pilih---",
      });

      $('.pGuru').select2({
        theme: 'bootstrap4',
      });
    });
    $('.pGuru').on('change', function (e) {
      let data = $(this).val();
      @this.set('id_guru', data);
    });

    $('.pJenjang').on('change', function (e) {
      let data = $(this).val();
      @this.set('jenjang', data);
    });

    //Date picker
    $('#reservationdate').datetimepicker({
        locale: 'id',
        format: 'DD MMMM YYYY'
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