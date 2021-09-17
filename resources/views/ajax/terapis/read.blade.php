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

                <th>No</th>
                <th>Nama</th>
                <th>Kelamin</th>
                <th>Agama</th>
                <th>Alamat</th>
                <th>Telp</th>
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
                    <td>{{$datas->nama_terapis}}</td>
                    <td>
                        {{str_replace('laki_laki','laki-laki',$datas->kelamin)  }}
                    </td>
                    <td>{{$datas->agama}}</td>
                    <td>{{$datas->alamat}}</td>
                    <td>{{$datas->telp}}</td>
                    <td>
                        <a href="*" id="{{$datas->id}}" class="btn bg-gradient-warning edit">Edit</a>
                        |
                        <a href="#" id="{{$datas->id}}" class="btn bg-gradient-danger delete" data-action="{{asset('ajax/terapis/delete')}}">Hapus</a>
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





