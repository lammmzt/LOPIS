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
                            <th>Name Kecamatan</th>
                            <th>Name Kota</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($kecamatan as $data) :
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
                                        id=<?= $data['id_kecamatan']; ?> data-bs-target="#editModal"><i
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
                                <select id="single-select" name="kota_id" class="edit_select" required>
                                    <option value="">--pilih kota--</option>
                                    <?php
                                    foreach ($kota as $dk) :
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
<div class="modal fade" id="editModal">
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
                            <label class="col-sm-3 col-form-label">Nama Kota</label>
                            <div class="col-sm-9">
                                <select id="edit_select" name="kota_id" class=" form-control wide mb-3" required>
                                    <option value="">--pilih kota--</option>

                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <input type="hidden" value="<?= $data['id_kecamatan']; ?>" name="id_kecamatan">
                            <label class="col-sm-3 col-form-label">kecamatan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Masukan nama kecamatan" name="name"
                                    id="edit_nama_kec" value="" required>
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


<?php
foreach ($kecamatan as $data) :
?>
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
<?php endforeach; ?>



<?= $this->endSection('content'); ?>

<?= $this->section('datatables'); ?>
<script src="<?= base_url('Assets/') ?>vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="<?= base_url('Assets/') ?>vendor/select2/js/select2.full.min.js"></script>
<script src="<?= base_url('Assets/') ?>js/plugins-init/select2-init.js"></script>
<script>
$('#edit_select').select2();
//set waktu hide alert
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
    });
}, 3000);

// datatables
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


// fungsi untuk edit kota 
function editKota($id_kota) {
    $.ajax({
        // mengambil data kota
        url: "<?= base_url('Kota/fetch_all') ?>",
        type: "GET",
        dataType: "json",
        success: function(data) {
            var html = '';
            // console.log(data.data);

            // looping data kota
            for (var i = 0; i < data.data.length; i++) {
                if (data.data[i].id_kota == $id_kota) {
                    html += '<option value="' + data.data[i].id_kota + '" selected>' + data.data[i]
                        .nama_kota +
                        '</option>';
                } else {
                    html += '<option value="' + data.data[i].id_kota + '">' + data.data[i].nama_kota +
                        '</option>';
                }
            }
            // masukan data kota ke dalam select
            $('#edit_select').append(html);
        }
    });
}


// ketika modal edit muncul
$('#editModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Ketika tombol di klik
    var id = button[0].id // Mengambil id dari tombol yang di klik
    // alert(id)
    $.ajax({
        url: "<?= base_url('Kecamatan/fetch_all/') ?>" + id, // ambil data kecamatan berdasarkan id
        type: "GET",
        dataType: "json",
        success: function(data) {
            if (data.error == false) {
                // console.log(data.data);
                $('#edit_select').empty(); // hapus data select
                $('#edit_nama_kec').val(data.data
                    .nama_kecamatan); // masukan data kecamatan ke dalam input
                let kota = data.data.kota_id; // ambil id kota
                editKota(kota); // panggil fungsi edit kota
            }
        }
    });
});
</script>
<?= $this->endSection('datatables'); ?>