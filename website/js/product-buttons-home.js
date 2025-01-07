function addToCart(productId) {
    if (isLoggedIn) {
        fetch(`./api/add-cart.php?productId=${productId}&quantity=1`)
            .then(response => response.text())
            .catch(error => {
                console.error("Error from product-buttons-home.js: ", error);
            });
    } else {
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
