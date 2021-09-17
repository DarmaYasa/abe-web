@extends('master.dashboard')
@section('judul','Dashboard Admin Feedback Pengguna')
@section('feedback','active')
@section('titlecontent','Feedback')
@section('breadcrumb')
    <li class="breadcrumb-item active">Feedback</li>
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
                url: '/ajax/feedback/read',
                success:function (data) {
                    $('#table').html(data);
                }
            })
        }
    </script>
@endsection
