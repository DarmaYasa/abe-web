@extends('master.dashboard')
@section('judul','Dashboard Admin Data Anak')
@section('data','active')
@section('anak','active')
@section('titlecontent','Data Anak')
@section('breadcrumb')
    <li class="breadcrumb-item active">Data</li>
    <li class="breadcrumb-item active">Anak</li>
@endsection
@section('content')
    <form role="form" action="/ajax/anak/create" method="post" id="form-send">
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
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" class="form-control"  placeholder="Nama" name="nama_anak">
                            </div>
                            <div class="form-group">
                                <label>Kelamin</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="kelamin" value="laki_laki">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="kelamin" value="perempuan" >
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tempat Lahir</label>
                                <input type="text" class="form-control"  placeholder="Tempat Lahir" name="tempat_lahir">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Lahir</label>
                                <input type="text" class="form-control datepicker"  placeholder="yyyy/mm/dd"  name="tanggal_lahir">
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
    <form role="form" action="/ajax/anak/update" method="post" id="form-update">
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
                                <label for="exampleInputEmail1">Nama</label>

                                <input type="text" class="form-control"  placeholder="Nama" name="nama_anak">
                            </div>
                            <div class="form-group">
                                <label>Kelamin</label>
                                <div>
                                    <label>
                                        <input type="radio" name="kelamin" value="laki_laki">
                                        Laki-laki
                                    </label>
                                </div>
                                <div>
                                    <label>
                                        <input type="radio" name="kelamin" value="perempuan" >
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tempat Lahir</label>
                                <input type="text" class="form-control"  placeholder="Tempat Lahir" name="tempat_lahir">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Lahir</label>
                                <input type="text" class="form-control datepicker"  placeholder="yyyy/mm/dd"  name="tanggal_lahir">
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
                url: '/ajax/anak/read',
                success:function (data) {
                    $('#table').html(data);
                }
            })
        }
    </script>
@endsection
