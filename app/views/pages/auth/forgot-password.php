<!DOCTYPE html>
<html>

<head>
   <?php $this->load->view('partials/headers'); ?>
</head>

<body id="gradient-img">
   <section class="py-5">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-sm-8 col-md-6 col-lg-4">
               <div class=" text-center mb-4">
                  <a href="<?= site_url(); ?>">
                     <img height="64" src="<?= base_url('public/assets/img/logo-putih.svg'); ?>" alt="<?= getenv('app.TitleName'); ?>">
                  </a>
               </div>
               <div class="card p-3 border-0 shadow">
                  <?= form_open(current_url()); ?>
                  <div class="card-body">
                     <h3 class="card-title font-weight-bold mb-0">Lupa Kata Sandi</h3>
                     <span class="card-description">Masukkan informasi akun Kamu</span>
                     <div class="form-group mt-4">
                        <input id="npm_pelapor" type="number" class="form-control" placeholder="No. Pokok Mahasiswa" required name="npm_pelapor" value="<?= (!empty(set_value('npm_pelapor'))) ? set_value('npm_pelapor') : ((!empty($this->session->sessionEmail)) ? $this->session->sessionEmail : ''); ?>">
                        <?= form_error('npm_pelapor'); ?>
                     </div>
                     <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary btn-block">Kirim Tautan Reset</button>
                     </div>
                  </div>
                  <?= form_close(); ?>
               </div>
               <div class="text-center mt-4">
                  <a href="<?= site_url(); ?>auth" class="btn btn-outline-secondary">Kembali ke Halaman Login</a>
               </div>
            </div>
         </div>
      </div>
   </section>
   <?php $this->load->view('partials/scripts'); ?>
</body>

</html>