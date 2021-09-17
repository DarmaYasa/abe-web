@extends('master.dashboard')
@section('judul','Dashboard Admin Data Terapis')
@section('data','active')
@section('terapis','active')
@section('titlecontent','Data Terapis')
@section('breadcrumb')
    <li class="breadcrumb-item active">Data</li>
    <li class="breadcrumb-item active">Terapis</li>
@endsection
@section('content')
    <form role="form" action="/ajax/terapis/create" method="POST" id="form-send">
        @csrf
        <div class="modal fade modaltambah" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Terapis</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" class="form-control"  placeholder="Nama " name="nama_terapis">
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
                                <label>Agama</label>
                                <select class="custom-select" name="agama">
                                    <option value="Islam">Islam</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Katolik">Katolik</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat</label>
                                <input type="text" class="form-control"  placeholder="Alamat" name="alamat">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Telp</label>
                                <input type="text" class="form-control"  placeholder="Telp" name="telp">
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
    <form role="form" action="/ajax/terapis/update" method="post" id="form-update">
        @csrf
        <div class="modal fade modaledit" id="modal-lgr">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Data Terapis</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="id" class="d-none" >
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" class="form-control"  placeholder="Nama" name="nama_terapis" id="nama">
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
                                <label>Agama</label>
                                <select class="custom-select" name="agama">
                                    <option value="Islam">Islam</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Katolik">Katolik</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat</label>
                                <input type="text" class="form-control"  placeholder="Alamat" name="alamat">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Telp</label>
                                <input type="text" class="form-control"  placeholder="Telp" name="telp">
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
                url: '/ajax/terapis/read',
                success:function (data) {
                    $('#table').html(data);
                }
            })
        }
    </script>
@endsection
