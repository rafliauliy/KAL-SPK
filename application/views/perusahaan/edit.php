<?php if (is_admin() || is_super_admin() || is_tl()) : ?>
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12"> <!-- Ubah dari col-md-10 menjadi col-md-12 -->
            <div class="card shadow-sm mb-4 border-bottom-primary">
                <div class="card-header bg-white py-3">
                    <div class="row">
                        <div class="col">
                            <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                                Edit SPK
                            </h4>
                        </div>
                        <div class="col-auto">
                            <?php if (is_admin() || is_super_admin()): ?>
                                <a href="<?= base_url('perusahaan') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                                    <span class="icon">
                                        <i class="fa fa-arrow-left"></i>
                                    </span>
                                    <span class="text">
                                        Kembali
                                    </span>
                                </a>
                            <?php elseif (is_tl()): ?>
                                <a href="<?= base_url('perusahaan/verification') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                                    <span class="icon">
                                        <i class="fa fa-arrow-left"></i>
                                    </span>
                                    <span class="text">
                                        Kembali
                                    </span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form id="pphForm" action="<?= base_url('perusahaan/edit/' . $perusahaan['id_spk']); ?>" method="post" enctype="multipart/form-data">
                        <!-- CSRF token -->
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />

                        <div id="formContainer">
                            <div class="form-entry">

                                <div class="form-row">
                                    <!-- Kolom 1: Nomor Surat -->
                                    <div class="form-group col-md-4">
                                        <label for="nomor_surat"><strong>Nomor SPK <span style="color: red;">*</span></strong></label>
                                        <input type="text" name="nomor_surat[]" class="form-control" placeholder="Masukkan Nomor Surat" value="<?= set_value('nomor_surat[]', $perusahaan['nomor_surat']); ?>" readonly>
                                        <p style="font-style: italic; color: #000000; margin-top: 5px; font-size: 11px;">You cannot edit nomor surat once it is released.</p>
                                        <?= form_error('nomor_surat[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <!-- Kolom 2: Customer -->
                                    <div class="form-group col-md-4">
                                        <label for="customer"><strong>Customer <span style="color: red;">*</span></strong></label>
                                        <input type="text" name="customer[]" class="form-control" placeholder="Masukkan Customer" value="<?= set_value('customer[]', $perusahaan['customer']); ?>">
                                        <?= form_error('customer[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <!-- Kolom 3: Nomor CS -->
                                    <div class="form-group col-md-4">
                                        <label for="nomor_cs"><strong>Nomor CS <span style="color: red;">*</span></strong></label>
                                        <input type="text" name="nomor_cs[]" class="form-control" placeholder="Masukkan Nomor CS" value="<?= set_value('nomor_cs[]', $perusahaan['nomor_cs']); ?>">
                                        <?= form_error('nomor_cs[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <!-- Kolom 1: Jenis Pekerjaan -->
                                    <div class="form-group col-md-4">
                                        <label for="jenis_pekerjaan"><strong>Jenis Pekerjaan <span style="color: red;">*</span></strong></label>
                                        <input type="text" name="jenis_pekerjaan[]" class="form-control" placeholder="Masukkan Jenis Pekerjaan" value="<?= set_value('jenis_pekerjaan[]', $perusahaan['jenis_pekerjaan']); ?>" readonly>
                                        <p style="font-style: italic; color: #000000; margin-top: 5px; font-size: 11px;">You cannot edit jenis pekerjaan once it is released.</p>
                                        <?= form_error('jenis_pekerjaan[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <!-- Kolom 2: Tanggal SPK -->
                                    <div class="form-group col-md-4">
                                        <label for="tgl_spk"><strong>Tanggal SPK <span style="color: red;">*</span></strong></label>
                                        <input type="date" name="tgl_spk[]" class="form-control" value="<?= set_value('tgl_spk[]', $perusahaan['tgl_spk']); ?>">
                                        <?= form_error('tgl_spk[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <!-- Kolom 3: Keterangan Pekerjaan -->
                                    <div class="form-group col-md-4">
                                        <label for="keterangan_pekerjaan"><strong>Keterangan Pekerjaan <span style="color: red;">*</span></strong></label>
                                        <input type="text" name="keterangan_pekerjaan[]" class="form-control" value="<?= set_value('keterangan_pekerjaan[]', $perusahaan['keterangan_pekerjaan']); ?>">
                                        <?= form_error('keterangan_pekerjaan[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <!-- Kolom 1: Approval -->
                                    <div class="form-group col-md-4">
                                        <label for="approval"><strong>Approval <span style="color: red;">*</span></strong></label>
                                        <input type="text" name="approval[]" class="form-control" placeholder="Masukkan Approval" value="<?= set_value('approval[]', $perusahaan['approval']); ?>">
                                        <?= form_error('approval[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <!-- Kolom 2: Kolom Placeholder (jika perlu menambah kolom lain) -->
                                    <div class="form-group col-md-4">
                                        <!-- Tambahkan field lainnya jika diperlukan -->
                                    </div>

                                    <!-- Kolom 3: Kolom Placeholder (jika perlu menambah kolom lain) -->
                                    <div class="form-group col-md-4">
                                        <!-- Tambahkan field lainnya jika diperlukan -->
                                    </div>
                                </div>

                                <hr>

                                <!-- Kelompok Kedua -->
                                <div class="form-row">
                                    <!-- Produk -->
                                    <div class="form-group col-md-4">
                                        <label for="produk"><strong>Produk <span style="color: red;">*</span></strong></label>
                                        <input type="text" name="produk[]" class="form-control" placeholder="Masukkan Produk" value="<?= set_value('produk[]', $perusahaan['produk']); ?>">
                                        <?= form_error('produk[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <!-- Volume -->
                                    <div class="form-group col-md-4">
                                        <label for="volume"><strong>Volume <span style="color: red;">*</span></strong></label>
                                        <input type="text" name="volume[]" class="form-control" placeholder="Masukkan Volume" value="<?= set_value('volume[]', $perusahaan['volume']); ?>">
                                        <?= form_error('volume[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>


                                    <!-- Tarif Jasa -->
                                    <div class="form-group col-md-4">
                                        <label for="tarif_jasa"><strong>Tarif Jasa <span style="color: red;">*</span></strong></label>
                                        <input type="text" name="tarif_jasa[]" class="form-control" placeholder="Masukkan Tarif Jasa" value="<?= set_value('tarif_jasa[]', $perusahaan['tarif_jasa']); ?>">
                                        <?= form_error('tarif_jasa[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <!-- Harga Jual -->
                                    <div class="form-group col-md-4">
                                        <label for="harga_jual"><strong>Harga Jual <span style="color: red;">*</span></strong></label>
                                        <input type="text" name="harga_jual[]" class="form-control" placeholder="Masukkan Harga Jual" value="<?= set_value('harga_jual[]', $perusahaan['harga_jual']); ?>">
                                        <?= form_error('harga_jual[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <!-- Termin -->
                                    <div class="form-group col-md-4">
                                        <label for="termin"><strong>Termin <span style="color: red;">*</span></strong></label>
                                        <input type="text" name="termin[]" class="form-control" placeholder="Masukkan Termin" value="<?= set_value('termin[]', $perusahaan['termin']); ?>">
                                        <?= form_error('termin[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>

                                <hr>

                                <div class="form-row">

                                    <!-- Jenis Angkutan -->
                                    <div class="form-group col-md-4">
                                        <label for="jenis_angkutan"><strong>Jenis Angkutan <span style="color: red;">*</span></strong></label>
                                        <input type="text" name="jenis_angkutan[]" class="form-control" placeholder="Masukkan Jenis Angkutan" value="<?= set_value('jenis_angkutan[]', $perusahaan['jenis_angkutan']); ?>">
                                        <?= form_error('jenis_angkutan[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <!-- Asal Muat -->
                                    <div class="form-group col-md-4">
                                        <label for="asal_muat"><strong>Asal Muat <span style="color: red;">*</span></strong></label>
                                        <input type="text" name="asal_muat[]" class="form-control" placeholder="Masukkan Asal Muat" value="<?= set_value('asal_muat[]', $perusahaan['asal_muat']); ?>">
                                        <?= form_error('asal_muat[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <!-- Tujuan Bongkar -->
                                    <div class="form-group col-md-4">
                                        <label for="tujuan_bongkar"><strong>Tujuan Bongkar <span style="color: red;">*</span></strong></label>
                                        <input type="text" name="tujuan_bongkar[]" class="form-control" placeholder="Masukkan Tujuan Bongkar" value="<?= set_value('tujuan_bongkar[]', $perusahaan['tujuan_bongkar']); ?>">
                                        <?= form_error('tujuan_bongkar[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <!-- Rencana Kerja -->
                                    <div class="form-group col-md-4">
                                        <label for="rencana_kerja"><strong>Rencana Kerja <span style="color: red;">*</span></strong></label>
                                        <input type="date" name="rencana_kerja[]" class="form-control" placeholder="Masukkan Rencana Kerja" value="<?= set_value('rencana_kerja[]', $perusahaan['rencana_kerja']); ?>">
                                        <?= form_error('rencana_kerja[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <!-- Rencana Kerja Akhir -->
                                    <div class="form-group col-md-4">
                                        <label for="rencana_kerja_akhir"><strong>Sampai Dengan <span style="color: red;">*</span></strong></label>
                                        <input type="date" name="rencana_kerja_akhir[]" class="form-control" value="<?= set_value('rencana_kerja_akhir[]', $perusahaan['rencana_kerja_akhir']); ?>">
                                        <?= form_error('rencana_kerja_akhir[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <!-- Jumlah Unit -->
                                    <div class="form-group col-md-4">
                                        <label for="jumlah_unit"><strong>Jumlah Unit <span style="color: red;">*</span></strong></label>
                                        <input type="text" name="jumlah_unit[]" class="form-control" placeholder="Masukkan Jumlah Unit" value="<?= set_value('jumlah_unit[]', $perusahaan['jumlah_unit']); ?>">
                                        <?= form_error('jumlah_unit[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>


                                <div class="form-row">
                                    <!-- MinCharge -->
                                    <div class="form-group col-md-4">
                                        <label for="mincharge"><strong>MinCharge <span style="color: red;">*</span></strong></label>
                                        <input type="text" name="mincharge[]" class="form-control" placeholder="Masukkan MinCharge" value="<?= set_value('mincharge[]', $perusahaan['mincharge']); ?>">
                                        <?= form_error('mincharge[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                </div>

                                <hr>

                                <!-- Form tambahan untuk Stevedoring -->
                                <div id="stevedoring-form" style="background-color: #e9ecef; padding: 15px; border-radius: 10px;">
                                    <hr>
                                    <div class="form-row">
                                        <div class="form-group col-md-4" style="background-color: #f8f9fa; padding: 5px; border-radius: 5px; text-align: left;">
                                            <h5 style="font-size: 15px; color: black;">
                                                Stevedoring Section
                                                <span style="color: red;">*</span>
                                            </h5>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <!-- Nama Kapal -->
                                        <div class="form-group col-md-4">
                                            <label for="nama_kapal"><strong>Nama Kapal <span style="color: red;">*</span></strong></label>
                                            <input type="text" name="nama_kapal[]" class="form-control" placeholder="Masukkan Nama Kapal" value="<?= set_value('nama_kapal[]', $perusahaan['nama_kapal']); ?>">
                                            <?= form_error('nama_kapal[]', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <!-- Rencana Tiba -->
                                        <div class="form-group col-md-4">
                                            <label for="rencana_tiba"><strong>Rencana Tiba<span style="color: red;">*</span></strong></label>
                                            <input type="Date" name="rencana_tiba[]" class="form-control" placeholder="Masukkan Nama Kapal" value="<?= set_value('rencana_tiba[]', $perusahaan['rencana_tiba']); ?>">
                                            <?= form_error('rencana_tiba[]', '<small class="text-danger">', '</small>'); ?>
                                        </div>



                                        <!-- Perjanjian Kerja -->
                                        <div class="form-group col-md-4">
                                            <label for="perjanjian_kerja"><strong>Lingkup Kerja <span style="color: red;">*</span></strong></label>
                                            <textarea name="perjanjian_kerja" class="form-control" placeholder="Perjanjian Kerja"><?= set_value('perjanjian_kerja', isset($perusahaan['perjanjian_kerja']) ? $perusahaan['perjanjian_kerja'] : ''); ?></textarea>
                                            <?= form_error('perjanjian_kerja', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <hr>
                                </div>

                                <hr>

                                <div class="form-row">
                                    <!-- Catatan -->
                                    <div class="form-group col-md-4">
                                        <label for="catatan"><strong>Catatan <span style="color: red;">*</span></strong></label>
                                        <textarea name="catatan[]" class="form-control" placeholder="Masukkan Catatan"><?= set_value('catatan[]', $perusahaan['catatan']); ?></textarea>
                                        <?= form_error('catatan[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>


                                <hr>

                                <!-- Kelompok Ketiga -->
                                <div class="form-row">
                                    <!-- Nama Vendor -->
                                    <div class="form-group col-md-4">
                                        <label for="id_user"><strong>Nama Perusahaan <span style="color: red;">*</span></strong></label>
                                        <select name="id_user[]" class="form-control selectpicker" data-live-search="true">
                                            <option value="">Pilih User</option>
                                            <?php foreach ($user_ids as $user) : ?>
                                                <option value="<?= $user['id_user']; ?>|<?= $user['nama_perusahaan']; ?>" <?= set_select('id_user', $user['id_user'], $user['id_user'] == $perusahaan['id_user']); ?>>
                                                    <?= $user['nama_perusahaan']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('id_user[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <!-- Nama PIC -->
                                    <div class="form-group col-md-4">
                                        <label for="nama_pic"><strong>Nama PIC <span style="color: red;">*</span></strong></label>
                                        <input type="text" name="nama_pic[]" class="form-control" placeholder="Masukkan Nama PIC" value="<?= set_value('nama_pic[]', $perusahaan['nama_pic']); ?>">
                                        <?= form_error('nama_pic[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <!-- Jabatan PIC -->
                                    <div class="form-group col-md-4">
                                        <label for="jabatan_pic"><strong>Jabatan PIC <span style="color: red;">*</span></strong></label>
                                        <input type="text" name="jabatan_pic[]" class="form-control" placeholder="Masukkan Jabatan PIC" value="<?= set_value('jabatan_pic[]', $perusahaan['jabatan_pic']); ?>">
                                        <?= form_error('jabatan_pic[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>


                                <hr>

                                <div class="form-row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">Update Data</button>
                                        <a href="<?= base_url('perusahaan') ?>" class="btn btn-secondary">Batal</a>
                                    </div>
                                </div>
                    </form>
                </div>

                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $('.selectpicker').selectpicker();
                    });
                </script>

                <!-- Bootstrap CSS -->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

                <!-- Bootstrap-Select CSS -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">

                <!-- jQuery -->
                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

                <!-- Bootstrap JS -->
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

                <!-- Bootstrap-Select JS -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <?php endif; ?>