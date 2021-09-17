@extends('master.dashboard')
@section('judul','Dashboard Admin Akun Admin')
@section('admin','active')
@section('titlecontent','Admin')
@section('breadcrumb')
    <li class="breadcrumb-item active">Admin</li>
@endsection
@section('content')
    <form role="form" action="/ajax/admin/create" method="post" id="form-send">
        @csrf
        <div class="modal fade modaltambah" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data admin</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Lengkap</label>
                                <input type="text" class="form-control"  placeholder="Nama Lengkap" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama pengguna</label>
                                <input type="text" class="form-control"  placeholder="Nama Pengguna" name="nama_user" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control"  placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat</label>
                                <input type="text" class="form-control"  placeholder="Alamat" name="alamat">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">No. Telp / Whatsapp</label>
                                <input type="text" class="form-control"  placeholder="No. Telp / Whatsapp" name="telp" required>
                            </div>
                            <div class="form-group">
                                <label>status aktif akun</label>
                                <select class="custom-select" name="isactive">
                                    <option value="tidak">Tidak</option>
                                    <option value="iya">Iya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control"  placeholder="password" name="password" required>
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
    <form role="form" action="/ajax/admin/update" method="post" id="form-update">
        @csrf
        <div class="modal fade modaledit" id="modal-lgr">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Data Admin</h4>
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
                                <label for="exampleInputEmail1">Nama Lengkap</label>
                                <input type="text" class="form-control"  placeholder="Nama Lengkap" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama pengguna</label>
                                <input type="text" class="form-control"  placeholder="Nama Pengguna" name="nama_user" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control"  placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat</label>
                                <input type="text" class="form-control"  placeholder="Alamat" name="alamat">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">No. Telp / Whatsapp</label>
                                <input type="text" class="form-control"  placeholder="No. Telp / Whatsapp" name="telp" required>
                            </div>
                            <div class="form-group">
                                <label>status aktif akun</label>
                                <select class="custom-select" name="isactive">
                                    <option value="tidak">Tidak</option>
                                    <option value="iya">Iya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ganti Password</label>
                                <input type="password" class="form-control"  placeholder="Ganti Password Baru" name="passnew">
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
    <form role="form"  id="form-detail">
        @csrf
        <div class="modal fade modaldetail" id="modal-lgr">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Detail Data Admin</h4>
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
                                <label for="exampleInputEmail1">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" readonly="readonly" style="border: 0;background-color: white" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama pengguna</label>
                                <input type="text" class="form-control" name="nama_user" readonly="readonly" style="border: 0;background-color: white">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" readonly="readonly" name="email"  style="border: 0;background-color: white">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat</label>
                                <input type="text" class="form-control" name="alamat" readonly="readonly" style="border: 0;background-color: white">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">No. Telp / Whatsapp</label>
                                <input type="text" class="form-control" name="telp" readonly="readonly" style="border: 0;background-color: white">
                            </div>
                            <div class="form-group">
                                <label>status aktif akun</label>
                                <input type="text" class="form-control" name="isactive" readonly="readonly" style="border: 0;background-color: white">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>
    <div class="row">
        <div class="col-12" >
            <div id="table"></div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        function loadData() {
            $.ajax({
                url: '/ajax/admin/read',
                success:function (data) {
                    $('#table').html(data);
                }
            })
        }
    </script>
@endsection


