<div class="card card-primary" id="table">
    <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>

                <th>No</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>anak</th>
                <th>terapis</th>
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
                    <td>{{$datas->judul}}</td>
                    <td>{{$datas->deskripsi}}</td>
                    <td>
                        @if($datas->anak == null)
                            data anak sudah di hapus
                        @else
                            {{$datas->anak->nama_anak}}
                        @endif

                    </td>
                    <td>
                        @if($datas->terapis == null)
                            data terapis sudah di hapus
                        @else
                            {{$datas->terapis->nama_terapis}}
                        @endif

                    </td>
                    <td>
                        <a href="#" id="{{$datas->id}}" class="btn bg-gradient-danger delete" data-action="{{asset('ajax/perkembangan/delete')}}">Hapus</a>
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





