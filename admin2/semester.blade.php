<div>
    
@extends('admin.master')
@section('title', 'data semester')
@section('menuOpenOperasional', 'menu-open')
@section('menuSemester', 'active')
@section('content')
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Semester</h3>
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
                    <th>Semester</th>
                    <th>Tahun Ajaran</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no=1 ?>
                    @foreach($semesters as $semester)
                    
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$semester->semester}}</td>
                    <td>{{$semester->tahun_ajaran}}</td>
                    <td><button type="button" class="btn btn-block btn-primary btnEdit" wire:click.prevent="edit({{$semester->id_semester}})" data-toggle="modal" data-target="#modalEditSemester">Edit</button></td>
                    <td><button type="button" class="btn btn-block btn-danger btnHapus" wire:click.prevent="hapus({{$semester->id_semester}})" data-toggle="modal" data-target="#modalHapusSemester">Hapus</button></td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
                {{$semesters->links()}}
                <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modalTambahSemester" wire:click.prevent="tambah()">Tambah</button>
                
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
    <div wire:ignore.self  class="modal fade" id="modalTambahSemester">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="judulModal">Tambah Semester</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="post">
                <input type="hidden" id="id_semester" name="id_semester">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Semester</label>
                    <div class="col-sm-10">
                      <select class="form-control select2bs4 pSemester" style="width: 100%;" name="semester" wire:model="semester">
                        @foreach($pilih_semesters as $pilih_semester)
                        <option>{{$pilih_semester}}</option>
                        @endforeach
                      </select>
                      </select>
                      @error('semester') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tahun Ajaran</label>
                    <div class="col-sm-10">
                      <input type="text" name="tahun_ajaran" class="form-control" placeholder="Tahun Ajaran" wire:model="tahun_ajaran">
                      @error('tahun_ajaran') 
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

      <div wire:ignore.self class="modal fade" id="modalEditSemester">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="judulModal">Edit semester</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="post">
                <input type="hidden" id="id_semester" name="id_semester" wire:model="id_semester">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Semester</label>
                    <div class="col-sm-10">
                      <select class="form-control select2bs4 pSemester"  style="width: 100%;" name="semester" wire:model="semester">
                        @foreach($pilih_semesters as $pilih_semester)
                        <option>{{$pilih_semester}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tahun Ajaran</label>
                    <div class="col-sm-10">
                      <input type="text" name="tahun_ajaran" class="form-control" placeholder="Tahun Ajaran" wire:model="tahun_ajaran">
                      @error('tahun_ajaran') 
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

      <div wire:ignore.self class="modal fade" id="modalHapusSemester">
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
                <input type="hidden" name="id_semester" wire:model="id_semester">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Semester</label>
                    <div class="col-sm-10">
                      <input type="text" name="semester" class="form-control" wire:model="semester" placeholder="Semester" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tahun Ajaran</label>
                    <div class="col-sm-10">
                      <input type="text" name="tahun_ajaran" class="form-control" wire:model="tahun_ajaran" placeholder="Tahun Ajaran" readonly="">
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
    $('.pSemester').on('change', function (e) {
                let data = $(this).val();
                 @this.set('semester', data);
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