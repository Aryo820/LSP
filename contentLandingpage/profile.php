<?php
include 'config/koneksi.php';

$queryData = mysqli_query($config, "SELECT * FROM user ORDER BY id ASC");
$rowUser = mysqli_fetch_assoc($queryData);

$queryProfil = mysqli_query($config, "SELECT * FROM profil ORDER BY id ASC");
$rowProfil = mysqli_fetch_assoc($queryProfil);

// Handle delete qualification
if (isset($_GET['delete_kualifikasi'])) {
    $tableCheck = mysqli_query($config, "SHOW TABLES LIKE 'kualifikasi_pendidikan'");
    if ($tableCheck && mysqli_num_rows($tableCheck) > 0) {
        $id = (int)$_GET['delete_kualifikasi'];
        $deleteQuery = mysqli_query($config, "DELETE FROM kualifikasi_pendidikan WHERE id = $id");
        if ($deleteQuery) {
            header("Location: ?page=profile");
            exit;
        }
    }
}


// Fetch qualifications - check if table exists first
$tableExists = mysqli_query($config, "SHOW TABLES LIKE 'kualifikasi_pendidikan'");
if ($tableExists && mysqli_num_rows($tableExists) > 0) {
    $queryKualifikasi = mysqli_query($config, "SELECT * FROM kualifikasi_pendidikan ORDER BY id DESC");
} else {
    $queryKualifikasi = false;
}


