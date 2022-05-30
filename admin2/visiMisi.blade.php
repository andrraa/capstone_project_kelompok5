<div>
  @extends('admin.master')
  @section('title', 'data visi misi')

@section('menuOpenInformasiSekolah', 'menu-open')
  @section('menuVisiMisi', 'active')
  @section('content')
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
                      <?php $no=1 ?>
                      @foreach($visiMisis as $visiMisi)
                      
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$visiMisi->text}}</td>
                      <td>{{$visiMisi->jenis_visi_misi}}</td>
                      <td><button type="button" class="btn btn-block btn-primary btnEdit" wire:click.prevent="edit({{$visiMisi->id_visi_misi}})" data-toggle="modal" data-target="#modalEditVisiMisi">Edit</button></td>
                      <td><button type="button" class="btn btn-block btn-danger btnHapus" wire:click.prevent="hapus({{$visiMisi->id_visi_misi}})" data-toggle="modal" data-target="#modalHapusVisiMisi">Hapus</button></td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                  {{$visiMisis->links()}}
                  <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modalTambahVisiMisi" wire:click.prevent="tambah()">Tambah</button>
                  
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
      $('.pjenis_visi_misi').on('change', function (e) {
                  let data = $(this).val();
                   @this.set('jenis_visi_misi', data);
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
