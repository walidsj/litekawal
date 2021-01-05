<!DOCTYPE html>
<html>

<head>
   <?php $this->load->view('partials/headers'); ?>
</head>

<body id="gradient-img">
   <section class="py-5">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-md-5">
               <div class=" text-center mb-4">
                  <a href="<?= current_url() . '?go=back'; ?>">
                     <img height="64" src="<?= base_url('public/assets/img/logo-putih.svg'); ?>" alt="<?= getenv('app.TitleName'); ?>">
                  </a>
               </div>
               <div class="card p-3 border-0 shadow">
                  <?= form_open(current_url()); ?>
                  <div class="card-body">
                     <h3 class="card-title font-weight-bold mb-0">Daftar</h3>
                     <span class="card-description">Buat akun Kamu terlebih dulu sebelum laporan dikirim</span>
                     <hr class="mb-4">
                     <div class="form-group">
                        <label for="nama_pelapor" class="d-block font-weight-bold">Nama Lengkap <span class="text-danger">*</span></label>
                        <input id="nama_pelapor" type="text" class="form-control" placeholder="Nama Lengkap" required name="nama_pelapor" value="<?= set_value('nama_pelapor'); ?>">
                        <?= form_error('nama_pelapor'); ?>
                     </div>
                     <div class="form-group">
                        <label for="npm_pelapor" class="d-block font-weight-bold">NPM <span class="text-danger">*</span></label>
                        <input id="npm_pelapor" type="number" class="form-control" placeholder="NPM" required name="npm_pelapor" value="<?= set_value('npm_pelapor'); ?>">
                        <?= form_error('npm_pelapor'); ?>
                     </div>
                     <div class="form-group">
                        <label for="email_pelapor" class="d-block font-weight-bold">Alamat Email <span class="text-danger">*</span></label>
                        <input id="email_pelapor" type="email" class="form-control" placeholder="Alamat Email" required name="email_pelapor" value="<?= set_value('email_pelapor'); ?>">
                        <?= form_error('email_pelapor'); ?>
                     </div>
                     <div class="form-group">
                        <label for="password_pelapor" class="d-block font-weight-bold">Kata Sandi <span class="text-danger">*</span></label>
                        <input id="password_pelapor" type="password" class="form-control" placeholder="Kata Sandi" required name="password_pelapor" value="<?= set_value('password_pelapor'); ?>">
                        <?= form_error('password_pelapor'); ?>
                     </div>
                     <div class="form-group">
                        <label for="kontak_pelapor" class="d-block font-weight-bold">No. <i>Handphone</i> <span class="text-danger">*</span></label>
                        <input id="kontak_pelapor" type="number" class="form-control" placeholder="No. Handphone" required name="kontak_pelapor" value="<?= set_value('kontak_pelapor'); ?>">
                        <?= form_error('kontak_pelapor'); ?>
                     </div>
                     <div class="form-group mt-4">
                        <div class="custom-control custom-switch custom-control-inline">
                           <input type="checkbox" class="custom-control-input" id="check_pelapor" name="check_pelapor">
                           <label class="custom-control-label tooltips" for="check_pelapor">Saya telah membaca dan menyetujui Syarat dan Ketentuan Layanan</label>
                        </div>
                        <?= form_error('check_pelapor'); ?>
                     </div>
                     <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Daftar dan Kirim</button>
                     </div>
                     <div class="form-group text-center">
                        <span class="font-weight-bold">
                           Atau
                        </span>
                     </div>
                     <div class="form-group">
                        <a href="<?= site_url('auth?go=back'); ?>" class="btn btn-danger btn-block">Login</a>
                     </div>
                  </div>
                  <?= form_close(); ?>
               </div>
               <div class="text-center mt-4">
                  <a href="<?= current_url() . '?go=back'; ?>" class="btn btn-outline-secondary"><i class="fa fa-home"></i> Kembali ke Beranda</a>
               </div>
            </div>
         </div>
      </div>
   </section>
   <?php $this->load->view('partials/scripts'); ?>
</body>

</html>