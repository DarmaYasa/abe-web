
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('judul')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('asset/plugins/select2/css/select2.min.css')}}">

    <link rel="stylesheet" href="{{asset('asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/my.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('asset/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('asset/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('asset/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('asset/plugins/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('asset/datepicker/dist/css/bootstrap-datepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('asset/plugins/summernote/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: black;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {background-color: grey;}

        .dropdown:hover .dropdown-content {display: block;}

        .dropdown:hover .dropbtn {background-color: #3e8e41;}
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="/profile" role="button">
                    <i class="fas fa-user"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/logout" role="button">
                    <i class="fas fa-power-off"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/" class="brand-link">
            {{--            <img src="asset/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"--}}
            {{--                 style="opacity: .8">--}}
            <span class="brand-text font-weight-light" style="margin-left: 20px">Admin ABE</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('image/profile.png')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="/profile" class="d-block">{{$akun['nama']}}</a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-header">DASHBOARD</li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link @yield('data')">
                            <i class="nav-icon fas fa-chalkboard"></i>
                            <p>
                                Data
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/anak" class="nav-link @yield('anak')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Anak</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/orangtua" class="nav-link @yield('orangtua')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Orang tua</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/terapis" class="nav-link @yield('terapis')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Terapis</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link @yield('konten')">
                            <i class="nav-icon fas fa-database"></i>
                            <p>
                                Konten
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/flashcard" class="nav-link @yield('flashcard')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Flashcard</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/jenisflashcard" class="nav-link @yield('jenisflashcard')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Jenis Flashcard</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dibagikan" class="nav-link @yield('dibagikan')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>konten yang dibagikan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/perbedaan" class="nav-link @yield('perbedaan')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>perbedaan konten</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @if($akun['type'] == 1)
                    <li class="nav-item ">
                        <a href="/admin" class="nav-link @yield('admin')">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>Data Admin </p>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a href="/pengguna" class="nav-link @yield('pengguna')">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Data Pengguna</p>
                        </a>

                    </li>

                    <li class="nav-item ">
                        <a href="/notifikasi" class="nav-link @yield('notifikasi')">
                            <i class="nav-icon fas fa-bell"></i>
                            <p>Notifikasi </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="/perkembangan" class="nav-link @yield('perkembangan')">
                            <i class="nav-icon fas fa-chart-line"></i>
                            <p>Perkembangan Anak </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/pengumuman" class="nav-link @yield('pengumuman')">
                            <i class="nav-icon fas fa-bullhorn"></i>
                            <p>Pengumuman </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/berita" class="nav-link @yield('berita')">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>Berita</p>
                        </a>
                    </li>
                    <li class="nav-header">Info</li>
                    <li class="nav-item">
                        <a href="/feedback" class="nav-link @yield('feedback')">
                            <i class="nav-icon fas fa-comment-alt"></i>
                            <p>Feedback</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/tentang" class="nav-link @yield('tentang')">
                            <i class="nav-icon fas fa-info-circle "></i>
                            <p class="text">Tentang Aplikasi</p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">@yield('titlecontent')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            @yield('breadcrumb')
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2021 Kusuma Wardana.</strong>
        All rights reserved.
    </footer>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('asset/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('asset/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('asset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('asset/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('asset/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('asset/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('asset/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('asset/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('asset/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('asset/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('asset/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('asset/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('asset/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('asset/dist/js/demo.js')}}"></script>
<!-- jQuery -->
<script src="{{asset('asset/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('asset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<!-- DataTables  & Plugins -->
<script src="{{asset('asset/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('asset/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('asset/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('asset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('asset/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('asset/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('asset/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('asset/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('asset/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('asset/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
{{--<script src="{{asset('asset/plugins/datatables/jquery.dataTables.min.js')}}"></script>--}}
{{--<script src="{{asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>--}}
{{--<script src="{{asset('asset/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>--}}
{{--<script src="{{asset('asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>--}}
<!-- Select2 -->
<script src="{{asset('asset/plugins/select2/js/select2.js')}}"></script>
<!-- ajax kusuma -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- bs-custom-file-input -->
<script src="{{asset('asset/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script src="{{asset('asset/datepicker/dist/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('js/ajax.js')}}"></script>
<script src="{{asset('js/jquery.autocomplete.min.js')}}"></script>
@yield('script')
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
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
        $('.datepicker').datepicker({
            format: 'yyyy/mm/dd',
            autoclose: true,
            todayHighlight: true
        })
    });
</script>

</body>
</html>
