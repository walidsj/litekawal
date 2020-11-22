<nav class="navbar navbar-dark navbar-sticky bg-transparent fixed-top border-0">
   <div class="container">
      <a class="navbar-brand" href="#">
         <img src="<?= base_url('public/assets/img/logo-warna.svg'); ?>" height="42" class="logo-warna" alt="<?= getenv('app.TitleName'); ?>" style="display: none;">
         <img src="<?= base_url('public/assets/img/logo-putih.svg'); ?>" height="42" class="logo-putih" alt="<?= getenv('app.TitleName'); ?>">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <i class="fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav">
            <li class="nav-item active">
               <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
               <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
         </ul>
      </div>
   </div>
</nav>