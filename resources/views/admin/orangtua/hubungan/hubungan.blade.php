@extends('master.dashboard')
@section('judul','Dashboard Admin Data Orangtua')
@section('data','active')
@section('orangtua','active')
@section('titlecontent','Data orangtua yang memantau perkembangan anak')
@section('breadcrumb')
    <li class="breadcrumb-item active">Data</li>
    <li class="breadcrumb-item active">Orangtua</li>
    <li class="breadcrumb-item active">Hubungan</li>
@endsection
@section('content')
    <form role="form" action="/ajax/orangtua/hubungan/create" method="post" id="form-send">
        @csrf
        <div class="modal fade modaltambah" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">s
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data Anak Yang Akan Diwakili</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" class="form-control d-none"  name="anak" value="{{$id}}">
                                <label for="exampleInputEmail1">Nama Orangtua/Wali</label>
                                <select class="cari form-control" name="nama_orangtua" required></select>
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
    <form role="form" action="/ajax/orangtua/hubungan/update" method="post" id="form-update">
        @csrf
        <div class="modal fade modaledit" id="modal-lgr">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Data Anak Yang Akan Diwakili</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group d-none">
                                <label for="exampleInputEmail1">id</label>
                                <input type="text" class="form-control" placeholder="Nama" name="id">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control d-none" name="id_anak" value='{{$id}}'>
                                <label for="exampleInputEmail1">Nama Orangtua/Wali</label>
                                <select class="cari form-control" name="nama_orangtua"></select>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="custom-select" name="nama_hubungan">
                                    <option value="Ibu">Ibu</option>
                                    <option value="Ayah">Ayah</option>
                                    <option value="Wali">Wali</option>
                                    <option value="Saudara">Saudara</option>
                                </select>
                            </div>
                        </div>
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
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        function loadData() {
            $.ajax({
                url: '/ajax/orangtua/hubungan/read/{{$id}}',
                success:function (data) {
                    $('#table').html(data);
                }
            })
        }
    </script>
    <script type="text/javascript">
        $('.cari').select2({
            placeholder: 'Cari...',
            ajax: {
                url: '/anak/cari',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.nama_orangtua,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });

    </script>
    <script type="text/javascript">
        $('.orangtua').select2({
            placeholder: 'Cari...',
            ajax: {
                url: '/orangtua/cari',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.nama_orangtua,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });

    </script>

@endsection

