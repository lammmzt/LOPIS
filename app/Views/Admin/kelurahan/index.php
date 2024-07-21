<?= $this->extend('Template/index'); ?>
<?= $this->section('content'); ?>


<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title text-start">Data kelurahan</h4>
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambahDadta"><i
                    class="fas fa-plus"></i>
            </button>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success solid alert-end-icon alert-dismissible fade show">
                <span><i class="mdi mdi-check"></i></span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                </button> <strong>Success!</strong> <?= session()->getFlashdata('success'); ?>
            </div>
            <?php endif; ?>
            <!-- <div class="alert alert-warning solid alert-end-icon alert-dismissible fade show">
                <span><i class="mdi mdi-alert"></i></span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                </button>
                <strong>Warning!</strong> Something went wrong. Please check.
            </div> -->
            <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger solid alert-end-icon alert-dismissible fade show">
                <span><i class="mdi mdi-help"></i></span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                </button>
                <strong>Error!</strong> <?= session()->getFlashdata('error'); ?>
            </div>
            <?php endif; ?>
            <div class="table-responsive table table-striped">
                <table id="example3" class="display" style="min-width: 845px">
                    <thead>
                        <tr>
                            <th style="width: 20px;">No</th>
                            <th>Name kelurahan</th>
                            <th>Name Kecamatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($kelurahan as $data) :
                        ?>
                        <tr>
                            <td>
                                <?= $no++; ?>
                            </td>
                            <td>
                                <?= $data['nama_kelurahan']; ?>
                            </td>
                            <td>
                                <?= $data['nama_kecamatan']; ?>
                            </td>

                            <td>
                                <div class="d-flex">
                                    <a href="#" class="btn btn-primary shadow btn-xs sharp me-1 edit_modal"
                                        data-bs-toggle="modal" id="<?= $data['id_kelurahan']; ?>"
                                        data-bs-target="#edit"><i class="fas fa-pencil-alt"></i></a>
                                    <button class="btn btn-danger shadow btn-xs sharp btn_hps"
                                        id="<?= $data['id_kelurahan']; ?>" data-bs-toggle="modal"
                                        data-bs-target="#hapus"><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal tambah-->
<div class="modal fade" id="tambahDadta">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah kelurahan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="<?= base_url('kelurahan/Save') ?>" method="post">
                <div class="modal-body">
                    <div class="basic-form">
                        <!-- select kota -->
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Nama Kota</label>
                            <div class="col-sm-9">
                                <select id="kota" name="kota_id" required>
                                    <option value="">--pilih kota--</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Nama Kecamatan</label>
                            <div class="col-sm-9">
                                <select id="kecamatan" name="kecamatan_id" required>
                                    <option value="">--pilih kecamatan--</option>

                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Nama kelurahan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Masukan nama kelurahan" name="name"
                                    id="name" required>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal edit-->


<!-- Modal edit-->
<div class="modal fade" id="edit">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit kelurahan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="<?= base_url('kelurahan/Update') ?>" method="post" id="edit_form">
                <div class="modal-body">
                    <div class="basic-form">
                        <!-- select kota -->
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Nama Kota</label>
                            <div class="col-sm-9">
                                <select id="edit_kota" name="kota_id" class="form-control" required>
                                    <option value="">--pilih kota--</option>

                                </select>
                            </div>
                        </div>
                        <!-- select kec -->
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Nama Kecamatan</label>
                            <div class="col-sm-9">
                                <select id="edit_kecamatan" name="kecamatan_id" class="form-control" required>
                                    <option value="">--pilih kecamatan--</option>

                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <input type="hidden" name="id_kelurahan" id="edit_id_kelurahan">
                            <label class="col-sm-3 col-form-label">Nama kelurahan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Masukan nama kelurahan"
                                    name="nama_kelurahan" id="editnama_kelurahan" value="" required>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn_update">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal hapus -->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="hapus"
    style="z-index: 9999;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Peringatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="<?= base_url('Kelurahan/Delete') ?>" method="post">
                <div class="modal-body">
                    <p>
                        Apakah anda yakin menghapus data ini?
                    </p>
                    <input type="hidden" name="id_kelurahan" id="hps_id_kelurahan">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Yaa, Hapus</button>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection('content'); ?>

<?= $this->section('datatables'); ?>
<script src="<?= base_url('Assets/') ?>vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="<?= base_url('Assets/') ?>vendor/select2/js/select2.full.min.js"></script>
<script src="<?= base_url('Assets/') ?>js/plugins-init/select2-init.js"></script>
<script>
$("#kota").select2();
$("#kecamatan").select2();
$("#edit_kota").select2();
$("#edit_kecamatan").select2();

//set waktu hide alert
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
    });
}, 3000);

// datatable
var table = $('#example3').DataTable({
    language: {
        paginate: {
            next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
            previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>',
        },
    },
    "columnDefs": [{
        "targets": [3, 0],
        "orderable": false
    }]
});

