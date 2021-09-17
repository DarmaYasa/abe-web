@extends('master.dashboard')
@section('judul','Dashboard Admin Bedakan Konten')
@section('perbedaan','active')
@section('titlecontent','Bedakan Flashcard')
@section('breadcrumb')
    <li class="breadcrumb-item active">Konten</li>
    <li class="breadcrumb-item active">Perbedaan Konten </li>
@endsection
@section('content')
    <form role="form" action="/ajax/perbedaan/create" method="post" id="form-send">
        @csrf
        <div class="modal fade modaltambah" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data Anak</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Judul</label>
                                <input type="text" class="form-control"  placeholder="Judul" name="judul">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Deskripsi</label>
                                <input type="text" class="form-control"  placeholder="deskripsi" name="deskripsi">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Gambar Ilustrasi</label>
                                <input type="file" class="form-control" name="file1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Gambar Realitas</label>
                                <input type="file" class="form-control" name="file2">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>

            <!-- /.modal-dialog -->
        </div>
    </form>
    <form role="form" action="/ajax/perbedaan/update" method="post" id="form-update">
        @csrf
        <div class="modal fade modaledit" id="modal-lgr">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Data Anak</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group d-none">
                                <label for="exampleInputEmail1">id</label>
                                <input type="text" class="form-control"  placeholder="Nama" name="id">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Judul</label>
                                <input type="text" class="form-control"  placeholder="Judul" name="judul">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Deskripsi</label>
                                <input type="text" class="form-control"  placeholder="deskripsi" name="deskripsi">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Gambar Ilustrasi</label>
                                <input type="file" class="form-control" name="file1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Gambar Realitas</label>
                                <input type="file" class="form-control" name="file2">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>

            <!-- /.modal-dialog -->
        </div>
    </form>
    <div class="row"  >
        <div class="col-12" >
            <div id="table"></div>
        </div>
        <!-- /.col -->
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        function loadData() {
            $.ajax({
                url: '/ajax/perbedaan/read',
                success:function (data) {
                    $('#table').html(data);
                }
            })
        }
    </script>

@endsection
