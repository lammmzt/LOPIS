<?= $this->extend('Template/index'); ?>
<?= $this->section('content'); ?>

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title text-start">Detail Data User</h4>
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
                            <th>Username</th>
                            <th>Nama user</th>
                            <th>Kelurahan</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach ($detail_user as $data):
                        ?>
                        <tr>
                            <td>
                                <?= $no++; ?>
                            </td>
                            <td>
                                <?= $data['username']; ?>
                            </td>
                            <td>
                                <?= $data['nama_user']; ?>
                            </td>
                            <td>
                                <?= $data['nama_kelurahan']; ?>
                            </td>
                            <td>
                                <?php 
                                if ($data['role'] == '1'){
                                    echo 'Admin';
                                }else if ($data['role'] == '2'){
                                    echo 'Admin PKM';
                                }else if ($data['role'] == '3'){
                                    echo 'Admin Kelurahan';
                                }else {
                                    echo 'Supervisor';
                                }
                                ?>
                            </td>

                            <td>
                                <div class="d-flex">
                                    <a href="#" class="btn btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal"
                                        data-bs-target="#edit<?= $data['id_detail_user']; ?>"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    <a href="#" class="btn btn-danger shadow btn-xs sharp" data-bs-toggle="modal"
                                        data-bs-target="#hapus<?= $data['id_detail_user']; ?>"><i
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
                <h5 class="modal-title">Tambah User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="<?= base_url('Users/save_detail_user') ?>" method="post">
                <div class="modal-body">
                    <div class="basic-form">
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <select name="user_id" class="" id="single-select" required>
                                    <option value="">
                                        pilih username
                                    </option>
                                    <?php 
                                    foreach($users as $usr):
                                    ?>
                                    <option value="<?= $usr['id_user']; ?>"><?= $usr['username']; ?></option>
                                    <?php 
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">nama user</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Masukan nama user" name="nama_user"
                                    id="nama_user">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Masukan jenis kelamin"
                                    name="jenis_kelamin" id="jenis_kelamin">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Kelurahan</label>
                            <div class="col-sm-9">
                                <select name="kelurahan_id" class="" id="single-select2" required>
                                    <option value="">
                                        pilih kelurahan
                                    </option>
                                    <?php 
                                    foreach($kelurahan as $klrn):
                                    ?>
                                    <option value="<?= $klrn['id_kelurahan']; ?>"><?= $klrn['nama_kelurahan']; ?>
                                    </option>
                                    <?php 
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Alamat User </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Masukan alamat user"
                                    name="alamat_user" id="alamat_user">
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
foreach ($users as $data):
?>

<!-- Modal edit-->
<div class="modal fade" id="edit<?= $data['id_user']; ?>" style="z-index: 9999;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="<?= base_url('Users/Update') ?>" method="post">
                <div class="modal-body">
                    <div class="basic-form">
                        <input type="hidden" value="<?= $data['id_user']; ?>" name="id_user">
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">User</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Masukan nama User" name="username"
                                    id="username" value="<?= $data['username']; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Role</label>
                            <div class="col-sm-9">
                                <select name="role" id="role" class="form-control">
                                    <option value="">
                                        pilih role
                                    </option>
                                    <option value="1" <?= ($data['role'] == '1')?  'selected':''  ?>>Admin</option>
                                    <option value="2" <?= ($data['role'] == '2')?  'selected':''  ?>>Admin PKM</option>
                                    <option value="3" <?= ($data['role'] == '3')?  'selected':''  ?>>Admin Kelurahan
                                    </option>
                                    <option value="4" <?= ($data['role'] == '4')?  'selected':''  ?>>Supervisor</option>
                                </select>
                            </div>
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
    id="hapus<?= $data['id_user']; ?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Peringatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="<?= base_url('Users/Delete') ?>" method="post">
                <div class="modal-body">
                    <p>
                        Apakah anda yakin menghapus data ini?
                    </p>
                    <input type="hidden" name="id_user" value="<?= $data['id_user']; ?>">
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