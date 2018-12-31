$(function () {

    $('.modalTambah').on('click', function () {

        $('#formModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');

        $('#id').val('');
        $('#nama').val('');
        $('#nim').val('');
        $('#email').val('');
        $('#jurusan').val('');
    });

    $('.modalUbah').on('click', function () {

        $('#formModalLabel').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');

        $('.modal-content form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/ubah');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/phpmvc/public/mahasiswa/getUbah',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id').val(data.id);
                $('#nama').val(data.nama);
                $('#nim').val(data.nim);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
            }
        });

    });

});