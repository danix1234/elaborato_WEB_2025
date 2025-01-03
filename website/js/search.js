function filtrocategorie(codCategoria) {
    console.log(codCategoria);
    const url = new URL(window.location.href);
    url.searchParams.set('codCategoria', codCategoria);
    window.location.href = url.toString();
}
//url.searchParams.delete(nomevariabile)

document.getElementById('searchForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Impedisce il comportamento predefinito del form

    const form = new FormData(this); // Ottiene i dati dal modulo
    const params = new URLSearchParams(window.location.search); // Ottiene i parametri esistenti dalla URL

    // Aggiunge i dati del modulo ai parametri esistenti
    form.forEach((value, key) => {
        params.set(key, value); // Sovrascrive o aggiunge il valore
    });

    // Crea la nuova URL
    const newUrl = `${window.location.pathname}?${params.toString()}`;

    // Aggiorna la URL e ricarica la pagina con i nuovi parametri
    window.location.href = newUrl;
});
