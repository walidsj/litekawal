<!DOCTYPE html>
<html>

<head>
   <?php $this->load->view('partials/headers'); ?>
</head>

<body>
   <?php $this->load->view('pages/client/components/navbarClient'); ?>
   <section id="gradient-white">
      <div class="container-lg mt-5 pb-3">
         <div class="row mb-4 justify-content-center">
            <div class="col-lg-5 col-md-6">
               <div class="card border-0 shadow">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div id="gradient-img" class="text-white px-2 py-3">
                     <div class="img rounded pb-2 text-center">
                        <img class="img shadow-sm rounded-circle" src="<?= base_url(); ?>public/assets/img/user.png" alt="User Avatar" width="84">
                     </div>
                     <div class="text-center">
                        <h4 class="font-weight-bolder"><?= $this->userPelapor->nama_pelapor; ?></h4>
                        <h6><?= $this->userPelapor->email_pelapor; ?></h6>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="row">
                        <div class="col-4 border-right">
                           <div class="text-center">
                              <h6 class="font-weight-bolder"><?= $this->db->get_where('laporan', ['idpelapor_lapor' => $this->userPelapor->id_pelapor, 'status_lapor' => 1])->num_rows(); ?></h6>
                              <span class="description-text">Terverifikasi</span>
                           </div>
                           <!-- /.text-center -->
                        </div>
                        <!-- /.col -->
                        <div class="col-4 border-right">
                           <div class="text-center">
                              <h6 class="font-weight-bolder"><?= $this->db->get_where('laporan', ['idpelapor_lapor' => $this->userPelapor->id_pelapor, 'status_lapor' => 2])->num_rows(); ?></h6>
                              <span class="description-text">Diproses</span>
                           </div>
                           <!-- /.text-center -->
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                           <div class="text-center">
                              <h6 class="font-weight-bolder"><?= $this->db->get_where('laporan', ['idpelapor_lapor' => $this->userPelapor->id_pelapor, 'status_lapor' => 3])->num_rows(); ?></h6>
                              <span class="description-text">Selesai</span>
                           </div>
                           <!-- /.text-center -->
                        </div>
                        <!-- /.col -->
                     </div>
                     <!-- /.row -->
                  </div>
               </div>
            </div>
            <div class="col-lg-5 col-md-6">
               <div class="card p-3 border-0 shadow">
                  <?= form_open(current_url()); ?>
                  <div class="card-body">
                     <h5 class="card-title font-weight-bold mb-0">Ubah Kata Sandi</h5>
                     <hr class="mb-4">
                     <div class="form-group mt-4">
                        <input id="password_pelapor" type="password" class="form-control" placeholder="Kata Sandi Lama" required name="password_pelapor" value="<?= set_value('password_pelapor'); ?>">
                        <?= form_error('password_pelapor'); ?>
                     </div>
                     <div class="form-group">
                        <input id="newpassword_pelapor" type="password" class="form-control" placeholder="Masukkan Kata Sandi Baru" required name="newpassword_pelapor" value="<?= set_value('newpassword_pelapor'); ?>">
                        <?= form_error('newpassword_pelapor'); ?>
                     </div>
                     <div class="form-group">
                        <input id="newpassword2_pelapor" type="password" class="form-control" placeholder="Ulangi Kata Sandi Baru" required name="newpassword2_pelapor" value="<?= set_value('newpassword2_pelapor'); ?>">
                        <?= form_error('newpassword2_pelapor'); ?>
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
   <?php $this->load->view('components/footer'); ?>

   <?php $this->load->view('partials/scripts'); ?>
</body>

</html>