<div class="mx-1 mx-md-4">
    <?php
    function disabled($disabled)
    {
        if ($disabled) {
            echo "L'utente è stato bannato!";
        }
    }
    if (isset($templateParams["utenti"]) && sizeof($templateParams["utenti"]) == 0) { ?>
        <header class="row my-2">
            <h1 class="col text-center my-0">
                Nessun Utente!
            </h1>
        </header>
    <?php echo '</div>';
        return;
    } ?>


    <!--title of entire page-->
    <header class="row my-2">
        <div class="col-1"> </div>
        <h1 class="col-10 text-center my-0">
            Utenti
        </h1>
    </header>

    <!--lista dei prodotti-->
    <div class="text-center text-md-start">
        <?php
        $items = array();
        $total_price = 0;
        if (isset($templateParams["utenti"])) {
            $items = $templateParams["utenti"];
        }
        for ($i = 0; $i < sizeof($items); $i++) {
            $item = $items[$i];
            $disabilitato = $item["disabilitato"];
            $btnDisable = $disabilitato ? "Abilita" : "Disabilita";
            $privilegies = ($item["privilegi"]) ? "Admin" : "User";
            $img = getUserImage($item["privilegi"]); // change: add admin and user img
        ?>
            <div class="row mb-3 align-items-center">
                <div class="col-12 col-md-8 mx-auto">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row py-4">
                                <div class="col-md-4">
                                    <div class="row justify-content-center">
                                        <img class="img-fluid col-auto user-avatar-big-size" src="<?php echo $img ?>" alt="" />
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <h2>Utente #<?php echo $item["codUtente"] ?></h2>
                                    </div>
                                    <div class="row">
                                        <span>Nome: <?php echo $item["nomeUtente"] ?></span>
                                    </div>
                                    <div class="row">
                                        <span>Email: <?php echo $item["email"] ?></span>
                                    </div>
                                    <div class="row">
                                        <span>Privilegi: <?php echo $privilegies ?></span>
                                    </div>
                                    <div class="row">
                                        <span>Residenza: <?php echo $item["indirizzo"] ?>, <?php echo $item["citta"] ?></span>
                                    </div>
                                    <div class="row">
                                        <span class="text-danger"><?php disabled($item["disabilitato"]) ?></span>
                                    </div>
                                    <div class="row justify-content-md-start justify-content-center mt-2 ms-0">
                                        <?php if (!$disabilitato && getCurrentUserId() != $item["codUtente"]) { ?>
                                            <button class="btn btn-danger col-auto me-4 custom-remove-button" id="<?php echo $item["codUtente"] ?>">Disabilita</button>
                                        <?php } else if ($disabilitato) { ?>
                                            <button class="btn btn-danger col-auto me-4 custom-remove-button" id="<?php echo $item["codUtente"] ?>">Abilita</button>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <!--resoconto-->
</div>
