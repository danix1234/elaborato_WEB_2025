 <div class="container text-center">
     <div class="row row-cols-3 row-cols-md-4 my-4">
         <div class="col">
             <button type="button" class="btn" data-bs-toggle="button">Seleziona tutto</button>
         </div>
         <div class="col">
             <button type="button" class="btn" data-bs-toggle="button">Leggi tutto</button>
         </div>
         <div class="col">
             <button type="button" class="btn" data-bs-toggle="button">Da leggere</button>
         </div>
         <div class="col d-none d-md-block">
             <button type="button" class="btn" data-bs-toggle="button">Già letti</button>
         </div>
     </div>
     <?php for ($i = 0; $i < 4; $i++) { ?>
         <div class="row cols-12 mb-3">
             <div class="col-2"><a href="#"><img src="img/temp.jpg" class="img-fluid" alt="Logo" /></a></div>
             <div class="col-8">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores aliquid
                 doloremque, minus rem sint tempora, vero reiciendis repudiandae labore maxime aut facilis saepe,
                 nemo provident vel fugit. Et, saepe provident.</div>
             <div class="col-2">12:32</div>
         </div>
     <?php } ?>
 </div>