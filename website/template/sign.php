<div class="row justify-content-center mx-1">
    <div class="col-12 col-md-6 col-lg-4 border rounded shadow pb-3">
        <form method="POST">
            <h2 class="text-center fw-bold mb-4">Crea account</h2>

            <!-- TODO use for each (sign in and up will use this same template) -->
            <div class="mb-3">
                <label for="nome" class="visually-hidden">Nome</label>
                <input type="text" id="nome" class="form-control" placeholder="Nome" required>
            </div>

            <div class="mb-3">
                <label for="password" class="visually-hidden">Password</label>
                <input type="password" id="password" class="form-control" placeholder="Password" required>
            </div>

            <div class="mb-3">
                <label for="email" class="visually-hidden">Email</label>
                <input type="email" id="email" class="form-control" placeholder="Email" required>
            </div>

            <div class="mb-3">
                <label for="indirizzo" class="visually-hidden">Indirizzo</label>
                <input type="text" id="indirizzo" class="form-control" placeholder="Indirizzo" required>
            </div>

            <div class="mb-3">
                <label for="citta" class="visually-hidden">Città</label>
                <input type="text" id="citta" class="form-control" placeholder="Città" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-custom-lgold">Conferma</button>
            </div>
        </form>
    </div>
</div>