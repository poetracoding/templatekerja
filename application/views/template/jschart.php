<script src="<?= base_url('temp/'); ?>plugins/chart.js/Chart.min.js"></script>
<?php
$data = [1, 2, 3, 4, 5, 7] ?>
<script>
    var ctx = document.getElementById('canvas').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [{
                label: 'Target',
                borderColor: '#f80947',
                backgroundColor: 'rgba(248, 9, 71, 0.3)',
                data: [<?= $bln01 ?>, <?= $bln02 ?>, <?= $bln03 ?>, <?= $bln04 ?>, <?= $bln05 ?>, <?= $bln06 ?>, <?= $bln07 ?>, <?= $bln08 ?>, <?= $bln09 ?>, <?= $bln10 ?>, <?= $bln11 ?>, <?= $bln12 ?>]
            }, {
                label: 'Realisasi',
                borderColor: '#0185a1',
                backgroundColor: 'rgba(9, 217, 248, 0.3)',
                data: [<?= $rbln01 ?>, <?= $rbln02 ?>, <?= $rbln03 ?>, <?= $rbln04 ?>, <?= $rbln05 ?>, <?= $rbln06 ?>, <?= $rbln07 ?>, <?= $rbln08 ?>, <?= $rbln09 ?>, <?= $rbln10 ?>, <?= $rbln11 ?>, <?= $rbln12 ?>]
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,

            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>