<!-- TODO getdata from database -->
<h2>Nome Prodotto</h2>

<p class="text-body-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur nec orci sit amet elit
    volutpat aliquet.</p>

<div class="text-center my-3">
    <img src="img/temp.jpg" class="img-fluid" alt="Product Image" style="max-height: 300px;" /> <!-- TODO add ref -->
</div>
<!-- costo e stelle -->
<div class="row d-flex align-items-center justify-content-between mb-3">
    <div class="col-3 text-center fw-bold fs-5">€10,70</div>
    <div class="col text-start"><span class="bi bi-star-fill text-custom-lgold"></span> 4.5/5</div>
</div>
<!-- quantita -->
<div class="row align-items-center mb-3">
    <div class="col-3 d-flex align-items-center">
        <label for="quantita" class="form-label mb-0">Quantità</label>
    </div>
    <div class="col">
        <div class="input-group">
            <button class="btn btn-outline-secondary button-size" type="button" id="decrement">-</button>
            <input id="quantita" type="number" class="form-control text-center border-secondary" value="1" min="1">
            <button class="btn btn-outline-secondary button-size" type="button" id="increment">+</button>
        </div>
    </div>
</div>

<!-- aggiungi carrello -->
<div class="d-grid gap-2">
    <button class="btn btn-custom-lgold">Aggiungi al Carrello</button>
    <button class="btn btn-custom-gold">Compra Subito</button>
</div>

<hr>

<!-- recensioni TODO da cambiare con foreach ecc..-->
<section class="mt-2">
        <h3 class="fw-bold mb-3">Recensioni</h3>
        <ul>
            <li class="d-flex align-items-start mb-3">
                <img src="img/temp.jpg" class="rounded-circle me-3 user-avatar-size" alt="Profilo Utente" />
                <div>
                    <strong>Pimpo Bello</strong>
                    <p class="mb-1"><span class="bi bi-star-fill text-custom-lgold"></span> 4/5</p>
                    <p class="text-body-secondary mb-0">Bello!</p>
                </div>
            </li>
            <li class="d-flex align-items-start">
                <img src="img/temp.jpg" class="rounded-circle me-3 user-avatar-size" alt="Profilo Utente" />
                <div>
                    <strong>Giulio Brutto</strong>
                    <p class="mb-1"><span class="bi bi-star-fill text-custom-lgold"></span> 1/5</p>
                    <p class="text-body-secondary mb-0">Brutto, Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo quae, esse est debitis velit exercitationem corrupti voluptate magnam consectetur commodi error vel beatae aliquam minima repellat id ipsam perspiciatis mollitia!</p>
                </div>
            </li>
        </ul>
    </section>
