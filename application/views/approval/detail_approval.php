<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-info text-white">
            <h5>Detail SPK</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Nomor Surat:</label>
                    <input type="text" class="form-control" value="<?= $spk['nomor_surat']; ?>" readonly>
                </div>
                <div class="col-md-6 form-group">
                    <label>Nama Perusahaan:</label>
                    <input type="text" class="form-control" value="<?= $spk['nama_perusahaan']; ?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Tanggal SPK:</label>
                    <input type="text" class="form-control" value="<?= date('j F Y', strtotime($spk['tgl_spk'])); ?>" readonly>
                </div>
                <div class="col-md-6 form-group">
                    <label>Keterangan Pekerjaan:</label>
                    <input type="text" class="form-control" value="<?= $spk['keterangan_pekerjaan']; ?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Produk:</label>
                    <input type="text" class="form-control" value="<?= $spk['produk']; ?>" readonly>
                </div>
                <div class="col-md-6 form-group">
                    <label>Customer:</label>
                    <input type="text" class="form-control" value="<?= $spk['customer']; ?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Asal Muat:</label>
                    <input type="text" class="form-control" value="<?= $spk['asal_muat']; ?>" readonly>
                </div>
                <div class="col-md-6 form-group">
                    <label>Tujuan Bongkar:</label>
                    <input type="text" class="form-control" value="<?= $spk['tujuan_bongkar']; ?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Tarif Jasa:</label>
                    <input type="text" class="form-control" value="<?= $spk['tarif_jasa']; ?>" readonly>
                </div>
                <div class="col-md-6 form-group">
                    <label>Nomor CS:</label>
                    <input type="text" class="form-control" value="<?= $spk['nomor_cs']; ?>" readonly>
                </div>
            </div>

            <!-- Point-point tambahan -->
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="approval<?= $spk['id_spk']; ?>">Approval:</label>
                    <input type="text" class="form-control" id="approval<?= $spk['id_spk']; ?>" value="<?= $spk['approval']; ?>" readonly>
                </div>
                <div class="col-md-6 form-group">
                    <label for="rencanaKerja<?= $spk['id_spk']; ?>">Rencana Kerja:</label>
                    <input type="text" class="form-control" id="rencanaKerja<?= $spk['id_spk']; ?>"
                        value="<?= date('j F Y', strtotime($spk['rencana_kerja'])); ?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="jenisPekerjaan<?= $spk['id_spk']; ?>">Jenis Pekerjaan:</label>
                    <input type="text" class="form-control" id="jenisPekerjaan<?= $spk['id_spk']; ?>" value="<?= $spk['jenis_pekerjaan']; ?>" readonly>
                </div>
                <div class="col-md-6 form-group">
                    <label for="volume<?= $spk['id_spk']; ?>">Volume:</label>
                    <input type="text" class="form-control" id="volume<?= $spk['id_spk']; ?>" value="<?= $spk['volume']; ?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="jenisAngkutan<?= $spk['id_spk']; ?>">Jenis Angkutan:</label>
                    <input type="text" class="form-control" id="jenisAngkutan<?= $spk['id_spk']; ?>" value="<?= $spk['jenis_angkutan']; ?>" readonly>
                </div>
                <div class="col-md-6 form-group">
                    <label for="termin<?= $spk['id_spk']; ?>">Termin:</label>
                    <input type="text" class="form-control" id="termin<?= $spk['id_spk']; ?>" value="<?= $spk['termin']; ?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="NamaKapal<?= $spk['id_spk']; ?>">Nama Kapal:</label>
                    <input type="text" class="form-control" id="NamaKapal<?= $spk['id_spk']; ?>" value="<?= $spk['nama_kapal']; ?>" readonly>
                </div>
                <div class="col-md-6 form-group">
                    <label for="rencanatiba<?= $spk['id_spk']; ?>">Rencana Tiba:</label>
                    <input type="text" class="form-control" id="rencanatiba<?= $spk['id_spk']; ?>" value="<?= $spk['rencana_tiba']; ?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="mincharge<?= $spk['id_spk']; ?>">Mincharge:</label>
                    <input type="text" class="form-control" id="mincharge<?= $spk['id_spk']; ?>" value="<?= $spk['mincharge']; ?>" readonly>
                </div>
                <div class="col-md-6 form-group">
                    <label for="namaPic<?= $spk['id_spk']; ?>">Nama PIC:</label>
                    <input type="text" class="form-control" id="namaPic<?= $spk['id_spk']; ?>" value="<?= $spk['nama_pic']; ?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="jabatanPic<?= $spk['id_spk']; ?>">Jabatan PIC:</label>
                    <input type="text" class="form-control" id="jabatanPic<?= $spk['id_spk']; ?>" value="<?= $spk['jabatan_pic']; ?>" readonly>
                </div>
                <div class="col-md-6 form-group">
                    <label for="statusApproval<?= $spk['id_spk']; ?>">Status Approval:</label>
                    <input type="text" class="form-control" id="statusApproval<?= $spk['id_spk']; ?>" value="<?= ucfirst($spk['status_approval']); ?>" readonly>
                </div>
            </div>
        </div>

        <div class="card-footer text-right">

            <?php if ($spk['status_verifikasi'] === 'verified') : ?>
                <a href="<?= site_url('approval/approve/' . $spk['id_spk']); ?>" class="btn btn-success mr-2" data-toggle="tooltip" title="Approve">
                    <i class="fas fa-check"></i> Approve
                </a>
                <a href="<?= site_url('approval/reject/' . $spk['id_spk']); ?>" class="btn btn-danger" data-toggle="tooltip" title="Reject">
                    <i class="fas fa-times"></i> Reject
                </a>
            <?php else: ?>
                <a href="#" class="btn btn-success disabled mr-2" style="pointer-events: none;" data-toggle="tooltip" title="Tombol ini tidak bisa digunakan sebelum status verifikasi adalah 'verified'">
                    <i class="fas fa-check"></i> Approve
                </a>
                <a href="#" class="btn btn-danger disabled" style="pointer-events: none;" data-toggle="tooltip" title="Tombol ini tidak bisa digunakan sebelum status verifikasi adalah 'verified'">
                    <i class="fas fa-times"></i> Reject
                </a>
            <?php endif; ?>

            <a href="<?= site_url('approval'); ?>" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>