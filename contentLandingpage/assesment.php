<?php
require_once 'config/koneksi.php';

$query = "SELECT * 
          FROM assessment 
          ORDER BY id DESC";

$result = mysqli_query($config, $query);


?>
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header">
            <h5>Data Daftar Assessment</h5>
        </div>
        <div class="card-body">
            <?php include 'controller/alert-data-crud.php'; ?>
            <!-- table -->
            <table class="table table-borderless table-hover mt-3 datatable">
                <div class="button-action mb-2">
                    <a class="btn btn-primary btn-sm" href="?page=tambah-assesment">Tambah Assessment</a>
                </div>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Jadwal</th>
                        <th>TUK</th>
                        <th>Pembiayaan</th>
                        <th>Tanggal Ujian</th>
                        <th>Lokasi Ujian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;

                    // Query data assessment
                    $query = "SELECT * FROM assessment ORDER BY id DESC";
                    $result = mysqli_query($config, $query);

                    // Tampilkan data jika ada
                    if (mysqli_num_rows($result) > 0) :
                        while ($row = mysqli_fetch_assoc($result)) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['nama_jadwal'] ?></td>
                                <td><?= $row['tuk'] ?></td>
                                <td><?= $row['pembiayaan'] ?></td>
                                <td><?= date('d-m-Y', strtotime($row['tanggal_ujian'])) ?></td>
                                <td><?= $row['lokasi_ujian'] ?></td>
                                <td>
                                <div class="button-action my-3">
                                    <a href="?page=tambah-assesment&edit=<?php echo $result['id'] ?>">
                                        <button class="btn btn-info btn-sm "> Edit
                                        </button>
                                    </a>
                                    <a onclick="return confirm ('Apakah anda yakin akan menghapus data ini?')"
                                        href="?page=tambah-assesment&delete=<?php echo $result['id'] ?>">
                                        <button class="btn btn-danger btn-sm">
                                           Hapus
                                        </button>
                                    </a>
                                </div>

                            </td>
                            </tr>
                        <?php endwhile;
                    else : ?>
                        <tr>
                            <td colspan="7" class="text-center">Data Assessment Tidak Ditemukan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <nav aria-label="Table Paging" class="mb-0 text-muted">
                <ul class="pagination justify-content-center mb-0">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<script>
    $('.datatable').DataTable({
        autoWidth: true,
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ]
    });
</script>
<script src="tmp/js/apps.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
</script>
