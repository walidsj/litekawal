<section id="footer">
   <div class="container">
      <footer class="py-5 pt-md-5 px-2">
         <div class="row">
            <div class="col-12 col-md">
               <a href="<?= site_url(); ?>">
                  <img class="mb-2" src="<?= base_url('public/assets/img/logo-warna.svg'); ?>" alt="<?= getenv('app.TitleName'); ?>" height="48">
               </a>
               <span class="d-block mb-3 text-muted">© 2020 Tim Kawal</span>
            </div>
            <div class="col-6 col-md">
               <h5 class="font-weight-bold text-muted text-uppercase">Tentang Kami</h5>
               <ul class="list-unstyled text-small">
                  <li><a class="text-muted" href="<?= site_url('tentang-kami'); ?>">Tim Kawal</a></li>
                  <li><a class="text-muted" href="#">BLM PKN STAN</a></li>
               </ul>
            </div>
            <div class="col-6 col-md">
               <h5 class="font-weight-bold text-muted text-uppercase">Elemen Kampus</h5>
               <ul class="list-unstyled text-small">
                  <li><a class="text-muted" href="<?= site_url('daftar-instansi'); ?>">Daftar Instansi</a></li>
               </ul>
            </div>
            <div class="col-6 col-md">
               <h5 class="font-weight-bold text-muted text-uppercase">Kontak</h5>
               <ul class="list-unstyled text-small">
                  <li><a class="text-muted" href="https://instagram.com/kawalpknstan">Instagram</a></li>
                  <li><a class="text-muted" href="https://wa.me/6285157626557">WhatsApp</a></li>
               </ul>
            </div>
         </div>
      </footer>
   </div>
</section>