// mengambil data kota dari database dan menampilkannya ke dalam select kota
function getKota() {
    $.ajax({
        url: "<?= base_url('Kota/fetch_all') ?>",
        type: "GET",
        dataType: "json",
        success: function(data) {
            var html = '';
            for (var i = 0; i < data.data.length; i++) {
                html += '<option value="' + data.data[i].id_kota + '">' + data.data[i].nama_kota +
                    '</option>';
            }
            $('#kota').append(html);
        }
    });
}
getKota();

// ketika memilih select kota akan mengambil data kecamatan berdasarkan kota
$('#kota').on('change', function() {
    var kota_id = $(this).val();
    $.ajax({
        // mengambil data kecamatan berdasarkan kota
        url: "<?= base_url('Kecamatan/fetch_by_kota') ?>",
        type: "POST",
        data: {
            kota_id: kota_id
        },
        dataType: "json",
        success: function(data) {
            var html = '';
            html += '<option value="">--pilih kecamatan--</option>';
            for (var i = 0; i < data.data.length; i++) {
                html += '<option value="' + data.data[i].id_kecamatan + '">' + data.data[i]
                    .nama_kecamatan +
                    '</option>';
            }
            $('#kecamatan').html(html);
        }
    });
});

// fungsi untuk mengambil data kota dan menampilkannya ke dalam select option kota
function getEditKota(id_kota) {
    $('#edit_kota').html('');
    $.ajax({
        // mengambil data kota dari database
        url: "<?= base_url('Kota/fetch_all') ?>",
        type: "GET",
        dataType: "json",
        success: function(data) {
            var html = '';
            // menampilkan data yang diambil dari database ke dalam select option kota
            for (var i = 0; i < data.data.length; i++) {
                if (data.data[i].id_kota == id_kota) {
                    html += '<option value="' + data.data[i].id_kota + '" selected>' + data.data[i]
                        .nama_kota +
                        '</option>';
                } else {
                    html += '<option value="' + data.data[i].id_kota + '">' + data.data[i].nama_kota +
                        '</option>';
                }
            }
            $('#edit_kota').append(html);
        }
    });
}

// fungsi untuk mengambil data kecamatan berdasarkan kota
function getEditKec(kota_id, kecamatan_id) {
    $('#edit_kecamatan').html('');
    $.ajax({
        // mengirim data kecamatan berdasarkan kota
        url: "<?= base_url('Kecamatan/fetch_by_kota') ?>",
        type: "POST",
        data: {
            kota_id: kota_id
        },
        dataType: "json",
        success: function(data) {
            var html = '';
            // menampilkan data kecamatan yang diambil dari database ke dalam select option kecamatan
            html += '<option value="">--pilih kecamatan--</option>';
            for (var i = 0; i < data.data.length; i++) {
                // jika id kecamatan sama dengan id kecamatan dari database maka akan terselect
                if (data.data[i].id_kecamatan == kecamatan_id) {
                    html += '<option value="' + data.data[i].id_kecamatan + '" selected>' + data.data[i]
                        .nama_kecamatan +
                        '</option>';
                } else {
                    // jika id kecamatan tidak sama dengan id kecamatan dari database maka tidak akan terselect
                    html += '<option value="' + data.data[i].id_kecamatan + '">' + data.data[i]
                        .nama_kecamatan +
                        '</option>';
                }
            }
            // menampilkan ke dalam select option kecamatan
            $('#edit_kecamatan').html(html);
        }
    });
}

// ketika memilih kota dan mengambil data kecamatan
$('#edit_kota').on('change', function() {
    var kota_id = $(this).val();
    getEditKec(kota_id, '0');
});

// ketika menekan btn edit
$('.edit_modal').on('click', function() {
    var id_kelurahan = $(this).attr('id'); // mengambil id dari button edit 
    // alert(id_kelurahan);
    $.ajax({
        url: "<?= base_url('Kelurahan/fetch_kel') ?>/" +
            id_kelurahan, // mengirim data kecamatan berdasarkan kota
        type: "GET",

        dataType: "json",
        success: function(data) {
            getEditKota(data.data.kota_id); // memanggil fungsi getEditKota
            getEditKec(data.data.kota_id, data.data.kecamatan_id); // memanggil fungsi getEditKec
            $('#edit_id_kelurahan').val(data.data
                .id_kelurahan); // menampilkan id kelurahan ke dalam form input id_kelurahan
            $('#editnama_kelurahan').val(data.data
                .nama_kelurahan); // menampilkan nama kelurahan ke dalam form input nama_kelurahan

        }
    });
});

// ketika menekan btn hapus
$('.btn_hps').on('click', function() {
    var id_kelurahan = $(this).attr('id'); // mengambil id dari button hapus
    $('#hps_id_kelurahan').val(id_kelurahan); // menampilkan id ke dalam form input id_kelurahan
});
</script>
<?= $this->endSection('datatables'); ?>