@extends('master.dashboard')
@section('judul','Dashboard Admin Perkembangan')
@section('perkembangan','active')
@section('titlecontent','Perkembangan Anak')
@section('breadcrumb')
    <li class="breadcrumb-item active">Perkembangan Anak</li>
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
                url: '/ajax/perkembangan/read',
                success:function (data) {
                    $('#table').html(data);
                }
            })
        }
    </script>
@endsection
