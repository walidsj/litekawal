<section id="gradient-img" class="py-5">
   <div class="container text-white py-2">
      <h3 class="font-weight-bold text-center">Jumlah Laporan Terkirim</h3>
      <div class="numscroller font-weight-bold text-center" data-counter-time="500" data-counter-delay="10">
         <?= number_format(count($laporanList)); ?>
      </div>
   </div>
</section>