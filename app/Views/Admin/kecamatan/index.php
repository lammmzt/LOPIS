<?= $this->extend('Template/index'); ?>
<?= $this->section('content'); ?>


<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title text-start">Data kecamatan</h4>
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
                            <th>Name Kecamatan</th>
                            <th>Name Kota</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach ($kecamatan as $data):
                        ?>
                        <tr>
                            <td>
                                <?= $no++; ?>
                            </td>
                            <td>
                                <?= $data['nama_kecamatan']; ?>
                            </td>
                            <td>
                                <?= $data['nama_kota']; ?>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="#" class="btn btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal"
                                        data-bs-target="#edit<?= $data['id_kecamatan']; ?>"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    <a href="#" class="btn btn-danger shadow btn-xs sharp" data-bs-toggle="modal"
                                        data-bs-target="#hapus<?= $data['id_kecamatan']; ?>"><i
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
                <h5 class="modal-title">Tambah kecamatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="<?= base_url('kecamatan/Save') ?>" method="post">
                <div class="modal-body">
                    <div class="basic-form">
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Nama Kota</label>
                            <div class="col-sm-9">
                                <select id="single-select" name="kota_id">
                                    <option value="">--pilih kota--</option>
                                    <?php 
                                    foreach($kota as $dk):
                                ?>
                                    <option value="<?= $dk['id_kota']; ?>"><?= $dk['nama_kota']; ?></option>
                                    <?php 
                                endforeach;
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Nama kecamatan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Masukan nama kecamatan" name="name"
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

<?php 
foreach ($kecamatan as $data):
?>

<!-- Modal edit-->
<div class="modal fade" id="edit<?= $data['id_kecamatan']; ?>" style="z-index: 9999;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit kecamatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="<?= base_url('kecamatan/Update') ?>" method="post">
                <div class="modal-body">
                    <div class="basic-form">
                        <div class="mb-3 row">
                            <input type="hidden" value="<?= $data['id_kecamatan']; ?>" name="id_kecamatan">
                            <label class="col-sm-3 col-form-label">kecamatan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Masukan nama kecamatan" name="name"
                                    id="name" value="<?= $data['nama_kecamatan']; ?>">
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
    id="hapus<?= $data['id_kecamatan']; ?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Peringatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="<?= base_url('kecamatan/Delete') ?>" method="post">
                <div class="modal-body">
                    <p>
                        Apakah anda yakin menghapus data ini?
                    </p>
                    <input type="hidden" name="id_kecamatan" value="<?= $data['id_kecamatan']; ?>">
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