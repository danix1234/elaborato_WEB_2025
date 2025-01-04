<div class="row justify-content-center mx-1">
    <div class="col-12 col-md-6 col-lg-4 border rounded p-3">
        <form action="<?php echo $templateParams['action']; ?>" method="POST">
            <h1 class="text-center fw-bold mb-2"><?php echo $templateParams["tipo"]; ?></h1>
            <?php if (isset($templateParams["errore"])): ?>
                <div class="text-danger mb-3">
                    <?php echo $templateParams["errore"] ?>
                </div>
            <?php endif; ?>


            <div class="mb-3">
                <label for="password" class="visually-hidden">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" />
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-custom-lgold">Conferma</button>
            </div>

        </form>
    </div>
</div>