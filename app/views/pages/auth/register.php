<!DOCTYPE html>
<html>

<head>
   <?php $this->load->view('partials/headers'); ?>
</head>

<body id="gradient-img">
   <section class="py-5">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-sm-8 col-md-6 col-lg-5">
               <div class=" text-center mb-4">
                  <a href="<?= site_url(); ?>">
                     <img height="64" src="<?= base_url('public/assets/img/logo-putih.svg'); ?>" alt="<?= getenv('app.TitleName'); ?>">
                  </a>
               </div>
               <div class="card p-3 border-0 shadow">
                  <?= form_open(current_url()); ?>
                  <div class="card-body">
                     <h3 class="card-title font-weight-bold mb-0">Daftar</h3>
                     <span class="card-description">Silakan isi data Kamu</span>
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
                     <div class="form-group">
                        <label for="nama_user" class="d-block font-weight-bold">Nama Lengkap</label>
                        <input id="nama_user" type="text" class="form-control" placeholder="Nama Lengkap" required name="nama_user" value="<?= set_value('nama_user'); ?>">
                        <?= form_error('nama_user'); ?>
                     </div>
                     <div class="form-group">
                        <label for="mahasiswa_user" class="d-block font-weight-bold">NPM</label>
                        <input id="mahasiswa_user" type="number" class="form-control" placeholder="NPM" required name="mahasiswa_user" value="<?= set_value('mahasiswa_user'); ?>">
                        <?= form_error('mahasiswa_user'); ?>
                     </div>
                     <div class="form-group">
                        <label for="kontak_user" class="d-block font-weight-bold">No. <i>Handphone</i></label>
                        <input id="kontak_user" type="number" class="form-control" placeholder="081234567890" required name="kontak_user" value="<?= set_value('kontak_user'); ?>">
                        <?= form_error('kontak_user'); ?>
                     </div>
                     <div class="form-group mt-4">
                        <div class="custom-control custom-switch custom-control-inline">
                           <input type="checkbox" class="custom-control-input" id="check_user" name="check_user">
                           <label class="custom-control-label tooltips" for="check_user">Saya telah membaca dan menyetujui Syarat dan Ketentuan Layanan</label>
                        </div>
                        <?= form_error('check_user'); ?>
                     </div>
                     <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Daftar</button>
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