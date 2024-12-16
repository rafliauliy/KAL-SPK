<style>
    .alert-warning strong {
        font-size: 1.2em;
    }
</style>

<div class="alert alert-danger" role="alert">
    <strong>Warning!</strong> This action requires verification.
</div>

<?= $this->session->flashdata('pesan'); ?>
<form id="approveForm" method="post" action="<?= site_url('approval/approve_multiple'); ?>">
    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
    <div class="card shadow-sm mb-4 border-bottom-primary">
        <div class="card-header bg-white py-3">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="h5 m-0 font-weight-bold text-primary">
                        Data SPK
                    </h4>
                </div>
                <div class="col-auto">
                    <button type="submit" id="approveAllBtn" class="btn btn-success btn-sm">
                        <i class="fas fa-check"></i> Approve Selected
                    </button>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive w-100">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="select_all"></th>
                            <th>No</th>
                            <th>Nomor Surat</th>
                            <th>Nama Perusahaan</th>
                            <th>Tanggal SPK</th>
                            <th>Verikasi</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1; // Penomoran urut untuk tabel
                        foreach ($spk_list as $spk): ?>
                            <tr>
                                <td><input type="checkbox" class="spkCheckbox" name="ids_spk[]" value="<?= $spk['id_spk']; ?>"></td>
                                <td><?= $no++; ?></td> <!-- Nomor urut untuk tabel -->
                                <td><?= $spk['nomor_surat']; ?></td>
                                <td><?= $spk['nama_perusahaan']; ?></td>
                                <td><?= $spk['tgl_spk']; ?></td>
                                <td>
                                    <?php if ($spk['status_verifikasi'] == 'pending'): ?>
                                        <span class="badge bg-warning">Pending</span>
                                    <?php elseif ($spk['status_verifikasi'] == 'verified'): ?>
                                        <span class="badge bg-success">Verified</span>
                                    <?php elseif ($spk['status_verifikasi'] == 'rejected'): ?>
                                        <span class="badge bg-danger">Rejected</span>
                                    <?php elseif ($spk['status_verifikasi'] == 'revisi'): ?>
                                        <span class="badge bg-info">Revisi</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($spk['status_approval'] == 'pending'): ?>
                                        <span class="badge bg-warning">Pending</span>
                                    <?php elseif ($spk['status_approval'] == 'approved'): ?>
                                        <span class="badge bg-success">Approved</span>
                                    <?php elseif ($spk['status_approval'] == 'rejected'): ?>
                                        <span class="badge bg-danger">Rejected</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Button group">
                                        <a href="<?= site_url('approval/detail_approval/' . $spk['id_spk']); ?>" class="btn btn-info" data-toggle="tooltip" title="Detail SPK">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                        <?php if ($spk['jenis_pekerjaan'] !== 'Stevedoring') : ?>
                                            <a href="<?= base_url('perusahaan/print_spk/') . $spk['id_spk']; ?>" class="btn btn-warning btn-sm" title="Print" target="_blank">
                                                <i class="fa fa-print" title="Print SPK"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php
                                        // Mendefinisikan array untuk jenis pekerjaan yang akan menyembunyikan tombol
                                        $disabled_jobs = ['Trucking', 'Trucking Domestic KP (Coil)', 'Trucking Dump Truck'];
                                        ?>

                                        <?php if (!in_array($spk['jenis_pekerjaan'], $disabled_jobs)) : ?>
                                            <a href="<?= base_url('perusahaan/print_spk_stevedoring/') . $spk['id_spk']; ?>" class="btn btn-warning btn-sm" title="Print" target="_blank">
                                                <i class="fa fa-print" title="Print SPK"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if ($spk['status_verifikasi'] === 'verified') : ?>
                                            <a href="<?= site_url('approval/approve/' . $spk['id_spk']); ?>" class="btn btn-success">
                                                <i class="fas fa-check" title="Approve SPK"></i>
                                            </a>
                                            <a href="<?= site_url('approval/reject/' . $spk['id_spk']); ?>" class="btn btn-danger">
                                                <i class="fas fa-times" title="Reject SPK"></i>
                                            </a>
                                        <?php else: ?>
                                            <a href="#" class="btn btn-success disabled" style="pointer-events: none;" data-toggle="tooltip" title="Tombol ini tidak bisa digunakan sebelum status verifikasi adalah 'verified'">
                                                <i class="fas fa-check"></i>
                                            </a>
                                            <a href="#" class="btn btn-danger disabled" style="pointer-events: none;" data-toggle="tooltip" title="Tombol ini tidak bisa digunakan sebelum status verifikasi adalah 'verified'">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- DataTables Buttons CSS and JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        $('#verifikasiTable').DataTable({
            dom: 'Bfrtip', // Mengaktifkan fitur tombol
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print' // Tombol ekspor
            ],
            language: {
                search: "Cari:", // Mengganti label pencarian
                lengthMenu: "Tampilkan _MENU_ data per halaman",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Berikutnya",
                    previous: "Sebelumnya"
                },
                zeroRecords: "Tidak ada data ditemukan",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 data"
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Handle "Select All" checkbox
        document.getElementById('select_all').addEventListener('change', function() {
            let checkboxes = document.querySelectorAll('.spkCheckbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });

        // Handle form submission
        document.getElementById('approveAllBtn').addEventListener('click', function(event) {
            event.preventDefault();
            let form = document.getElementById('approveForm');
            let selectedCheckboxes = document.querySelectorAll('.spkCheckbox:checked');

            if (selectedCheckboxes.length === 0) {
                alert('Please select at least one SPK to approve.');
                return;
            }

            form.submit();
        });
    });
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>