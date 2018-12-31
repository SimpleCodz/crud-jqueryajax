<!doctype html>
<html lang="en">

<head>
    <title>CRUD JQuery AJAX</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <h1 class="h4 text-center mb-4">
                    CRUD PHP MySQLi with JQuery AJAX <br/>
                    <small>by <a target="_blank" href="https://simplecodz.blogspot.com">Simplecodz</a></small>
                </h1>
                <div id="pesan"></div>
                <div class="form-inline mb-4">
                    <button id="addData" class="btn btn-sm btn-primary">Add Data</button>
                    <input placeholder="search..." type="text" class="ml-3 form-control form-control-sm" id="keyword">
                    <span class="ml-3 text-muted">Jumlah Data : <b id="totalRows" class="text-dark">12</b></span>
                </div>
                <table id="table" class="table table-sm table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50">No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="myModalTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form id="form">
                    <input name="id" id="id" type="hidden"/>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input name="nama" required="required" type="text" id="nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" required="required" type="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" required="required" id="alamat" rows="2" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnSimpan" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.3.1.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="app.js"></script>
</body>

</html>