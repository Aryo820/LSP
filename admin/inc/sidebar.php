<?php
// Pastikan session dan koneksi database sudah ada dari file utama
$navbarID = $_SESSION['id'];
$queryNavbar = mysqli_query($config, "SELECT * FROM user WHERE id = '$navbarID'");
$dataNavbar = mysqli_fetch_assoc($queryNavbar);

?>
<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
  <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
    <i class="fe fe-x"><span class="sr-only"></span></i>
  </a>
  <nav class="vertnav navbar navbar-light">
    <!-- nav bar -->
    <div class="w-100 mb-4 d-flex">
      <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
        <img src="" id="logo" style="width: 50px" class="navbar-brand-img brand-sm">
      </a>
    </div>
    <ul class="navbar-nav flex-fill w-100 ">
      <li class="nav-item w-100">
        <a class="nav-link" href="?page=dashboard/dashboard">
          <i class="fe fe-home fe-16"></i>
          <span class="ml-3 item-text">Dashboard</span>
        </a>
      </li>
    </ul>
    <p class="text-muted nav-heading mt-4 mb-1">
      <span>Master Data</span>
    </p>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item w-100">
        <a class="nav-link" href="?page=user/user">
          <i class="fe fe-user fe-16"></i>
          <span class="ml-3 item-text">Menu User</span>
        </a>
      </li>
      <li class="nav-item w-100">
        <a class="nav-link" href="?page=level/level">
          <i class="fe fe-users fe-16"></i>
          <span class="ml-3 item-text">Menu Level</span>
        </a>
      </li>
      <li class="nav-item w-100">
        <a class="nav-link" href="?page=daftar-assesment/daftar-assesment">
          <i class="fe fe-user-plus fe-16"></i>
          <span class="ml-3 item-text">Daftar Assesment</span>
        </a>
      </li>
        <li class="nav-item w-100">
        <a class="nav-link" href="?page=profile/profile">
          <i class="fe fe-user fe-16"></i>
          <span class="ml-3 item-text">Profile Update</span>
        </a>
      </li>
      <li class="nav-item w-100">
        <a class="nav-link" href="?page=list-assesment/list-assesment">
          <i class="fe fe-book fe-16"></i>
          <span class="ml-3 item-text">List Assesment Aktif</span>
        </a>
      </li>
      <li class="nav-item w-100">
        <a class="nav-link" href="?page=assesment-diikuti/assesment-diikuti">
          <i class="fe fe-book-open fe-16"></i>
          <span class="ml-3 item-text">Assesment Diikuti</span>
        </a>
      </li>
       <p class="text-muted nav-heading mt-4 mb-1">
      <span>Menu Assesor</span>
    </p>
       <li class="nav-item w-100">
        <a class="nav-link" href="?page=review-assesment/review-assesment">
          <i class="fe fe-search fe-16"></i>
          <span class="ml-3 item-text">Review Assesment</span>
        </a>
      </li>
    
    </ul>
    <p class="text-muted nav-heading mt-4 mb-1">
      <span>Tindakan</span>
    </p>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      </li>
       <li class="nav-item w-100">
        <a class="nav-link" href="?page=keluar">
          <i class="fe fe-log-out fe-16"></i>
          <span class="ml-3 item-text">Logout</span>
        </a>
      </li>
    </ul>
  </nav>
</aside>