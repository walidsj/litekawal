<nav class="navbar navbar-light bg-transparent fixed-top border-0 py-4">
   <div class="container">
      <a class="navbar-brand" href="#">
         <img src="https://getbootstrap.com/docs/4.5/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
         <?= getenv('web.TitleName'); ?>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav">
            <li class="nav-item active">
               <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
               <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
         </ul>
      </div>
   </div>
</nav>