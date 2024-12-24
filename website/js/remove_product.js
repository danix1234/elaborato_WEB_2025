document.getElementById("remove").addEventListener("click", function() {
    let productId = new URLSearchParams(window.location.search).get("productId");
    fetch(`./api/manage_product.php?productId=${productId}&delete=`)
        .then(_ => location.reload())
})
