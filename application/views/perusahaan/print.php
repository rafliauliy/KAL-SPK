<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Perintah Kerja</title>
    <style>
        @page {
            size: A4;
            margin: 10mm;
            /* Menghilangkan margin halaman */
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            margin: 0;
            padding: 0;
            line-height: 1.1;
            width: 100%;
            height: 100%;
            position: relative;
            margin-top: -30px;
            /* Menambahkan posisi relatif untuk kontrol posisioning absolut */
        }

        .container {
            width: 100%;
            margin: 0 auto;
            /* Center the container horizontally */
            padding: 0 5px;
            /* Add some padding on the sides */
            box-sizing: border-box;
            margin-top: 60px;
            /* Space from the top, adjust as needed */
            margin-bottom: 40px;
            /* Space at the bottom */
            max-width: 800px;
            /* Set a maximum width for the container */
        }

        .data {
            margin-left: -3px;
            line-height: 1.0;

        }

        .pembayaran {
            margin-left: -4px;
            margin-top: -15px;
            text-align: justify;
        }

        .pembayaran p {
            text-indent: -15px;
            /* Mengurangi indentasi pada baris pertama */
            padding-left: 30px;
            /* Menambahkan padding pada semua baris */
        }



        .syarat {
            margin-left: -5px;
            margin-top: -15px;
            text-align: justify;
            line-height: 1.1;

        }

        .syarat p {
            text-indent: -17px;
            /* Mengurangi indentasi pada baris pertama */
            padding-left: 30px;
            /* Menambahkan padding pada semua baris */
            line-height: 1.1;
        }


        .header {
            position: absolute;
            /* Menggunakan posisi absolut */
            top: 0;
            left: 0;
            right: 0;
            text-align: center;
            padding: 15px;
            margin-top: 50px;

        }

        .header img {
            max-width: 200px;
            margin: 10px;
            margin-right: 550px;
            margin-top: -50px;

        }

        .header h1 {
            margin: 0;
            font-size: 14px;
            text-transform: uppercase;
            text-decoration: underline;
            margin-top: -10px;
        }

        .header p {
            margin-top: 5px;
        }

        .content {
            margin-top: 60px;
            /* Mengatur jarak dari header */
            padding: 0 15px;
            /* Menambahkan padding kiri dan kanan */
        }

        .content p {
            margin: 6px 0;
        }

        .content .data {
            margin-top: 10px;
        }

        .content .data table {
            width: 100%;
            border-collapse: collapse;
        }

        .content .data td {
            padding: 3px;
            vertical-align: top;
        }

        .signature {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            /* Aligns items to the top */
            margin: 0px;
        }

        .pemberi,
        .penerima {
            width: 45%;
            text-align: center;
        }

        .qr-code {
            margin: 5px auto;
            display: block;
        }

        .pemberi p,
        .penerima p {
            margin: 0px 0;
        }


        .footer {
            position: absolute;
            margin-top: 40px;
            margin-left: -25px;
        }

        .footer p {
            margin: 2px 0;
            /* Mengurangi margin atas dan bawah untuk teks */
            line-height: 1.2;
            /* Menyesuaikan jarak antar baris */
        }

        .digital-font {
            font-family: 'Roboto Mono', monospace;
            font-size: 24px;
            /* Sesuaikan ukuran font */
        }
    </style>

    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="header">
            <img src="<?= base_url('assets/img/multimodal.png') ?>" alt="Logo KAL" />
            <img src="<?= base_url('assets/img/jadi.png') ?>" alt="Logo iso" style="margin-right: -500px;  max-width: 220px; margin-top: -55px;" />
            <h1 style="font-size: 18px;">SURAT PERINTAH KERJA</h1>
            <p>No.<?= $tbl_spk['nomor_surat']; ?></p>
        </div>

        <div class="content">
            <p>Kepada Yth,</p>
            <p><strong><?= $tbl_spk['nama_perusahaan']; ?></strong></p>
            <p>Di <span style="text-decoration: underline;">Tempat</span></p>

            <!-- Garis Header -->
            <hr style="border: 0; border-top: 2px solid #000; width: 100%; margin: 10px 0 10px -2px;">


            <p>Dengan Hormat,</p>
            <p>Sehubungan dengan adanya rencana pekerjaan di PT. Krakatau Argo Logistics (Pemberi Kerja), maka dengan ini kami menugaskan Perusahaan bapak/ibu untuk melaksanakan pekerjaan, Sebagai berikut : </p>

            <div class="data" style="margin-top: 5px;">
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="width: 11%; vertical-align: top;">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                <span style="width: 150px;">No Cs</span>
                                <span style="width: 10px; text-align: center; margin-left: 70px;">:</span>
                                <span style="flex-grow: 1; text-align: left; padding-left: 3px;"><?= $tbl_spk['nomor_cs']; ?></span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                <span style="width: 150px;">Pekerjaan</span>
                                <span style="width: 10px; text-align: center; margin-left: 49px;">:</span>
                                <span style="flex-grow: 1; text-align: left; padding-left: 5px;"><?= $tbl_spk['keterangan_pekerjaan']; ?></span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                <span style="width: 150px;">Pemilik Barang</span>
                                <span style="width: 10px; text-align: center; margin-left: 22px;">:</span>
                                <span style="flex-grow: 1; text-align: left; padding-left: 5px;"><?= $tbl_spk['customer']; ?></span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                <span style="width: 150px;">Rencana Kerja</span>
                                <span style="width: 10px; text-align: center; margin-left: 23px;">:</span>
                                <span style="flex-grow: 1; text-align: left; padding-left: 2px;">
                                    <?php
                                    // Mendapatkan tanggal awal dari database
                                    $tanggal_awal = strtotime($tbl_spk['rencana_kerja']);

                                    // Singkatan bulan
                                    $bulanSingkat = [
                                        'Jan' => 'Jan',
                                        'Feb' => 'Feb',
                                        'Mar' => 'Mar',
                                        'Apr' => 'Apr',
                                        'May' => 'May',
                                        'Jun' => 'Jun',
                                        'Jul' => 'Jul',
                                        'Aug' => 'Aug',
                                        'Sep' => 'Sep',
                                        'Oct' => 'Oct',
                                        'Nov' => 'Nov',
                                        'Dec' => 'Dec'
                                    ];

                                    // Format tanggal awal menjadi "23 Sep 2024" (untuk kasus jika akhir kosong)
                                    $formattedDateAwal = date('d ', $tanggal_awal) . $bulanSingkat[date('M', $tanggal_awal)] . ' ' . date('Y', $tanggal_awal);
                                    // Format hanya hari dari tanggal awal (untuk kasus jika ada akhir)
                                    $formattedDayAwal = date('d', $tanggal_awal);
                                    ?>

                                    <?php
                                    // Cek apakah rencana_kerja_akhir kosong
                                    if (!empty($tbl_spk['rencana_kerja_akhir'])) {
                                        // Mendapatkan tanggal akhir dari database
                                        $tanggal_akhir = strtotime($tbl_spk['rencana_kerja_akhir']);

                                        // Format tanggal akhir menjadi "25 Sep 2024"
                                        $formattedDateAkhir = date('d ', $tanggal_akhir) . $bulanSingkat[date('M', $tanggal_akhir)] . ' ' . date('Y', $tanggal_akhir);

                                        // Tampilkan tanggal awal hanya hari dan tanggal akhir lengkap
                                        echo $formattedDayAwal . ' s/d ' . $formattedDateAkhir;
                                    } else {
                                        // Jika rencana_kerja_akhir kosong, tampilkan "23 Sep 2024 s/d selesai"
                                        echo $formattedDateAwal . ' s/d selesai';
                                    }
                                    ?>
                                </span>
                            </div>

                        <td style="width: 8%; vertical-align: top;">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 5px; ">
                                <span style="width: 150px;">Nama Barang</span>
                                <span style="width: 10px; text-align: center; margin-left: 20px;">:</span>
                                <span style="flex-grow: 1; text-align: left; padding-left: 5px;"><?= $tbl_spk['produk']; ?></span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                <span style="width: 150px;">Volume</span>
                                <span style="width: 10px; text-align: center; margin-left: 53px;">:</span>
                                <span style="flex-grow: 1; text-align: left; padding-left: 5px;"><?= $tbl_spk['volume']; ?></span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                <span style="width: 150px;">Jenis Angkutan</span>
                                <span style="width: 10px; text-align: center; margin-left: 12px;">:</span>
                                <span style="flex-grow: 1; text-align: left; padding-left: 5px;"><?= $tbl_spk['jenis_angkutan']; ?></span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                <span style="width: 150px;">Jumlah Unit</span>
                                <span style="width: 10px; text-align: center; margin-left: 31px;">:</span>
                                <span style="flex-grow: 1; text-align: left; padding-left: 5px;"><?= $tbl_spk['jumlah_unit']; ?></span>
                            </div>
                        </td>
                        <td style="width: 10%; vertical-align: top;">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                <span style="width: 150px;">Muat</span>
                                <span style="width: 10px; text-align: center; margin-left: 39px;">:</span>
                                <span style="flex-grow: 1; text-align: left; padding-left: 5px;"><?= $tbl_spk['asal_muat']; ?></span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                <span style="width: 150px;">Bongkar</span>
                                <span style="width: 10px; text-align: center; margin-left: 21px;">:</span>
                                <span style="flex-grow: 1; text-align: left; padding-left: 5px;"><?= $tbl_spk['tujuan_bongkar']; ?></span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                <span style="width: 150px;">Tarif Jasa</span>
                                <span style="width: 10px; text-align: center; margin-left: 13px;">:</span>
                                <span style="flex-grow: 1; text-align: left; padding-left: 5px;"><?= $tbl_spk['tarif_jasa']; ?></span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                <span style="width: 150px;">Mincharge</span>
                                <span style="width: 10px; text-align: center; margin-left: 10px;">:</span>
                                <span style="flex-grow: 1; text-align: left; padding-left: 5px;"><?= $tbl_spk['mincharge']; ?></span>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>


            <h2 style="font-size: 11px; margin-top: 0px;">TARIF JASA : </h2>
            <div class="tarif_jasa_tambahan" style="margin-top: -20px; margin-left: -20px;">
                <ul>
                    <?php
                    $items = explode("\n", $tbl_spk['tarif_jasa_tambahan']);
                    foreach ($items as $item) {
                        echo "<li>" . htmlspecialchars($item) . "</li>";
                    }
                    ?>
                </ul>
            </div>

            <h3 style="font-size: 11px; margin-top: -5px;">PEMBAYARAN</h3>
            <div class="pembayaran">
                <p>1. Realisasi pembayaran <?= $tbl_spk['termin']; ?> hari setelah invoice diterima dengan lengkap, valid, dan disetujui oleh Bagian Keuangan PT. KAL</p>
                <p>2. Realisasi pembayaran memperhatikan Laporan Hasil Pekerjaan (LHP) yang diterbitkan oleh Pemberi Kerja (TL Logistics Operational) PT.Krakatau Argo Logistics. Tagihan dapat disampaikan maksimal 6 bulan setelah pekerjaan selesai dilaksanakan.</p>
            </div>
            <h3 style="font-size: 11px; margin-top: 10px;">SYARAT-SYARAT</h3>
            <div class="syarat">
                <p>1. Lingkup pekerjaan di atas harus dilaksanakan sesuai dengan rencana dan spesifikasi teknis yang diberikan serta harus sesuai dengan petunjuk baik lisan maupun tulisan dari Pihak Pemberi Kerja (TL Logistics Operational).</p>
                <p>2. Jumlah / Type Unit disesuaikan dengan kebutuhan di lapangan.</p>
                <p>3. Peralatan / unit yang digunakan berikut operator harus dilengkapi dengan Surat Ijin Layak Operasi dari otoritas yang berwenang (Dinas Tenaga Kerja dan Dinas Perhubungan) dan SIM/SIO.</p>
                <p>4. Unit yang beroperasi harus dilengkapi dengan Rantai / Lashing, Double Terpal, tambang dengan kondisi yang layak pakai, serta upaya dalam pencegahan kebocoran yang mengakibatkan karat pada product.</p>
                <p>5. Semua Tenaga Kerja (Operator / Driver) yang bekerja harus menggunakan APD (Safety Helmet, Masker, Rompi, Footstrap, Seragam Lengan Panjang, Kacamata, Sarung Tangan dan Safety Shoes), mematuhi Good Driver, 10 SIR, 6 tindakan utama keselamatan, dan 7 Safety model.</p>
                <p>6. Pihak penerima kerja mematuhi dan menaati peraturan yang berlaku di area kerja pemberi kerja dan kawasan pemuatan dan kawasan bongkar.</p>
                <p>7. Resiko atas Cargo seperti terjadi kehilangan cargo akan dikenakan 100% dari total kehilangan, untuk penyesuaian cargo, kelebihan sisa barang akan dikenakan denda maksimal 5% dari invoice yang diterima.</p>
                <p>8. Jika terjadi kerusakan pada unit yang operasional, maka penerima kerja wajib mengganti alat tersebut dengan type yang sama dan Mekanik Standby 24 jam.</p>
                <p>9. Pihak Penerima Kerja tidak diperkenankan mengalihkan pekerjaan kepada Pihak Lain (harus dikerjakan sendiri) dalam kondisi apapun tanpa ada izin dari Pihak Pemberi Kerja.</p>
                <p>10. Resiko atas Tenaga Kerja menjadi tanggung jawab Pihak Penerima Kerja.</p>
                <p>11. Harga yang telah disepakati tersebut di atas adalah merupakan harga pasti dan tanpa ada kenaikan harga.</p>
            </div>
        </div>
        <p style="margin-top: -3px; margin-left: 15px;">Demikian Penunjukan ini disampaikan untuk dapat dilaksanakan sesuai dengan ketentuan yang berlaku, Atas
            perhatian dan kerja sama yang baik kami mengucapkan terimakasih.</p>

        <div class="signature">
            <div class="pemberi" style="text-align: center;">
                <p style="margin-bottom: 5px;"><strong>Cilegon, <?= date('d F Y', strtotime($tbl_spk['tgl_spk'])); ?></strong></p>
                <p style="margin-bottom: 0px;">Pemberi Kerja</p>
                <p style="margin-bottom: 0px;"><strong>PT. KRAKATAU ARGO LOGISTICS</strong></p>



                <?php if ($tbl_spk['status_approval'] === 'approved'): ?>
                    <!-- Signature image -->
                    <img src="<?= base_url('assets/img/ttd.png') ?>" alt="Logo KAL" style="width:180px; margin-bottom: -40px; margin-top: -30px" />

                    <?php
                    // Function to convert month number to Roman numeral
                    function getRomanMonth($monthNumber)
                    {
                        $romanMonths = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
                        return $romanMonths[$monthNumber - 1]; // Subtracting 1 as array index starts from 0
                    }

                    // Extract year and month
                    $year = date('y', strtotime($tbl_spk['created_at'])); // Last two digits of the year
                    $month = getRomanMonth(date('m', strtotime($tbl_spk['created_at']))); // Month in Roman numerals
                    ?>

                    <p class="digital-font" style="margin-bottom: 0px; font-size: 11px; margin-top: 2px;">
                        <?php
                        $nomor_cs = $tbl_spk['nomor_cs'];

                        // Menghapus "CS" dan "-"
                        $nomor_cs = str_replace(['CS', '-'], '', $nomor_cs);
                        ?>
                        <?= $year . $month . $tbl_spk['nomor_surat'] . $nomor_cs; ?>
                    </p>
                <?php else: ?>
                    <p style="color: red; margin-bottom: 0px;">The document has not been approved yet.</p>
                <?php endif; ?>

                <?php if ($tbl_spk['status_verifikasi'] === 'verified' && isset($tbl_spk['nomor_uniq'])): ?>
                    <!-- Menampilkan nomor unik yang sudah ada di database -->
                    <p class="digital-font" style="margin-top: -1px; font-size: 11px; margin-right: 80px; ">
                        <?= $tbl_spk['nomor_uniq']; ?>
                    </p>
                <?php endif; ?>

                <p style="margin-top: 5px; margin-bottom: 5px; text-decoration: underline;"><strong><?= $tbl_spk['approved_by']; ?></strong></p>
                <p style="margin-bottom: 50px;">Dept Head Finance and Procurement</p>
            </div>

            <div class="penerima" style="margin-left: 390px; margin-top: -228px;">
                <p>Penerima Kerja</p>
                <p><strong><?= $tbl_spk['nama_perusahaan']; ?></strong></p>
                <p style="margin-top: 115px; text-decoration: underline;"><strong><?= $tbl_spk['nama_pic']; ?></strong></p>
                <p style="margin-top: 5px;"><?= $tbl_spk['jabatan_pic']; ?></p>
            </div>
        </div>

        <div class="footer">
            <p><strong style="color: #1E90FF;">PT. KRAKATAU ARGO LOGISTICS</strong></p>
            <p>Main Office: Jl. S Parman Km 13, Cigading, Kawasan PT. KBS, Cilegon - Banten (42445)</p>
            <p>Representative Office: Jl. Afrika No. 02, Kawasan PT. Krakatau Posco, Kel. Samangraya Kec. Citangkil, Cilegon - Banten (42443)</p>
        </div>
    </div>
</body>

</html>