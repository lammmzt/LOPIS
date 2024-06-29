<?= $this->extend('Template/index'); ?>
<?= $this->section('content'); ?>



<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title text-start">Data Kota</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example3" class="display" style="min-width: 845px">
                    <thead>
                        <tr>
                            <th>Name Kota</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($kota as $data):
                        ?>
                        <tr>
                            <td>
                                <?= $data['nama_kota']; ?>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    <a href="#" class="btn btn-danger shadow btn-xs sharp"><i
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
<!-- Datatable -->
<script src="<?= base_url('Assets/') ?>vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('Assets/') ?>js/plugins-init/datatables.init.js"></script>
<?= $this->endSection('content'); ?>