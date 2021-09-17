<div class="card card-primary" id="table">
    <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3>
        <div class="dropdown float-right">
            <button class="btn btn-default">Tambah Data</button>
            <div class="dropdown-content">
                <a href="#" data-toggle="modal" data-target="#modal-lg">Orang Tua</a>
                <a href="#" data-toggle="modal" data-target="#modal-lg2">Terapis</a>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>

                <th>No</th>
                <th>Nama</th>
                <th>Nama Pengguna</th>
                <th>Active</th>
                <th>Jenis Pengguna</th>
                <th>Opsi</th>
                <th class="d-none"></th>
            </tr>
            </thead>
            <tbody>
            @php
                $no = 1;
            @endphp
            @foreach($table as $datas)
                <tr>
                    <td>{{$no}}</td>
                    <td>{{$datas->nama}}</td>
                    <td>{{$datas->nama_user}}</td>
                    <td>{{$datas->isactive}}</td>
                    <td>
                        @if($datas->jenispengguna == null)
                            jenis pengguna sudah di hapus
                        @else
                            {{$datas->jenispengguna->nama}}
                        @endif
                    </td>
                    <td>
                        <a href="#" id="{{$datas->id}}" class="btn bg-gradient-warning edit">Edit</a>
                        |
                        <a href="#" id="{{$datas->id}}" class="btn bg-gradient-danger delete" data-action="{{asset('ajax/pengguna/delete')}}">Hapus</a>
                    </td>
                    <td class="d-none data-row">
                        <textarea>
                            {{$datas}}
                        </textarea>
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





