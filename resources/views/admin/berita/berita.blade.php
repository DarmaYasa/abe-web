@extends('master.dashboard')
@section('judul','Dashboard Admin Berita')
@section('berita','active')
@section('titlecontent','Berita')
@section('breadcrumb')
    <li class="breadcrumb-item active">Berita</li>
@endsection
@section('content')
    <form role="form" action="/ajax/berita/create" method="post" id="form-send"  enctype="multipart/form-data">
        @csrf
        <div class="modal fade modaltambah" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Berita</h4>
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
                                <label>Deskripsi</label>
                                <textarea class="form-control" rows="3" placeholder="Deskripsi" name="deskripsi"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input type="file" class="form-control" name="file">
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
    <form role="form" action="/ajax/berita/update" method="post" id="form-update" enctype="multipart/form-data">
        @csrf
        <div class="modal fade modaledit" id="modal-lgr">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Berita</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="id" class="d-none" >
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Judul</label>
                                <input type="text" class="form-control"  placeholder="Judul" name="judul">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control" rows="3" placeholder="Deskripsi" name="deskripsi"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input type="file" class="form-control" name="file">
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
                url: '/ajax/berita/read',
                success:function (data) {
                    $('#table').html(data);
                }
            })
        }
    </script>
@endsection
