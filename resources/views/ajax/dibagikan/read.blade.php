<div class="card card-primary" id="table">
    <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th class="d-none"></th>
                <th>No</th>
                <th>Judul</th>
                <th>Flashcard</th>
                <th>Pengirim</th>
                <th>Jenis Pengirim</th>
                <th>Penerima</th>
                <th>Jenis Penerima</th>
                <th>Status</th>
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
                    <td>
                        @if($datas->flashcard == null)
                            Data flashcard sudah dihapus
                        @else
                            {{$datas->flashcard->judul}}
                        @endif
                    </td>
                    <td>
                        @if($datas->flashcard == null)
                            Data flashcard sudah dihapus
                        @else
                            <img class="img-thumbnail" src="{{asset('UploadedFile/flashcard/'.$datas->flashcard->attachment)}}" alt="Photo" width="100">
                        @endif
                    </td>
                    <td>
                        @if($datas->pengirim == null)
                            Data pengirim sudah dihapus
                        @else
                            {{$datas->pengirim->nama_user}}
                        @endif
                    </td>
                    <td>
                        @if($datas->pengirim == null)
                            Data pengirim sudah dihapus
                        @elseif($datas->pengirim->id_jenispengguna == 1)
                            Terapis
                        @elseif($datas->pengirim->id_jenispengguna == 2)
                            Admin
                        @else
                            Orang Tua Anak
                        @endif
                    </td>
                    <td>
                        @if($datas->penerima== null)
                            Data penerima sudah dihapus
                        @else
                            {{$datas->penerima->nama_user}}
                        @endif
                    </td>
                    <td>
                        @if($datas->penerima == null)
                            Data penerima sudah dihapus
                        @elseif($datas->penerima->id_jenispengguna == 1)
                            Terapis
                        @elseif($datas->penerima->id_jenispengguna == 2)
                            Admin
                        @else
                            Orang Tua Anak
                        @endif
                    </td>
                    <td>
                        @if($datas->flashcard == null)
                            Data flashcard sudah dihapus
                        @else
                            {{$datas->flashcard->status}}
                        @endif
                    </td>

                    <td>
                        @if($datas->penerima->id_jenispengguna ==  2 && $datas->flashcard->status == 'invalid')
                            <a href="#" id="{{$datas->flashcard->id}}" class="btn bg-gradient-success accept" data-action="{{asset('ajax/dibagikan/accept')}}">Validasi</a> |
                        @endif
                            <a href="#" id="{{$datas->id}}" class="btn bg-gradient-danger delete" data-action="{{asset('ajax/dibagikan/delete')}}">Hapus</a>
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





