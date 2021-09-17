@extends('master.dashboard')
@section('judul','Dashboard Admin')
@section('titlecontent','Dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box" style="background-color: #333B3F;box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                <div class="inner">
                    <h3 style="color: #FFFFFF">{{$pengguna}}</h3>
                    <p style="color: #FFFFFF">Pengguna Aplikasi</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person" style="color: #818181"></i>
                </div>
                <a href="/pengguna" class="small-box-footer" style="background-color: #363636">Lebih Lanjut<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@endsection
