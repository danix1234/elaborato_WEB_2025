<div class="row justify-content-center mx-1">
    <div class="col-12 col-md-6 col-lg-4 border rounded p-3">
        <form action="<?php echo $templateParams['action']; ?>" method="POST">
            <h1 class="text-center fw-bold mb-2"><?php echo $templateParams["tipo"]; ?></h1>
            <?php if (isset($templateParams["erroresign"])): ?>
                <div class="text-danger mb-3">
                    <?php echo $templateParams["erroresign"] ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($templateParams["fields"])): ?>
                <?php for ($i = 0; $i < count($templateParams["fields"]); $i++) { ?>

                    <div class="mb-2">
                        <label for="<?php echo $templateParams["fields"][$i]; ?>"
                            class="visually-hidden"><?php echo $templateParams["fields"][$i]; ?></label>
                        <input type="<?php echo $templateParams["fields"][$i] === "password" ? "password" : "text"; ?>"
                            id="<?php echo $templateParams["fields"][$i]; ?>"
                            name="<?php echo $templateParams["fields"][$i]; ?>" class="form-control"
                            placeholder="<?php echo isLoggedIn() ? "" : $templateParams["placeHolder"][$i]; ?>"
                            value="<?php echo isLoggedIn() ? $templateParams["value"][$i] : "" ?>" required
                            <?php echo isLoggedIn()? "disabled" : ""?> />
                    </div>

                <?php } ?>
            <?php endif; ?>

            <?php if (!isLoggedIn()) { ?>
                <div class="d-grid">
                    <button type="submit" class="btn btn-custom-lgold">Conferma</button>
                </div>
            <?php } else { ?>
                <div class="d-grid gap-2">
                    <a href="conferma-password.php?redirect=modifica-dati" class="btn btn-custom-lgold">Modifica dati</a>
                    <a href="conferma-password.php?redirect=modifica-password" class="btn btn-custom-lgold">Modifica
                        password</a>
                </div>
            <?php } ?>
        </form>
        <hr />
        <div class="d-grid">
            <a href="<?php echo isLoggedIn() ? '?logout=true' : $templateParams['redirect-link']; ?>"
                class="btn <?php echo isLoggedIn() ? 'btn-danger' : 'btn-light shadow'; ?> border">
                <?php echo $templateParams["redirect"]; ?>
            </a>
        </div>
    </div>
</div>