//untuk menyimpan data dari formulir web ke database.
// step:
// Memeriksa apakah ada data yang dikirimkan dari form dengan nama tombol 'simpan'.
// Ini biasanya terjadi saat pengguna mengklik tombol 'submit' pada formulir HTML.
if (isset($_POST['simpan'])) {
  // Jika tombol 'simpan' ditekan, maka kode di bawah ini akan dijalankan.

  // Mengambil data yang dikirimkan melalui metode POST dari formulir HTML.
  // $_POST adalah array superglobal di PHP yang berisi data yang dikirimkan
  // dari formulir menggunakan metode POST.

  // Mengambil nilai dari input 'name' dan menyimpannya di variabel $name.
$nama             = $_POST['nama'];
  $no_ktp           = $_POST['no_ktp'];
  $jenis_kelamin    = $_POST['jenis_kelamin'];
  $tempat_lahir     = $_POST['tempat_lahir'];
  $tanggal_lahir    = $_POST['tanggal_lahir'];
  $alamat           = $_POST['alamat'];
  $kebangsaan       = $_POST['kebangsaan'];
  $provinsi         = $_POST['provinsi'];
  $kota             = $_POST['kota'];
  $kode_pos         = $_POST['kode_pos'];
  $no_telp_rumah    = $_POST['no_telp_rumah'];
  $no_telp_kantor   = $_POST['no_telp_kantor'];
  $no_hp            = $_POST['no_hp'];

  // Membuat query SQL untuk memasukkan data ke dalam tabel 'contacts'.
  // 'INSERT INTO contacts' berarti kita ingin menambahkan baris baru ke tabel bernama 'contacts'.
  // '(name, email, subject, message)' adalah daftar kolom di tabel tempat data akan dimasukkan.
  // "VALUES ('$name','$email','$subject','$message')" adalah nilai-nilai yang akan dimasukkan
  // ke masing-masing kolom sesuai urutannya.
  // '$config' diasumsikan sebagai variabel koneksi ke database yang sudah dibuat sebelumnya.
  $query = mysqli_query($config, "INSERT INTO profil (
              nama, no_ktp, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, kebangsaan,
              provinsi, kota, kode_pos, no_telp_rumah, no_telp_kantor, no_hp
            ) VALUES (
              '$nama', '$no_ktp', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$kebangsaan',
              '$provinsi', '$kota', '$kode_pos', '$no_telp_rumah', '$no_telp_kantor', '$no_hp'
            )");

  // Memeriksa apakah proses query (penyimpanan data ke database) berhasil atau tidak.
 if ($query) {
  // Simpan kualifikasi pendidikan jika ada data
  $tableCheck = mysqli_query($config, "SHOW TABLES LIKE 'kualifikasi_pendidikan'");
  if ($tableCheck && mysqli_num_rows($tableCheck) > 0) {
      $jenjang = isset($_POST['jenjang_pendidikan']) ? mysqli_real_escape_string($config, trim($_POST['jenjang_pendidikan'])) : '';
      $instansi = isset($_POST['instansi_pendidikan']) ? mysqli_real_escape_string($config, trim($_POST['instansi_pendidikan'])) : '';
      $tahun = isset($_POST['tahun_lulus']) ? mysqli_real_escape_string($config, trim($_POST['tahun_lulus'])) : '';
      
      // Jika ada data kualifikasi yang diisi, simpan
      if (!empty($jenjang) && !empty($instansi) && !empty($tahun)) {
          $insertQual = mysqli_query($config, "INSERT INTO kualifikasi_pendidikan (jenjang_pendidikan, instansi, tahun_lulus) 
                                              VALUES ('$jenjang', '$instansi', '$tahun')");
      }
  }
  
  ob_clean(); // hapus output buffer sebelumnya
  header("Location: ?page=profile");
  exit;
}
}

// Pastikan koneksi database sudah ada
// Contoh: $config = mysqli_connect("localhost", "root", "", "nama_database");

// Ambil semua data pekerjaan
$queryPekerjaan = mysqli_query($config, "SELECT * FROM pekerjaan ORDER BY id ASC");
$rowPekerjaan = mysqli_fetch_assoc($queryPekerjaan);

// Handle delete pekerjaan
if (isset($_GET['delete_pekerjaan'])) {
    $tableCheck = mysqli_query($config, "SHOW TABLES LIKE 'pekerjaan'");
    if ($tableCheck && mysqli_num_rows($tableCheck) > 0) {
        $id = (int)$_GET['delete_pekerjaan'];
        $deleteQuery = mysqli_query($config, "DELETE FROM pekerjaan WHERE id = $id");
        if ($deleteQuery) {
            header("Location: ?page=pekerjaan");
            exit;
        }
    }
}

// Cek apakah tabel 'pekerjaan' ada sebelum ambil data
$tableExists = mysqli_query($config, "SHOW TABLES LIKE 'pekerjaan'");
if ($tableExists && mysqli_num_rows($tableExists) > 0) {
    $queryPekerjaan = mysqli_query($config, "SELECT * FROM pekerjaan ORDER BY id DESC");
} else {
    $queryPekerjaan = false;
}

// Proses simpan data dari form
if (isset($_POST['simpan'])) {
    $nama_institusi   = $_POST['nama_institusi'];
    $bidang_pekerjaan = $_POST['bidang_pekerjaan'];
    $jabatan          = $_POST['jabatan'];
    $alamat_kantor    = $_POST['alamat_kantor'];
    $kodepos          = $_POST['kodepos'];
    $email            = $_POST['email'];

    $query = mysqli_query($config, "INSERT INTO pekerjaan (
                    nama_institusi, bidang_pekerjaan, jabatan, alamat_kantor, kodepos, email
                ) VALUES (
                    '$nama_institusi', '$bidang_pekerjaan', '$jabatan', '$alamat_kantor', '$kodepos', '$email'
                )");

    if ($query) {
        ob_clean(); // hapus buffer output
        header("Location: ?page=pekerjaan");
        exit;
    }
}
?>


<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header">
            <h5 class="mb-0" style="text-align: center;">UPDATE DETAIL PROFILE USER</h5>
        </div>
        <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h6 class="mb-4 text-muted">DATA PRIBADI</h6>
                    </div>
                </div>
<form action="" method="post">
                <!-- Email Field -->
                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input 
                        type="email" 
                        class="form-control" 
                        id="email" 
                        name="email" 
                        value="<?= isset($rowUser['email']) ? $rowUser['email'] : '' ?>" 
                        disabled
                        style="background-color: #e9ecef;"
                    >
                </div>

                <!-- Nama Field -->
                <div class="form-group mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="nama" 
                        name="nama" 
                        value="<?= isset($rowUser['username']) ? $rowUser['username'] : '' ?>"
                        placeholder="Masukkan Nama Lengkap"
                        required
                    >
                </div>

                <!-- No KTP Field -->
                <div class="form-group mb-3">
                    <label for="no_ktp" class="form-label">No KTP</label>
                    <input 
                        type="text" 
                        class="form-control <?= isset($error_nik) ? 'is-invalid' : '' ?>" 
                        id="no_ktp" 
                        name="no_ktp" 
                        value="<?= isset($rowUser['no_ktp']) ? $rowUser['no_ktp'] : '' ?>"
                        placeholder="Masukkan No KTP"
                        maxlength="16"
                        oninput="validateNIK(this)"
                        required
                    >
                    <div class="invalid-feedback" id="nikError" style="<?= isset($error_nik) ? 'display: block;' : 'display: none;' ?>">
                        *nik harus 16 digit
                    </div>
                </div>

                <div class="row">
    <div class="col-md-6">
        <!-- Tempat Lahir Field -->
        <div class="form-group mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input 
                type="text" 
                class="form-control" 
                id="tempat_lahir" 
                name="tempat_lahir" 
                value="<?= isset($rowUser['tempat_lahir']) ? $rowUser['tempat_lahir'] : '' ?>"
                placeholder="Masukkan Tempat Lahir"
                required
            >
        </div>
    </div>
    <div class="col-md-6">
        <!-- Tanggal Lahir Field -->
        <div class="form-group mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <div class="input-group">
                <input 
                    type="date" 
                    class="form-control" 
                    id="tanggal_lahir" 
                    name="tanggal_lahir" 
                    value="<?= isset($rowUser['tanggal_lahir']) ? date('Y-m-d', strtotime($rowUser['tanggal_lahir'])) : '' ?>"
                    required
                >
                <span class="input-group-text">
                    <i class="fe fe-calendar"></i>
                </span>
            </div>
        </div>
    </div>
</div>

                <!-- Jenis Kelamin Field -->
                <div class="form-group mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <div class="d-flex">
                        <div class="form-check me-4">
                            <input 
                                class="form-check-input" 
                                type="radio" 
                                name="jenis_kelamin" 
                                id="laki_laki" 
                                value="Laki-Laki"
                                <?= (!isset($rowUser['jenis_kelamin']) || isset($rowUser['jenis_kelamin']) && $rowUser['jenis_kelamin'] == 'Laki-Laki') ? 'checked' : '' ?>
                                required
                            >
                            <label class="form-check-label" for="laki_laki">
                                Laki - Laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input 
                                class="form-check-input" 
                                type="radio" 
                                name="jenis_kelamin" 
                                id="perempuan" 
                                value="Perempuan"
                                <?= (isset($rowUser['jenis_kelamin']) && $rowUser['jenis_kelamin'] == 'Perempuan') ? 'checked' : '' ?>
                            >
                            <label class="form-check-label" for="perempuan">
                                Perempuan
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Kebangsaan Field -->
                <div class="form-group mb-3">
                    <label for="kebangsaan" class="form-label">Kebangsaan</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="kebangsaan" 
                        name="kebangsaan" 
                        value="<?= isset($rowUser['kebangsaan']) ? $rowUser['kebangsaan'] : '' ?>"
                        placeholder="Masukkan Kebangsaan"
                        required
                    >
                </div>

                <!-- Alamat Field -->
                <div class="form-group mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="alamat" 
                        name="alamat" 
                        value="<?= isset($rowUser['alamat']) ? $rowUser['alamat'] : '' ?>"
                        placeholder="Masukkan Alamat"
                        required
                    >
                </div>

                <!-- Provinsi & Kota -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="provinsi" class="form-label">Provinsi</label>
                            <select class="form-control" id="provinsi" name="provinsi" required>
                                <option value="" disabled selected>Pilih Provinsi</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="kota" class="form-label">Kota</label>
                            <select class="form-control" id="kota" name="kota" required>
                                <option value="" disabled selected>Pilih Kota/Kabupaten</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Kode Pos Field -->
                <div class="form-group mb-3">
                    <label for="kode_pos" class="form-label">Kode Pos</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="kode_pos" 
                        name="kode_pos" 
                        value="<?= isset($rowUser['kode_pos']) ? $rowUser['kode_pos'] : '' ?>"
                        placeholder="Masukkan Kode Pos"
                        required
                    >
                </div>

                <!-- No Telp Rumah & Kantor -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="no_telp_rumah" class="form-label">No Telp Rumah</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="no_telp_rumah" 
                            name="no_telp_rumah" 
                            value="<?= isset($rowUser['no_telp_rumah']) ? $rowUser['no_telp_rumah'] : '' ?>"
                            placeholder="Masukkan No Telp Rumah"
                        >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="no_telp_kantor" class="form-label">No Telp Kantor</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="no_telp_kantor" 
                            name="no_telp_kantor" 
                            value="<?= isset($rowUser['no_telp_kantor']) ? $rowUser['no_telp_kantor'] : '' ?>"
                            placeholder="Masukkan No Telp Kantor"
                        >
                    </div>
                </div>
            </div>

            <!-- No HP Field -->
                <div class="form-group mb-3">
                    <label for="no_hp" class="form-label">No HP</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="no_hp" 
                        name="no_hp" 
                        value="<?= isset($rowUser['no_hp']) ? $rowUser['no_hp'] : '' ?>"
                        placeholder="Masukkan No HP"
                        required
                    >
                </div>

                <!-- Tanda Tangan -->
            <div class="form-group mb-3">
                <label class="form-label">Tanda Tangan</label>
                <div id="signature-wrapper" style="border:1px solid #3aa; border-radius:4px; padding:8px;">
                    <canvas id="signature-canvas" style="width:100%; height:260px; touch-action:none; cursor: crosshair; display:block; background:#fff;"></canvas>
                </div>

                <div class="mt-2 d-flex gap-2">
                    <button type="button" id="sig-clear" class="btn btn-danger">Clear</button>
                    <button type="button" id="sig-save" class="btn btn-primary">Save as PNG</button>
                </div>

                <!-- opsional: kirim base64 via form -->
                <input type="hidden" id="signature_data" name="signature_data">
                <br>
                <hr style="height: 5px;">
            </div>

        <!-- DATA PEKERJAAN -->
            <div class="row">
                <div class="col-12">
                    <h6 class="mb-4 text-muted">DATA PEKERJAAN</h6>
                </div>
            </div>

            <!-- Nama Institusi / Perusahaan -->
            <div class="form-group mb-3">
                <label for="nama_institusi" class="form-label">Nama Institusi / Perusahaan</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="nama_institusi" 
                    name="nama_institusi" 
                    value="<?= isset($rowUser['nama_institusi']) ? $rowUser['nama_institusi'] : '' ?>"
                    placeholder="Masukkan Nama Institusi / Perusahaan"
                >
            </div>

            <!-- Bidang Pekerjaan -->
            <div class="form-group mb-3">
                <label for="bidang_pekerjaan" class="form-label">Bidang Pekerjaan</label>
                <select class="form-control" id="bidang_pekerjaan" name="bidang_pekerjaan">
                    <?php $optBidang = ['Guru','Teknologi Informasi','Kesehatan','Manufaktur','Keuangan','Pemerintahan','Lainnya']; ?>
                    <option value="" disabled <?= empty($rowUser['bidang_pekerjaan'] ?? '') ? 'selected' : '' ?>>Pilih Bidang</option>
                    <?php foreach ($optBidang as $b): ?>
                        <option value="<?= $b ?>" <?= (isset($rowUser['bidang_pekerjaan']) && strtolower($rowUser['bidang_pekerjaan']) === strtolower($b)) ? 'selected' : '' ?>><?= $b ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Jabatan -->
            <div class="form-group mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="jabatan" 
                    name="jabatan" 
                    value="<?= isset($rowUser['jabatan']) ? $rowUser['jabatan'] : '' ?>"
                    placeholder="Masukkan Jabatan"
                >
            </div>

            <!-- Alamat Kantor -->
            <div class="form-group mb-3">
                <label for="alamat_kantor" class="form-label">Alamat Kantor</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="alamat_kantor" 
                    name="alamat_kantor" 
                    value="<?= isset($rowUser['alamat_kantor']) ? $rowUser['alamat_kantor'] : '' ?>"
                    placeholder="Masukkan Alamat Kantor"
                >
            </div>

            <!-- Kodepos Kantor -->
            <div class="form-group mb-3">
                <label for="kodepos_kantor" class="form-label">Kodepos</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="kodepos_kantor" 
                    name="kodepos_kantor" 
                    value="<?= isset($rowUser['kodepos_kantor']) ? $rowUser['kodepos_kantor'] : '' ?>"
                    placeholder="Masukkan Kodepos Kantor"
                >
            </div>

            <!-- Email Pekerjaan (opsional) -->
            <div class="form-group mb-3">
                <label for="email_pekerjaan" class="form-label">Email</label>
                <input 
                    type="email" 
                    class="form-control" 
                    id="email_pekerjaan" 
                    name="email_pekerjaan" 
                    value="<?= isset($rowUser['email_pekerjaan']) ? $rowUser['email_pekerjaan'] : '' ?>"
                    placeholder="Masukkan Email Kantor / Pekerjaan"
                >
                <br>
                <hr style="height: 5px;">
            </div>

            <!-- DATA ASESOR -->
            <div class="row">
                <div class="col-12">
                    <h6 class="mb-4 text-muted">DATA ASESOR</h6>
                </div>
            </div>

            <!-- No Registrasi -->
            <div class="form-group mb-3">
                <label for="no_registrasi" class="form-label">No Registrasi</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="no_registrasi" 
                    name="no_registrasi" 
                    value="<?= isset($rowUser['no_registrasi']) ? $rowUser['no_registrasi'] : '' ?>" 
                    placeholder="Masukkan No Registrasi"
                >
            </div>

            <!-- No Sertifikat -->
            <div class="form-group mb-3">
                <label for="no_sertifikat" class="form-label">No Sertifikat</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="no_sertifikat" 
                    name="no_sertifikat" 
                    value="<?= isset($rowUser['no_sertifikat']) ? $rowUser['no_sertifikat'] : '' ?>" 
                    placeholder="Masukkan No Sertifikat"
                >
            </div>

            <!-- No Blanko -->
            <div class="form-group mb-3">
                <label for="no_blanko" class="form-label">No Blanko</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="no_blanko" 
                    name="no_blanko" 
                    value="<?= isset($rowUser['no_blanko']) ? $rowUser['no_blanko'] : '' ?>" 
                    placeholder="Masukkan No Blanko"
                >
            </div>

            <!-- Tgl Sertifikat -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="tgl_sertifikat" class="form-label">Tgl Sertifikat</label>
                        <div class="input-group">
                            <input 
                                type="date" 
                                class="form-control" 
                                id="tgl_sertifikat" 
                                name="tgl_sertifikat" 
                                value="<?= isset($rowUser['tgl_sertifikat']) && $rowUser['tgl_sertifikat'] ? date('Y-m-d', strtotime($rowUser['tgl_sertifikat'])) : '' ?>"
                            >
                            <span class="input-group-text"><i class="fe fe-calendar"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="tgl_expired_sertifikat" class="form-label">Tgl Expired Sertifikat</label>
                        <div class="input-group">
                            <input 
                                type="date" 
                                class="form-control" 
                                id="tgl_expired_sertifikat" 
                                name="tgl_expired_sertifikat" 
                                value="<?= isset($rowUser['tgl_expired_sertifikat']) && $rowUser['tgl_expired_sertifikat'] ? date('Y-m-d', strtotime($rowUser['tgl_expired_sertifikat'])) : '' ?>"
                            >
                            <span class="input-group-text"><i class="fe fe-calendar"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <hr style="height: 5px;">

        <!-- KUALIFIKASI PENDIDIKAN -->
            <div class="row">
                <div class="col-12">
                    <h6 class="mb-4 text-muted">KUALIFIKASI PENDIDIKAN</h6>
                </div>
            </div>

            <!-- Jenjang Pendidikan -->
            <div class="form-group mb-3">
                <label for="jenjang_pendidikan" class="form-label">Jenjang Pendidikan</label>
                <select class="form-control" id="jenjang_pendidikan" name="jenjang_pendidikan" required>
                    <?php
                        $optJenjang = ['SD','SMP','SMA/SMK','D1','D2','D3','D4','S1','S2','S3'];
                        $savedJenjang = isset($_POST['jenjang_pendidikan']) ? $_POST['jenjang_pendidikan'] : '';
                    ?>
                    <option value="" disabled selected>Pilih Jenjang Pendidikan</option>
                    <?php foreach ($optJenjang as $j): ?>
                        <option value="<?= $j ?>" <?= ($savedJenjang === $j) ? 'selected' : '' ?>><?= $j ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <!-- Instansi -->
                    <div class="form-group mb-3">
                        <label for="instansi_pendidikan" class="form-label">Instansi</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="instansi_pendidikan" 
                            name="instansi_pendidikan" 
                            value="<?= isset($_POST['instansi_pendidikan']) ? htmlspecialchars($_POST['instansi_pendidikan']) : '' ?>" 
                            placeholder="Masukkan Nama Instansi"
                            required
                        >
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Tahun Lulus -->
                    <div class="form-group mb-3">
                        <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="tahun_lulus" 
                            name="tahun_lulus" 
                            value="<?= isset($_POST['tahun_lulus']) ? htmlspecialchars($_POST['tahun_lulus']) : '' ?>" 
                            placeholder="Masukkan Tahun Lulus"
                            required
                            maxlength="4"
                            pattern="[0-9]{4}"
                        >
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center mb-4">
            <button class="btn btn-danger" name="simpan" type="submit">Simpan</button>
            </div>
</form>
            <!-- List Kualifikasi Pendidikan -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <h6 class="mb-0 text-muted">LIST KUALIFIKASI PENDIDIKAN SAAT INI</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table-kualifikasi" class="table table-striped table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenjang Pendidikan</th>
                                            <th>Instansi</th>
                                            <th>Tahun Lulus</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        if ($queryKualifikasi && mysqli_num_rows($queryKualifikasi) > 0) {
                                            while ($rowKualifikasi = mysqli_fetch_assoc($queryKualifikasi)) {
                                                ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= htmlspecialchars($rowKualifikasi['jenjang_pendidikan']) ?></td>
                                                    <td><?= htmlspecialchars($rowKualifikasi['instansi']) ?></td>
                                                    <td><?= htmlspecialchars($rowKualifikasi['tahun_lulus']) ?></td>
                                                    <td>
                                                        <a href="?page=profile&delete_kualifikasi=<?= $rowKualifikasi['id'] ?>" 
                                                        class="btn btn-danger btn-sm" 
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                            <i class="fa fa-trash"></i> Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="5" class="text-center">Belum ada data kualifikasi pendidikan</td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
</div>



<script>

    // API Kota dan Provinsi

    (function() {
        const provinceSelect = document.getElementById('provinsi');
        const citySelect = document.getElementById('kota');
        if (!provinceSelect || !citySelect) return;

        const savedProvince = <?= json_encode($rowUser['provinsi'] ?? '') ?>;
        const savedCity = <?= json_encode($rowUser['kota'] ?? '') ?>;

        const PROVINCES_URL = 'https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json';
        const REGENCIES_URL = (provId) => `https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provId}.json`;

        function clearOptions(selectEl, placeholder) {
            while (selectEl.options.length > 0) selectEl.remove(0);
            const opt = document.createElement('option');
            opt.value = '';
            opt.textContent = placeholder;
            opt.disabled = true;
            opt.selected = true;
            selectEl.appendChild(opt);
        }

        function setSelectedByText(selectEl, textValue) {
            if (!textValue) return;
            const options = Array.from(selectEl.options);
            const match = options.find(o => o.textContent.trim().toLowerCase() === String(textValue).trim().toLowerCase());
            if (match) {
                selectEl.value = match.value;
            }
        }

        async function loadProvinces() {
            clearOptions(provinceSelect, 'Pilih Provinsi');
            try {
                const res = await fetch(PROVINCES_URL, { cache: 'no-store' });
                const provinces = await res.json();
                provinces.forEach(p => {
                    const opt = document.createElement('option');
                    opt.value = p.name;
                    opt.textContent = p.name;
                    opt.dataset.id = p.id;
                    provinceSelect.appendChild(opt);
                });
                setSelectedByText(provinceSelect, savedProvince);
                const selectedId = provinceSelect.selectedOptions[0]?.dataset.id;
                if (selectedId) {
                    await loadCities(selectedId);
                    setSelectedByText(citySelect, savedCity);
                }
            } catch (e) {
                console.error('Gagal memuat provinsi', e);
            }
        }

        async function loadCities(provinceId) {
            clearOptions(citySelect, 'Pilih Kota/Kabupaten');
            if (!provinceId) return;
            try {
                const res = await fetch(REGENCIES_URL(provinceId), { cache: 'no-store' });
                const cities = await res.json();
                cities.forEach(c => {
                    const opt = document.createElement('option');
                    opt.value = c.name;
                    opt.textContent = c.name;
                    citySelect.appendChild(opt);
                });
            } catch (e) {
                console.error('Gagal memuat kota/kabupaten', e);
            }
        }

        provinceSelect.addEventListener('change', async function() {
            const selectedId = this.selectedOptions[0]?.dataset.id;
            await loadCities(selectedId);
        });

        document.addEventListener('DOMContentLoaded', loadProvinces);
        if (document.readyState === 'complete' || document.readyState === 'interactive') {
            loadProvinces();
        }
    })();


    // Tanda Tangan

    (function(){
    const canvas = document.getElementById('signature-canvas');
    if(!canvas) return;

    const hiddenInput = document.getElementById('signature_data');
    const clearBtn = document.getElementById('sig-clear');
    const saveBtn = document.getElementById('sig-save');

    const ctx = canvas.getContext('2d');
    ctx.lineWidth = 2;
    ctx.lineCap = 'round';
    ctx.strokeStyle = '#111';

    let drawing = false;
    let rect;

    // set ukuran canvas mengikuti lebar wrapper
    function resizeCanvas(preserve = true){
        const wrapper = document.getElementById('signature-wrapper');
        const data = preserve ? canvas.toDataURL() : null;
        canvas.width = wrapper.clientWidth - 16; // padding wrapper
        canvas.height = 260;
        if (data && data !== getBlankDataURL()) {
            const img = new Image();
            img.onload = () => ctx.drawImage(img, 0, 0);
            img.src = data;
        } else {
            // background putih
            ctx.fillStyle = '#fff';
            ctx.fillRect(0,0,canvas.width,canvas.height);
            ctx.fillStyle = '#111';
        }
    }

    function getPos(e){
    const r = canvas.getBoundingClientRect(); // selalu ambil rect terbaru
    const clientX = (e.touches && e.touches[0]) ? e.touches[0].clientX : e.clientX;
    const clientY = (e.touches && e.touches[0]) ? e.touches[0].clientY : e.clientY;
    return { x: clientX - r.left, y: clientY - r.top };
}

    function startDraw(e){
        drawing = true;
        const {x,y} = getPos(e);
        ctx.beginPath();
        ctx.moveTo(x,y);
        e.preventDefault();
    }

    function draw(e){
        if(!drawing) return;
        const {x,y} = getPos(e);
        ctx.lineTo(x,y);
        ctx.stroke();
        e.preventDefault();
    }

    function endDraw(){
        drawing = false;
        ctx.closePath();
    }

    function clearCanvas(){
        ctx.clearRect(0,0,canvas.width,canvas.height);
        ctx.fillStyle = '#fff';
        ctx.fillRect(0,0,canvas.width,canvas.height);
        ctx.fillStyle = '#111';
        if (hiddenInput) hiddenInput.value = '';
    }

    function getBlankDataURL(){
        const tmp = document.createElement('canvas');
        tmp.width = canvas.width; tmp.height = canvas.height;
        const tctx = tmp.getContext('2d');
        tctx.fillStyle = '#fff'; tctx.fillRect(0,0,tmp.width,tmp.height);
        return tmp.toDataURL('image/png');
    }

    function savePNG(){
        const dataURL = canvas.toDataURL('image/png');
        if (hiddenInput) hiddenInput.value = dataURL; // untuk submit ke server

        // download PNG
        const a = document.createElement('a');
        a.href = dataURL;
        a.download = 'tanda_tangan.png';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    }

    // event mouse
    canvas.addEventListener('mousedown', startDraw);
    canvas.addEventListener('mousemove', draw);
    window.addEventListener('mouseup', endDraw);

    // event touch
    canvas.addEventListener('touchstart', startDraw, {passive:false});
    canvas.addEventListener('touchmove', draw, {passive:false});
    canvas.addEventListener('touchend', endDraw);

    clearBtn?.addEventListener('click', clearCanvas);
    saveBtn?.addEventListener('click', savePNG);

    // init & responsive
    window.addEventListener('resize', () => resizeCanvas(true));
    // isi background putih awal
    resizeCanvas(false);
})();
</script>


<!-- datatables  -->
     <script>
      $(document).ready(function () {
        // Initialize DataTable with Bootstrap 5 styling
        $("#table-kualifikasi").DataTable({
          "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
          },
          "pageLength": 10,
          "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
          "order": [[0, "asc"]],
          "responsive": true,
          "columnDefs": [
            {
              "orderable": false,
              "targets": 4 // Disable sorting on Action column
            }
          ],
          "dom": "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                 "<'row'<'col-sm-12'tr>>" +
                 "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>"
        });
      });
    </script>

     <!-- Datatables -->
    <script src="assets/js/plugin/datatables/datatables.min.js"></script>