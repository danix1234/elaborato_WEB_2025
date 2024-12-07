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
<div class="row align-items-center mb-2">
    <div class="col-3">
        <label for="quantita" class="form-label">Quantità</label>
    </div>
    <div class="col">
        <div class="input-group">
            <button class="btn btn-outline-secondary" type="button" id="decrement">-</button>
            <input id="quantita" type="number" class="form-control text-center" value="1" min="1">
            <button class="btn btn-outline-secondary" type="button" id="increment">+</button>
        </div>
    </div>
</div>

<!-- aggiungi carrello -->
<div class="d-grid gap-2">
    <button class="btn btn-custom-lgold">Aggiungi al Carrello</button>
    <button class="btn btn-custom-gold">Compra Subito</button>
</div>
