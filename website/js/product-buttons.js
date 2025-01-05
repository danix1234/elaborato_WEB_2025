const quantity = document.getElementsByClassName("button-custom-quantity")[0];
const productId = new URLSearchParams(window.location.search).get("productId");
const messageContainer = document.getElementById("message-container");
const buttonAddItemToCart = document.getElementById("button-add-cart");
const buttonBuyNow = document.getElementById("button-buy-now");


buttonAddItemToCart.addEventListener("click", function () {
    if (isLoggedIn) {
        fetch(`./api/add-cart.php?productId=${productId}&quantity=${quantity.value}`)
            .then(response => response.text())
            .then(data => {
                messageContainer.innerText = data;
                messageContainer.classList.remove("d-none");
                if (data.includes("successo")) {
                    messageContainer.classList.remove("text-danger");
                    messageContainer.classList.add("text-success");
                    return;
                } else {
                    messageContainer.classList.remove("text-success");
                    messageContainer.classList.add("text-danger");
                }
            })
            .catch(error => {
                console.error("Error from product-buttons.js: ", error);
            });
    } else {
        window.location.href = `./sign-in.php`;
    }
});

buttonBuyNow.addEventListener("click", function () {
    if (isLoggedIn) {
        window.location.href = `./api/buy-now.php?productId=${productId}&quantity=${quantity.value}`;
    } else {
        window.location.href = `./sign-in.php`;
    }
});




