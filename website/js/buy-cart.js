// long names are good as they are harder to collide in different js scripts!
function checkerValidityCartItem(quantityButton) {
    const buyButton = document.getElementById("buy")
    const errMsgSpan = document.getElementById(`msg${quantityButton.id}`)

    fetch(`./api/check_cart_item.php?productId=${quantityButton.id}`)
        .then(response => response.text())
        .then(response => JSON.parse(response))
        .then(arr => {
            elem = arr[0]
            if (elem["quantita"] > elem["quantitaResidua"]) {
                errMsgSpan.innerText = "La quantità richiesta è superiore a quella disponibile in negozio!"
            } else {
                errMsgSpan.innerText = ""
            }
        })
        // if i didn't put it inside .then, it wouldn't be run SEQUENTIALLY!
        .then(_ => {
            buyButton.disabled = false
            for (const innerQuantityButton of document.getElementsByClassName("button-custom-quantity")) {
                if (document.getElementById(`msg${innerQuantityButton.id}`).innerText !== "") {
                    buyButton.disabled = true
                }
            }
        })
}

for (const quantityButton of document.getElementsByClassName("button-custom-quantity")) {
    checkerValidityCartItem(quantityButton)
    quantityButton.addEventListener("change", function() { checkerValidityCartItem(this) })
}

document.getElementById("buy")?.addEventListener("click", function() {
    window.location.href = "./api/buy_entire_cart.php";
})
