<style>
   /*Form Wizard*/

   .bs-wizard .bs-wizard-dot {
      z-index: 2;
      border: 2px solid transparent;
   }

   .bs-wizard .bs-wizard-step .progress .progress-bar {
      width: 100% !important;
      z-index: 1;
      background: #ddd !important;
   }

   .bs-wizard .bs-wizard-step.active .progress-bar {
      background: #ddd;
   }

   .bs-wizard .bs-wizard-step.complete .progress-bar {
      background: #d0021b !important;
   }

   .bs-wizard .bs-wizard-step.complete:last-child .progress {
      width: 0px !important;
   }

   .bs-wizard .bs-wizard-step.active .progress,
   .bs-wizard .bs-wizard-step.complete .progress {
      width: 100% !important;
      z-index: 2;
      left: 50%;
   }

   .bs-wizard .bs-wizard-step.active .bs-wizard-dot,
   .bs-wizard .bs-wizard-step.complete .bs-wizard-dot {
      background: #158cba;
      color: white;
   }

   .bs-wizard .bs-wizard-step.active .bs-wizard-dot:after,
   .bs-wizard .bs-wizard-step.complete .bs-wizard-dot:after {
      background: #9d0214;
   }

   .bs-wizard-info {
      display: none !important;
   }

   @media (min-width: 480px) {
      .bs-wizard-info {
         display: block !important;
      }
   }

   .bs-wizard>.bs-wizard-step {
      padding: 0;
      position: relative;
   }

   .bs-wizard>.bs-wizard-step .bs-wizard-stepnum {
      font-size: 10px;
      padding: 0 5px 0;
      font-weight: bold;
      color: #333;
      margin-bottom: 5px;
   }

   @media (min-width: 480px) {
      .bs-wizard>.bs-wizard-step .bs-wizard-stepnum {
         font-size: 16px;
         padding: 20px 5px 0;
      }
   }

   .bs-wizard>.bs-wizard-step .bs-wizard-info {
      color: #666;
      font-size: 14px;
      padding: 0 5px;
   }

   .bs-wizard>.bs-wizard-step>.bs-wizard-dot {
      position: absolute;
      width: 50px;
      height: 50px;
      display: block;
      padding: 13px;
      color: #333;
      text-align: center;
      background: #fff;
      top: 0;
      left: 50%;
      margin-top: -7px;
      margin-left: -25px;
      border-radius: 50%;
      -webkit-box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
   }

   @media (min-width: 480px) {
      .bs-wizard>.bs-wizard-step>.bs-wizard-dot {
         width: 60px;
         height: 60px;
         padding: 15px;
         margin-top: -10px;
         margin-left: -30px;
      }
   }

   .bs-wizard>.bs-wizard-step>.bs-wizard-dot>.fa {
      font-size: 18px;
   }

   @media (min-width: 480px) {
      .bs-wizard>.bs-wizard-step>.bs-wizard-dot>.fa {
         font-size: 24px;
      }
   }

   .bs-wizard>.bs-wizard-step>.progress {
      position: relative;
      border-radius: 0px;
      height: 1px;
      box-shadow: none;
      margin: 20px 0;
   }

   .bs-wizard>.bs-wizard-step>.progress>.progress-bar {
      width: 0px;
      box-shadow: none;
      background: #fbe8aa;
   }

   .bs-wizard>.bs-wizard-step.complete>.progress>.progress-bar {
      width: 100%;
   }

   .bs-wizard>.bs-wizard-step.active>.progress>.progress-bar {
      width: 50%;
   }

   .bs-wizard>.bs-wizard-step:first-child.active>.progress>.progress-bar {
      width: 0%;
   }

   .bs-wizard>.bs-wizard-step:last-child.active>.progress>.progress-bar {
      width: 100%;
   }

   .bs-wizard>.bs-wizard-step.disabled>.bs-wizard-dot {
      background-color: #f5f5f5;
   }

   .bs-wizard>.bs-wizard-step.disabled>.bs-wizard-dot:after {
      opacity: 0;
   }

   .bs-wizard>.bs-wizard-step:first-child>.progress {
      left: 50%;
      width: 50%;
   }

   .bs-wizard>.bs-wizard-step:last-child>.progress {
      width: 50%;
   }

   .bs-wizard>.bs-wizard-step.disabled a.bs-wizard-dot {
      pointer-events: none;
   }

   /*END Form Wizard*/
</style>
<div class="row justify-content-center bs-wizard my-5">
   <div class="col-2 bs-wizard-step active">
      <div class="progress">
         <div class="progress-bar"></div>
      </div>
      <span class="bs-wizard-dot">
         <i class="fa fa-pencil-square-o"></i>
      </span>
      <div class="text-center bs-wizard-stepnum">Tulis Laporan</div>
      <div class="bs-wizard-info text-center">
         Laporkan keluhan atau aspirasi anda dengan jelas dan lengkap
      </div>
   </div>

   <div class="col-2 bs-wizard-step">
      <div class="progress">
         <div class="progress-bar"></div>
      </div>
      <span class="bs-wizard-dot">
         <i class="fa fa-mail-forward"></i>
      </span>
      <div class="text-center bs-wizard-stepnum">Proses Verifikasi</div>
      <div class="bs-wizard-info text-center">
         Dalam 3 hari, laporan Anda akan diverifikasi dan diteruskan kepada instansi berwenang
      </div>
   </div>

   <div class="col-2 bs-wizard-step">
      <div class="progress">
         <div class="progress-bar"></div>
      </div>
      <span class="bs-wizard-dot">
         <i class="fa fa-comments"></i>
      </span>
      <div class="text-center bs-wizard-stepnum">Proses Tindak Lanjut</div>
      <div class="bs-wizard-info text-center">
         Dalam 5 hari, instansi akan menindaklanjuti dan membalas laporan Anda
      </div>
   </div>

   <div class="col-2 bs-wizard-step">
      <div class="progress">
         <div class="progress-bar"></div>
      </div>
      <span class="bs-wizard-dot">
         <i class="fa fa-commenting-o"></i>
      </span>
      <div class="text-center bs-wizard-stepnum">Beri Tanggapan</div>
      <div class="bs-wizard-info text-center">
         Anda dapat menanggapi kembali balasan yang diberikan oleh instansi dalam waktu 10 hari
      </div>
   </div>

   <div class="col-2 bs-wizard-step">
      <div class="progress">
         <div class="progress-bar"></div>
      </div>
      <span class="bs-wizard-dot">
         <i class="fa fa-check"></i>
      </span>
      <div class="text-center bs-wizard-stepnum">Selesai</div>
      <div class="bs-wizard-info text-center">
         Laporan Anda akan terus ditindaklanjuti hingga terselesaikan
      </div>
   </div>
   <div class="col-12 mt-5 text-center">
      <a href="<?= site_url('tentang'); ?>" class="btn btn-outline-primary">Pelajari Lebih Lanjut</a>
   </div>
</div>