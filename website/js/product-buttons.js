// put in cart and buy now buttons
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

// star rating
const stars = document.getElementsByClassName("star");
const votoRecensione = document.getElementById("votoRecensione");

for (let i = 0; i < stars.length; i++) {
    
    stars[i].addEventListener("click", function () {
        const value = this.getAttribute("data-value");
        votoRecensione.value = value;
        updateStars(value);
    });

    stars[i].addEventListener("mouseover", function () {
        const value = this.getAttribute("data-value");
        updateStars(value);
    });

    stars[i].addEventListener("mouseout", function () {
        updateStars(votoRecensione.value);
    });
}

function updateStars(value) {
    for (let i = 0; i < stars.length; i++) {
        if (parseInt(stars[i].getAttribute("data-value")) <= parseInt(value)) {
            stars[i].classList.add("bi-star-fill");
            stars[i].classList.remove("bi-star");   
        } else {
            stars[i].classList.add("bi-star");
            stars[i].classList.remove("bi-star-fill");
        }
    }
    
}




