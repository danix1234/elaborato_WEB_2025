<div class="row justify-content-center mx-1">
    <div class="col-12 col-md-6 col-lg-4 border rounded p-4">
        <form action="#" method="POST">
            <h2 class="text-center fw-bold mb-2"><?php echo $templateParams["tipo"]; ?></h2>
            <?php if (isset($templateParams["erroresign"])): ?>
                <div class="text-danger mb-3">
                    <?php echo $templateParams["erroresign"] ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($templateParams["fields"])): ?>
                <?php foreach ($templateParams["fields"] as $field): ?>

                    <div class="mb-3">
                        <label for="<?php echo $field; ?>" class="visually-hidden"><?php echo ucfirst($field); ?></label>
                        <input type="<?php echo $field === 'password' ? 'password' : 'text'; ?>" id="<?php echo $field; ?>"
                            name="<?php echo $field; ?>" class="form-control" placeholder="<?php echo ucfirst($field); ?>"
                            required>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (!isLoggedIn()): ?>
                <div class="d-grid">
                    <button type="submit" class="btn btn-custom-lgold">Conferma</button>
                </div>
            <?php endif; ?>
        </form>
        <hr />

        <div class="d-grid">
            <a href="<?php echo isLoggedIn() ? '?logout=true' : $templateParams["redirect-link"]; ?>"
                class="btn btn-light border shadow">
                <?php echo $templateParams["redirect"]; ?>
            </a>
        </div>
    </div>
</div>