 <div class="container-fluid text-center">
     <div class="row my-4">
         <div class="col">
             <button type="button" class="btn btn-custom-gold" data-bs-toggle="button">Seleziona tutto</button>
         </div>
         <div class="col">
             <button type="button" class="btn btn-custom-gold" data-bs-toggle="button">Segna come lette</button>
         </div>
         <div class="col">
             <button type="button" class="btn btn-custom-gold" data-bs-toggle="button">Elimina selezionate</button>
         </div>
     </div>
     <?php for ($i = 0; $i < 4; $i++) { ?>
         <div class="row align-items-center border-bottom py-2">
             <div class="col-1"><input class="form-check-input select-checkbox" type="checkbox" value="" id="flexCheckDefault"></div>
             <div class="col-9">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores aliquid
                 doloremque, minus rem sint tempora, vero reiciendis repudiandae labore maxime aut facilis saepe,
                 nemo provident vel fugit. Et, saepe provident.</div>
             <div class="col-1 text-end">12:32</div>
             <div class="col-1">
                 <button type="button" class="btn btn-custom-lgold" data-bs-toggle="button">Elimina</button>
             </div>
         </div>
     <?php } ?>
 </div>
 <!-- <div class="col d-none d-md-block">  
<button type="button" class="btn" data-bs-toggle="button">Già letti</button>  </div> -->