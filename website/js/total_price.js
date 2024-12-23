const number_inputs = document.getElementsByClassName("button-custom-quantity")
for (let i = 0; i < number_inputs.length; i++) {
    let update = function() {
        fetch(`./api/update_cart.php?product=${number_inputs[i].id}&quantity=${parseInt(number_inputs[i].value)}`)
        let total_price = 0
        for (let inner = 0; inner < number_inputs.length; inner++) {
            const quantityInner = parseInt(number_inputs[inner].value)
            const unaryPriceInner = parseFloat(document.getElementsByClassName("text-custom-price")[inner].innerHTML.split(":")[1].trim())
            total_price += quantityInner * unaryPriceInner
        }
        document.getElementsByClassName("text-custom-totprice")[0].innerText = `Prezzo totale: ${(Number(total_price).toLocaleString())}€`
    }
    const number_input = number_inputs[i]
    number_input.addEventListener("change", update)
    number_input.previousElementSibling.addEventListener("click", update)
    number_input.nextElementSibling.addEventListener("click", update)
    document.getElementsByClassName("button-custom-remove")[i].addEventListener("click", function() {
        fetch(`./api/update_cart.php?product=${number_inputs[i].id}&delete=`)
            .then(_ => location.reload())
    })
    if (i == 0) {
        update()
    }
}


