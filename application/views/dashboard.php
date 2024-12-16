<head>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
</head>
<!-- New row for welcome message card -->
<div class="row justify-content-center">
    <div class="col-12 col-md-9 mb-4">
        <div class="card border-bottom-info shadow h-100 py-2">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?= base_url('assets/img/KAL.png') ?>" alt="Logo Perusahaan" style="max-width: 30%; height: auto; margin-bottom: 10px;">
                    <h4 class="text-gray-800" style="margin-top: 10px; font-size: 1.25rem; font-family: 'Dancing Script', cursive;">
                        Selamat Datang di Aplikasi SPK Online PT Krakatau Argo Logistics
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

<?php if (is_admin() || is_super_admin() || is_tl() || is_gm()) : ?>
    <!-- New row for pending verification, approval counts, and total data -->
    <div class="row justify-content-center">
        <!-- Card for Pending Verifications -->
        <div class="col-12 col-md-3 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Verifications
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $pending_verification; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card for Pending Approvals -->
        <div class="col-12 col-md-3 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Pending Approvals
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $pending_approval; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card for Total Data in tbl_spk -->
        <div class="col-12 col-md-3 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Data SPK
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $total_spk_data; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-database fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>



<hr>

<?php if (is_admin() || is_super_admin()) : ?>
    <div class="container mt-4">
        <div class="row">
            <!-- dashboard_view.php -->
            <div class="col-md-6 mb-4">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">SPK Aplication User</h6>
                    </div>
                    <div class="card border-bottom-info shadow h-100 py-2">
                        <div class="card-body">
                            <h4 class="small font-weight-bold">Super Admin <span class="float-right"><?php echo $super_admin_count; ?></span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo ($super_admin_count / 200) * 100; ?>%" aria-valuenow="<?php echo ($super_admin_count / 200) * 100; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">Admin<span class="float-right"><?php echo $admin_count; ?></span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo ($admin_count / 200) * 100; ?>%" aria-valuenow="<?php echo ($admin_count / 200) * 100; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">GM<span class="float-right"><?php echo $gm_tl_count; ?></span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo ($gm_tl_count / 200) * 100; ?>%" aria-valuenow="<?php echo ($gm_tl_count / 200) * 100; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">TL<span class="float-right"><?php echo $gm_tl_count; ?></span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo ($gm_tl_count / 200) * 100; ?>%" aria-valuenow="<?php echo ($gm_tl_count / 200) * 100; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">Vendor<span class="float-right"><?php echo $vendor_count; ?></span></h4>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo ($vendor_count / 200) * 100; ?>%" aria-valuenow="<?php echo ($vendor_count / 200) * 100; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card SPK Statistics -->
            <div class="col-md-6 mb-4">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">SPK Statistics</h6>
                    </div>
                    <div class="card border-bottom-info shadow h-100 py-2">
                        <div class="card-body">
                            <h4 class="small font-weight-bold">SPK Progress</h4>
                            <canvas id="spkChart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                // Data dari controller
                const data = <?php echo json_encode($spk_stats); ?>;

                // Chart.js configuration
                const ctx = document.getElementById('spkChart').getContext('2d');
                const spkChart = new Chart(ctx, {
                    type: 'doughnut', // Mengubah tipe chart menjadi donut
                    data: {
                        labels: ['Total SPK', 'Approved SPK', 'Rejected SPK'], // Label baru untuk SPK rejected
                        datasets: [{
                            label: 'SPK Statistics',
                            data: [
                                data.total_spk, // Total SPK
                                data.approved_spk, // Approved SPK
                                data.rejected_spk // Rejected SPK (dari data yang baru)
                            ],
                            backgroundColor: [
                                'rgba(54, 162, 235, 0.2)', // Total SPK
                                'rgba(75, 192, 192, 0.2)', // Approved SPK
                                'rgba(255, 99, 132, 0.2)' // Rejected SPK (warna baru)
                            ],
                            borderColor: [
                                'rgba(54, 162, 235, 1)', // Total SPK
                                'rgba(75, 192, 192, 1)', // Approved SPK
                                'rgba(255, 99, 132, 1)' // Rejected SPK (warna baru)
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top', // Posisi legenda
                            }
                        }
                    }
                });
            </script>

        <?php endif; ?>