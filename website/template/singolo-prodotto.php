<div class="row mt-4">
    <div class="col-12 col-md-5 text-center mb-3 mb-md-0">
        <img src="img/temp.jpg" class="img-fluid" alt="Product Image" />
        <!-- TODO add ref -->
    </div>

    <!-- nome, descr, costo, voto -->
    <div class="col-12 col-md-4 d-flex flex-column align-items-center">
        <h2>Nome Prodotto</h2>
        <p class="text-body-secondary mb-4">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit, ex non doloremque excepturi neque quia
            fugiat aliquid ipsa autem mollitia modi tenetur dolores nesciunt odit expedita adipisci deleniti nobis
            totam?
        </p>

        <div class="d-flex justify-content-between w-100 mb-3">
            <div class="fw-bold fs-4">€10,70</div>
            <div class="text-end">
                4.5/5
                <span class="bi bi-star-fill text-custom-lgold"></span>
                <span class="bi bi-star-fill text-custom-lgold"></span>
                <span class="bi bi-star-fill text-custom-lgold"></span>
                <span class="bi bi-star-fill text-custom-lgold"></span>
                <span class="bi bi-star-half text-custom-lgold"></span>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-3 d-flex flex-column align-items-center align-items-md-end">
        <!-- quantità -->
        <div class="d-flex align-items-center mb-3">
            <label for="quantita" class="form-label mb-0 me-2">Quantità</label>
            <div class="input-group">
                <button tabindex="-1" class="input-group-text font-monospace" type="button" id="decrement">-</button>
                <input class="form-control button-custom-quantity" value="1" type="text" name="quantity" id="quantity" required />
                <button tabindex="-1" class="input-group-text font-monospace" type="button" id="increment">+</button>
            </div>
        </div>

        <!-- carrello -->
        <div class="d-grid gap-2 w-100">
            <button class="btn btn-custom-lgold">Aggiungi al Carrello</button>
            <button class="btn btn-custom-gold">Compra Subito</button>
        </div>
    </div>
</div>

<!-- Reviews Section -->
<hr />
<div class="row">
    <div class="col col-md-8 col-lg-6 border rounded mb-2 mx-auto">
        <section class="mt-4">
            <h3 class="fw-bold mb-3">Recensioni</h3>
            <ul class="p-0">
                <li class="d-flex align-items-start mb-3">
                    <img src="img/temp.jpg" class="rounded-circle me-3 user-avatar-size" alt="Profilo Utente" />
                    <div>
                        <strong>Pimpo Bello</strong>
                        <p class="mb-1">4/5
                            <span class="bi bi-star-fill text-custom-lgold"></span>
                            <span class="bi bi-star-fill text-custom-lgold"></span>
                            <span class="bi bi-star-fill text-custom-lgold"></span>
                            <span class="bi bi-star-fill text-custom-lgold"></span>
                            <span class="bi bi-star-fill text-custom-lgold"></span>
                        </p>
                        <p class="text-body-secondary mb-0">Bello!</p>
                    </div>
                </li>
                <li class="d-flex align-items-start">
                    <img src="img/temp.jpg" class="rounded-circle me-3 user-avatar-size" alt="Profilo Utente" />
                    <div>
                        <strong>Giulio Brutto</strong>
                        <p class="mb-1"><span class="bi bi-star-fill text-custom-lgold"></span> 1/5</p>
                        <p class="text-body-secondary mb-0">
                            Brutto, Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo quae, esse est debitis
                            velit
                            exercitationem corrupti voluptate magnam consectetur commodi error vel beatae aliquam minima
                            repellat id ipsam perspiciatis mollitia!
                        </p>
                    </div>
                </li>
            </ul>
        </section>
        <hr />
        <p>vedi altre Recensioni</p>
    </div>
</div>

