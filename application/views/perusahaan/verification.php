<?= $this->session->flashdata('pesan'); ?>
<form action="<?= base_url('perusahaan/multiple_verify'); ?>" method="post">
    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

    <div class="card shadow-sm mb-4 border-bottom-primary">
        <div class="card-header bg-white py-3">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="h5 m-0 font-weight-bold text-primary">Data Verifikasi</h4>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fas fa-check"></i> Verify Selected
                    </button>
                </div>
                <a href="https://web.whatsapp.com/send?phone=6281285326634&text=Information%2C%0A%0APlease%20verify%20%26%20Approve%20some%20spk%20for%20continue%20the%20process%20using%20the%20application%20with%20link%20on%20below%3A%0A%0Ahttps%3A%2F%2Fkrakatau-argologistics.com%2Fkal-spk%2F%0A%0ABest%20Regards%2C%0AProcurement%20Team." target="_blank" class="btn btn-sm btn-success btn-icon-split">
                    <span class="icon">
                        <i class="fab fa-whatsapp"></i>
                    </span>
                    <span class="text">
                        Send Notification
                    </span>
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive w-100">
                <table id="verifikasiTable" class="table table-striped" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center" style="width: 0%;"><input type="checkbox" id="select_all"></th>
                            <th class="text-center" style="width: 0%;">No</th>
                            <th class="text-center">No. Surat</th>
                            <th class="text-center">Nama Perusahaan</th>
                            <th class="text-center" style="width: 15%;">Status Verifikasi</th>
                            <th class="text-center" style="width: 15%;">Status Approval</th>
                            <th class="text-center" style="width: 10%;">No uniq</th>
                            <th class="text-center" style="width: 20%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($perusahaan as $p): ?>
                            <tr>
                                <td class="text-center"><input type="checkbox" name="id_spk[]" value="<?= $p['id_spk']; ?>"></td>
                                <td class="text-center"><?= $no++; ?></td>
                                <td class="text-center"><?= $p['nomor_surat']; ?></td>
                                <td><?= $p['nama_perusahaan']; ?></td>
                                <td class="text-center">
                                    <?php if ($p['status_verifikasi'] == 'pending'): ?>
                                        <span class="badge bg-warning">Pending</span>
                                    <?php elseif ($p['status_verifikasi'] == 'verified'): ?>
                                        <span class="badge bg-success">Verified</span>
                                    <?php elseif ($p['status_verifikasi'] == 'revisi'): ?>
                                        <span class="badge bg-info">Revised</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Rejected</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($p['status_approval'] == 'pending'): ?>
                                        <span class="badge bg-warning">Pending</span>
                                    <?php elseif ($p['status_approval'] == 'approved'): ?>
                                        <span class="badge bg-success">Approved</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Rejected</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($p['status_verifikasi'] == 'verified' && isset($p['nomor_uniq'])): ?>
                                        <p class="digital-font" style="width: 50px; font-size: 14px;">
                                            <?= $p['nomor_uniq']; ?>
                                        </p>
                                    <?php else: ?>
                                        <span>Belum Diverifikasi</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">

                                        <a href="<?= site_url('perusahaan/detail_verify/' . $p['id_spk']); ?>" class="btn btn-info" data-toggle="tooltip" title="Detail SPK">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                        <a href="<?= base_url('perusahaan/print_spk/') . $p['id_spk']; ?>" class="btn btn-warning btn-sm" title="Print" target="_blank">
                                            <i class="fa fa-print"></i>
                                        </a>
                                        <a href="<?= base_url('perusahaan/verify/' . $p['id_spk']); ?>" class="btn btn-success btn-sm">
                                            <i class="fas fa-check"></i>
                                        </a>
                                        <a href="<?= base_url('perusahaan/reject_verification/' . $p['id_spk']); ?>" class="btn btn-danger btn-sm">
                                            <i class="fas fa-times"></i>
                                        </a>
                                        <a href="<?= base_url('perusahaan/revisi/' . $p['id_spk']); ?>" class="btn btn-dark btn-sm">
                                            <i class="fas fa-history"></i>
                                        </a>
                                        <a href="<?= base_url('perusahaan/edit/' . $p['id_spk']); ?>" class="btn btn-primary btn-sm">
                                            <i class="fas fa-sticky-note"></i>
                                        </a>
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


<!-- Tambahkan link CSS DataTables di dalam tag <head> -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

<!-- Tambahkan JS DataTables di akhir halaman sebelum </body> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>




<script>
    $(document).ready(function() {
        $('#verifikasiTable').DataTable({
            "paging": true, // Aktifkan pagination
            "lengthChange": false, // Menonaktifkan opsi untuk mengubah jumlah baris per halaman
            "searching": true, // Aktifkan pencarian
            "ordering": true, // Aktifkan pengurutan
            "info": true, // Tampilkan informasi tabel
            "autoWidth": false // Menonaktifkan pengaturan lebar kolom otomatis
        });
    });
</script>