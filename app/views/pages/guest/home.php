<!DOCTYPE html>
<html>

<head>
   <?php $this->load->view('partials/headers'); ?>
</head>

<body>
   <?php $this->load->view('components/navbar'); ?>
   <?php $this->load->view('pages/guest/components/hero'); ?>
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-7">
            <div id="card-form" class="card p-3 shadow-lg rounded-lg">
               <?= form_open(current_url() . '?' . $_SERVER['QUERY_STRING']); ?>
               <div class="card-body">
                  <div class="form-group">
                     <label class="d-block font-weight-bold">Pilih Tipe Laporan</label>
                     <div class="input-group mb-3">
                        <a href="<?= site_url(); ?>" class="btn mr-1 btn-outline-primary <?= ($this->input->get('tipe') == '') ? 'active' : ''; ?>">Aspirasi</a>
                        <a href="<?= site_url('?tipe=pengaduan'); ?>" class="btn mr-1 btn-outline-primary <?= ($this->input->get('tipe') == 'pengaduan') ? 'active' : ''; ?>">Pengaduan</a>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="alert alert-secondary text-center">
                        Panduan mengisi aspirasi dan pengaduan.
                        <button class="btn btn-link" data-toggle="modal" data-target="#panduanModal"><svg width="1em" height="1em" viewBox="0 0 16 16" class="text-primary" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                              <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                           </svg>
                        </button>
                     </div>
                  </div>
                  <div class="form-group mb-0">
                     <label for="tipe_lapor" class="d-block font-weight-bold">Detail Laporan</label>
                  </div>
                  <div class="form-group">
                     <input type="text" class="form-control" placeholder="Ketik Judul Laporan Kamu" required name="judul_laporan" value="<?= set_value('judul_laporan'); ?>">
                     <?= form_error('judul_laporan'); ?>
                  </div>
                  <div class="form-group">
                     <textarea rows="6" class="form-control" placeholder="Ketik Isi Laporan Kamu" required name="isi_laporan"><?= set_value('isi_laporan'); ?></textarea>
                     <?= form_error('isi_laporan'); ?>
                  </div>
                  <?php if ($this->input->get('tipe') == 'pengaduan') : ?>
                     <div class="form-group">
                        <input type="text" class="form-control datepicker" placeholder="Pilih Tanggal Kejadian" required name="tanggal_laporan" value="<?= set_value('tanggal_laporan'); ?>">
                        <?= form_error('tanggal_laporan'); ?>
                     </div>
                     <div class=" form-group">
                        <input class="form-control" placeholder="Ketik Lokasi Kejadian" required name="lokasi_laporan" value="<?= set_value('lokasi_laporan'); ?>">
                        <?= form_error('lokasi_laporan'); ?>
                     </div>
                  <?php endif; ?>
                  <div class=" form-group">
                     <select class="form-control" data-placeholder="Pilih Instansi Tujuan" data-allow-clear="1" name="instansi_laporan">
                        <option></option>
                        <?php foreach ($instansiList as $instansi) : ?>
                           <option value="<?= $instansi->id_instansi; ?>"><?= $instansi->nama_instansi; ?></option>
                        <?php endforeach; ?>
                     </select>
                     <?= form_error('instansi_laporan'); ?>
                  </div>
                  <div class="form-group">
                     <select class="form-control" data-placeholder="Pilih Kategori Laporan" data-allow-clear="1" name="kategori_laporan">
                        <option></option>
                        <?php foreach ($katlapList as $katlap) : ?>
                           <option value="<?= $katlap->id_katlap; ?>"><?= $katlap->judul_katlap; ?></option>
                        <?php endforeach; ?>
                     </select>
                     <?= form_error('kategori_laporan'); ?>
                  </div>
                  <div class="form-group mb-0">
                     <div class="row">
                        <div class="col-md-8 mt-3">
                           <div class="custom-control custom-switch custom-control-inline">
                              <input type="checkbox" class="custom-control-input" id="anonim_lapor" v-model="swt.anonim">
                              <label class="custom-control-label" for="anonim_lapor">Anonim</label>
                           </div>
                           <div class="custom-control custom-switch custom-control-inline">
                              <input type="checkbox" class="custom-control-input" id="rahasia_lapor" v-model="swt.rahasia">
                              <label class="custom-control-label" for="rahasia_lapor">Rahasia</label>
                           </div>
                        </div>
                        <div class="col-md-4 text-right mt-3">
                           <button type="submit" class="btn btn-primary btn-block">Kirim <?= $this->input->get('tipe') == '' ? 'Aspirasi' : ($this->input->get('tipe') == 'pengaduan' ? 'Pengaduan' : 'Laporan'); ?></button>
                        </div>
                     </div>
                  </div>
               </div>
               <?= form_close(); ?>
            </div>
         </div>
      </div>
      <!-- this is kode01 -->
      <?php $this->load->view('components/footer'); ?>
   </div>

   <?php $this->load->view('pages/guest/components/modal_panduan'); ?>
   <?php $this->load->view('partials/scripts'); ?>
</body>

</html>