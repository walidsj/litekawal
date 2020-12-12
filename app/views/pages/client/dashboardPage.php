<!DOCTYPE html>
<html>

<head>
  <?php $this->load->view('partials/headers'); ?>
</head>

<body>
  <?php $this->load->view('pages/client/components/navbarClient'); ?>
  <?php $this->load->view('pages/client/components/heroClient'); ?>
  <section id="gradient-white">
    <div class="container">
      <div class="row justify-content-center mb-4">
        <div class="col-md-7">
          <div id="card-form" class="card p-3 border-0 shadow">
            <?= form_open(current_url() . '?' . $_SERVER['QUERY_STRING']); ?>
            <div class="card-body">
              <!-- <hr class="lead-hr-gray"> -->
              <div class="form-group">
                <label class="d-block font-weight-bold">Pilih Tipe Laporan <span class="text-danger">*</span></label>
                <div class="input-group mb-3">
                  <a href="<?= site_url(); ?>dashboard" class="btn mr-1 btn-outline-primary <?= ($this->input->get('tipe') == '') ? 'active' : ''; ?>">Aspirasi</a>
                  <a href="<?= site_url('dashboard?tipe=pengaduan'); ?>" class="btn mr-1 btn-outline-primary <?= ($this->input->get('tipe') == 'pengaduan') ? 'active' : ''; ?>">Pengaduan</a>
                </div>
              </div>
              <div class="form-group mb-0 pt-2">
                <label for="tipe_lapor" class="d-block font-weight-bold">Detail Laporan <span class="text-danger">*</span></label>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Ketik Judul Laporan Kamu *" required name="judul_lapor" value="<?= set_value('judul_lapor'); ?>">
                <?= form_error('judul_lapor'); ?>
              </div>
              <div class="form-group">
                <textarea rows="6" class="form-control" placeholder="Ketik Isi Laporan Kamu *" required name="isi_lapor"><?= set_value('isi_lapor'); ?></textarea>
                <?= form_error('isi_lapor'); ?>
              </div>
              <?php if ($this->input->get('tipe') == 'pengaduan') : ?>
                <div class="form-group">
                  <input type="text" class="form-control datepicker" placeholder="Pilih Tanggal Kejadian *" required name="kejadian_lapor" value="<?= set_value('kejadian_lapor'); ?>">
                  <?= form_error('kejadian_lapor'); ?>
                </div>
                <div class=" form-group">
                  <input class="form-control" placeholder="Ketik Lokasi Kejadian *" required name="lokasi_lapor" value="<?= set_value('lokasi_lapor'); ?>">
                  <?= form_error('lokasi_lapor'); ?>
                </div>
              <?php endif; ?>
              <div class=" form-group">
                <select class="form-control" data-placeholder="Pilih Instansi Tujuan *" data-allow-clear="1" name="instansi_lapor">
                  <option></option>
                  <?php foreach ($katinsList as $katins) : ?>
                    <optgroup label="<?= $katins->judul_katins; ?>">
                      <?php foreach ($instansiList as $instansi) : ?>
                        <?php if ($instansi->tipe_instansi == $katins->id_katins) : ?>
                          <option value="<?= $instansi->id_instansi; ?>" <?= (set_value('instansi_lapor') == $instansi->id_instansi) ? 'selected' : ''; ?>><?= $instansi->nama_instansi; ?> (<?= $instansi->singkatan_instansi; ?>)</option>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </optgroup>
                  <?php endforeach; ?>
                </select>
                <?= form_error('instansi_lapor'); ?>
              </div>
              <div class="form-group">
                <select class="form-control" data-placeholder="Pilih Kategori Laporan *" data-allow-clear="1" name="kategori_lapor">
                  <option></option>
                  <?php foreach ($katlapList as $katlap) : ?>
                    <option value="<?= $katlap->id_katlap; ?>" <?= (set_value('kategori_lapor') == $katlap->id_katlap) ? 'selected' : ''; ?>><?= $katlap->judul_katlap; ?></option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('kategori_lapor'); ?>
              </div>
              <div class="form-group mb-0">
                <div class="row">
                  <div class="col-md-8 mt-3">
                    <div class="custom-control custom-switch custom-control-inline">
                      <input type="checkbox" class="custom-control-input" id="anonim_lapor" name="anonim_lapor">
                      <label class="custom-control-label tooltips" for="anonim_lapor" data-toggle="tooltip" data-placement="top" title="Kamu tidak perlu login jika fitur anonim diaktifkan.">Anonim</label>
                    </div>
                    <div class="custom-control custom-switch custom-control-inline">
                      <input type="checkbox" class="custom-control-input" id="rahasia_lapor" name="rahasia_lapor">
                      <label class="custom-control-label tooltips" for="rahasia_lapor" data-toggle="tooltip" data-placement="top" title="Laporan tidak ditampilkan di portal jika fitur rahasia diaktifkan.">Rahasia</label>
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
      <div class="row">
        <?php $this->load->view('pages/client/components/flowClient'); ?>
      </div>
    </div>
  </section>
  <?php $this->load->view('pages/guest/components/counter'); ?>
  <?php $this->load->view('components/footer'); ?>

  <?php $this->load->view('partials/scripts'); ?>
</body>

</html>