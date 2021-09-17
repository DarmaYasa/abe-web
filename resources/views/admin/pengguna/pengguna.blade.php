@extends('master.dashboard')
@section('judul','Dashboard Admin Data Orang Tua')
@section('penggunap','active')
@section('pengguna','active')
@section('titlecontent','Data Pengguna Aplikasi')
@section('breadcrumb')
    <li class="breadcrumb-item active">Pengguna Aplikasi</li>
    <li class="breadcrumb-item active">Pengguna</li>
@endsection
@section('content')
    <form role="form" action="/ajax/pengguna/create/ortu" method="POST" id="form-send">
        @csrf
        <div class="modal fade " id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Pengguna Dari Orang Tua Anak</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Orang Tua</label>
                                <select class="custom-select" name="id_orangtua">
                                    @foreach($orangtua as $orangtuas)
                                        <option value="{{$orangtuas->id}}">{{$orangtuas->nama_orangtua}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Pengguna</label>
                                <input type="text" class="form-control"  placeholder="Nama Pengguna" name="nama_user">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" class="form-control"  placeholder="Password" name="password">
                            </div>
                            <div class="form-group">
                                <label>status aktif akun</label>
                                <select class="custom-select" name="isactive">
                                    <option value="tidak">Tidak</option>
                                    <option value="iya">Iya</option>
                                </select>
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
    <form role="form" action="/ajax/pengguna/create/terapis" method="POST" id="form-send2" class="tambah2" >
        @csrf
        <div class="modal fade modaltambah" id="modal-lg2">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Pengguna Dari Terapis</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Terapis</label>
                                <select class="custom-select" name="id_terapis">
                                    @foreach($terapis as $terapiss)
                                        <option value="{{$terapiss->id}}">{{$terapiss->nama_terapis}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Pengguna</label>
                                <input type="text" class="form-control"  placeholder="Nama Pengguna" name="nama_user">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" class="form-control"  placeholder="Password" name="password">
                            </div>
                            <div class="form-group">
                                <label>status aktif akun</label>
                                <select class="custom-select" name="isactive">
                                    <option value="tidak">Tidak</option>
                                    <option value="iya">Iya</option>
                                </select>
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
    <form role="form" action="/ajax/pengguna/create/admin" method="POST" id="form-send" class="tambah2">
        @csrf
        <div class="modal fade modaltambah" id="modal-lg3">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Pengguna Admin</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Lengkap</label>
                                <input type="text" class="form-control"  placeholder="Nama Lengkap" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Pengguna</label>
                                <input type="text" class="form-control"  placeholder="Nama Pengguna" name="nama_user">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" class="form-control"  placeholder="Password" name="password">
                            </div>
                            <div class="form-group">
                                <label>status aktif akun</label>
                                <select class="custom-select" name="isactive">
                                    <option value="tidak">Tidak</option>
                                    <option value="iya">Iya</option>
                                </select>
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
    <form role="form" action="/ajax/pengguna/update" method="post" id="form-update">
        @csrf
        <div class="modal fade modaledit" id="modal-lgr">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Data Pengguna</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="id" class="d-none" >
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Pengguna</label>
                                <input type="text" class="form-control"  placeholder="Nama Jenis Pengguna" name="nama_user">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" class="form-control"  placeholder="Password" name="passwordn">
                            </div>
                            <div class="form-group">
                                <label>status aktif akun</label>
                                <select class="custom-select" name="isactive">
                                    <option value="tidak">Tidak</option>
                                    <option value="iya">Iya</option>
                                </select>
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
                url: '/ajax/pengguna/read',
                success:function (data) {
                    $('#table').html(data);
                }
            })
        }
    </script>
@endsection
