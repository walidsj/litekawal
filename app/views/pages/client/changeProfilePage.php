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
                     <h5 class="card-title font-weight-bold mb-0">Ubah Profil</h5>
                     <hr class="mb-4">
                     <div class="form-group">
                        <label for="nama_pelapor" class="d-block font-weight-bold">Nama Lengkap <span class="text-danger">*</span></label>
                        <input id="nama_pelapor" type="text" class="form-control" placeholder="Nama Lengkap" required name="nama_pelapor" value="<?= (set_value('nama_pelapor')) ? set_value('nama_pelapor') : $this->userPelapor->nama_pelapor; ?>">
                        <?= form_error('nama_pelapor'); ?>
                     </div>
                     <div class="form-group">
                        <label for="kontak_pelapor" class="d-block font-weight-bold">No. <i>Handphone</i> <span class="text-danger">*</span></label>
                        <input id="kontak_pelapor" type="number" class="form-control" placeholder="No. Handphone" required name="kontak_pelapor" value="<?= (set_value('kontak_pelapor')) ? set_value('kontak_pelapor') : $this->userPelapor->kontak_pelapor; ?>">
                        <?= form_error('kontak_pelapor'); ?>
                     </div>
                     <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Ubah Profil</button>
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