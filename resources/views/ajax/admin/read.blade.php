<div class="card card-primary" id="table">
    <div class="card-header">
        <button type="button" class="btn btn-default float-right" data-toggle="modal" data-target="#modal-lg">
            Tambah Data
        </button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>nama pengguna</th>
                <th>tipe</th>
                <th>status aktif</th>
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
                    <td>{{$datas->admintype->nama}}</td>
                    <td>{{$datas->isactive}}</td>
                    <td>
                        <a href="#" id="{{$datas->id}}" class="btn bg-gradient-info detail">Detail</a>
                        |
                        <a href="#" id="{{$datas->id}}" class="btn bg-gradient-warning edit">Edit</a>
                        @if($datas->admintype->id != 1)
                            |
                            <a href="#" id="{{$datas->id}}" class="btn bg-gradient-danger delete" data-action="{{asset('ajax/admin/delete')}}">Hapus</a>
                        @endif
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





