$(document).ready(function () {
    loadData();
});
$('#form-send').submit(function (e) {
    e.preventDefault();
    var request = new FormData(this);
    $.ajax({
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        data: request,
        contentType: false,
        cache: false,
        processData: false,
        // beforeSend:function(){
        //     $('.loading').show();
        // },
        success:function (data) {
            if (data == "sukses"){
                $('#form-send')[0].reset();
                Swal.fire({
                    icon: 'success',
                    title: 'Data berhasil di tambahkan',
                    showConfirmButton: false,
                    timer: 800
                });
                $('#modal-lg').modal('hide');
                $('#modal-lg2').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                loadData();
            }else{
                Swal.fire({
                    icon: 'error',
                    title: data,
                    showConfirmButton: false,
                    timer: 3000
                });
            }
        }
    });
});
$('.tambah2').submit(function (e) {
    e.preventDefault();
    var request = new FormData(this);
    $.ajax({
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        data: request,
        contentType: false,
        cache: false,
        processData: false,
        // beforeSend:function(){
        //     $('.loading').show();
        // },
        success:function (data) {
            if (data == "sukses"){
                $('.tambah2')[0].reset();
                $('#modal-lg2').modal('hide');
                $('#modal-lg3').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                loadData();
            }else if (data == "sama"){
                Swal.fire({
                    icon: 'error',
                    title: 'Data Sudah Ada',
                    showConfirmButton: false,
                    timer: 3000
                });
            }
        }
    });
});
// function loadData() {
//
//     var x = $(this).attr('data-action');
//     console.log(x)
//     $.ajax({
//         url: '/ajax/jenispengguna/read',
//         success:function (data) {
//             $('#table').html(data);
//         }
//     })
// }
$('#form-update').submit(function (e) {
    e.preventDefault();
    var request = new FormData(this);
    $.ajax({
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        data: request,
        contentType: false,
        cache: false,
        processData: false,
        success:function (data) {
            if (data == "sukses"){
                $('#modal-lgr').modal('hide');
                $('#form-update')[0].reset();
                Swal.fire({
                    icon: 'success',
                    title: 'Data berhasil di perbaharui',
                    showConfirmButton: false,
                    timer: 2000
                });
                loadData();
            }else {
                Swal.fire({
                    icon: 'error',
                    title: 'Data gagal diperbaharui',
                    showConfirmButton: false,
                    timer: 2000
                });

            }
        }
    });
});
$(document).on('click','.edit', function (e) {
    e.preventDefault();
    var json = $(this).parents('td').siblings('td.data-row').children('textarea').val();
    var data = JSON.parse(json);
    $('.modaledit').modal('show');
    $.each(data, function(field, value) {
        // console.log(data.kelamin)
        // if (data.kelamin == 'laki-laki'){
        //     $('.modaledit').find(':radio[name=kelamin][value="laki-laki"]').prop('checked', true);
        //     $('.modaledit').find(':radio[name=kelamin][value="perempuan"]').prop('checked', false);
        // }else if (data.kelamin == 'perempuan'){
        //     $('.modaledit').find(':radio[name=kelamin][value="perempuan"]').prop('checked', true);
        //     $('.modaledit').find(':radio[name=kelamin][value="laki-laki"]').prop('checked', false);
        // }
        //
        var type = $('.modaledit [name="'+field+'"]').attr('type');
        console.log(type, field, value);

        if(type == 'radio') {
            $('.modaledit [name="'+field+'"][value="'+value+'"]').prop('checked', true);
        } else {
            $('.modaledit [name="'+field+'"]').val(value);
        }
    });
});
$(document).on('click','.detail', function (e) {
    e.preventDefault();
    var json = $(this).parents('td').siblings('td.data-row').children('textarea').val();
    var data = JSON.parse(json);
    $('.modaldetail').modal('show');
    $.each(data, function(field, value) {
        // console.log(data.kelamin)
        // if (data.kelamin == 'laki-laki'){
        //     $('.modaledit').find(':radio[name=kelamin][value="laki-laki"]').prop('checked', true);
        //     $('.modaledit').find(':radio[name=kelamin][value="perempuan"]').prop('checked', false);
        // }else if (data.kelamin == 'perempuan'){
        //     $('.modaledit').find(':radio[name=kelamin][value="perempuan"]').prop('checked', true);
        //     $('.modaledit').find(':radio[name=kelamin][value="laki-laki"]').prop('checked', false);
        // }
        //
        var type = $('.modaldetail [name="'+field+'"]').attr('type');
        console.log(type, field, value);

        if(type == 'radio') {
            $('.modaldetail [name="'+field+'"][value="'+value+'"]').prop('checked', true);
        } else {
            $('.modaldetail [name="'+field+'"]').val(value);
        }
    });
});
$(document).on('click','.delete', function (e) {
    e.preventDefault();
    var id = $(this).attr('id');
    var link = $(this).attr('data-action') + '/' + id;
    Swal.fire({
        title: 'Hapus Data ?',
        text: "Anda Yakin ingin hapus data ini ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3758FF',
        cancelButtonColor: '#F81361',
        confirmButtonText: 'Iya',
        cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: link,
                success:function (data) {
                    if (data == 'sukses'){
                        Swal.fire(
                            'Berhasil',
                            'data berhasil di hapus',
                            'success'
                        );
                        loadData();
                    }else {
                        swal.fire(
                            'Batal',
                            'data tidak di hapus',
                            'error'
                        )
                    }
                }
            })
        }
    })
});
$(document).on('click','.accept', function (e) {
    e.preventDefault();
    var id = $(this).attr('id');
    var link = $(this).attr('data-action') + '/' + id;
    Swal.fire({
        title: 'Terima Data ini ?',
        text: "Anda Yakin ingin Menerima data ini ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3758FF',
        cancelButtonColor: '#F81361',
        confirmButtonText: 'Iya',
        cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: link,
                success:function (data) {
                    if (data == 'sukses'){
                        Swal.fire(
                            'Berhasil',
                            'data berhasil di Validasi',
                            'success'
                        );
                        loadData();
                    }else {
                        swal.fire(
                            'Batal',
                            'data tidak di Validasi',
                            'error'
                        )
                    }
                }
            })
        }
    })
});
