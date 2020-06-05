<script>
    $(document).ready(function() {
        $('#txtup3').change(function() {
            var id = $(this).val();
            console.log(id);
            $.ajax({
                url: "<?php echo site_url('admin/viewulp'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    html += '<option value="all">All</option>';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].kodeulp + '>' + data[i].kodeulp + ' - ' + data[i].namaulp + '</option>';
                    }
                    $('#txtulp').html(html);
                }
            });
            return false;
        });
        $('#txtup3edit').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('admin/viewulp'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    html += '<option value="all">All</option>';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].kodeulp + '>' + data[i].kodeulp + ' - ' + data[i].namaulp + '</option>';
                    }
                    $('#txtulpedit').html(html);
                }
            });
            return false;
        });
        $('#btnload').click(function() {
            // console.log(document.getElementById('txtup3').value);
            var up3 = document.getElementById('txtup3').value;
            var ulp = document.getElementById('txtulp').value;
            if (up3 == "all") {
                window.location = "<?= base_url($this->session->userdata('appakses') . '/index/'); ?>" + up3 + "/" + ulp
            } else {
                window.location = "<?= base_url($this->session->userdata('appakses') . '/index/'); ?>" + up3 + "/" + ulp

            }
        });
    });
</script>