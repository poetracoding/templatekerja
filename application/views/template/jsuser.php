<script>
    $('.tomboledituser').on('click', function(e) {
        // e.preventDefault();
        const username = $(this).data('username');
        const nama = $(this).data('nama');
        const alamat = $(this).data('alamat');
        const jabatan = $(this).data('jabatan');
        const idlevel = $(this).data('idlevel');
        const detil = $(this).data('detil');
        const kodeulp = $(this).data('kodeulp');
        const namaulp = $(this).data('namaulp');
        const kodeup3 = $(this).data('kodeup3');
        const namaup3 = $(this).data('namaup3');
        const email = $(this).data('email');

        document.getElementById('txtusernameedit').value = username;
        document.getElementById('txtnamaedit').value = nama;
        document.getElementById('txtalamatedit').value = alamat;
        document.getElementById('txtjabatanedit').value = jabatan;
        document.getElementById('txtemailedit').value = email;

        const selectlevel = document.getElementById('txtleveledit');
        const optlevel = document.createElement('option');
        optlevel.value = idlevel;
        optlevel.innerHTML = detil;
        optlevel.defaultSelected = "1";
        selectlevel.appendChild(optlevel);

        const selectup3 = document.getElementById('txtup3edit');
        const optup3 = document.createElement('option');
        optup3.value = kodeup3;
        optup3.innerHTML = kodeup3 + ' - ' + namaup3;
        optup3.defaultSelected = "1";
        selectup3.appendChild(optup3);

        const selectulp = document.getElementById('txtulpedit');
        const optulp = document.createElement('option');
        optulp.value = kodeulp;
        optulp.innerHTML = kodeulp + ' - ' + namaulp;
        optulp.defaultSelected = "1";
        selectulp.appendChild(optulp);
    });
</script>