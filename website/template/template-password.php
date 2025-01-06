<div class="row justify-content-center mx-1">
    <div class="col-12 col-md-6 col-lg-4 border rounded p-3">
        <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
            <h1 class="text-center fw-bold mb-2"><?php echo $templateParams["tipo"]; ?></h1>
            <?php if (isset($templateParams["errore"])): ?>
                <div class="text-danger mb-3">
                    <?php echo $templateParams["errore"] ?>
                </div>
            <?php endif; ?>

            <?php for ($i = 0; $i < count($templateParams["fields"]); $i++) { ?>
                <div class="mb-2">
                    <label for="<?php echo $templateParams["fields"][$i]; ?>"
                        class="visually-hidden"><?php echo $templateParams["fields"][$i]; ?></label>
                    <input type="password" id="<?php echo $templateParams["fields"][$i]; ?>"
                        name="<?php echo $templateParams["fields"][$i]; ?>" class="form-control"
                        placeholder="<?php echo $templateParams["placeHolder"][$i]; ?>"
                        required />
                </div>
            <?php } ?>

            <div class="d-grid">
                <button type="submit" class="btn btn-custom-lgold">Conferma</button>
            </div>

        </form>
    </div>
</div>