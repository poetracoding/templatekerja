<?php if ($this->session->userdata('applevel') == 1) { ?>
    <div class="modal fade" id="phase1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content mt-5">
                <div class="bg-warning modal-header">
                    <b> Cek Pelanggan </b>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-2 text-center">
                        <form action="<?= base_url($cekuser['akses']); ?>/reg" id="admincek" method="post">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="idpelanggan">ID Pelanggan </label>
                                    <div id="labelmodal"></div> <input type="hidden" name="phasa" id="phasa">
                                    <div class="input-group mb-3">
                                        <input required type="number" name="idpelanggan" id="idpelanggan" class="form-control">
                                        <span class="input-group-append">
                                            <button type="submit" class="btn btn-info ">Cek</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } elseif ($this->session->userdata('applevel') == 2) { ?>
    <div class="modal fade" id="phase1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content mt-5">
                <div class="bg-warning modal-header">
                    <b> Cek Pelanggan </b>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-2 text-center">
                        <form action="<?= base_url($cekuser['akses']); ?>/reg" id="petugascek" method="post">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="idpelanggan">ID Pelanggan </label>
                                    <div id="labelmodal"></div> <input type="hidden" name="phasa" id="phasa">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><?= $this->session->userdata('appulp') ?></span>
                                        </div>
                                        <input required type="number" name="idpelanggan" id="idpelanggan" class="form-control">
                                        <span class="input-group-append">
                                            <button type="submit" class="btn btn-info ">Cek</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } else { ?>
    <div class="modal fade" id="phase1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content mt-5">
                <div class="bg-warning modal-header">
                    <b> Cek Pelanggan </b>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-2 text-center">
                        <form action="<?= base_url($cekuser['akses']); ?>/reg" id="petugascek" method="post">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="idpelanggan">ID Pelanggan </label>
                                    <div id="labelmodal"></div> <input type="hidden" name="phasa" id="phasa">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><?= $this->session->userdata('appup3') ?></span>
                                        </div>
                                        <input required type="number" name="idpelanggan" id="idpelanggan" class="form-control">
                                        <span class="input-group-append">
                                            <button type="submit" class="btn btn-info ">Cek</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<script>
    function phase(id) {
        // console.log(id);
        document.getElementById('phasa').value = id;
        document.getElementById('labelmodal').innerHTML = id + " Phasa";
    }
</script>