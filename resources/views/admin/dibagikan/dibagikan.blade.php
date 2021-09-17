@extends('master.dashboard')
@section('judul','Dashboard Admin Konten Yang Dibagikan')
@section('dibagikan','active')
@section('titlecontent','Dibagikan')
@section('breadcrumb')
    <li class="breadcrumb-item active">Konten</li>
    <li class="breadcrumb-item active">Dibagikan</li>
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
                url: '/ajax/dibagikan/read',
                success:function (data) {
                    $('#table').html(data);
                }
            })
        }
    </script>
@endsection
