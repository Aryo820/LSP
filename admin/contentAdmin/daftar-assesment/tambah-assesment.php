<?php
require_once 'admin/controller/koneksi.php';
if (isset($_GET['delete'])) {
    $idDelete = $_GET['delete'];
    $query = mysqli_query($config, "DELETE FROM assessment WHERE id='$idDelete'");
    header("Location: ?page=daftar-assesment/daftar-assesment&delete=success");
    die;
} else if (isset($_GET['edit'])) {
    $idEdit = $_GET['edit'];
    $queryEdit = mysqli_query($config, "SELECT * FROM assessment WHERE id='$idEdit'");
    $rowEdit = mysqli_fetch_assoc($queryEdit);
    if (isset($_POST['edit'])) {
        $nama_jadwal   = $_POST['nama_jadwal'];
        $tuk           = $_POST['tuk'];
        $pembiayaan    = $_POST['pembiayaan'];
        $tanggal_ujian = $_POST['tanggal_ujian'];
        $lokasi_ujian  = $_POST['lokasi_ujian'];

        $queryEdit = mysqli_query($config, "UPDATE assessment 
                                            SET nama_jadwal='$nama_jadwal', 
                                                tuk='$tuk', 
                                                pembiayaan='$pembiayaan', 
                                                tanggal_ujian='$tanggal_ujian', 
                                                lokasi_ujian='$lokasi_ujian' 
                                            WHERE id='$idEdit'");
        header("Location: ?page=daftar-assesment/daftar-assesment&edit=success");
        die;
    }
} else if (isset($_POST['add'])) {
    $nama_jadwal   = $_POST['nama_jadwal'];
    $tuk           = $_POST['tuk'];
    $pembiayaan    = $_POST['pembiayaan'];
    $tanggal_ujian = $_POST['tanggal_ujian'];
    $lokasi_ujian  = $_POST['lokasi_ujian'];

    mysqli_query($config, "INSERT INTO assessment (nama_jadwal, tuk, pembiayaan, tanggal_ujian, lokasi_ujian) 
                           VALUES ('$nama_jadwal', '$tuk', '$pembiayaan', '$tanggal_ujian', '$lokasi_ujian')");
    header("Location: ?page=daftar-assesment/daftar-assesment&add=success");
    die;
}
$result = mysqli_query($config, "SELECT * FROM assessment");
?>

<div class="container">
   <div class="card shadow">
    <div class="card-header">
        <h5><?= isset($_GET['edit']) ? 'Edit' : 'Add' ?> Assessment</h5>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Nama Jadwal</label>
                    <input type="text" class="form-control" name="nama_jadwal" placeholder="Masukkan Nama Jadwal"
                        value="<?= isset($rowEdit['nama_jadwal']) ? $rowEdit['nama_jadwal'] : '' ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">TUK</label>
                    <input type="text" class="form-control" name="tuk" placeholder="Masukkan TUK"
                        value="<?= isset($rowEdit['tuk']) ? $rowEdit['tuk'] : '' ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Pembiayaan</label>
                    <input type="text" class="form-control" name="pembiayaan" placeholder="Masukkan Pembiayaan"
                        value="<?= isset($rowEdit['pembiayaan']) ? $rowEdit['pembiayaan'] : '' ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Tanggal Ujian</label>
                    <input type="date" class="form-control" name="tanggal_ujian"
                        value="<?= isset($rowEdit['tanggal_ujian']) ? $rowEdit['tanggal_ujian'] : '' ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="" class="form-label">Lokasi Ujian</label>
                    <input type="text" class="form-control" name="lokasi_ujian" placeholder="Masukkan Lokasi Ujian"
                        value="<?= isset($rowEdit['lokasi_ujian']) ? $rowEdit['lokasi_ujian'] : '' ?>" required>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary btn-sm"
                    name="<?php echo isset($_GET['edit']) ? 'edit' : 'add' ?>">
                    <i class="fe fe-save fe-16"></i>
                </button>
            </div>
        </form>
    </div>
</div> 
</div>
