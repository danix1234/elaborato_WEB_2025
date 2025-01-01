const quantity = 1;
const productId = new URLSearchParams(window.location.search).get("productId");

const buttonAddItemToCart = document.getElementById("button-add-cart-home");
const buttonBuyNow = document.getElementById("button-buy-now-home");

if (buttonAddItemToCart) {
    buttonAddItemToCart.addEventListener("click", function () {
        fetch(`./api/add-cart.php?productId=${productId}&quantity=${quantity}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.text();
            })
            .then(data => {
                console.log("Item added to cart:", data);
            })
            .catch(error => {
                console.error("Errore durante l'aggiunta al carrello:", error);
            });
    });
}

if (buttonBuyNow) {
    buttonBuyNow.addEventListener("click", function () {
        window.location.href = `./api/buy-now.php?productId=${productId}&quantity=${quantity}`;
    });
}
