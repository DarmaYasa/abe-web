<div class="card card-primary" id="table">
    <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3>
        <button type="button" class="btn btn-default float-right" data-toggle="modal" data-target="#modal-lg">
            Tambah Data
        </button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th class="d-none"></th>
                <th>No</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Gambar Ilustrasi</th>
                <th>Gambar Realitas</th>
                <th>Nama Pengguna</th>
                <th>Opsi</th>
            </tr>
            </thead>
            <tbody>
            @php
                $no = 1;
            @endphp
            @foreach($table as $datas)
                <tr>
                    <td class="d-none data-row">
                        <textarea>
                            {{$datas}}
                        </textarea>
                    </td>
                    <td>{{$no}}</td>
                    <td>{{$datas->judul}}</td>
                    <td>{{$datas->deskripsi}}</td>
                    <td>
                        <img class="img-thumbnail" src="{{asset('UploadedFile/perbedaan/'.$datas->attachment1)}}" alt="Photo" width="100">
                    </td>
                    <td>
                        <img class="img-thumbnail" src="{{asset('UploadedFile/perbedaan/'.$datas->attachment2)}}" alt="Photo" width="100">
                    </td>
                    <td>
                        {{$datas->pengguna->nama_user}}
                    </td>
                    <td>
                        <a href="#" id="{{$datas->id}}" class="btn bg-gradient-danger delete" data-action="{{asset('ajax/perbedaan/delete')}}">Hapus</a>
                    </td>
                </tr>
                @php
                    $no++;
                @endphp
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
            "order": [[ 1, "asc" ]]
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>





