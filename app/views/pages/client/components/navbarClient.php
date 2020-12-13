<?php $url = $this->uri->segment(1); ?>
<nav class="navbar navbar-expand-md navbar-light border-0 text-uppercase font-weight-bold py-3">
   <div class="container">
      <a class="navbar-brand" href="<?= site_url(); ?>">
         <img src="<?= base_url('public/assets/img/logo-warna.svg'); ?>" height="42" class="logo-warna" alt="<?= getenv('app.TitleName'); ?>">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <i class="fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav mr-auto">
            <li class="nav-item<?= ($url == 'dashboard') ? ' active' : ''; ?>">
               <a class="nav-link px-3" href="<?= site_url('dashboard'); ?>">Dasbor</a>
            </li>
         </ul>
         <div class="dropdown show">
            <a id="btn-login" class="btn btn-primary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fa fa-user"></i> <?= $this->userPelapor->nama_pelapor; ?>
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
               <!-- <a class="dropdown-item" href="<?= site_url(); ?>profile">Profil Saya</a> -->
               <a class="dropdown-item" href="<?= site_url(); ?>auth/logout">Logout</a>
            </div>
         </div>
      </div>
   </div>
</nav>