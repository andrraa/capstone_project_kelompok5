<div>
    
@extends('admin.master')
@section('title', 'data slides show')
@section('menuOpenInformasiSekolah', 'menu-open')
@section('menuSlideShow', 'active')
@section('content')
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Slide Show</h3>
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
                    <th>Gambar Slideshow</th>
                    <th>Judul Slideshow</th>
                    <th>Sub Judul Slideshow</th>
                    <th>Tombol Teks Slideshow</th>
                    <th>Tombol URL Slideshow</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no=1 ?>
                    @foreach($slideShows as $slideShow)
                    
                  <tr>
                    <td>{{$no++}}</td>
                    <td><img src="{{asset('image/gambar_slideshow/'.$slideShow->gambar_slideshow)}}" style="height:100px;max-width:600px" alt="Admin Image"></td>
                    <td>{{$slideShow->judul_slideshow}}</td>
                    <td>{{$slideShow->sub_judul_slideshow}}</td>
                    <td>{{$slideShow->tombol_teks_slideshow}}</td>
                    <td>{{$slideShow->tombol_url_slideshow}}</td>
                    <td><button type="button" class="btn btn-block btn-primary btnEdit" wire:click.prevent="edit({{$slideShow->id_slideshow}})" data-toggle="modal" data-target="#modalEditSlideShow">Edit</button></td>
                    <td><button type="button" class="btn btn-block btn-danger btnHapus" wire:click.prevent="hapus({{$slideShow->id_slideshow}})" data-toggle="modal" data-target="#modalHapusSlideShow">Hapus</button></td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
                {{$slideShows->links()}}
                <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modalTambahSlideShow" wire:click.prevent="tambah()">Tambah</button>
                
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
    <div wire:ignore.self  class="modal fade" id="modalTambahSlideShow">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="judulModal">Tambah Slide Show</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form wire:submit.prevent="store" class="form-horizontal" method="post">
                <input type="hidden" id="id_slideshow" name="id_slideshow">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Gambar Slide Show</label>
                    <div class="col-sm-10">
                      <div class="custom-file"> 
                        <input type="file" name ="gambar_slideshow" class="custom-file-input pFotosiswa"  wire:model="gambar_slideshow">
                        <label class="custom-file-label" for="gambar_slideshow">Choose file</label>
                      </div>
                      @error('gambar_slideshow') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Judul Slideshow</label>
                    <div class="col-sm-10">
                      <input type="text" name="judul_slideshow" class="form-control" placeholder="Judul Slideshow" wire:model="judul_slideshow" >
                      @error('judul_slideshow') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sub Judul Slideshow</label>
                    <div class="col-sm-10">
                      <input type="text" name="sub_judul_slideshow" class="form-control" placeholder="Sub Judul Slideshow" wire:model="sub_judul_slideshow" >
                      @error('sub_judul_slideshow') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tombol Teks Slideshow</label>
                    <div class="col-sm-10">
                      <input type="text" name="tombol_teks_slideshow" class="form-control" placeholder="Tombol Slideshow" wire:model="tombol_teks_slideshow" >
                      @error('tombol_teks_slideshow') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tombol URL Slideshow</label>
                    <div class="col-sm-10">
                      <input type="text" name="tombol_url_slideshow" class="form-control" placeholder="Tombol URL Slideshow" wire:model="tombol_url_slideshow" >
                      @error('tombol_url_slideshow') 
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

      <div wire:ignore.self class="modal fade" id="modalEditSlideShow">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="judulModal">Edit Slide Show</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="post">
                <input type="hidden" id="id_slideshow" name="id_slideshow" wire:model="id_slideshow">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Gambar Slideshow</label>
                    <div class="col-sm-10">
                      <div class="custom-file"> 
                        <input type="file" name ="gambar_slideshow" class="custom-file-input pFotosiswa"  wire:model="gambar_slideshow">
                        <label class="custom-file-label" for="gambar_slideshow">Choose file</label>
                      </div>
                      @error('gambar_slideshow') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                  </div>
                  <div class="form-group row"> 
                    <label class="col-sm-2 col-form-label">Gambar Saat ini</label> 
                    <div class="col-sm-10">
                      <div class="custom-file">
                        <img src="http://localhost:8000/image/gambar_slideshow/{{ $gambar_saat_ini }}" style="margin-bottom: 100px;height:100px;max-width:600px">
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Judul Slideshow</label>
                    <div class="col-sm-10">
                      <input type="text" name="judul_slideshow" class="form-control" placeholder="Judul Slideshow" wire:model="judul_slideshow">
                      @error('judul_slideshow') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sub Judul Slideshow</label>
                    <div class="col-sm-10">
                      <input type="text" name="sub_judul_slideshow" class="form-control" placeholder="Sub Judul Slideshow" wire:model="sub_judul_slideshow">
                      @error('sub_judul_slideshow') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tombol Teks Slideshow</label>
                    <div class="col-sm-10">
                      <input type="text" name="tombol_teks_slideshow" class="form-control" placeholder="Tombol Slideshow" wire:model="tombol_teks_slideshow">
                      @error('tombol_teks_slideshow') 
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                   <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tombol URL Slideshow</label>
                    <div class="col-sm-10">
                      <input type="text" name="tombol_url_slideshow" class="form-control" placeholder="Tombol URL Slideshow" wire:model="tombol_url_slideshow">
                      @error('tombol_url_slideshow') 
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

      <div wire:ignore.self class="modal fade" id="modalHapusSlideShow">
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
                <input type="hidden" name="id_slideshow" wire:model="id_slideshow">
                <div class="card-body">
                  <div class="form-group row"> 
                    <label class="col-sm-2 col-form-label">Gambar Slideshow</label> 
                    <div class="col-sm-10">
                      <div class="custom-file">
                        <img src="http://localhost:8000/image/gambar_slideshow/{{ $gambar_saat_ini }}" style="margin-bottom: 100px;height:100px;max-width:600px">
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Judul slideShow</label>
                    <div class="col-sm-10">
                      <input type="text" name="judul_slideshow" class="form-control" wire:model="judul_slideshow" placeholder="Judul Slideshow" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sub Judul slideShow</label>
                    <div class="col-sm-10">
                      <input type="text" name="sub_judul_slideshow" class="form-control" wire:model="sub_judul_slideshow" placeholder="Sub Judul Slideshow" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tombol Teks SlideShow</label>
                    <div class="col-sm-10">
                      <input type="text" name="tombol_teks_slideshow" class="form-control" wire:model="tombol_teks_slideshow" placeholder="Tombol Teks Slideshow" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tombol URL slideShow</label>
                    <div class="col-sm-10">
                      <input type="text" name="tombol_url_slideshow" class="form-control" wire:model="tombol_url_slideshow" placeholder="Tombol URL Slideshow" readonly="">
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