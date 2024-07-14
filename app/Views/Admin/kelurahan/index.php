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
            <?php endif;?>
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
                <strong>Error!</strong> <?= session()->getFlashdata('success'); ?>
            </div>
            <?php endif;?>
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
                        foreach ($kelurahan as $data):
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
                                    <a href="#" class="btn btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal"
                                        data-bs-target="#edit<?= $data['id_kelurahan']; ?>"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    <a href="#" class="btn btn-danger shadow btn-xs sharp" data-bs-toggle="modal"
                                        data-bs-target="#hapus<?= $data['id_kelurahan']; ?>"><i
                                            class="fa fa-trash"></i></a>
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
                                <select id="kota" name="kota_id">
                                    <option value="">--pilih kota--</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Nama Kecamatan</label>
                            <div class="col-sm-9">
                                <select id="kecamatan" name="kecamatan_id">
                                    <option value="">--pilih kecamatan--</option>

                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Nama kelurahan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Masukan nama kelurahan" name="name"
                                    id="name">
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
<?php 
foreach ($kelurahan as $data):
?>

<!-- Modal edit-->
<div class="modal fade" id="edit<?= $data['id_kelurahan']; ?>" style="z-index: 9999;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit kelurahan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="<?= base_url('Kelurahan/Update') ?>" method="post">
                <div class="modal-body">
                    <div class="basic-form">
                        <!-- select kota -->
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Nama Kota</label>
                            <div class="col-sm-9">
                                <select id="edit_kota" name="kota_id" class="form-control">
                                    <option value="">--pilih kota--</option>
                                    <?php
                                    foreach ($kota as $dk):
                                    ?>
                                    <option value="<?= $dk['id_kota']; ?>"
                                        <?= $dk['id_kota'] == $data['kota_id'] ? 'selected' : ''; ?>>
                                        <?= $dk['nama_kota']; ?></option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- select kec -->
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Nama Kecamatan</label>
                            <div class="col-sm-9">
                                <select id="edit_kecamatan" name="kecamatan_id" class="form-control">
                                    <option value="">--pilih kecamatan--</option>
                                    <?php
                                    foreach ($kecamatan as $dk):
                                    ?>
                                    <option value="<?= $dk['id_kecamatan']; ?>"
                                        <?= $dk['id_kecamatan'] == $data['kecamatan_id'] ? 'selected' : ''; ?>>
                                        <?= $dk['nama_kecamatan']; ?></option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <input type="hidden" value="<?= $data['id_kelurahan']; ?>" name="id_kelurahan">
                            <label class="col-sm-3 col-form-label">Nama kelurahan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Masukan nama kelurahan" name="name"
                                    id="name" value="<?= $data['nama_kelurahan']; ?>">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal hapus -->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true"
    id="hapus<?= $data['id_kelurahan']; ?>">
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
                    <input type="hidden" name="id_kelurahan" value="<?= $data['id_kelurahan']; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Yaa, Hapus</button>
            </form>
        </div>
    </div>
</div>
</div>
<?php endforeach; ?>


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

// ketika memilih kota
$('#kota').on('change', function() {
    var kota_id = $(this).val();
    $.ajax({
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

// ketika memilih edit kel


var table = $('#example3').DataTable({
    language: {
        paginate: {
            next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
            previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>',
        },
    },
});
</script>
<?= $this->endSection('datatables'); ?>