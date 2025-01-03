document.getElementById("remove").addEventListener("click", function() {
    let productId = new URLSearchParams(window.location.search).get("productId");
    if (productId) {
        window.location.href = `./api/manage_product.php?productId=${productId}&delete=`
    } else {
        alert("No product Id found!");
    }
})

//document.getElementById("insert").addEventListener("click", function() {
//    window.location.href = `./admin-prodotto.php`
//})
