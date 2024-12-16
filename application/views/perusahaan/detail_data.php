<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail SPK</title>
    <!-- Load Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h3>Detail SPK</h3>
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Data di kolom pertama -->
                            <div class="form-group">
                                <label><strong>Nomor Surat :</strong></label>
                                <input type="text" class="form-control" value="<?= htmlspecialchars($data['nomor_surat'], ENT_QUOTES, 'UTF-8'); ?>" readonly>
                                <p style="font-style: italic; color: #000000; margin-top: 5px; font-size: 11px;">You cannot edit nomor surat once it is released.</p>
                            </div>
                            <div class="form-group">
                                <label><strong>Nama Vendor :</strong></label>
                                <input type="text" class="form-control" value="<?= htmlspecialchars($data['nama_perusahaan'], ENT_QUOTES, 'UTF-8'); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><strong>Produk :</strong></label>
                                <input type="text" class="form-control" value="<?= htmlspecialchars($data['produk'], ENT_QUOTES, 'UTF-8'); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><strong>Keterangan Pekerjaan :</strong></label>
                                <input type="text" class="form-control" value="<?= htmlspecialchars($data['keterangan_pekerjaan'], ENT_QUOTES, 'UTF-8'); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><strong>Customer :</strong></label>
                                <input type="text" class="form-control" value="<?= htmlspecialchars($data['customer'], ENT_QUOTES, 'UTF-8'); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><strong>Asal Muat :</strong></label>
                                <input type="text" class="form-control" value="<?= htmlspecialchars($data['asal_muat'], ENT_QUOTES, 'UTF-8'); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><strong>Tujuan Bongkar :</strong></label>
                                <input type="text" class="form-control" value="<?= htmlspecialchars($data['tujuan_bongkar'], ENT_QUOTES, 'UTF-8'); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><strong>Tarif beli :</strong></label>
                                <input type="text" class="form-control" value="<?= htmlspecialchars($data['tarif_jasa'], ENT_QUOTES, 'UTF-8'); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><strong>Harga Jual :</strong></label>
                                <input type="text" class="form-control" value="<?= htmlspecialchars($data['harga_jual'], ENT_QUOTES, 'UTF-8'); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><strong>Nomor CS :</strong></label>
                                <input type="text" class="form-control" value="<?= htmlspecialchars($data['nomor_cs'], ENT_QUOTES, 'UTF-8'); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><strong>Jenis Pekerjaan :</strong></label>
                                <input type="text" class="form-control" value="<?= htmlspecialchars($data['jenis_pekerjaan'], ENT_QUOTES, 'UTF-8'); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><strong>Status Approval :</strong></label>
                                <input type="text" class="form-control" value="<?= htmlspecialchars($data['status_approval'], ENT_QUOTES, 'UTF-8'); ?>" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- Data di kolom kedua -->
                            <div class="form-group">
                                <label><strong>Tanggal SPK :</strong></label>
                                <input type="text" class="form-control" value="<?= date('d M Y', strtotime($data['tgl_spk'])); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><strong>Volume :</strong></label>
                                <input type="text" class="form-control" value="<?= htmlspecialchars($data['volume'], ENT_QUOTES, 'UTF-8'); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><strong>Jenis Angkutan :</strong></label>
                                <input type="text" class="form-control" value="<?= htmlspecialchars($data['jenis_angkutan'], ENT_QUOTES, 'UTF-8'); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><strong>Termin :</strong></label>
                                <input type="text" class="form-control" value="<?= htmlspecialchars($data['termin'], ENT_QUOTES, 'UTF-8'); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><strong>Mincharge :</strong></label>
                                <input type="text" class="form-control" value="<?= htmlspecialchars($data['mincharge'], ENT_QUOTES, 'UTF-8'); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><strong>Nama PIC :</strong></label>
                                <input type="text" class="form-control" value="<?= htmlspecialchars($data['nama_pic'], ENT_QUOTES, 'UTF-8'); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><strong>Jabatan PIC :</strong></label>
                                <input type="text" class="form-control" value="<?= htmlspecialchars($data['jabatan_pic'], ENT_QUOTES, 'UTF-8'); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><strong>Approval :</strong></label>
                                <input type="text" class="form-control" value="<?= htmlspecialchars($data['approval'], ENT_QUOTES, 'UTF-8'); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><strong>Rencana Kerja :</strong></label>
                                <input type="text" class="form-control" value="<?= date('d M Y', strtotime($data['rencana_kerja'])); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><strong>Nama Kapal :</strong></label>
                                <input type="text" class="form-control" value="<?= htmlspecialchars($data['nama_kapal'], ENT_QUOTES, 'UTF-8'); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><strong>Rencana Tiba :</strong></label>
                                <input type="text" class="form-control" value="<?= date('d M Y', strtotime($data['rencana_tiba'])); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><strong>Created At :</strong></label>
                                <input type="text" class="form-control" value="<?= date('d M Y, H:i', strtotime($data['created_at'])); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><strong>Approved By :</strong></label>
                                <input type="text" class="form-control" value="<?= htmlspecialchars($data['approved_by'], ENT_QUOTES, 'UTF-8'); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><strong>Catatan :</strong></label>
                                <textarea class="form-control" rows="3" readonly><?= htmlspecialchars($data['catatan'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                            </div>
                        </div>
                    </div>
                </form>
                <a href="<?= base_url('perusahaan'); ?>" class="btn btn-secondary mt-3">Kembali</a>
            </div>
        </div>
    </div>

    <!-- Load Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>