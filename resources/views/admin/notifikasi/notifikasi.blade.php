@extends('master.dashboard')
@section('judul','Dashboard Admin Notifikasi')

@section('notifikasi','active')
@section('titlecontent','Notifikasi')
@section('breadcrumb')
    <li class="breadcrumb-item active">Notifikasi</li>
@endsection
@section('content')

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
                url: '/ajax/notifikasi/read',
                success:function (data) {
                    $('#table').html(data);
                }
            })
        }
    </script>
@endsection
