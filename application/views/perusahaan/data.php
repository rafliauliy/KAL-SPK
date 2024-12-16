<?= $this->session->flashdata('pesan'); ?>

<head>
    <!-- Latest FontAwesome Version (6.x) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row align-items-center">
            <div class="col">
                <h4 class="h5 m-0 font-weight-bold text-primary">
                    Data SPK
                </h4>
            </div>
            <div class="col-auto">
                <?php if (is_admin() || is_super_admin()) : ?>
                    <a href="<?= base_url('perusahaan/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                        <span class="icon">
                            <i class="fas fa-folder-plus"></i>
                        </span>
                        <span class="text">
                            Add Spk Perusahaan
                        </span>
                    </a>
                    <a href="https://web.whatsapp.com/send?phone=6281911191985&text=Information%2C%0A%0APlease%20verify%20%26%20Approve%20some%20spk%20for%20continue%20the%20process%20using%20the%20application%20with%20link%20on%20below%3A%0A%0Ahttps%3A%2F%2Fkrakatau-argologistics.com%2Fkal-spk%2F%0A%0ABest%20Regards%2C%0AProcurement%20Team." target="_blank" class="btn btn-sm btn-success btn-icon-split">
                        <span class="icon">
                            <i class="fab fa-whatsapp"></i>
                        </span>
                        <span class="text">
                            Send WhatsApp
                        </span>
                    </a>
                    <a href="<?= base_url('perusahaan/exportExcel'); ?>" class="btn btn-sm btn-info btn-icon-split">
                        <span class="icon">
                            <i class="fas fa-file-excel"></i>
                        </span>
                        <span class="text">
                            Export Data to Excel
                        </span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive w-100">
            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th width="30">Nomor Surat</th>
                        <?php if (is_admin() || is_super_admin() || is_viewer()) : ?>
                            <th>Nama Vendor</th>
                        <?php endif; ?>
                        <th>Produk</th>
                        <th>Asal Muat</th>
                        <th>Bongkar</th>
                        <th>Rencana Kerja</th>

                        <th>Tarif Jasa</th>

                        <?php if (is_admin() || is_super_admin()) : ?>
                            <th>Status Approval</th>
                            <th>Status Verifikasi</th>
                            <th>Catatan</th>
                        <?php endif; ?>

                        <?php if (is_admin() || is_super_admin() || is_viewer()) : ?>
                            <th>Action</th>
                        <?php endif; ?>

                        <th>Print</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($perusahaan)) :
                        $no = 1;
                        foreach ($perusahaan as $data) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= htmlspecialchars($data['nomor_surat'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <?php if (is_admin() || is_super_admin()) : ?>
                                    <td><?= htmlspecialchars($data['nama_perusahaan'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <?php endif; ?>
                                <td><?= htmlspecialchars($data['produk'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?= htmlspecialchars($data['asal_muat'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?= htmlspecialchars($data['tujuan_bongkar'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?= date('d M Y', strtotime($data['rencana_kerja'])); ?></td>
                                <td><?= htmlspecialchars($data['tarif_jasa'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <?php if (is_admin() || is_super_admin()) : ?>
                                    <?php
                                    $status = htmlspecialchars($data['status_approval'], ENT_QUOTES, 'UTF-8');
                                    $badgeClass = '';

                                    switch ($status) {
                                        case 'pending':
                                            $badgeClass = 'badge rounded-pill bg-danger';
                                            break;
                                        case 'approved':
                                            $badgeClass = 'badge rounded-pill bg-success';
                                            break;
                                        case 'rejected':
                                            $badgeClass = 'badge rounded-pill bg-warning';
                                            break;
                                        default:
                                            $badgeClass = ''; // Optional: Default class if status is unknown
                                            break;
                                    }
                                    ?>
                                    <td><span class="<?= $badgeClass; ?>"><?= $status; ?></span></td>

                                    <?php
                                    $status = htmlspecialchars($data['status_verifikasi'], ENT_QUOTES, 'UTF-8');
                                    $badgeClass = '';

                                    switch ($status) {
                                        case 'pending':
                                            $badgeClass = 'badge rounded-pill bg-warning'; // Ubah menjadi bg-warning
                                            break;
                                        case 'verified':
                                            $badgeClass = 'badge rounded-pill bg-success';
                                            break;
                                        case 'revisi': // Tambahkan case untuk revisi
                                            $badgeClass = 'badge rounded-pill bg-info'; // Pilih warna bg-info untuk revisi
                                            break;
                                        case 'rejected':
                                            $badgeClass = 'badge rounded-pill bg-danger';
                                            break;
                                        default:
                                            $badgeClass = ''; // Optional: Default class if status is unknown
                                            break;
                                    }
                                    ?>
                                    <td><span class="<?= $badgeClass; ?>"><?= $status; ?></span></td>

                                    <td><?= htmlspecialchars($data['catatan'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <?php endif; ?>


                                <?php if (is_admin() || is_super_admin() || is_viewer()) : ?>
                                    <td class="btn-group" role="group">
                                        <?php if (is_admin() || is_super_admin() || is_viewer()) : ?>
                                            <a href="<?= base_url('perusahaan/detail/') . $data['id_spk']; ?>" class="btn btn-info btn-circle btn-sm" title="Edit"><i class="fa fa-eye"></i></a>
                                        <?php endif; ?>
                                        <?php if (is_admin() || is_super_admin()) : ?>
                                            <a href="<?= base_url('perusahaan/edit/') . $data['id_spk']; ?>" class="btn btn-warning btn-circle btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('perusahaan/delete/') . $data['id_spk']; ?>" class="btn btn-danger btn-circle btn-sm" title="Delete"><i class="fa fa-trash"></i></a>
                                        <?php endif; ?>
                                    </td>
                                <?php endif; ?>


                                <td>
                                    <?php if ($data['jenis_pekerjaan'] !== 'Stevedoring') : ?>
                                        <a href="<?= base_url('perusahaan/print_spk/') . $data['id_spk']; ?>" class="btn btn-info btn-circle btn-sm" title="Print" target="_blank"><i class="fa fa-print"></i></a>
                                    <?php endif; ?>

                                    <?php
                                    // Mendefinisikan array untuk jenis pekerjaan yang akan menyembunyikan tombol
                                    $disabled_jobs = ['Trucking', 'Trucking Domestic KP (Coil)', 'Trucking Dump Truck'];
                                    ?>

                                    <?php if (!in_array($data['jenis_pekerjaan'], $disabled_jobs)) : ?>
                                        <a href="<?= base_url('perusahaan/print_spk_stevedoring/') . $data['id_spk']; ?>" class="btn btn-info btn-circle btn-sm" title="Print" target="_blank">
                                            <i class="fa fa-print"></i>
                                        </a>
                                    <?php endif; ?>
                                </td>


                            </tr>
                        <?php endforeach;
                    else : ?>
                        <tr>
                            <td colspan="6" class="text-center">Data Kosong, Silahkan Tambah Data Anda!</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>