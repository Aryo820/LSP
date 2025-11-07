 <?php
// Memulai session agar bisa menggunakan $_SESSION
session_start();

// Membuat session ID baru dan menghapus session ID lama untuk meningkatkan keamanan (mencegah session fixation)
session_regenerate_id();

// Mengaktifkan output buffering (penyimpanan output sementara sebelum dikirim ke browser)
ob_start();

// Membersihkan output buffer, menghapus semua isi buffer (jika ada output sebelumnya)
ob_clean();

// Memanggil file koneksi ke database
require_once 'admin/controller/koneksi.php';

// Mengecek apakah session 'id' kosong (belum login atau session habis)
if (empty($_SESSION['id'])) {
	// Jika belum login, arahkan pengguna ke halaman logout (biasanya akan diarahkan ke login page lagi)
	header('Location: keluar.php');
}
?>
 
 
 
 <main class="main">

   <!-- Hero Section -->
    
  <section id="hero" class="hero section dark-background">

      <img src="contentLandingpage/upload/work_2.webp" alt="" data-aos="fade-in">

      <div class="container">
        <div class="row">
          <div class="col-lg-5">
            <h2 data-aos="fade-up" data-aos-delay="100">Selamat Datang</h2>
            <p data-aos="fade-up" data-aos-delay="200">Di Website Badan Nasional Sertifikat Profesi Media Informatika</p>
          </div>
        </div>
      </div>

    </section>
 <!-- /Hero ->

   <-- About Section -->
   <section id="about" class="about section light-background">

     <div class="container" data-aos="fade-up" data-aos-delay="100">
       <div class="row align-items-xl-center gy-5">

         <div class="col-xl-5 content">
           <h3 class="mb-3">Tentang Kami</h3>
           <p class="text-justify">Salah satu tujuan Pemerintah Indonesia adalah mendorong 
            percepatan pengakuan sertifikasi kompetensi kerja secara berkelanjutan pada bidang 
            profesi Teknologi Informasi dan Komunikasi yang infrastrukturnya telah siap untuk 
            melaksanakan proses sertifikasi.
          </p>
          
            <p class="text-justify">
              Untuk merealisasikan percepatan pelaksanaan 
            sertifikasi kompetensi, Badan Nasional Sertifikat Profesi (BNSP) telah memberikan 
            lisensi kepada Lembaga Sertifikasi Profesi Media Informatika pada tanggal 25 April 
            2022 Nomor BNSP-LSP-2121-ID Surat Keputusan KEP.0868/BNSP/IV/2022 dan berlaku hingga 25 April 2027
            </p>
         </div>

         <div class="col-xl-7">
           <div class="row gy-4 icon-boxes">

             <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
               <div class="icon-box">
                 <i class="bi bi-buildings"></i>
                 <h3>Terlisensi Resmi BNSP</h3>
                 <p class="text-justify">Lisensi Resmi BNSP menjamin validitas dan kredibilitas sertifikat sesuai standar Badan Nasional Sertifikasi Profesi.</p>
               </div>
             </div> <!-- End Icon Box -->

             <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
               <div class="icon-box">
                 <i class="bi bi-clipboard-pulse"></i>
                 <h3>Skema Sertifikasi Beragam</h3>
                 <p class="text-justify">Menyediakan beragam skema sertifikasi di bidang TIK yang relevan dengan kebutuhan industri</p>
               </div>
             </div> <!-- End Icon Box -->

             <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
               <div class="icon-box">
                 <i class="bi bi-graph-up-arrow"></i>
                 <h3>Proses Sertifikasi Efisien</h3>
                 <p class="text-justify">Tahapan uji kompetensi terstruktur, transparan, dan efisien, didukung penuh oleh infrastruktur berbasis digital.</p>
              </div>
             </div> <!-- End Icon Box -->

             <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
               <div class="icon-box">
                 <i class="bi bi-person-circle"></i>
                 <h3>Asesor Profesional</h3>
                 <p class="text-justify">Didukung oleh tim asesor kompeten dengan pengalaman luas dan teruji di dunia kerja profesional bidang TIK.</p>
               </div>
             </div> <!-- End Icon Box -->

           </div>
         </div>

       </div>
     </div>

   </section><!-- /About Section -->

   <!-- Stats Section -->
   <section id="stats" class="stats section dark-background">

     <img src="assets/img/stats-bg.jpg" alt="" data-aos="fade-in">

     <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

       <div class="row gy-4">

         <div class="col-lg-3 col-md-6">
           <div class="stats-item text-center w-100 h-100">
             <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
             <p>Clients</p>
           </div>
         </div><!-- End Stats Item -->

         <div class="col-lg-3 col-md-6">
           <div class="stats-item text-center w-100 h-100">
             <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
             <p>Projects</p>
           </div>
         </div><!-- End Stats Item -->

         <div class="col-lg-3 col-md-6">
           <div class="stats-item text-center w-100 h-100">
             <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
             <p>Hours Of Support</p>
           </div>
         </div><!-- End Stats Item -->

         <div class="col-lg-3 col-md-6">
           <div class="stats-item text-center w-100 h-100">
             <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
             <p>Workers</p>
           </div>
         </div><!-- End Stats Item -->

       </div>

     </div>

   </section><!-- /Stats Section -->

   <!-- Services Section -->
   <section id="services" class="services section">

     <!-- Section Title -->
     <div class="container section-title" data-aos="fade-up">
       <h2>Lembaga Sertifikasi Profesi Mengapa Kami ?</h2>
       <p>Karena komitmen kami untuk meningkatkan kebertrimaan Sertifikat Kompetensi oleh industri baik di tingkat nasional maupun internasional.</p>
     </div><!-- End Section Title -->

     <div class="container">

       <div class="row gy-4">

         <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="100">
           <div class="service-item d-flex">
             <div class="icon flex-shrink-0"><i class="bi bi-briefcase"></i></div>
             <div>
               <h4 class="title"><a href="" class="stretched-link">36 Skema Sertifikasi</a></h4>
               <p class="description">Skema / Profesi / Jabatan / Pekerjaan di bidang-bidang strategis sektor Teknologi Informasi dan Komunikasi.</p>
             </div>
           </div>
         </div>
         <!-- End Service Item -->

         <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="200">
           <div class="service-item d-flex">
             <div class="icon flex-shrink-0"><i class="bi bi-card-checklist"></i></div>
             <div>
               <h4 class="title"><a href="" class="stretched-link">300++ Link Dudi</a></h4>
               <p class="description">Perusahaan mitra LSP yang siap untuk menerima profesional bidang IT yang telah tersertifikasi, kompeten dan sesuai bidang keahliannya.</p>
             </div>
           </div>
         </div><!-- End Service Item -->

         <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="300">
           <div class="service-item d-flex">
             <div class="icon flex-shrink-0"><i class="bi bi-bar-chart"></i></div>
             <div>
               <h4 class="title"><a href="services-details.html" class="stretched-link">1000++ SDM Tersertifikasi</a></h4>
               <p class="description">Daftar tenaga kerja profesional yang telah tersertifikasi oleh LSP Teknologi Digital. Siap untuk menjawab kebutuhan industri.</p>
             </div>
           </div>
         </div><!-- End Service Item -->

       </div>

     </div>

   </section><!-- /Services Section -->


   <!-- Portfolio Section -->
   <section id="portfolio" class="portfolio section">

     <!-- Section Title -->
     <div class="container section-title" data-aos="fade-up">
       <h2>Skema Sertifikasi</h2>
       <p>Daftar Skema Sertifikasi</p>
     </div><!-- End Section Title -->

     <div class="container">
      
       <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

         <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
           <li data-filter="*" class="filter-active">All</li>
           <li data-filter=".filter-management">Management</li>
           <li data-filter=".filter-programmer">Programmer</li>
           <li data-filter=".filter-desainer">Desainer</li>
           <li data-filter=".filter-teknisi">Teknisi</li>
           <li data-filter=".filter-operator">Operator</li>
         </ul><!-- End Portfolio Filters -->

         <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

           <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-management">
             <img src="https://lspmi.co.id/uploads/thumb_skema/data_management_staff.jpg" class="img-fluid" alt="">
             <div class="portfolio-info">
               <h4>Data Management Staff</h4>
               <p>Skema sertifikasi Data Management Staff adalah</p>
               <p>Skema sertifikasi yang dikembangkan oleh Komite Skema LSP MEDIA INFORMATIKA.</p>
               <a href="?page=skema" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
             </div>
           </div><!-- End Portfolio Item -->

           <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-desainer">
             <img src="https://lspmi.co.id/uploads/thumb_skema/data_management_staff.jpg" class="img-fluid" alt="">
             <div class="portfolio-info">
               <h4>Desainer Grafis Muda</h4>
               <p>Skema sertifikasi Desainer Grafis Muda <br>(Junior Graphic Designer) adalah</p>
               <p>Skema sertifikasi yang dikembangkan <br>oleh Komite Skema LSP MEDIA INFORMATIKA.</p>
               <a href="?page=skema" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
             </div>
           </div><!-- End Portfolio Item -->

          <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-desainer">
             <img src="https://lspmi.co.id/uploads/thumb_skema/data_management_staff.jpg" class="img-fluid" alt="">
             <div class="portfolio-info">
               <h4>Desainer Multimedia Madya</h4>
               <p>Skema sertifikasi Desainer Multimedia Madya (Intermediate Multimedia Designer) adalah</p>
               <p>Skema sertifikasi yang dikembangkan oleh <br>Komite Skema LSP MEDIA INFORMATIKA.</p>
               <a href="?page=skema" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
             </div>
           </div><!-- End Portfolio Item -->

           <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-management">
             <img src="https://lspmi.co.id/uploads/thumb_skema/data_management_staff.jpg" class="img-fluid" alt="">
             <div class="portfolio-info">
               <h4>Digital Marketing</h4>
               <p>Skema sertifikasi Pemasaran Digital <br>(Digital Marketing) adalah</p>
               <p>Skema sertifikasi yang dikembangkan oleh <br>Komite Skema LSP MEDIA INFORMATIKA.</p>
               <a href="?page=skema" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
             </div>
           </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-programmer">
             <img src="https://lspmi.co.id/uploads/thumb_skema/data_management_staff.jpg" class="img-fluid" alt="">
             <div class="portfolio-info">
               <h4>Junior Mobile Developer</h4>
               <p>Skema sertifikasi Pengembang Mobile Pratama (Junior Mobile Developer) adalah</p>
               <p>Skema sertifikasi yang dikembangkan <br>oleh Komite Skema LSP MEDIA INFORMATIKA.</p>
               <a href="?page=skema" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
             </div>
           </div><!-- End Portfolio Item -->

           <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-programmer">
             <img src="https://lspmi.co.id/uploads/thumb_skema/data_management_staff.jpg" class="img-fluid" alt="">
             <div class="portfolio-info">
               <h4>Junior Web Developer</h4>
               <p>Skema sertifikasi Pengembang Web Pratama (Junior Web Developer) adalah</p>
               <p>Skema sertifikasi yang dikembangkan <br>oleh Komite Skema LSP MEDIA INFORMATIKA.</p>
               <a href="?page=skema" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
             </div>
           </div><!-- End Portfolio Item -->

           <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-teknisi">
             <img src="https://lspmi.co.id/uploads/thumb_skema/data_management_staff.jpg" class="img-fluid" alt="">
             <div class="portfolio-info">
               <h4>Network Administrator Muda</h4>
               <p>Skema sertifikasi Network Administrator Muda (Junior Network Administrator) adalah</p>
               <p>Skema sertifikasi yang dikembangkan <br>oleh Komite Skema LSP MEDIA INFORMATIKA.</p>
               <a href="?page=skema" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
             </div>
           </div><!-- End Portfolio Item -->

          <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-operator">
             <img src="https://lspmi.co.id/uploads/thumb_skema/data_management_staff.jpg" class="img-fluid" alt="">
             <div class="portfolio-info">
               <h4>Data Entry Operator</h4>
               <p>Skema sertifikasi Data Entry Operator adalah</p>
               <p>Skema sertifikasi yang dikembangkan <br>oleh Komite Skema LSP MEDIA INFORMATIKA.</p>
               <a href="?page=skema" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
             </div>
           </div><!-- End Portfolio Item -->

           <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
             <img src="assets/img/masonry-portfolio/masonry-portfolio-8.jpg" class="img-fluid" alt="">
             <div class="portfolio-info">
               <h4>Product 3</h4>
               <p>Lorem ipsum, dolor sit</p>
               <a href="assets/img/masonry-portfolio/masonry-portfolio-8.jpg" title="Product 3" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
               <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
             </div>
           </div><!-- End Portfolio Item -->

           <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
             <img src="assets/img/masonry-portfolio/masonry-portfolio-9.jpg" class="img-fluid" alt="">
             <div class="portfolio-info">
               <h4>Branding 3</h4>
               <p>Lorem ipsum, dolor sit</p>
               <a href="assets/img/masonry-portfolio/masonry-portfolio-9.jpg" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
               <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
             </div>
           </div><!-- End Portfolio Item -->

         </div><!-- End Portfolio Container -->

       </div>

     </div>

   </section><!-- /Portfolio Section -->

   <!-- Pricing Section -->
   <section id="pricing" class="pricing section">

     <!-- Section Title -->
     <div class="container section-title" data-aos="fade-up">
       <h2>Pricing</h2>
       <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
     </div><!-- End Section Title -->

     <div class="container" data-aos="zoom-in" data-aos-delay="100">

       <div class="row g-4">

         <div class="col-lg-4">
           <div class="pricing-item">
             <h3>Free Plan</h3>
             <div class="icon">
               <i class="bi bi-box"></i>
             </div>
             <h4><sup>$</sup>0<span> / month</span></h4>
             <ul>
               <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
               <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
               <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
               <li class="na"><i class="bi bi-x"></i> <span>Pharetra massa massa ultricies</span></li>
               <li class="na"><i class="bi bi-x"></i> <span>Massa ultricies mi quis hendrerit</span></li>
             </ul>
             <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
           </div>
         </div><!-- End Pricing Item -->

         <div class="col-lg-4">
           <div class="pricing-item featured">
             <h3>Business Plan</h3>
             <div class="icon">
               <i class="bi bi-rocket"></i>
             </div>

             <h4><sup>$</sup>29<span> / month</span></h4>
             <ul>
               <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
               <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
               <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
               <li><i class="bi bi-check"></i> <span>Pharetra massa massa ultricies</span></li>
               <li><i class="bi bi-check"></i> <span>Massa ultricies mi quis hendrerit</span></li>
             </ul>
             <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
           </div>
         </div><!-- End Pricing Item -->

         <div class="col-lg-4">
           <div class="pricing-item">
             <h3>Developer Plan</h3>
             <div class="icon">
               <i class="bi bi-send"></i>
             </div>
             <h4><sup>$</sup>49<span> / month</span></h4>
             <ul>
               <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
               <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
               <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
               <li><i class="bi bi-check"></i> <span>Pharetra massa massa ultricies</span></li>
               <li><i class="bi bi-check"></i> <span>Massa ultricies mi quis hendrerit</span></li>
             </ul>
             <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
           </div>
         </div><!-- End Pricing Item -->

       </div>

     </div>

   </section><!-- /Pricing Section -->

   <!-- Faq Section -->
   <section id="faq" class="faq section">

     <div class="container">

       <div class="row gy-4">

         <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
           <div class="content px-xl-5">
             <h3><span>Frequently Asked </span><strong>Questions</strong></h3>
             <p>
               Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
             </p>
           </div>
         </div>

         <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

           <div class="faq-container">
             <div class="faq-item faq-active">
               <h3><span class="num">1.</span> <span>Non consectetur a erat nam at lectus urna duis?</span></h3>
               <div class="faq-content">
                 <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.</p>
               </div>
               <i class="faq-toggle bi bi-chevron-right"></i>
             </div><!-- End Faq item-->

             <div class="faq-item">
               <h3><span class="num">2.</span> <span>Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?</span></h3>
               <div class="faq-content">
                 <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
               </div>
               <i class="faq-toggle bi bi-chevron-right"></i>
             </div><!-- End Faq item-->

             <div class="faq-item">
               <h3><span class="num">3.</span> <span>Dolor sit amet consectetur adipiscing elit pellentesque?</span></h3>
               <div class="faq-content">
                 <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis</p>
               </div>
               <i class="faq-toggle bi bi-chevron-right"></i>
             </div><!-- End Faq item-->

             <div class="faq-item">
               <h3><span class="num">4.</span> <span>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</span></h3>
               <div class="faq-content">
                 <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
               </div>
               <i class="faq-toggle bi bi-chevron-right"></i>
             </div><!-- End Faq item-->

             <div class="faq-item">
               <h3><span class="num">5.</span> <span>Tempus quam pellentesque nec nam aliquam sem et tortor consequat?</span></h3>
               <div class="faq-content">
                 <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in</p>
               </div>
               <i class="faq-toggle bi bi-chevron-right"></i>
             </div><!-- End Faq item-->

           </div>

         </div>
       </div>

     </div>

   </section><!-- /Faq Section -->

   <!-- Team Section -->
   <section id="team" class="team section light-background">

     <!-- Section Title -->
     <div class="container section-title" data-aos="fade-up">
       <h2>Team</h2>
       <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
     </div><!-- End Section Title -->

     <div class="container">

       <div class="row gy-5">

         <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
           <div class="member-img">
             <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
             <div class="social">
               <a href="#"><i class="bi bi-twitter-x"></i></a>
               <a href="#"><i class="bi bi-facebook"></i></a>
               <a href="#"><i class="bi bi-instagram"></i></a>
               <a href="#"><i class="bi bi-linkedin"></i></a>
             </div>
           </div>
           <div class="member-info text-center">
             <h4>Walter White</h4>
             <span>Chief Executive Officer</span>
             <p>Aliquam iure quaerat voluptatem praesentium possimus unde laudantium vel dolorum distinctio dire flow</p>
           </div>
         </div><!-- End Team Member -->

         <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="200">
           <div class="member-img">
             <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
             <div class="social">
               <a href="#"><i class="bi bi-twitter-x"></i></a>
               <a href="#"><i class="bi bi-facebook"></i></a>
               <a href="#"><i class="bi bi-instagram"></i></a>
               <a href="#"><i class="bi bi-linkedin"></i></a>
             </div>
           </div>
           <div class="member-info text-center">
             <h4>Sarah Jhonson</h4>
             <span>Product Manager</span>
             <p>Labore ipsam sit consequatur exercitationem rerum laboriosam laudantium aut quod dolores exercitationem ut</p>
           </div>
         </div><!-- End Team Member -->

         <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="300">
           <div class="member-img">
             <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
             <div class="social">
               <a href="#"><i class="bi bi-twitter-x"></i></a>
               <a href="#"><i class="bi bi-facebook"></i></a>
               <a href="#"><i class="bi bi-instagram"></i></a>
               <a href="#"><i class="bi bi-linkedin"></i></a>
             </div>
           </div>
           <div class="member-info text-center">
             <h4>William Anderson</h4>
             <span>CTO</span>
             <p>Illum minima ea autem doloremque ipsum quidem quas aspernatur modi ut praesentium vel tque sed facilis at qui</p>
           </div>
         </div><!-- End Team Member -->

         <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="400">
           <div class="member-img">
             <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
             <div class="social">
               <a href="#"><i class="bi bi-twitter-x"></i></a>
               <a href="#"><i class="bi bi-facebook"></i></a>
               <a href="#"><i class="bi bi-instagram"></i></a>
               <a href="#"><i class="bi bi-linkedin"></i></a>
             </div>
           </div>
           <div class="member-info text-center">
             <h4>Amanda Jepson</h4>
             <span>Accountant</span>
             <p>Magni voluptatem accusamus assumenda cum nisi aut qui dolorem voluptate sed et veniam quasi quam consectetur</p>
           </div>
         </div><!-- End Team Member -->

         <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="500">
           <div class="member-img">
             <img src="assets/img/team/team-5.jpg" class="img-fluid" alt="">
             <div class="social">
               <a href="#"><i class="bi bi-twitter-x"></i></a>
               <a href="#"><i class="bi bi-facebook"></i></a>
               <a href="#"><i class="bi bi-instagram"></i></a>
               <a href="#"><i class="bi bi-linkedin"></i></a>
             </div>
           </div>
           <div class="member-info text-center">
             <h4>Brian Doe</h4>
             <span>Marketing</span>
             <p>Qui consequuntur quos accusamus magnam quo est molestiae eius laboriosam sunt doloribus quia impedit laborum velit</p>
           </div>
         </div><!-- End Team Member -->

         <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="600">
           <div class="member-img">
             <img src="assets/img/team/team-6.jpg" class="img-fluid" alt="">
             <div class="social">
               <a href="#"><i class="bi bi-twitter-x"></i></a>
               <a href="#"><i class="bi bi-facebook"></i></a>
               <a href="#"><i class="bi bi-instagram"></i></a>
               <a href="#"><i class="bi bi-linkedin"></i></a>
             </div>
           </div>
           <div class="member-info text-center">
             <h4>Josepha Palas</h4>
             <span>Operation</span>
             <p>Sint sint eveniet explicabo amet consequatur nesciunt error enim rerum earum et omnis fugit eligendi cupiditate vel</p>
           </div>
         </div><!-- End Team Member -->

       </div>

     </div>

   </section><!-- /Team Section -->

   <!-- Call To Action Section -->
   <section id="call-to-action" class="call-to-action section dark-background">

     <img src="assets/img/cta-bg.jpg" alt="">

     <div class="container">
       <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
         <div class="col-xl-10">
           <div class="text-center">
             <h3>Call To Action</h3>
             <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
             <a class="cta-btn" href="#">Call To Action</a>
           </div>
         </div>
       </div>
     </div>

   </section><!-- /Call To Action Section -->

   <!-- Testimonials Section -->
   <section id="testimonials" class="testimonials section light-background">

     <div class="container">

       <div class="row align-items-center">

         <div class="col-lg-5 info" data-aos="fade-up" data-aos-delay="100">
           <h3>Testimonials</h3>
           <p>
             Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
             velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.
           </p>
         </div>

         <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">

           <div class="swiper init-swiper">
             <script type="application/json" class="swiper-config">
               {
                 "loop": true,
                 "speed": 600,
                 "autoplay": {
                   "delay": 5000
                 },
                 "slidesPerView": "auto",
                 "pagination": {
                   "el": ".swiper-pagination",
                   "type": "bullets",
                   "clickable": true
                 }
               }
             </script>
             <div class="swiper-wrapper">

               <div class="swiper-slide">
                 <div class="testimonial-item">
                   <div class="d-flex">
                     <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img flex-shrink-0" alt="">
                     <div>
                       <h3>Saul Goodman</h3>
                       <h4>Ceo &amp; Founder</h4>
                       <div class="stars">
                         <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                       </div>
                     </div>
                   </div>
                   <p>
                     <i class="bi bi-quote quote-icon-left"></i>
                     <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</span>
                     <i class="bi bi-quote quote-icon-right"></i>
                   </p>
                 </div>
               </div><!-- End testimonial item -->

               <div class="swiper-slide">
                 <div class="testimonial-item">
                   <div class="d-flex">
                     <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img flex-shrink-0" alt="">
                     <div>
                       <h3>Sara Wilsson</h3>
                       <h4>Designer</h4>
                       <div class="stars">
                         <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                       </div>
                     </div>
                   </div>
                   <p>
                     <i class="bi bi-quote quote-icon-left"></i>
                     <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</span>
                     <i class="bi bi-quote quote-icon-right"></i>
                   </p>
                 </div>
               </div><!-- End testimonial item -->

               <div class="swiper-slide">
                 <div class="testimonial-item">
                   <div class="d-flex">
                     <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img flex-shrink-0" alt="">
                     <div>
                       <h3>Jena Karlis</h3>
                       <h4>Store Owner</h4>
                       <div class="stars">
                         <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                       </div>
                     </div>
                   </div>
                   <p>
                     <i class="bi bi-quote quote-icon-left"></i>
                     <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</span>
                     <i class="bi bi-quote quote-icon-right"></i>
                   </p>
                 </div>
               </div><!-- End testimonial item -->

               <div class="swiper-slide">
                 <div class="testimonial-item">
                   <div class="d-flex">
                     <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img flex-shrink-0" alt="">
                     <div>
                       <h3>Matt Brandon</h3>
                       <h4>Freelancer</h4>
                       <div class="stars">
                         <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                       </div>
                     </div>
                   </div>
                   <p>
                     <i class="bi bi-quote quote-icon-left"></i>
                     <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.</span>
                     <i class="bi bi-quote quote-icon-right"></i>
                   </p>
                 </div>
               </div><!-- End testimonial item -->

               <div class="swiper-slide">
                 <div class="testimonial-item">
                   <div class="d-flex">
                     <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img flex-shrink-0" alt="">
                     <div>
                       <h3>John Larson</h3>
                       <h4>Entrepreneur</h4>
                       <div class="stars">
                         <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                       </div>
                     </div>
                   </div>
                   <p>
                     <i class="bi bi-quote quote-icon-left"></i>
                     <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.</span>
                     <i class="bi bi-quote quote-icon-right"></i>
                   </p>
                 </div>
               </div><!-- End testimonial item -->

             </div>
             <div class="swiper-pagination"></div>
           </div>

         </div>

       </div>

     </div>

   </section><!-- /Testimonials Section -->

   <!-- Recent Posts Section -->
   <section id="recent-posts" class="recent-posts section">

     <!-- Section Title -->
     <div class="container section-title" data-aos="fade-up">
       <h2>Recent Posts</h2>
       <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
     </div><!-- End Section Title -->

     <div class="container">

       <div class="row gy-4">

         <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
           <article>

             <div class="post-img">
               <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
             </div>

             <p class="post-category">Politics</p>

             <h2 class="title">
               <a href="blog-details.html">Dolorum optio tempore voluptas dignissimos</a>
             </h2>

             <div class="d-flex align-items-center">
               <img src="assets/img/blog/blog-author.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
               <div class="post-meta">
                 <p class="post-author">Maria Doe</p>
                 <p class="post-date">
                   <time datetime="2022-01-01">Jan 1, 2022</time>
                 </p>
               </div>
             </div>

           </article>
         </div><!-- End post list item -->

         <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
           <article>

             <div class="post-img">
               <img src="assets/img/blog/blog-2.jpg" alt="" class="img-fluid">
             </div>

             <p class="post-category">Sports</p>

             <h2 class="title">
               <a href="blog-details.html">Nisi magni odit consequatur autem nulla dolorem</a>
             </h2>

             <div class="d-flex align-items-center">
               <img src="assets/img/blog/blog-author-2.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
               <div class="post-meta">
                 <p class="post-author">Allisa Mayer</p>
                 <p class="post-date">
                   <time datetime="2022-01-01">Jun 5, 2022</time>
                 </p>
               </div>
             </div>

           </article>
         </div><!-- End post list item -->

         <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
           <article>

             <div class="post-img">
               <img src="assets/img/blog/blog-3.jpg" alt="" class="img-fluid">
             </div>

             <p class="post-category">Entertainment</p>

             <h2 class="title">
               <a href="blog-details.html">Possimus soluta ut id suscipit ea ut in quo quia et soluta</a>
             </h2>

             <div class="d-flex align-items-center">
               <img src="assets/img/blog/blog-author-3.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
               <div class="post-meta">
                 <p class="post-author">Mark Dower</p>
                 <p class="post-date">
                   <time datetime="2022-01-01">Jun 22, 2022</time>
                 </p>
               </div>
             </div>

           </article>
         </div><!-- End post list item -->

       </div><!-- End recent posts list -->

     </div>

   </section><!-- /Recent Posts Section -->



   </div>

   </div>

   </section><!-- /Contact Section -->

 </main>