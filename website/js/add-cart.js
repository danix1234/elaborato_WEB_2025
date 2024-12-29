const quantity = document.getElementsByClassName("button-custom-quantity")[0];
const productId = new URLSearchParams(window.location.search).get("productId");
const addItemToCart = document.getElementById("button-add-cart");
addItemToCart.addEventListener("click", function () {
    fetch(`./api/add-cart.php?product=${productId}&quantity=${quantity.value}`)
        .then(() => location.reload());
        // for debugging purposes
        /* .then(response => response.text())
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.error('Error:', error);
        }); */
});




