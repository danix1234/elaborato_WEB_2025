 <?php for ($i = 0; $i < 4; $i++) { ?>
     <div class="container text-center">
         <div class="row row-cols-1 row-cols-md-3">
             <?php
                for ($j = 0; $j < 3; $j++) { ?>
                 <div class="col mb-5"><a href="#"><img src="img/temp.jpg" class="img-fluid" alt="Logo" /></a>
                     <header>nome</header>
                     <p>descrizione</p>
                     <p>prezzo</p>
                     <p>recensione</p>
                     <button type="button" class="btn btn-custom-gold">acquista subito</button>
                     <button type="button" class="btn"><i class="bi bi-cart"></i></button>
                 </div>
             <?php
                } ?>
         </div>
     </div>

 <?php } ?>