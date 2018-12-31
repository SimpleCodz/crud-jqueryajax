function load_data(q){
    var url = "";
    if(q !== undefined){
        url = "ajax/getData.php?q=" + q;
    }else{
        url = "ajax/getData.php";
    }
    $.ajax({
        url: url,
        type: "GET",
        success: function(result){
            var resultObj = JSON.parse(result);
            var tableData = $('#table tbody');
            var no = 1;
            tableData.html('');

            $('#totalRows').text(resultObj.length);

            if(resultObj.length == 0){
                var noRow = "<tr><td colspan='5' class='text-center'>Tidak ada data</td></tr>";
                tableData.append(noRow);
            }else{
                $.each(resultObj, function(key, val){
                    var btnEdit = `<button onclick="edit(${val.id})" class="btn btn-sm btn-primary">Edit</button>`;
                    var btnDelete = `<button onclick="hapus(${val.id})" class="btn btn-sm btn-primary">Delete</button>`;
                
                    var row = $('<tr>');
                    row.html(`<td>${(no++) + '.'}</td>`);
                    row.append(`<td>${val.nama}</td>`);
                    row.append(`<td>${val.email}</td>`);
                    row.append(`<td>${val.alamat}</td>`);
                    row.append(`<td class='text-center'>${btnEdit + ' ' + btnDelete}</td>`);
                    row.append('</tr>');

                    tableData.append(row);
                });
            }
        }
    });
}

function edit(getId) {
    $('#myModal').modal('show');
    $('#btnSimpan').text('Simpan Perubahan');
    $('#myModal #myModalTitle').text('Edit Data User');
    $('.modal-content').find('#form').attr('action', 'ajax/editData.php');

    // Panggil Data dan isi form
    $.ajax({
        url: "ajax/getDetailData.php",
        data: 'id='+getId,
        type: "POST",
        success: function(result){
            var data = JSON.parse(result);
            $('#id').val(data[0].id);
            $('#nama').val(data[0].nama);
            $('#email').val(data[0].email);
            $('#alamat').val(data[0].alamat);
        }
    });

    if($('#btnSimpan').text() == "Simpan Perubahan"){
        // Simpan Perubahan
        $('#form').on('submit', function(e){
            e.preventDefault();

            var form = $('body .modal-content').find('#form');
            var url = form.attr('action');
            
            $.ajax({
                url: url,
                data: form.serialize(),
                method: "POST",
                cache: false,
                success: function(result){
                    form.trigger('reset');
                    var result = JSON.parse(result);
                    $('#pesan').html(result.pesan);
                    
                    $('#myModal').modal('hide');
                    load_data();
                }
            });
        });
    }

    $('#myModal').on('hidden.bs.modal', function (e) {
        $('#id').val('');
    });
}

function hapus(getId){
    var yakin = confirm('Yakin ingin hapus?');
    if(yakin){
        $.ajax({
            url: "ajax/deleteData.php",
            data: 'id='+getId,
            type: "POST",
            success: function(result){
                var result = JSON.parse(result);
                $('#pesan').html(result.pesan);
                
                load_data();
            }
        });
    }
}

$(document).ready(function() {
    load_data();

    $('#addData').on('click', function() {
        $('#myModal').modal('show');
        $('#nama, #email, #alamat').val('');
        $('#btnSimpan').text('Simpan');
        $('#myModal #myModalTitle').text('Tambah Data User');
        $('.modal-content').find('#form').attr('action', 'ajax/addData.php'); 

        if($('#btnSimpan').text() == "Simpan"){
            $('#form').submit(function(e){
                e.preventDefault();
                e.stopImmediatePropagation();
                var form = $('.modal-content').find('#form');
                var url = form.attr('action');
                console.log(url);
                $.ajax({
                    url: url,
                    data: form.serialize(),
                    type: "POST",
                    success: function(result){
                        form.trigger('reset');
                        var result = JSON.parse(result);
                        $('#pesan').html(result.pesan);
                        
                        $('#myModal').modal('hide');
                        load_data();
                    }
                });

                return false;
            }); 
        }
    });

    $('#keyword').on('keyup', function(){
        var q = $(this).val();
        load_data(q);
    });

    $('#myModal').on('shown.bs.modal', function () {
        $('body').find('#nama').select();
    });
});