@extends('master.dashboard')
@section('judul','Dashboard Admin Tentang Aplikasi')
@section('tentang','active')
@section('titlecontent','Tentang Aplikasi')
@section('breadcrumb')
    <li class="breadcrumb-item active">Info</li>
    <li class="breadcrumb-item active">Tentang Aplikasi</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-12" >
            <div class="card card-primary card-outline">
{{--                <div class="card-header">--}}
{{--                    <h3 class="card-title">TENTANG APLIKASI</h3>--}}
{{--                </div> <!-- /.card-body -->--}}
                <div class="card-body">
                    <h3>ABE</h3>
                    <p>Version 1.0</p>
                    <div>
                        <p>
                            Abe Merupakan Aplikasi untuk memenuhi kebutuhan dalam melakukan terapi visual di Yayasan Bali Permata Hati.
                            di yayasan bali permata hati menggunakan metode visual PECS (Picture Exchange Communication System).
                            Dengan Menggunakan Aplikasi ABE ini di harapkan Yayasan Anak-anak yang melakukan terapi di yayasan bali
                            permata hati dapat di mudahkan dalam melaksanakan terapi dari segi terapis maupun orang tua dapat melakukan
                            terapi dengan lebih praktis
                        </p>
                    </div>
                </div><!-- /.card-body -->
            </div>
        </div>
        <!-- /.col -->
    </div>
@endsection

