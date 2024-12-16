<?php if (is_admin() || is_super_admin()) : ?>

    <style>
        .alert-warning strong {
            font-size: 1.2em;
        }
    </style>

    <div class="alert alert-warning" role="alert">
        <strong>Warning!</strong> Field with <span class="text-danger">*</span> is required.
    </div>
    <div class="alert alert-primary" role="alert">
        Update Fitur baru 29 Oktober 2024, Setelah Data Di save Mohon Untuk Mengirim Pesan Ke WhatsApp GM & TL Untuk Proses Verify & Approve, Terimakasih <span class="text-danger">*</span>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12"> <!-- Ubah dari col-md-10 menjadi col-md-12 -->
            <div class="card shadow-sm mb-4 border-bottom-primary">
                <div class="card-header bg-white py-3">
                    <div class="row">
                        <div class="col">
                            <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                                Add SPK
                            </h4>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('perusahaan') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                                <span class="icon">
                                    <i class="fa fa-arrow-left"></i>
                                </span>
                                <span class="text">
                                    Kembali
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form id="pphForm" action="<?= base_url('perusahaan/add'); ?>" method="post" enctype="multipart/form-data">
                        <!-- CSRF token -->
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />

                        <div id="formContainer">

                            <!-- Kelompok Pertama -->
                            <div class="form-entry">
                                <div class="form-row">

                                    <!-- Jenis Pekerjaan -->
                                    <div class="form-group col-md-4">
                                        <label for="jenis_pekerjaan"><strong>Jenis Pekerjaan <span style="color: red;">*</span></strong></label>
                                        <div class="form-check">
                                            <label class="form-check-label" for="edit_nomor_surat"></label>
                                        </div>
                                        <select id="jenis_pekerjaan" name="jenis_pekerjaan[]" class="form-control">
                                            <option value="" selected disabled>Pilih Jenis Pekerjaan</option>
                                            <option value="Trucking" <?= set_select('jenis_pekerjaan[]', 'Trucking'); ?>>Trucking</option>
                                            <option value="Trucking Domestic KP (Coil)" <?= set_select('jenis_pekerjaan[]', 'Trucking Domestic KP (Coil)'); ?>>Trucking Domestic KP (Coil)</option>
                                            <option value="Trucking Dump Truck" <?= set_select('jenis_pekerjaan[]', 'Trucking Dump Truck'); ?>>Trucking Dump Truck</option>
                                            <option value="Stevedoring" <?= set_select('jenis_pekerjaan[]', 'Stevedoring'); ?>>Stevedoring</option>
                                        </select>
                                        <?= form_error('jenis_pekerjaan[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <!-- Nomor Surat -->
                                    <div class="form-group col-md-4">
                                        <label for="nomor_surat"><strong>Nomor SPK <span style="color: red; font-size: 10px;">*</span></strong></label>
                                        <div class="form-check">
                                            <input type="checkbox" id="edit_nomor_surat" class="form-check-input">
                                            <label class="form-check-label" for="edit_nomor_surat">Edit Nomor</label>
                                        </div>
                                        <input type="text" id="nomor_surat" name="nomor_surat[]" class="form-control" placeholder="Masukkan Nomor Surat" value="<?= set_value('nomor_surat[]', $nomor_surat); ?>" readonly>
                                        <?= form_error('nomor_surat[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <!-- Keterangan Pekerjaan -->
                                    <div class="form-group col-md-4">
                                        <label for="keterangan_pekerjaan"><strong>Keterangan Pekerjaan <span style="color: red;">*</span></strong></label>
                                        <div class="form-check">
                                            <label class="form-check-label" for="edit_nomor_surat"></label>
                                        </div>
                                        <input type="text" name="keterangan_pekerjaan[]" class="form-control" placeholder="Keterangan Pekerjaan" value="<?= set_value('keterangan_pekerjaan[]'); ?>">
                                        <?= form_error('keterangan_pekerjaan[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <!-- Customer -->
                                    <div class="form-group col-md-4">
                                        <label for="customer"><strong>Customer <span style="color: red;">*</span></strong></label>
                                        <input type="text" name="customer[]" class="form-control" placeholder="Masukkan Customer" value="<?= set_value('customer[]'); ?>">
                                        <?= form_error('customer[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <!-- Nomor CS -->
                                    <div class="form-group col-md-4">
                                        <label for="nomor_cs"><strong>Nomor CS <span style="color: red;">*</span></strong></label>
                                        <input type="text" name="nomor_cs[]" class="form-control" placeholder="Masukkan Nomor CS" value="<?= set_value('nomor_cs[]'); ?>">
                                        <?= form_error('nomor_cs[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <!-- Tanggal SPK -->
                                    <div class="form-group col-md-4">
                                        <label for="tgl_spk"><strong>Tanggal SPK <span style="color: red;">*</span></strong></label>
                                        <input type="date" name="tgl_spk[]" class="form-control" value="<?= set_value('tgl_spk[]'); ?>">
                                        <?= form_error('tgl_spk[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <!-- Approval -->
                                    <div class="form-group col-md-4">
                                        <label for="approval"><strong>Approval/Sign <span style="color: red;">*</span></strong></label>
                                        <select name="approval[]" class="form-control">
                                            <option value="" selected disabled>Pilih Approval/Sign</option>
                                            <option value="Januar Ishaq - GM Finance & Proc" <?= set_select('approval[]', 'Januar Ishaq - GM Finance & Proc'); ?>>Januar Ishaq - GM Finance & Proc</option>
                                            <option value="Didi Suhendi - TL Proc" <?= set_select('approval[]', 'Didi Suhendi - TL Proc'); ?>>Didi Suhendi - TL Proc</option>
                                        </select>
                                        <?= form_error('approval[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <hr>
                            </div> <!-- .form-entry -->


                            <!-- Kelompok Kedua -->
                            <div class="form-entry">
                                <div class="form-row">
                                    <!-- Produk -->
                                    <div class="form-group col-md-4">
                                        <label for="produk"><strong>Produk <span style="color: red;">*</span></strong></label>
                                        <input type="text" name="produk[]" class="form-control" placeholder="Masukkan Produk" value="<?= set_value('produk[]'); ?>">
                                        <?= form_error('produk[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <!-- Volume dengan Tipe (m3/kg) dalam satu kolom -->
                                    <div class="form-group col-md-4">
                                        <label for="volume"><strong>Volume <span style="color: red;">*</span></strong></label>
                                        <div class="input-group">
                                            <input type="text" name="volume[]" id="volume" class="form-control" placeholder="Masukkan Volume" value="<?= set_value('volume[]'); ?>">
                                            <div class="input-group-append">
                                                <select id="tipe_volume" class="form-control" name="tipe_volume[]">
                                                    <option value="Ton">Ton</option>
                                                    <option value="Rit">Rit</option>
                                                    <option value="MT">MT</option>
                                                </select>
                                            </div>
                                        </div>
                                        <?= form_error('volume[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <!-- Tarif Jasa dengan Tipe (Rit/Ton) dalam satu kolom -->
                                    <div class="form-group col-md-4">
                                        <label for="tarif_jasa"><strong>Tarif Jasa <span style="color: red;">*</span></strong></label>
                                        <div class="input-group">
                                            <input type="text" id="tarif_jasa" name="tarif_jasa[]" class="form-control" placeholder="Masukkan Tarif Jasa" value="<?= set_value('tarif_jasa[]'); ?>">
                                            <div class="input-group-append">
                                                <select id="tipe_tarif" class="form-control" name="tipe_tarif[]">
                                                    <option value="/ Rit">Rit</option>
                                                    <option value="/ Ton">Ton</option>
                                                </select>
                                            </div>
                                        </div>
                                        <?= form_error('tarif_jasa[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <!-- Harga Jual Tipe (Rit/Ton) dalam satu kolom -->
                                    <div class="form-group col-md-4">
                                        <label for="harga_jual"><strong>Harga Jual <span style="color: red;">*</span></strong></label>
                                        <div class="input-group">
                                            <input type="text" id="harga_jual" name="harga_jual[]" class="form-control" placeholder="Masukkan Harga Jual" value="<?= set_value('harga_jual[]'); ?>">
                                            <div class="input-group-append">
                                                <select id="tipe_tarif" class="form-control" name="tipe_tarif[]">
                                                    <option value="/ Rit">Rit</option>
                                                    <option value="/ Ton">Ton</option>
                                                </select>
                                            </div>
                                        </div>
                                        <?= form_error('harga_jual[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <!-- Termin -->
                                    <div class="form-group col-md-4">
                                        <label for="termin"><strong>Termin <span style="color: red;">*</span></strong></label>
                                        <select name="termin[]" class="form-control">
                                            <option value="">-- Pilih Termin --</option>
                                            <option value="14 (Empat Belas)" <?= set_select('termin[]', '14 (Empat Belas)'); ?>>14 ( Empat Belas ) Hari</option>
                                            <option value="30 (Tiga Puluh)" <?= set_select('termin[]', '30 (Tiga Puluh)'); ?>>30 ( Tiga Puluh ) Hari</option>
                                            <option value="60 (Enam Puluh)" <?= set_select('termin[]', '60 (Enam Puluh)'); ?>>60 ( Enam Puluh ) Hari</option>
                                        </select>
                                        <?= form_error('termin[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <!-- tarif_jasa_tambahan -->
                                    <div class="form-group col-md-4">
                                        <label for="tarif_jasa_tambahan"><strong>input disini jika tarif jasa lebih dari 1</strong></label>
                                        <textarea name="tarif_jasa_tambahan[]" class="form-control"><?= set_value('tarif_jasa_tambahan[0]'); ?></textarea>
                                        <?= form_error('tarif_jasa_tambahan[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                </div>

                                <hr>

                                <h4 style="font-size: 20px;">
                                    <span style="background: #f0f0f0; padding: 2px;">Trucking</span>
                                </h4>


                                <div class="form-row">
                                    <!-- Jenis Angkutan -->
                                    <div class="form-group col-md-4">
                                        <label for="jenis_angkutan"><strong>Jenis Angkutan <span style="color: red;"></span></strong></label>
                                        <select name="jenis_angkutan[]" class="form-control selectpicker" data-live-search="true">
                                            <option value="">Pilih Jenis Angkutan</option>
                                            <option value="Trailer" <?= set_select('jenis_angkutan[]', 'Trailer'); ?>>Trailer</option>
                                            <option value="DumpTruck" <?= set_select('jenis_angkutan[]', 'DumpTruck'); ?>>DumpTruck</option>
                                            <option value="Tronton" <?= set_select('jenis_angkutan[]', 'Tronton'); ?>>Tronton</option>
                                            <option value="Truck" <?= set_select('jenis_angkutan[]', 'Truck'); ?>>Truck</option>
                                            <option value="Container" <?= set_select('jenis_angkutan[]', 'Container'); ?>>Container</option>
                                            <option value="Ship" <?= set_select('jenis_angkutan[]', 'Ship'); ?>>Ship</option>
                                            <option value="Train" <?= set_select('jenis_angkutan[]', 'Train'); ?>>Train</option>
                                            <option value="Airplane" <?= set_select('jenis_angkutan[]', 'Airplane'); ?>>Airplane</option>
                                            <option value="Van" <?= set_select('jenis_angkutan[]', 'Van'); ?>>Van</option>
                                            <option value="Barge" <?= set_select('jenis_angkutan[]', 'Barge'); ?>>Barge</option>
                                            <option value="Forklift" <?= set_select('jenis_angkutan[]', 'Forklift'); ?>>Forklift</option>
                                            <option value="Tanker" <?= set_select('jenis_angkutan[]', 'Tanker'); ?>>Tanker</option>
                                            <option value="Flatbed" <?= set_select('jenis_angkutan[]', 'Flatbed'); ?>>Flatbed</option>
                                            <option value="Reefer" <?= set_select('jenis_angkutan[]', 'Reefer'); ?>>Reefer</option>
                                            <option value="Lorry" <?= set_select('jenis_angkutan[]', 'Lorry'); ?>>Lorry</option>
                                            <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                                        </select>
                                        <?= form_error('jenis_angkutan[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <!-- Asal Muat -->
                                    <div class="form-group col-md-4">
                                        <label for="asal_muat"><strong>Asal Muat</strong></label>
                                        <input type="text" name="asal_muat[]" class="form-control" placeholder="Example : WH COIL KP, CILEGON" value="<?= set_value('asal_muat[0]'); ?>">
                                        <?= form_error('asal_muat[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <!-- Tujuan Bongkar -->
                                    <div class="form-group col-md-4">
                                        <label for="tujuan_bongkar"><strong>Tujuan Bongkar</strong></label>
                                        <input type="text" name="tujuan_bongkar[]" class="form-control" placeholder="Example : WH Hamasa, BOGOR" value="<?= set_value('tujuan_bongkar[0]'); ?>">
                                        <?= form_error('tujuan_bongkar[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <!-- Rencana Kerja -->
                                    <div class="form-group col-md-2">
                                        <label for="rencana_kerja"><strong>Rencana Kerja</strong></label>
                                        <input type="date" name="rencana_kerja[]" class="form-control" value="<?= set_value('rencana_kerja[0]'); ?>">
                                        <?= form_error('rencana_kerja[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <!-- Sampai Dengan -->
                                    <div class="form-group col-md-2">
                                        <label for="rencana_kerja_akhir"><strong>Sampai Dengan</strong></label>
                                        <input type="date" name="rencana_kerja_akhir[]" class="form-control" value="<?= set_value('rencana_kerja_akhir[0]'); ?>">
                                        <?= form_error('rencana_kerja_akhir[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <!-- Jumlah Unit -->
                                    <div class="form-group col-md-4">
                                        <label for="jumlah_unit"><strong>Jumlah Unit</strong></label>
                                        <input type="text" id="jumlah_unit" name="jumlah_unit[]" class="form-control" placeholder="Masukkan Jumlah Unit" value="<?= set_value('jumlah_unit[0]'); ?>">
                                        <?= form_error('jumlah_unit[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>


                                    <!-- Mincharge -->
                                    <div class="form-group col-md-4">
                                        <label for="mincharge"><strong>Mincharge</strong></label>
                                        <input type="text" name="mincharge[]" class="form-control" value="<?= set_value('mincharge[0]'); ?>">
                                        <?= form_error('mincharge[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                </div>

                                <hr>

                                <!-- Form tambahan untuk Stevedoring -->
                                <div id="stevedoring-form" style="display: none; background-color: #e9ecef; padding: 15px; border-radius: 10px;">
                                    <hr>
                                    <div class="form-row">
                                        <div class="form-group col-md-4" style="padding: 5px; border-radius: 5px; text-align: left;">
                                            <h5 style="font-size: 15px; color: black;">
                                                Harap Di Isi Jika Pekerjaan Stevedoring
                                                <span style="color: red;">*</span>
                                            </h5>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <!-- Nama Kapal -->
                                        <div class="form-group col-md-4">
                                            <label for="nama_kapal"><strong>Nama Kapal</strong></label>
                                            <input type="text" name="nama_kapal[]" class="form-control" value="<?= set_value('nama_kapal[0]'); ?>">
                                            <?= form_error('nama_kapal[]', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <!-- Rencana Kerja -->
                                        <div class="form-group col-md-4">
                                            <label for="rencana_tiba"><strong>Rencana Tiba <span style="color: red;"></span></strong></label>
                                            <input type="date" name="rencana_tiba[]" class="form-control" value="<?= set_value('rencana_tiba[0]'); ?>">
                                            <?= form_error('rencana_tiba[]', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <!-- perjanjian_kerja -->
                                        <div class="form-group col-md-4">
                                            <label for="perjanjian_kerja"><strong>Lingkup Kerja</strong></label>
                                            <textarea name="perjanjian_kerja[]" class="form-control" rows="3" value="<?= set_value('perjanjian_kerja[0]'); ?>"></textarea>
                                            <?= form_error('perjanjian_kerja[]', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <hr>
                                </div>

                            </div> <!-- .form-entry -->

                            <hr>

                            <!-- Kelompok Terakhir -->
                            <div class="form-entry">
                                <div class="form-row">

                                    <!-- Nama Perusahaan -->
                                    <div class="form-group col-md-4">
                                        <label for="id_user"><strong>Nama Vendor <span style="color: red;">*</span></strong></label>
                                        <select name="id_user[]" class="form-control selectpicker" data-live-search="true">
                                            <option value="">Pilih User</option>
                                            <?php foreach ($user_ids as $user) : ?>
                                                <option value="<?= $user['id_user']; ?>|<?= $user['nama_perusahaan']; ?>" <?= set_select('id_user[]', $user['id_user'] . '|' . $user['nama_perusahaan']); ?>>
                                                    <?= $user['nama_perusahaan']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('id_user[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>


                                    <!-- Nama PIC -->
                                    <div class="form-group col-md-4">
                                        <label for="nama_pic"><strong>PIC Vendor <span style="color: red;"></span></strong></label>
                                        <input type="text" name="nama_pic[]" class="form-control" value="<?= set_value('nama_pic[0]'); ?>">
                                        <?= form_error('nama_pic[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <!-- jabatan_pic -->
                                    <div class="form-group col-md-4">
                                        <label for="jabatan_pic"><strong>Jabatan PIC <span style="color: red;">*</span></strong></label>
                                        <input type="text" name="jabatan_pic[]" class="form-control" value="<?= set_value('jabatan_pic[]'); ?>">
                                        <?= form_error('jabatan_pic[]', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <hr>
                            </div> <!-- .form-entry -->


                            <div class="form-row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Save Data</button>
                                    <button type="reset" class="btn btn-secondary">Reset Data</button>
                                </div>
                            </div>
                    </form>
                </div>

                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $('.selectpicker').selectpicker();
                    });

                    $(document).ready(function() {
                        $('.selectpicker').selectpicker();
                    });

                    document.addEventListener("DOMContentLoaded", function() {
                        const nomorSurat = "<?= $nomor_surat; ?>";
                        document.getElementById("nomor_surat").value = nomorSurat;
                    });
                    // JavaScript untuk mengaktifkan/mematikan readonly pada input
                    document.getElementById('edit_nomor_surat').addEventListener('change', function() {
                        var nomorSuratInput = document.getElementById('nomor_surat');
                        if (this.checked) {
                            nomorSuratInput.removeAttribute('readonly');
                        } else {
                            nomorSuratInput.setAttribute('readonly', 'readonly');
                        }
                    });

                    // JS yang menangani  UNTUK GENERATE NOMER YANG MENGHASILKAN 31 = trucking , 32 = Stevedoring dan 24 = tahun otomatis ganti nanti di 2025 dan 0001 adalah nomor urut sisanyadi handle di controller
                    document.addEventListener('DOMContentLoaded', function() {
                        const jenisPekerjaanSelect = document.getElementById('jenis_pekerjaan');
                        const nomorSuratInput = document.getElementById('nomor_surat');

                        // Simulasi mendapatkan nomor urut dari server atau logika untuk menangani urutan
                        let nomorUrut = 1; // Inisialisasi nomor urut awal (sebaiknya diambil dari server)

                        jenisPekerjaanSelect.addEventListener('change', function() {
                            const jenisPekerjaan = jenisPekerjaanSelect.value;
                            const currentYear = new Date().getFullYear().toString().slice(-2); // Mendapatkan dua digit terakhir dari tahun
                            let prefix;

                            // Semua jenis pekerjaan yang berkaitan dengan Trucking memiliki awalan "31"
                            if (jenisPekerjaan === 'Trucking' ||
                                jenisPekerjaan === 'Trucking Domestic KP (Coil)' ||
                                jenisPekerjaan === 'Trucking Dump Truck') {
                                prefix = '31';
                            } else if (jenisPekerjaan === 'Stevedoring') {
                                prefix = '32';
                            } else {
                                prefix = '';
                            }

                            // Ambil nomor surat yang ada, jika ada
                            let nomorSurat = nomorSuratInput.value;
                            if (nomorSurat) {
                                // Ambil bagian akhir dari nomor surat yang sudah ada (misalnya 0001)
                                const nomorUrut = nomorSurat.slice(-4);
                                nomorSurat = `${prefix}${currentYear}${nomorUrut}`;
                            } else {
                                // Jika nomor surat belum ada, gunakan default 0001
                                nomorSurat = `${prefix}${currentYear}0001`;
                            }

                            nomorSuratInput.value = nomorSurat;
                        });
                    });



                    // Fungsi untuk memformat input menjadi Rupiah
                    document.getElementById('tarif_jasa').addEventListener('keyup', function(e) {
                        // Ambil nilai input dan hapus karakter yang bukan angka
                        let input = this.value.replace(/[^,\d]/g, '').toString();

                        // Pisahkan nilai input menjadi bagian desimal dan bagian utamanya
                        let split = input.split(',');
                        let sisa = split[0].length % 3;
                        let rupiah = split[0].substr(0, sisa);
                        let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                        // Gabungkan bagian ribuan dengan titik
                        if (ribuan) {
                            let separator = sisa ? '.' : '';
                            rupiah += separator + ribuan.join('.');
                        }

                        // Gabungkan hasil dengan nilai desimal (jika ada) dan tambahkan "/ TON" di akhir
                        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                        this.value = 'Rp. ' + rupiah + '';
                    });

                    // Fungsi untuk memformat input menjadi Rupiah
                    document.getElementById('harga_jual').addEventListener('keyup', function(e) {
                        // Ambil nilai input dan hapus karakter yang bukan angka
                        let input = this.value.replace(/[^,\d]/g, '').toString();

                        // Pisahkan nilai input menjadi bagian desimal dan bagian utamanya
                        let split = input.split(',');
                        let sisa = split[0].length % 3;
                        let rupiah = split[0].substr(0, sisa);
                        let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                        // Gabungkan bagian ribuan dengan titik
                        if (ribuan) {
                            let separator = sisa ? '.' : '';
                            rupiah += separator + ribuan.join('.');
                        }

                        // Gabungkan hasil dengan nilai desimal (jika ada) dan tambahkan "/ TON" di akhir
                        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                        this.value = 'Rp. ' + rupiah + '';
                    });


                    // Fungsi untuk memformat input field Jumlah unit menjadi ada kata "Unit"
                    document.getElementById('jumlah_unit').addEventListener('keyup', function(e) {
                        // Ambil nilai input dan hapus karakter yang bukan angka
                        let input = this.value.replace(/[^,\d]/g, '').toString();

                        // Pisahkan nilai input menjadi bagian ribuan
                        let sisa = input.length % 3;
                        let satuan = input.substr(0, sisa);
                        let ribuan = input.substr(sisa).match(/\d{3}/gi);

                        // Gabungkan bagian ribuan dengan koma
                        if (ribuan) {
                            let separator = sisa ? ',' : '';
                            satuan += separator + ribuan.join(',');
                        }

                        // Setel nilai input dengan format angka dan kata "Unit"
                        this.value = satuan + ' Unit';
                    });

                    document.querySelector('form').addEventListener('submit', function() {
                        // Gabungkan tarif jasa dan tipe
                        var tarifJasaInputs = document.querySelectorAll('input[name="tarif_jasa[]"]');
                        var hargaJualInputs = document.querySelectorAll('input[name="harga_jual[]"]');
                        var tipeTarifSelects = document.querySelectorAll('select[name="tipe_tarif[]"]');

                        tarifJasaInputs.forEach(function(input, index) {
                            var tipe = tipeTarifSelects[index].value;
                            input.value = input.value + ' ' + tipe; // Gabungkan nilai tarif jasa dengan tipe
                        });

                        hargaJualInputs.forEach(function(input, index) {
                            var tipe = tipeTarifSelects[index].value;
                            input.value = input.value + ' ' + tipe; // Gabungkan nilai harga jual dengan tipe
                        });
                    });


                    // Gabungkan volume dan tipe saat submit form
                    document.querySelector('form').addEventListener('submit', function() {
                        var volumeInputs = document.querySelectorAll('input[name="volume[]"]');
                        var tipeVolumeSelects = document.querySelectorAll('select[name="tipe_volume[]"]');

                        volumeInputs.forEach(function(input, index) {
                            var tipe = tipeVolumeSelects[index].value;
                            input.value = input.value + ' ' + tipe; // Gabungkan nilai input volume dengan tipe
                        });
                    });

                    // JavaScript to show/hide Stevedoring form based on dropdown selection
                    document.getElementById('jenis_pekerjaan').addEventListener('change', function() {
                        var stevedoringForm = document.getElementById('stevedoring-form');
                        if (this.value === 'Stevedoring') {
                            stevedoringForm.style.display = 'block'; // Show form
                        } else {
                            stevedoringForm.style.display = 'none'; // Hide form
                        }
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

                <!-- Bootstrap-Alert wanrning required -->
                <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <?php endif; ?>