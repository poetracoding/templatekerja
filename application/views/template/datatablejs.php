<script src="<?= base_url('temp/'); ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url('temp/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
    $(function() {
        $("#tabel").DataTable({
            buttons: [{
                extend: 'collection',
                text: 'Export',
                buttons: [
                    'excel'
                ]
            }]
        });

        $("#tabel2").DataTable({
            buttons: [{
                extend: 'collection',
                text: 'Export',
                buttons: [
                    'excel'
                ]
            }]
        });
    });
</script>