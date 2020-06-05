<script>
    $('#txtimgsebelum').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        if (fileName) {
            $(this).next('#labelimg1').addClass("selected").html(fileName);
        } else {
            $(this).next('#labelimg1').addClass("selected").html('<i class="fas fa-camera"></i>')
        }
    });
    $('#txtimgsaat').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        if (fileName) {
            $(this).next('#labelimgsaat').addClass("selected").html(fileName);
        } else {
            $(this).next('#labelimgsaat').addClass("selected").html('<i class="fas fa-camera"></i>')
        }
    });
    $('#txtimgsesudah').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        if (fileName) {
            $(this).next('#labelimg2').addClass("selected").html(fileName);
        } else {
            $(this).next('#labelimg2').addClass("selected").html('<i class="fas fa-camera"></i>')
        }
    });
    $('#txtimgba').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        if (fileName) {
            $(this).next('#labelba').addClass("selected").html(fileName);
        } else {
            $(this).next('#labelba').addClass("selected").html('<i class="fas fa-camera"></i>')
        }
    });
</script>
<script>
    $('#txtket').on('change', function() {
        var id = document.getElementById('idpekerjaan').value;
        var ket = document.getElementById('txtket').value;
        var data = {
            id: id,
            ket: ket,
            change: "ganti"
        };
        $.ajax({
            type: 'post',
            url: "<?= base_url($this->session->userdata('appakses')) ?>/ganti/",
            data: data,
            success: function() {
                document.location.href = "<?= base_url($this->session->userdata('appakses')) ?>/finish/" + id;
            }
        });
    });
    $('#txtmerkmeterakhir').on('change', function() {
        var id = document.getElementById('idpekerjaan').value;
        var meterpengganti = document.getElementById('txtmerkmeterakhir').value;
        var nomormeterakhir = document.getElementById('txtnomormeterakhir').value;
        if (nomormeterakhir == "") {
            document.getElementById('txtnomormeterakhir').focus();
            document.getElementById('txtmerkmeterakhir').selectedIndex = "0";
        } else {
            var data = {
                id: id,
                nomormeterakhir: nomormeterakhir,
                meterpengganti: meterpengganti,
                change: "merk"
            };
            $.ajax({
                type: 'post',
                url: "<?= base_url($this->session->userdata('appakses')) ?>/ganti/",
                data: data,
                success: function() {
                    document.location.href = "<?= base_url($this->session->userdata('appakses')) ?>/finish/" + id;
                }
            });
        }
    });
    $('#txtpembatasakhir').on('change', function() {
        var id = document.getElementById('idpekerjaan').value;
        var pembataspengganti = document.getElementById('txtpembatasakhir').value;
        var data = {
            id: id,
            pembataspengganti: pembataspengganti,
            change: "pembatas"
        };
        $.ajax({
            type: 'post',
            url: "<?= base_url($this->session->userdata('appakses')) ?>/ganti/",
            data: data,
            success: function() {
                document.location.href = "<?= base_url($this->session->userdata('appakses')) ?>/finish/" + id;
            }
        });
    });
    $('#txtmerkpembatasakhir').on('change', function() {
        var id = document.getElementById('idpekerjaan').value;
        var merkpembataspengganti = document.getElementById('txtmerkpembatasakhir').value;
        var data = {
            id: id,
            merkpembataspengganti: merkpembataspengganti,
            change: "merkpembatas"
        };
        $.ajax({
            type: 'post',
            url: "<?= base_url($this->session->userdata('appakses')) ?>/ganti/",
            data: data,
            success: function() {
                document.location.href = "<?= base_url($this->session->userdata('appakses')) ?>/finish/" + id;
            }
        });
    });
</script>