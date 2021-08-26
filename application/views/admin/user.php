<div class="row">
    <div class="col mt-4"></div>
</div>
<h4><i class='fas fa-sm fa-users'></i> Data User</h4>
<hr>
<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header bg-info"><i class='fas fa-sm fa-edit'></i> Entry User</div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row form-group">
                        <label for="txtusername" class="col-sm-4">Username </label>
                        <input required placeholder="Username" type="text" name="txtusername" id="txtusername" class="col-sm-8 form-control form-control-sm">
                    </div>
                    <div class="row form-group">
                        <label for="txtnama" class="col-sm-4">Nama </label>
                        <input required placeholder="Nama" type="text" name="txtnama" id="txtnama" class="col-sm-8 form-control form-control-sm">
                    </div>
                    <div class="row form-group">
                        <label for="txtlevel" class="col-sm-4">Level </label>
                        <select name="txtlevel" id="txtlevel" class="col-sm-8 form-control form-control-sm">
                            <option value="3">Helpdesk IT</option>
                            <option value="2">Koordinator Helpdesk IT</option>
                            <option value="4">Tamu</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col text-right"><button type="submit" class="btn btn-sm btn-primary">Simpan</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <table class="table-sm table-bordered table-hover table bg-white" id="tabel">
            <thead class="bg-info">
                <tr>
                    <td>#</td>
                    <td>Username</td>
                    <td>Nama</td>
                    <td>Level</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($users as $user) : ?>
                    <tr>
                        <td width="1px"><?= $i; ?></td>
                        <td><?= $user["username"]; ?><?php if ($user["pass"] == NULL) { ?>
                            <small class="badge badge-warning"><i class="fas fa-exclamation-triangle"></i> NoPassword</small><?php }  ?></td>
                        <td><?= $user["nama"]; ?></td>
                        <td><?php
                            if ($user["level"] == 1) {
                                echo "Administrator";
                            } elseif ($user["level"] == 2) {
                                echo "Koordinator Helpdesk IT";
                            } elseif ($user["level"] == 3) {
                                echo "Helpdesk IT";
                            } elseif ($user["level"] == 4) {
                                echo "Tamu";
                            }
                            ?></td>
                        <td><a href="<?= base_url('administrator/aktifasi/') . $user["username"]; ?>" class="btn btn-sm <?php if ($user["aktif"] == 1) {
                                                                                                                            echo "btn-success";
                                                                                                                        } else {
                                                                                                                            echo "btn-danger";
                                                                                                                        } ?>"><?php if ($user["aktif"] == 1) {
                                                                                                                                    echo "Aktif";
                                                                                                                                } else {
                                                                                                                                    echo "TidakAktif";
                                                                                                                                } ?></a> <a href="<?= base_url('administrator/reset/') . $user["username"]; ?>" class="btn btn-sm btn-warning">Reset</a> <a href="<?= base_url('administrator/delete/') . $user["username"]; ?>" class="btn btn-sm btn-danger">Hapus</a></td>
                    </tr>
                <?php $i++;
                endforeach; ?>
            </tbody>
        </table>
    </div>
</div>