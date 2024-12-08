<!--title of entire page-->
<header class="row">
    <h1 class="col text-center">
        Ordini
    </h1>
</header>

<div class="container-fluid">
    <table class="table table-bordered table-striped table-hover table-responsive">
        <thead>
            <tr>
                <th scope="col">Id ordine</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Data</th>
                <th scope="col">Totale</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i=0; $i < 5 ; $i++) { ?>
            <tr>
                <th scope="row">id ordine</th>
                <td>questo ordine contiene: 2 laptop, 3 rasoi, 1 banana, 3 kiwi, 4 lattughe, 2 schiaffi in faccia</td>
                <td>12/05/2024</td>
                <td>25.99$</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
