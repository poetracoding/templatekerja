<div class="row">
    <div class="col-sm-12 mt-2">
        <h3><i class='fas fa-sm fa-users'></i> Data Pegawai</h3>
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header bg-info"><i class='fas fa-sm fa-edit'></i> Entry Data Pegawai</div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row form-group">
                        <label for="txtnip" class="col-sm-4">NIP</label>
                        <input required type="text" name="txtnip" id="txtnip" class="col-sm-8 form-control form-control-sm">
                    </div>
                    <div class="row form-group">
                        <label for="txtnama" class="col-sm-4">Nama</label>
                        <input required type="text" name="txtnama" id="txtnama" class="col-sm-8 form-control form-control-sm">
                    </div>
                    <div class="row form-group">
                        <label for="txtjabatan" class="col-sm-4">Jabatan</label>
                        <input required type="text" name="txtjabatan" id="txtjabatan" class="col-sm-8 form-control form-control-sm">
                    </div>

                    <div class="row form-group">
                        <label for="txtunit" class="col-sm-4">ULP</label>
                        <select name="txtunit" id="txtunit" class="col-sm-8 form-control form-control-sm">
                            <?php
                            foreach ($unit as $ulp) : ?>
                                <option value="<?= $ulp["kodeulp"]; ?>"><?= $ulp["namaulp"]; ?></option>
                            <?php
                            endforeach; ?>
                        </select>
                    </div>
                    <?php if ($this->session->userdata('itusername') != "tamu") { ?>
                        <div class="row">
                            <div class="col text-right"><button class="btn btn-primary" type="submit">Simpan</button></div>
                        </div>
                    <?php } ?>

                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tabel" class="table table-sm table-bordered table-hover">
                        <thead class="bg-info">
                            <tr>
                                <th width="1px">#</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Unit</th>
                                <th width="1px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($pegawai as $dapeg) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $dapeg["nip"]; ?></td>
                                    <td><?= $dapeg["nama"]; ?></td>
                                    <td><?= $dapeg["jabatan"]; ?></td>
                                    <td><?= $dapeg["namaulp"]; ?></td>
                                    <td><a href="#" class="btn btn-xs btn-primary">Update</a></td>
                                </tr>
                            <?php $i++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>