<?php $url = $this->uri->segment(1); ?>
<div class="fixed-top navbar-sticky">
   <div class="collapse bg-gray" id="searchBar">
      <div class="row justify-content-center">
         <div class="col-md-6">
            <div class="p-4">
               <form action="<?= site_url(); ?>home/tracking" role="search">
                  <div class="input-group">
                     <input type="text" class="form-control" placeholder="Cari Tracking ID atau Kata Kunci Laporan Kamu" name="id_lapor">
                     <div class="input-group-btn">
                        <a href="<?= site_url(); ?>auth" class="btn btn-primary"><i class="fa fa-search"></i> Lacak</a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <nav class="navbar navbar-expand-md navbar-dark bg-transparent border-0 text-uppercase font-weight-bold">
      <div class="container">
         <a class="navbar-brand" href="<?= site_url(); ?>">
            <img src="<?= base_url('public/assets/img/logo-warna.svg'); ?>" height="42" class="logo-warna" alt="<?= getenv('app.TitleName'); ?>" style="display: none;">
            <img src="<?= base_url('public/assets/img/logo-putih.svg'); ?>" height="42" class="logo-putih" alt="<?= getenv('app.TitleName'); ?>">
         </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item<?= ($url == '' || $url == 'home') ? ' active' : ''; ?>">
                  <a class="nav-link px-3" href="<?= site_url(); ?>">Beranda</a>
               </li>
               <li class="nav-item<?= ($url == 'tentang-kami') ? ' active' : ''; ?>">
                  <a class="nav-link px-3" href="<?= site_url('tentang-kami'); ?>">Tentang Kami</a>
               </li>
               <li class="nav-item">
                  <a href="#" class="nav-link px-3" data-toggle="collapse" data-target="#searchBar" aria-controls="searchBar" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-search"></i> Lacak Laporan</a>
               </li>
            </ul>
            <a id="btn-login" href="<?= site_url('auth'); ?>" class="btn btn-outline-secondary"><span class="px-2">Login</span></a>
         </div>
      </div>
   </nav>
</div>