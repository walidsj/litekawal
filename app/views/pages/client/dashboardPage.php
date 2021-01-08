<!DOCTYPE html>
<html>

<head>
  <?php $this->load->view('partials/headers'); ?>
</head>

<body>
  <?php $this->load->view('pages/client/components/navbarClient'); ?>
  <section id="gradient-white">
    <div class="container-lg mt-5 pb-3">
      <div class="row mb-4">
        <div class="col-lg-7 col-md-6 mb-4">
          <!-- form submit laporan -->
          <div class="card p-3 border-0 shadow">
            <div class="card-body">
              <div class="form-group mb-4">
                <h5 class="font-weight-bold">Ajukan Laporan</h5>
              </div>
              <div class="form-group">
                <ul class="nav nav-tabs font">
                  <li class="nav-item">
                    <a href="#kirimaspirasi" class="nav-link active" data-toggle="tab">Aspirasi</a>
                  </li>
                  <li class="nav-item">
                    <a href="#kirimpengaduan" class="nav-link" data-toggle="tab">Pengaduan</a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane fade pt-3 show active" id="kirimaspirasi">
                    <?= form_open(current_url()); ?>
                    <div class="form-group mb-0 pt-2">
                      <label for="tipe_lapor" class="d-block font-weight-bold">Detail Aspirasi <span class="text-danger">*</span></label>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Ketik Judul Aspirasi Kamu *" required name="judul_lapor" value="<?= set_value('judul_lapor'); ?>">
                      <?= form_error('judul_lapor'); ?>
                    </div>
                    <div class="form-group">
                      <textarea rows="6" class="form-control" placeholder="Ketik Isi Aspirasi Kamu *" required name="isi_lapor"><?= set_value('isi_lapor'); ?></textarea>
                      <?= form_error('isi_lapor'); ?>
                    </div>
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
                      <select class="form-control" data-placeholder="Pilih Kategori Aspirasi *" data-allow-clear="1" name="kategori_lapor">
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
                            <input type="checkbox" class="custom-control-input" id="anonim_lapor1" name="anonim_lapor">
                            <label class="custom-control-label tooltips" for="anonim_lapor1" data-toggle="tooltip" data-placement="top" title="Kamu tidak perlu login jika fitur anonim diaktifkan.">Anonim</label>
                          </div>
                          <div class="custom-control custom-switch custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="rahasia_lapor1" name="rahasia_lapor">
                            <label class="custom-control-label tooltips" for="rahasia_lapor1" data-toggle="tooltip" data-placement="top" title="Aspirasi tidak ditampilkan di portal jika fitur rahasia diaktifkan.">Rahasia</label>
                          </div>
                        </div>
                        <div class="col-md-4 text-right mt-3">
                          <button type="submit" name="tipe_lapor" value="aspirasi" class="btn btn-primary btn-block">Kirim Aspirasi</button>
                        </div>
                      </div>
                    </div>
                    <?= form_close(); ?>
                  </div>
                  <div class="tab-pane fade pt-3" id="kirimpengaduan">
                    <?= form_open(current_url()); ?>
                    <div class="form-group mb-0 pt-2">
                      <label for="tipe_lapor" class="d-block font-weight-bold">Detail Pengaduan <span class="text-danger">*</span></label>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Ketik Judul Pengaduan Kamu *" required name="judul_lapor" value="<?= set_value('judul_lapor'); ?>">
                      <?= form_error('judul_lapor'); ?>
                    </div>
                    <div class="form-group">
                      <textarea rows="6" class="form-control" placeholder="Ketik Isi Pengaduan Kamu *" required name="isi_lapor"><?= set_value('isi_lapor'); ?></textarea>
                      <?= form_error('isi_lapor'); ?>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control datepicker" placeholder="Pilih Tanggal Kejadian *" required name="kejadian_lapor" value="<?= set_value('kejadian_lapor'); ?>">
                      <?= form_error('kejadian_lapor'); ?>
                    </div>
                    <div class=" form-group">
                      <input class="form-control" placeholder="Ketik Lokasi Kejadian *" required name="lokasi_lapor" value="<?= set_value('lokasi_lapor'); ?>">
                      <?= form_error('lokasi_lapor'); ?>
                    </div>
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
                      <select class="form-control" data-placeholder="Pilih Kategori Pengaduan *" data-allow-clear="1" name="kategori_lapor">
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
                            <input type="checkbox" class="custom-control-input" id="anonim_lapor2" name="anonim_lapor">
                            <label class="custom-control-label tooltips" for="anonim_lapor2" data-toggle="tooltip" data-placement="top" title="Kamu tidak perlu login jika fitur anonim diaktifkan.">Anonim</label>
                          </div>
                          <div class="custom-control custom-switch custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="rahasia_lapor2" name="rahasia_lapor">
                            <label class="custom-control-label tooltips" for="rahasia_lapor2" data-toggle="tooltip" data-placement="top" title="Pengaduan tidak ditampilkan di portal jika fitur rahasia diaktifkan.">Rahasia</label>
                          </div>
                        </div>
                        <div class="col-md-4 text-right mt-3">
                          <button type="submit" name="tipe_lapor" value="pengaduan" class="btn btn-primary btn-block">Kirim Pengaduan</button>
                        </div>
                      </div>
                    </div>
                    <?= form_close(); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- form submit laporan -->
          <!-- laporanku -->
          <div class="card p-3 mt-4 border-0 shadow">
            <div class="card-body">
              <div class="form-group">
                <h5 class="font-weight-bold mb-4">Laporan Saya</h5>
                <ul class="nav nav-tabs font">
                  <li class="nav-item">
                    <a href="#aspirasi" class="nav-link active" data-toggle="tab">Aspirasi</a>
                  </li>
                  <li class="nav-item">
                    <a href="#pengaduan" class="nav-link" data-toggle="tab">Pengaduan</a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane fade pt-3 show active" id="aspirasi">
                    <?php
                    $i_aspirasi = 0;
                    foreach ($laporanList as $laporan) : ?>
                      <?php if ($laporan->tipe_lapor == 1) : ?>
                        <a href="<?= site_url(); ?>laporan/detail/<?= strtolower($laporan->kode_lapor); ?>/<?= $laporan->slug_lapor; ?>" class="text-decoration-none">
                          <div class="card border-0 shadow-sm p-2 my-3">
                            <div class="card-body p-0">
                              <table class="table p-0 m-0 table-borderless">
                                <tr>
                                  <td class="pr-0" width="1%">
                                    <img class="img shadow-sm rounded-circle" src="<?= base_url(); ?>public/assets/img/user.png" alt="User Avatar" width="48">
                                  </td>
                                  <td>
                                    <span class="text-dark font-weight-bold"><?= strlen($laporan->judul_lapor) > 64 ? substr($laporan->judul_lapor, 0, 64) . "..." : $laporan->judul_lapor; ?></span>
                                    <p class="text-muted mb-2"><?= strlen($laporan->isi_lapor) > 96 ? substr($laporan->isi_lapor, 0, 96) . "..." : $laporan->isi_lapor; ?></p>
                                    <small class="d-block text-muted">
                                      <i class="fa fa-clock-o mr-1"></i><?= strftime('%A, %e %B %Y', strtotime($laporan->tanggal_lapor)); ?> <i class="fa fa-university mr-1 ml-3"></i><?= $laporan->nama_instansi; ?>
                                    </small>
                                    <!-- <small class="d-block text-muted font-italic">
                                    #<?= $laporan->kode_lapor; ?>&nbsp;-&nbsp;
                                    <?php switch ($laporan->status_lapor) {
                                      case 0:
                                        echo "Belum diverifikasi";
                                        break;
                                      case 1:
                                        echo "Terverifikasi";
                                        break;
                                      case 2:
                                        echo "Diproses";
                                        break;
                                      case 3:
                                        echo "Selesai";
                                        break;
                                    } ?>
                                  </small> -->
                                  </td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </a>
                      <?php
                        $i_aspirasi++;
                      endif; ?>
                    <?php endforeach; ?>
                    <?php if ($i_aspirasi < 1) : ?>
                      <div class="col pt-3 text-center">
                        <img src="<?= base_url(); ?>public/assets/img/404-error.png" width="64" height="64">
                      </div>
                    <?php endif; ?>
                  </div>
                  <div class="tab-pane fade pt-3" id="pengaduan">
                    <?php
                    $i_pengaduan = 0;
                    foreach ($laporanList as $laporan) : ?>
                      <?php if ($laporan->tipe_lapor == 2) : ?>
                        <a href="<?= site_url(); ?>laporan/detail/<?= strtolower($laporan->kode_lapor); ?>/<?= $laporan->slug_lapor; ?>" class="text-decoration-none">
                          <div class="card border-0 shadow-sm p-2 my-3">
                            <div class="card-body p-0">
                              <table class="table p-0 m-0 table-borderless">
                                <tr>
                                  <td class="pr-0" width="1%">
                                    <img class="img shadow-sm rounded-circle" src="<?= base_url(); ?>public/assets/img/user.png" alt="User Avatar" width="48">
                                  </td>
                                  <td>
                                    <span class="text-dark font-weight-bold"><?= strlen($laporan->judul_lapor) > 64 ? substr($laporan->judul_lapor, 0, 64) . "..." : $laporan->judul_lapor; ?></span>
                                    <p class="text-muted mb-2"><?= strlen($laporan->isi_lapor) > 96 ? substr($laporan->isi_lapor, 0, 96) . "..." : $laporan->isi_lapor; ?></p>
                                    <small class="d-block text-muted">
                                      <i class="fa fa-clock-o mr-1"></i><?= strftime('%A, %e %B %Y', strtotime($laporan->tanggal_lapor)); ?> <i class="fa fa-university mr-1 ml-3"></i><?= $laporan->nama_instansi; ?>
                                    </small>
                                    <!-- <small class="d-block text-muted font-italic">
                                    #<?= $laporan->kode_lapor; ?>&nbsp;-&nbsp;
                                    <?php switch ($laporan->status_lapor) {
                                      case 0:
                                        echo "Belum diverifikasi";
                                        break;
                                      case 1:
                                        echo "Terverifikasi";
                                        break;
                                      case 2:
                                        echo "Diproses";
                                        break;
                                      case 3:
                                        echo "Selesai";
                                        break;
                                    } ?>
                                  </small> -->
                                  </td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </a>
                      <?php
                        $i_pengaduan++;
                      endif; ?>
                    <?php endforeach; ?>
                    <?php if ($i_pengaduan < 1) : ?>
                      <div class="col pt-3 text-center">
                        <img src="<?= base_url(); ?>public/assets/img/404-error.png" width="64" height="64">
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- laporanku -->
        </div>
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
          <!---- Intansi Card ---->
          <div class="card p-3 mt-4 border-0 shadow">
            <div class="card-body">
              <div class="form-group">
                <h5 class="font-weight-bold mb-4">Instansi Terbaru</h5>
                <?php foreach ($instansiUserList as $instansi) : ?>
                  <a href="<?= site_url(); ?>instansi/detail/<?= strtolower($instansi->id_instansi); ?>" class="text-decoration-none">
                    <div class="card border-0 shadow-sm p-2 my-3">
                      <div class="card-body p-0">
                        <table class="table p-0 m-0 table-borderless">
                          <tr>
                            <td class="pr-0" width="1%">
                              <img class="img shadow-sm rounded-circle" src="<?= base_url(); ?>public/assets/img/instansi.png" alt="Unit Instansi KM" width="48">
                            </td>
                            <td>
                              <span class="font-weight-bold"><?= $instansi->nama_instansi; ?></span>
                              <p class="text-muted mb-2"><?= strlen($instansi->deskripsi_instansi) > 64 ? substr($instansi->deskripsi_instansi, 0, 64) . "..." : $instansi->deskripsi_instansi; ?></p>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </a>
                <?php endforeach; ?>
                <?php if (empty($instansiUserList)) : ?>
                  <div class="col pt-3 text-center">
                    <img src="<?= base_url(); ?>public/assets/img/404-error.png" width="64" height="64">
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <!---- Intansi Card ---->
        </div>
      </div>
    </div>
  </section>
  <?php $this->load->view('components/footer'); ?>

  <?php $this->load->view('partials/scripts'); ?>
</body>

</html>