document.getElementById("remove").addEventListener("click", function() {
    let productId = new URLSearchParams(window.location.search).get("productId");
    if (productId) {
        fetch(`./api/manage_product.php?productId=${productId}&delete=`)
            .then(() => location.reload());
    } else {
        alert("No product Id found!");
    }
})
