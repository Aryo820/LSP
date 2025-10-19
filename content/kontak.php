<?php
include 'config/koneksi.php';

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
  $name = $_POST['nama'];
  // Mengambil nilai dari input 'email' dan menyimpannya di variabel $email.
  $email = $_POST['email'];

  $subject = $_POST['subject'];
  // Mengambil nilai dari input 'subject' dan menyimpannya di variabel $subject.
  // Mengambil nilai dari input 'message' dan menyimpannya di variabel $message.
  $message = $_POST['message'];

  // Membuat query SQL untuk memasukkan data ke dalam tabel 'contacts'.
  // 'INSERT INTO contacts' berarti kita ingin menambahkan baris baru ke tabel bernama 'contacts'.
  // '(name, email, subject, message)' adalah daftar kolom di tabel tempat data akan dimasukkan.
  // "VALUES ('$name','$email','$subject','$message')" adalah nilai-nilai yang akan dimasukkan
  // ke masing-masing kolom sesuai urutannya.
  // '$config' diasumsikan sebagai variabel koneksi ke database yang sudah dibuat sebelumnya.
  $query = mysqli_query($config, "INSERT INTO contacts (name, email, subject, message)
                                    VALUES ('$name','$email','$subject','$message')");

  // Memeriksa apakah proses query (penyimpanan data ke database) berhasil atau tidak.
  if ($query) {
    // Jika query berhasil (data berhasil disimpan ke database),
    // maka pengguna akan dialihkan kembali ke halaman 'index.php'.
    // header() digunakan untuk mengirimkan header HTTP mentah, dalam hal ini untuk pengalihan (redirect).
    // CATATAN PENTING: Seharusnya ada 'Location: ' sebelum 'index.php' untuk redirect yang benar.
    // Contoh: header("Location: index.php");
    header("?page=kontak"); // BARIS INI KEMUNGKINAN BESAR SALAH DAN HARUSNYA 'Location: index.php'
  } else {
    // Jika query gagal (data tidak berhasil disimpan, mungkin ada kesalahan pada database atau query SQL),
    // maka akan menampilkan pesan "gagal" di browser.
    echo "gagal";
  }
}
?>

<!-- Contact Section -->
<section id="contact" class="contact section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Contact</h2>
     <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                </ol>
            </nav>

  </div>
  
  <!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

      <div class="col-lg-6">

        <div class="row gy-4">
          <div class="col-md-6">
            <div class="info-item" data-aos="fade" data-aos-delay="200">
              <i class="bi bi-geo-alt"></i>
              <h3>Address : </h3>
              <p>Jl. Jendral Sudirman No.28 RT.001/013, Kranji, Bekasi Barat</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item" data-aos="fade" data-aos-delay="300">
              <i class="bi bi-telephone"></i>
              <h3>Phone : </h3>
              <p>0821 2866 0702</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item" data-aos="fade" data-aos-delay="400">
              <i class="bi bi-envelope"></i>
              <h3>Email : </h3>
              <p>cs.lspmi@gmail.com</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item" data-aos="fade" data-aos-delay="500">
              <i class="bi bi-globe"></i>
              <h3>Website : </h3>
              <p>https://lspmi.co.id/</p>
            </div>
          </div><!-- End Info Item -->

        </div>

      </div>

      <div class="col-lg-6">
        <form action="" method="POST">
          <div class="row gy-4">

            <div class="col-md-6">
              <input type="text" name="nama" class="form-control" placeholder="Your Name" required="">
            </div>

            <div class="col-md-6 ">
              <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
            </div>

            <div class="col-12">
              <input type="text" class="form-control" name="subject" placeholder="subject" required="">
            </div>

            <div class="col-12">
              <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
            </div>

            <div class="col-12 text-center">

              <button class="btn btn-danger" name="simpan" type="submit">Send Message</button>
            </div>

          </div>
        </form>
      </div><!-- End Contact Form -->