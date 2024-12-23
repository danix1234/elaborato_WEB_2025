const number_inputs = document.getElementsByClassName("button-custom-quantity")
const prices = document.getElementsByClassName("text-custom-price")
for (let i = 0; i < number_inputs.length; i++) {
    let update = function() {
        let total_price = 0
        for (let inner = 0; inner < number_inputs.length; inner++) {
            const quantityInner = parseInt(number_inputs[inner].value)
            const unaryPriceInner = parseFloat(prices[inner].innerHTML.split(":")[1].trim())
            total_price += quantityInner * unaryPriceInner
        }
        document.getElementsByClassName("text-custom-totprice")[0].innerText = `Prezzo totale: ${(Number(total_price).toLocaleString())}€`
    }
    const number_input = number_inputs[i]
    number_input.addEventListener("change", update)
    number_input.previousElementSibling.addEventListener("click", update)
    number_input.nextElementSibling.addEventListener("click", update)

    if (i == 0) {
        update()
    }
}


