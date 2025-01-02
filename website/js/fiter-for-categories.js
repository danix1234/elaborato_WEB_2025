function filtrocategorie(codCategoria) {
    console.log(codCategoria);
    const url = new URL(window.location.href);
    url.searchParams.set('codCategoria', codCategoria);
    window.location.href = url.toString();
}
//url.searchParams.delete(nomevariabile)