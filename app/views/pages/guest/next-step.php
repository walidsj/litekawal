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
                  <a href="<?= current_url().'?go=back'; ?>">
                     <img height="64" src="<?= base_url('public/assets/img/logo-putih.svg'); ?>" alt="<?= getenv('app.TitleName'); ?>">
                  </a>
               </div>
               <div class="card p-3 border-0 shadow">
                  <?= form_open(current_url()); ?>
                  <div class="card-body">
                     <h3 class="card-title font-weight-bold">Data Pelapor</h3>
                     <hr class="mb-4">
                     <div class="form-group">
                        <label for="namapelapor_lapor" class="d-block font-weight-bold">Nama Lengkap</label>
                        <input id="namapelapor_lapor" type="text" class="form-control" placeholder="John Doe" required name="namapelapor_lapor" value="<?= set_value('namapelapor_lapor'); ?>">
                        <?= form_error('namapelapor_lapor'); ?>
                     </div>
                     <div class="form-group">
                        <label for="mahasiswa_lapor" class="d-block font-weight-bold">NPM</label>
                        <input id="mahasiswa_lapor" type="number" class="form-control" placeholder="2302180000" required name="mahasiswa_lapor" value="<?= set_value('mahasiswa_lapor'); ?>">
                        <?= form_error('mahasiswa_lapor'); ?>
                     </div>
                     <div class="form-group">
                        <label for="email_lapor" class="d-block font-weight-bold">Alamat Email</label>
                        <input id="email_lapor" type="email" class="form-control" placeholder="example@domain.com" required name="email_lapor" value="<?= set_value('email_lapor'); ?>">
                        <?= form_error('email_lapor'); ?>
                     </div>
                     <div class="form-group">
                        <label for="kontak_lapor" class="d-block font-weight-bold">No. <i>Handphone</i></label>
                        <input id="kontak_lapor" type="number" class="form-control" placeholder="081234567890" required name="kontak_lapor" value="<?= set_value('kontak_lapor'); ?>">
                        <?= form_error('kontak_lapor'); ?>
                     </div>
                     <div class="form-group mt-4">
                        <div class="custom-control custom-switch custom-control-inline">
                           <input type="checkbox" class="custom-control-input" id="check_lapor" name="check_lapor">
                           <label class="custom-control-label tooltips" for="check_lapor">Saya telah membaca dan menyetujui Syarat dan Ketentuan Layanan</label>
                        </div>
                        <?= form_error('check_lapor'); ?>
                     </div>
                     <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Kirim Sekarang</button>
                     </div>
                     <div class="form-group text-center">
                        <span class="font-weight-bold">
                           Atau
                        </span>
                     </div>
                      <div class="form-group">
                        <a href="<?= site_url('auth/daftar');?>" class="btn btn-danger btn-block">Daftar Akun</a>
                     </div>
                  </div>
                  <?= form_close(); ?>
               </div>
               <div class="text-center mt-4">
                  <a href="<?= current_url().'?go=back'; ?>" class="btn btn-warning"><i class="fa fa-home"></i> Kembali ke Beranda</a>
               </div>
            </div>
         </div>
      </div>
   </section>
   <?php $this->load->view('partials/scripts'); ?>
</body>

</html>