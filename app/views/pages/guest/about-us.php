<!DOCTYPE html>
<html>

<head>
   <?php $this->load->view('partials/headers'); ?>
</head>

<body>
   <?php $this->load->view('components/navbar'); ?>
   <section id="hero" class="text-center">
      <div id="particle-js">
      </div>
      <div class="container-fluid banner">
         <div class="px-2 pt-5 text-center text-white">
            <h2 class="title font-weight-bold">Tentang Kami</h2>
            <p class="lead">Kanal Aspirasi Mahasiswa dan Layanan Informasi</p>
         </div>
      </div>
      <div class="container-fluid mx-0 px-0">
         <svg width="100%" height="160px" viewBox="0 0 1300 160" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g>
               <path d="M1300,160 L-5.68434189e-14,160 L-5.68434189e-14,119 C423.103102,41.8480501 1096.33049,180.773108 1300,98 L1300,160 Z" fill="#FFFFFF" fill-rule="nonzero"></path>
               <path d="M129.77395,40.2373685 C292.925845,31.2149964 314.345174,146.772453 615.144273,151.135393 C915.94337,155.498333 1017.27057,40.8373289 1240.93447,40.8373289 C1262.89392,40.8373289 1282.20864,41.9705564 1299.18628,44.0144896 L1300,160 L-1.0658141e-14,160 L-1.0658141e-14,105 C31.4276111,70.4780448 73.5616946,43.3459311 129.77395,40.2373685 Z" fill="#FFFFFF" fill-rule="nonzero" opacity="0.3"></path>
               <path d="M69.77395,60.2373685 C232.925845,51.2149964 314.345174,146.772453 615.144273,151.135393 C915.94337,155.498333 1017.27057,0.837328936 1240.93447,0.837328936 C1263.91283,0.837328936 1283.59768,0.606916225 1300,1 L1300,160 L-1.70530257e-13,160 L-9.9475983e-14,74 C-9.9475983e-14,74 36.9912359,62.0502671 69.77395,60.2373685 Z" fill="#FFFFFF" fill-rule="nonzero" opacity="0.3"></path>
               <path d="M2.27373675e-13,68 C23.2194389,95.7701288 69.7555676,123.009338 207,125 C507.7991,129.36294 698.336099,22 922,22 C1047.38026,22 1198.02057,63.2171658 1300,101 L1300,160 L0,160 L2.27373675e-13,68 Z" fill="#FFFFFF" fill-rule="nonzero" opacity="0.3" transform="translate(650, 91) scale(-1, 1) translate(-650, -91) "></path>
            </g>
         </svg>
      </div>
   </section>
   <section id="gradient-white">
      <div class="container">
         <div class="row justify-content-center mb-4">
            <div class="col-md-7">
               <div class="container pb-5">
                  <h5 class="font-weight-bold border-bottom pb-2 mb-3">Tentang Kawal</h5>
                  <p>
                     Kawal merupakan akronim dari “Kanal Aspirasi Mahasiswa dan Layanan Informasi.” Sebuah media berbentuk website, yang akan menjadi pintu utama masuknya aspirasi dan aduan oleh mahasiswa terkait hal-hal yang terjadi di lingkungan kampus PKN STAN.
                  </p>
                  <p>Cakupan Kawal:
                     <ul>
                        <li>Aspirasi Mahasiswa</li>
                        <li>Aduan Mahasiswa</li>
                     </ul>
                  </p>
                  <h5 class="pt-4 font-weight-bold border-bottom pb-2 mb-3">Tujuan Kawal</h5>
                  <p>
                     Sebagai media untuk menerima aspirasi serta aduan mahasiswa untuk ditindaklanjuti oleh Tim Kawal guna keperluan BK KM PKN STAN di masa mendatang.
                  </p>
                  <h5 class="pt-4 font-weight-bold border-bottom pb-2 mb-3">Dasar Hukum</h5>
                  <p>
                     Kawal mengacu pada TAP 002/TAP.02/BLM/V/2017 tentang Badan Legislatif Mahasiswa, yaitu
                     <dt>Pasal 7 huruf e</dt>
                     <dd>BLM memiliki kewajiban menampung, menyalurkan, dan menindaklanjuti aspirasi anggota KM PKN STAN.</dd>
                     <dt>Pasal 7 huruf f</dt>
                     <dd>BLM memiliki tugas menyerap, menghimpun, menampung, dan menindaklanjuti aspirasi mahasiswa berkaitan dengan pelaksanaan Anggaran Dasar dan Anggaran Rumah Tangga KM PKN STAN dan ketetapan.</dd>
                  </p>
                  <h5 class="pt-4 font-weight-bold border-bottom pb-2 mb-3">Struktur Tim Kawal</h5>
                  <p>
                     <dt>Ketua Tim</dt>
                     <dd>Vijey H</dd>
                  </p>
               </div>
            </div>
         </div>
      </div>
   </section>
   <?php $this->load->view('components/footer'); ?>

   <?php $this->load->view('pages/guest/components/modal_panduan'); ?>
   <?php $this->load->view('partials/scripts'); ?>
</body>

</html>