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
                  <?= form_open(current_url() . '?e=' . urlencode($this->input->get('e', true)) . '&t=' . urlencode($this->input->get('t', true))); ?>
                  <div class="card-body">
                     <h3 class="card-title font-weight-bold mb-0">Reset Kata Sandi</h3>
                     <span class="card-description">Masukkan kata sandi baru</span>
                     <div class="form-group mt-4">
                        <input id="password_pelapor" type="password" class="form-control" placeholder="Kata Sandi" required name="password_pelapor" value="<?= set_value('password_pelapor'); ?>">
                        <?= form_error('password_pelapor'); ?>
                     </div>
                     <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary btn-block">Ganti Kata Sandi</button>
                     </div>
                  </div>
                  <?= form_close(); ?>
               </div>
            </div>
         </div>
      </div>
   </section>
   <?php $this->load->view('partials/scripts'); ?>
</body>

</html>