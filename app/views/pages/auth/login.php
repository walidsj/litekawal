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
                     <h3 class="card-title font-weight-bold mb-0">Login</h3>
                     <span class="card-description">Silakan login untuk melanjutkan</span>
                     <hr class="mb-4">
                     <div class="form-group">
                        <label for="email_user" class="d-block font-weight-bold">Alamat Email</label>
                        <input id="email_user" type="email" class="form-control" placeholder="Alamat Email" required name="email_user" value="<?= set_value('email_user'); ?>">
                        <?= form_error('email_user'); ?>
                     </div>
                     <div class="form-group">
                        <label for="password_user" class="d-block font-weight-bold">Kata Sandi</label>
                        <input id="password_user" type="password" class="form-control" placeholder="Kata Sandi" required name="password_user" value="<?= set_value('password_user'); ?>">
                        <?= form_error('password_user'); ?>
                     </div>
                     <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                     </div>
                     <div class="form-group text-center">
                        <span class="font-weight-bold">
                           Atau
                        </span>
                     </div>
                     <div class="form-group">
                        <a href="<?= site_url('auth/daftar'); ?>" class="btn btn-outline-danger btn-block">Daftar Akun</a>
                     </div>
                  </div>
                  <?= form_close(); ?>
               </div>
               <div class="text-center mt-4">
                  <a href="<?= site_url(); ?>" class="btn btn-warning"><i class="fa fa-home"></i> Kembali ke Beranda</a>
               </div>
            </div>
         </div>
      </div>
   </section>
   <?php $this->load->view('partials/scripts'); ?>
</body>

</html>