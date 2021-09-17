@extends('master.dashboard')
@section('judul','Dashboard Admin Profile')
@section('titlecontent','Profile')
@section('breadcrumb')
    <li class="breadcrumb-item active">Info</li>
    <li class="breadcrumb-item active">Profile</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"  src="image/profile.png" alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center">
                        {{$akun->nama}}
                    </h3>
                    <p class="text-muted text-center">
                        {{$akun->nama_user}}
                    </p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Status Aktif</b>
                            <a class="float-right">
                                @if($akun->isactive == 'iya')
                                    <div style="margin-left: 5px">
                                        <p>aktif</p>
                                    </div>
                                @else
                                    <div style="margin-left: 5px">
                                        <p>non-aktif</p>
                                    </div>
                                @endif
                            </a>
                            <a class="float-right">
                                @if($akun->isactive == 'iya')
                                    <span style="height: 15px;width: 15px;background-color: #00a65a;border-radius: 50%;display: inline-block;">
                                    </span>
                                @else
                                    <span style="height: 15px;width: 15px;background-color: #f56954;border-radius: 50%;display: inline-block;">
                                    </span>
                                @endif
                            </a>
                        </li>
                    </ul>
                    <a href="/logout" class="btn btn-danger btn-block"><b>Log Out</b></a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <!-- About Me Box -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tentang Saya</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <strong><i class="fas fa-book mr-1"></i> Email</strong>

                    <p class="text-muted">
                        {{$akun->email}}
                    </p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i>Alamat</strong>
                    <p class="text-muted">
                        {{$akun->alamat}}
                    </p>

                    <hr>
                    <strong><i class="fas fa-map-marker-alt mr-1"></i>No. Telepon /Whatsapp</strong>
                    <p class="text-muted">
                        {{$akun->telp}}
                    </p>
                    <hr>


                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection

