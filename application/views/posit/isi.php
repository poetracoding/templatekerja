<div class="row">
    <div class="col mt-4"></div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header"><i class='fas fa-sm fa-edit'></i> Entry Posit</div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row form-group">
                        <label for="txtnama" class="col-sm-4">Nama</label>
                        <select name="txtnama" id="txtnama" class="col-sm-7 form-control form-control-sm select2">
                            <?php foreach ($pegawai as $pgw) : ?>
                                <option value="<?= $pgw["nip"]; ?>"><?= $pgw["nama"]; ?> - <?= $pgw["namaulp"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- <div class="row form-group form-group-sm">
                        <label for="txtunit" class="col-sm-4">Unit</label>
                        <input type="text" name="txtunit" id="txtunit" readonly class="col-sm-8 form-control form-control-sm">
                    </div> -->
                    <div class="row form-group form-group-sm">
                        <label for="txttgl" class="col-sm-4">Tgl</label>
                        <input required type="datetime-local" name="txttgl" id="txttgl" class="col-sm-8 form-control form-control-sm">
                    </div>
                    <div class="row form-group form-group-sm">
                        <label for="txtrespon" class="col-sm-4">Respond Time</label>
                        <!-- <input required type="datetime-local" name="txtrespon" id="txtrespon" class="col-sm-8 form-control form-control-sm"> -->

                        <select name="txtrespon1" id="txtrespon1" class="col-sm-2 form-control form-control-sm">
                            <?php for ($a = 0; $a <= 23; $a++) { ?>
                                <option><?php if ($a <= 9) {
                                            echo "0";
                                        } ?><?= $a; ?></option>
                            <?php } ?>
                        </select>
                        <select name="txtrespon2" id="txtrespon2" class="col-sm-2 form-control form-control-sm">
                            <?php for ($a = 0; $a <= 59; $a++) { ?>
                                <option><?php if ($a <= 9) {
                                            echo "0";
                                        } ?><?= $a; ?></option>
                            <?php } ?>
                        </select>
                        <!-- <input required type="time" name="txtrepon" id="txtrepon"> -->
                    </div>
                    <div class="row form-group form-group-sm">
                        <label for="txttravel" class="col-sm-4">Travel Time</label>
                        <!-- <input required type="datetime-local" name="txttravel" id="txttravel" class="col-sm-8 form-control form-control-sm"> -->

                        <select name="txttravel1" id="txttravel1" class="col-sm-2 form-control form-control-sm">
                            <?php for ($a = 0; $a <= 23; $a++) { ?>
                                <option><?php if ($a <= 9) {
                                            echo "0";
                                        } ?><?= $a; ?></option>
                            <?php } ?>
                        </select>
                        <select name="txttravel2" id="txttravel2" class="col-sm-2 form-control form-control-sm">
                            <?php for ($a = 0; $a <= 59; $a++) { ?>
                                <option><?php if ($a <= 9) {
                                            echo "0";
                                        } ?><?= $a; ?></option>
                            <?php } ?>
                        </select>
                        <!-- <input required type="time" name="txttravel" id="txttravel" class="col-sm-8 form-control form-control-sm"> -->
                    </div>
                    <div class="row form-group form-group-sm">
                        <label for="txtrecovery" class="col-sm-4">Recovery Time</label>
                        <!-- <input required type="datetime-local" name="txtrecovery" id="txtrecovery" class="col-sm-8 form-control form-control-sm"> -->

                        <select name="txtrecovery1" id="txtrecovery1" class="col-sm-2 form-control form-control-sm">
                            <?php for ($a = 0; $a <= 23; $a++) { ?>
                                <option><?php if ($a <= 9) {
                                            echo "0";
                                        } ?><?= $a; ?></option>
                            <?php } ?>
                        </select>
                        <select name="txtrecovery2" id="txtrecovery2" class="col-sm-2 form-control form-control-sm">
                            <?php for ($a = 0; $a <= 59; $a++) { ?>
                                <option><?php if ($a <= 9) {
                                            echo "0";
                                        } ?><?= $a; ?></option>
                            <?php } ?>
                        </select>
                        <!-- <input required type="time" name="txtrecovery" id="txtrecovery" class="col-sm-8 form-control form-control-sm"> -->
                    </div>
                    <div class="row form-group">
                        <label for="txtjenis" class="col-sm-4">Jenis</label>
                        <select name="txtjenis" id="txtjenis" class="col-sm-8 form-control form-control-sm">
                            <option>Virus-1 (Informasi)</option>
                            <option>Virus-2 (Removal)</option>
                            <option>Virus-3 (Troubleshoot)</option>
                            <option>Email-1 (New)</option>
                            <option>Email-2 (Forgot Password)</option>
                            <option>Email-3 (Can't Send - Receive)</option>
                            <option>Peripheral-1 (Printer)</option>
                            <option>Peripheral-2 (Wireless)</option>
                            <option>Peripheral-3 (Network)</option>
                            <option>Peripheral-4 (Operating System)</option>
                            <option>Peripheral-5 (Etc)</option>
                            <option>Internet-1 (Request Connection)</option>
                            <option>Internet-2 (Slow Connection)</option>
                            <option>Internet-3 (Can't Connect)</option>
                            <option>Application-1 (New Application)</option>
                            <option>Application-2 (Change Request)</option>
                            <option>Application-3 (Trableshoot)</option>
                        </select>
                    </div>
                    <div class="row form-group form-group-sm">
                        <label for="txtkeluhan" class="col-sm-4">Keluhan</label>
                        <input required type="text" name="txtkeluhan" id="txtkeluhan" class="col-sm-8 form-control form-control-sm">
                    </div>
                    <div class="row form-group form-group-sm">
                        <label for="txttindakan" class="col-sm-4">Tindakan</label>
                        <input required type="text" name="txttindakan" id="txttindakan" class="col-sm-8 form-control form-control-sm">
                    </div>
                    <div class="row">
                        <div class="col text-right"><button class="btn btn-primary" type="submit">Simpan</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="table-responsive">

            <table class="bg-white table-bordered table-hover table table-sm" id="tabel">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pegawai</th>
                        <th>Tgl</th>
                        <th>Jenis</th>
                        <th>Keluhan</th>
                        <th>Tindakan</th>
                        <th>Unit</th>
                        <th>Helpdesk</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($posit as $pos) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $pos["nama"]; ?></td>
                            <td><?= $pos["tgllapor"]; ?></td>
                            <td><?= $pos["jenis"]; ?></td>
                            <td><?= $pos["keluhan"]; ?></td>
                            <td><?= $pos["tindakan"]; ?></td>
                            <td><?= $pos["namaulp"]; ?></td>
                            <td><?= $pos["username"]; ?></td>
                            <td><a href="<?= base_url('posit/delete/') . $pos["kodeposit"]; ?>" class="btn btn-sm btn-danger"><i class='fas fa-sm fa-trash'></i></a></td>
                        </tr>
                    <?php $i++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>