<?php
require_once 'admin/controller/koneksi.php';

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
            <?php include 'admin/controller/alert-data-crud.php'; ?>
            <!-- table -->
            <div class="button-action mb-2">
                <!-- Pindahkan button di sini jika diperlukan -->
            </div>
            <table class="table table-borderless table-hover mt-3 datatable">
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
                                <div class="my-3">
                                    <a href="?page=daftar-assesment&edit=<?php echo $result['id'] ?>">
                                        <button class="btn btn-info btn-sm "> Daftar Assesment
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
$(document).ready(function() {
    if ($.fn.DataTable) {
        $('.datatable').DataTable({
            autoWidth: true,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            "dom": '<"top"lf>rt<"bottom"ip><"clear">',
            "language": {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
                "infoFiltered": "(disaring dari _MAX_ total data)",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                }
            }
        });
    }
});
</script>


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
