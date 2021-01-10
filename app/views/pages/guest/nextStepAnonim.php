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
                     <h3 class="card-title font-weight-bold mb-0">Info Kontak</h3>
                     <span class="card-description">Masukkan kontak Kamu agar kami bisa mengirim progres laporan, info kontak tidak disimpan oleh sistem.</span>
                     <hr class="mb-4">
                     <div class="form-group">
                        <label for="email_pelapor" class="d-block font-weight-bold">Alamat Email <span class="text-danger">*</span></label>
                        <input id="email_pelapor" type="email" class="form-control" placeholder="Alamat Email" required name="email_pelapor" value="<?= set_value('email_pelapor'); ?>">
                        <?= form_error('email_pelapor'); ?>
                     </div>
                     <div class="form-group mt-4">
                        <div class="custom-control custom-switch custom-control-inline">
                           <input type="checkbox" class="custom-control-input" id="check_pelapor" name="check_pelapor">
                           <label class="custom-control-label tooltips" for="check_pelapor">Saya telah membaca dan menyetujui Syarat dan Ketentuan Layanan</label>
                        </div>
                        <?= form_error('check_pelapor'); ?>
                     </div>
                     <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Kirim Laporan</button>
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