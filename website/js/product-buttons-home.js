function addToCart(productId) {
    if (isLoggedIn) {
        fetch(`./api/add-cart.php?productId=${productId}&quantity=1`)
            .then(response => response.text())
            .then(data => {
                console.log("Server Response: ", data);
                // Reindirizza alla pagina carrello solo dopo che il fetch è completato
                window.location.href = `carrello.php#item-${productId}`;
            })
            .catch(error => {
                console.error("Error from product-buttons-home.js: ", error);
            });
    } else {
        // Reindirizza alla pagina di login se l'utente non è loggato
        window.location.href = `./sign-in.php`;
    }
};


function buyNow(productId) {
    if (isLoggedIn) {
        window.location.href = `./api/buy-now.php?productId=${productId}&quantity=1`;
    }
    else {
        window.location.href = `./sign-in.php`;
    }
};
