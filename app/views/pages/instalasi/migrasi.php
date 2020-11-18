<html>

<head>
   <title>Tool Migration</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/lumen/bootstrap.min.css" integrity="sha384-GzaBcW6yPIfhF+6VpKMjxbTx6tvR/yRd/yJub90CqoIn2Tz4rRXlSpTFYMKHCifX" crossorigin="anonymous">
</head>

<body>
   <?php $this->load->view('pages/instalasi/components/navbar'); ?>
   <div class="container mt-5">
      <div class="row justify-content-center">
         <div class="col-6">
            <div class="card">
               <div class="card-header">
                  <h1 class="card-title">
                     Tool Migration
                  </h1>
               </div>
               <?= form_open(current_url()); ?>
               <div class="card-body">
                  <div class="form-group">
                     <label>Current Migration</label>
                     <input class="form-control" value="<?= $this->migration->current(); ?>" disabled>
                  </div>
                  <div class="form-group">
                     <label>Migration Database</label>
                     <input class="form-control" name="version">
                     <?= form_error('version'); ?>
                     <?= (!empty($this->session->flashdata('alert'))) ? "<small class='text-danger'>" . $this->session->flashdata('alert') . "</small>" : null; ?>
                  </div>
                  <div class="form-group">
                     <button type="submit" class="btn btn-primary">
                        Mulai Migrasi
                     </button>
                  </div>
               </div>
               <?= form_close(); ?>
            </div>
         </div>
      </div>
   </div>

   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>