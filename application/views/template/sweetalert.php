<!-- SweetAlert2 -->
<script src="<?= base_url('temp/'); ?>dist/sweetalert2.all.min.js"></script>
<script>
    const flashdata = $('.flash-data').data('flashdata');
    console.log(flashdata);
    if (flashdata == "Simpan") {
        Swal.fire(
            'Sukses',
            'Data berhasil disimpan',
            'success'
        );
    } else if (flashdata == "Upload") {
        Swal.fire(
            'Sukses',
            'Data target pekerjaan berhasil di import',
            'success'
        );
    } else if (flashdata == "Gagal") {
        Swal.fire(
            'Maaf',
            'Proses data gagal!',
            'error',
        );
    } else if (flashdata == "Edit") {
        Swal.fire(
            'Update',
            'Data berhasil diupdate!',
            'success',
        );
    } else if (flashdata == "Hapus") {
        Swal.fire(
            'Hapus',
            'Data berhasil dihapus!',
            'success',
        );
    } else if (flashdata == "up3 salah") {
        Swal.fire(
            'Periksa',
            'Data gagal diproses,tidak dapat import UP3 lain!',
            'error',
        );
    } else if (flashdata == "Tidak Sama") {
        Swal.fire(
            'Gagal',
            'Password Baru Tidak Sama!',
            'error',
        );
    } else if (flashdata == "Password Salah") {
        Swal.fire(
            'Gagal',
            'Periksa Password Anda!',
            'error',
        );
    }
</script>
<!-- Hapus UP3 -->
<script>
    $('.tombolhapus').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data akan dihapus",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus data!'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })

    });
</script>



<!-- Edit UP3 -->
<script>
    $('.tomboledit').on('click', function(e) {
        // e.preventDefault();
        const kode = $(this).data('kode');
        const nama = $(this).data('nama');
        const alamat = $(this).data('alamat');
        document.getElementById('txtkodeup3edit').value = kode;
        document.getElementById('txtnamaedit').value = nama;
        document.getElementById('txtalamatedit').value = alamat;
        // console.log(kode);
    });
</script>

<!-- Edit ULP -->
<script>
    $('.tomboleditulp').on('click', function(e) {
        // e.preventDefault();
        const kodeulp = $(this).data('kodeulp');
        const kodeup3 = $(this).data('kodeup3');
        const namaulp = $(this).data('namaulp');
        const namaup3 = $(this).data('namaup3');
        const alamat = $(this).data('alamatulp');
        document.getElementById('txtkodeulpedit').value = kodeulp;
        document.getElementById('txtnamaulpedit').value = namaulp;
        document.getElementById('txtalamatulpedit').value = alamat;
        const select = document.getElementById('txtup3edit');
        const opt = document.createElement('option');
        opt.value = kodeup3;
        opt.innerHTML = kodeup3 + ' - ' + namaup3;
        opt.defaultSelected = "1";
        select.appendChild(opt);
        // console.log(kode);
    });
</script>

<!-- Edit MErk Meter -->
<script>
    $('.tomboleditmerk').on('click', function(e) {
        // e.preventDefault();
        const idmerkmeter = $(this).data('idmerkmeter');
        const merk = $(this).data('merk');
        const phasa = $(this).data('phasa');
        console.log(idmerkmeter);

        document.getElementById('txtidmerk').value = idmerkmeter;
        document.getElementById('txtmerkedit').value = merk;

        const select = document.getElementById('txtphasaedit');
        const opt = document.createElement('option');
        opt.value = phasa;
        opt.innerHTML = phasa + ' Phasa';
        opt.defaultSelected = "1";
        select.appendChild(opt);
        // console.log(kode);
    });
</script>


<!-- Edit Pembatas -->
<script>
    $('.tomboleditpembatas').on('click', function(e) {
        // e.preventDefault();
        const idpembatas = $(this).data('idpembatas');
        const pembatas = $(this).data('pembatas');
        const phasa = $(this).data('phasa');
        console.log(idpembatas);

        document.getElementById('txtidpembatas').value = idpembatas;
        document.getElementById('txtpembatasedit').value = pembatas;

        const select = document.getElementById('txtphasaedit');
        const opt = document.createElement('option');
        opt.value = phasa;
        opt.innerHTML = phasa + ' Phasa';
        opt.defaultSelected = "1";
        select.appendChild(opt);
        // console.log(kode);
    });
</script>

<!-- Edit Daya -->
<script>
    $('.tomboleditdaya').on('click', function(e) {
        // e.preventDefault();
        const iddaya = $(this).data('iddaya');
        const daya = $(this).data('daya');

        document.getElementById('txtiddaya').value = iddaya;
        document.getElementById('txtdayaedit').value = daya;

        // console.log(kode);
    });
</script>
<!-- Edit tarif -->
<script>
    $('.tomboledittarif').on('click', function(e) {
        // e.preventDefault();
        const idtarif = $(this).data('idtarif');
        const tarif = $(this).data('tarif');

        document.getElementById('txtidtarif').value = idtarif;
        document.getElementById('txttarifedit').value = tarif;

        // console.log(kode);
    });
</script>