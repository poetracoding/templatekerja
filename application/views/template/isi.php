<div class="row">
    <div class="col-md-12 mt-3">
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-info">
                <h3 class="widget-user-username"><?= $userapp["nama"]; ?></h3>
                <h5 class="widget-user-desc">Helpdesk IT</h5>
            </div>
            <div class="widget-user-image">
                <img class="img-circle elevation-2" src="<?= base_url('temp/'); ?>/dist/img/user1-128x128.jpg" alt="User Avatar">
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-3 border-right">
                        <div class="description-block">
                            <h5 class="description-header"><?= $totalulp; ?></h5>
                            <span class="description-text">ULP</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <div class="col-3 border-right">
                        <div class="description-block">
                            <h5 class="description-header"><?= $pegawai; ?></h5>
                            <span class="description-text">Pegawai</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-3 border-right">
                        <div class="description-block">
                            <h5 class="description-header"><?= $myjob; ?></h5>
                            <span class="description-text">TO DAY</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-3">
                        <div class="description-block">
                            <h5 class="description-header"><?= $myjobbulan; ?></h5>
                            <span class="description-text">TO MONTH</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.widget-user -->
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <a href="<?= base_url('posit'); ?>">
            <div class="card bg-primary">
                <div class="card-body text-center">
                    <i class='fas fa-sm fa-plus-circle'></i> Tambah Pekerjaan
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-4">
        <a href="<?= base_url('laporan/harian'); ?>">
            <div class="card bg-primary">
                <div class="card-body text-center">
                    <i class='fas fa-sm fa-download'></i> Laporan
                </div>
            </div>
        </a>
    </div>
</div>