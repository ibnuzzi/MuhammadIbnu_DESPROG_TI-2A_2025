<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Buku</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Buku</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Buku</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-md btn-primary" onclick="tambahData()">
                    Tambah
                </button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered table-striped" id="table-data">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Buku</th>
                        <th>Nama Buku</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</section>

<div class="modal fade" id="form-data" style="display: none;" aria-hidden="true">
    <form action="action/bukuAction.php?act=save" method="post" id="form-tambah">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Buku</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="kategori_id" id="kategori_id">
                            <option value="">Pilih Kategori</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kode Buku</label>
                                <input type="text" class="form-control" name="buku_kode" id="buku_kode">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Buku</label>
                                <input type="text" class="form-control" name="buku_nama" id="buku_nama">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" class="form-control" name="jumlah" id="jumlah">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="text" class="form-control" name="gambar" id="gambar" placeholder="Nama file gambar">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function loadKategori() {
        $.ajax({
            url: 'action/bukuAction.php?act=get_kategori',
            method: 'post',
            success: function(response) {
                var data = JSON.parse(response);
                var options = '<option value="">Pilih Kategori</option>';
                data.forEach(function(item) {
                    options += '<option value="' + item.kategori_id + '">' + item.kategori_nama + '</option>';
                });
                $('#kategori_id').html(options);
            }
        });
    }

    function tambahData() {
        $('#form-data').modal('show');
        $('#form-tambah').attr('action', 'action/bukuAction.php?act=save');
        $('#kategori_id').val('');
        $('#buku_kode').val('');
        $('#buku_nama').val('');
        $('#jumlah').val('');
        $('#deskripsi').val('');
        $('#gambar').val('');
        loadKategori();
    }

    function editData(id) {
        $.ajax({
            url: 'action/bukuAction.php?act=get&id=' + id,
            method: 'post',
            success: function(response) {
                var data = JSON.parse(response);
                $('#form-data').modal('show');
                $('#form-tambah').attr('action', 'action/bukuAction.php?act=update&id=' + id);

                loadKategori();
                setTimeout(function() {
                    $('#kategori_id').val(data.kategori_id);
                }, 300);

                $('#buku_kode').val(data.buku_kode);
                $('#buku_nama').val(data.buku_nama);
                $('#jumlah').val(data.jumlah);
                $('#deskripsi').val(data.deskripsi);
                $('#gambar').val(data.gambar);
            }
        });
    }

    function deleteData(id) {
        if (confirm('Apakah anda yakin?')) {
            $.ajax({
                url: 'action/bukuAction.php?act=delete&id=' + id,
                method: 'post',
                success: function(response) {
                    var result = JSON.parse(response);
                    if (result.status) {
                        tabelData.ajax.reload();
                    } else {
                        alert(result.message);
                    }
                }
            });
        }
    }

    var tabelData;
    $(document).ready(function() {
        tabelData = $('#table-data').DataTable({
            ajax: 'action/bukuAction.php?act=load',
        });

        $('#form-tambah').validate({
            rules: {
                kategori_id: {
                    required: true
                },
                buku_kode: {
                    required: true,
                    minlength: 3
                },
                buku_nama: {
                    required: true,
                    minlength: 5
                },
                jumlah: {
                    required: true,
                    number: true,
                    min: 1
                },
                gambar: {
                    required: true
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
            submitHandler: function(form) {
                $.ajax({
                    url: $(form).attr('action'),
                    method: 'post',
                    data: $(form).serialize(),
                    success: function(response) {
                        var result = JSON.parse(response);
                        if (result.status) {
                            $('#form-data').modal('hide');
                            tabelData.ajax.reload();
                        } else {
                            alert(result.message);
                        }
                    }
                });
            }
        });
    });
</script>