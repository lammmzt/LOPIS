<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class=""><a href="<?= base_url('Dashboard') ?>" class="" aria-expanded="false">
                    <i class="fas fa-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-map"></i>
                    <span class="nav-text">Master Wilayah</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?= base_url('Kota') ?>">Kota</a></li>
                    <li><a href="<?= base_url('Kecamatan') ?>">Kecamatan</a></li>
                    <li><a href="<?= base_url('Kelurahan') ?>">Kelurahan</a></li>
                    <li><a href="<?= base_url('RW') ?>">RW</a></li>
                    <li><a href="<?= base_url('RT') ?>">RT</a></li>
                </ul>
            </li>

            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="bi bi-people"></i>
                    <span class="nav-text">Master User</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?= base_url('Users') ?>">User</a></li>
                    <li><a href="<?= base_url('Users/detail') ?>">Detail user</a></li>

                </ul>
            </li>

        </ul>

    </div>
</div>