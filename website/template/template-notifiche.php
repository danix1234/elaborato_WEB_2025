 <div class="container-fluid text-center my-4">
     <div class="row justify-content-between col-12">
         <div class="col-12 col-md-6 d-flex justify-content-md-start align-items-center gap-3 py-3">
             <button type="button" class="btn btn-custom-lgold">Seleziona tutto</button>
             <button type="button" class="btn btn-custom-lgold">Leggi Selezionate</button>
         </div>
         <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end align-items-center gap-3 py-3">
             <button type="button" class="btn btn-custom-lgold">Gia' lette</button>
             <button type="button" class="btn btn-custom-lgold">Da leggere</button>
         </div>
     </div>


     <?php for ($i = 0; $i < 4; $i++) { ?>
         <div class="row align-items-center border-bottom py-2">
             <div class="col-12 col-md-1 text-center">
                 <input class="form-check-input select-checkbox" type="checkbox" value="" id="flexCheckDefault">
             </div>
             <div class="col-12 col-md-10 text-wrap text-break">
                 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores aliquid
                 doloremque, minus rem sint tempora, vero reiciendis repudiandae labore maxime aut facilis saepe,
                 nemo provident vel fugit. Et, saepe provident.
             </div>
             <div class="col-6 col-md-1 text-end text-sm-star text-center">
                 12:32
             </div>
         </div>
     <?php } ?>
 </div>