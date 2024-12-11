const number_inputs = document.getElementsByClassName("button-custom-quantity")
for (const number_input of number_inputs) {
    const inc_button = number_input.previousElementSibling
    const dec_button = number_input.nextElementSibling
    let min = 0
    let max = 10000

    // we do some currying, and make the function local
    let validate = function(amount) {
        return function() {
            const prev_val = parseInt(number_input.value)
            if (!prev_val && number_input.value != "0") {
                if (amount == 0) {
                    number_input.value = ""
                } else {
                    number_input.value = min
                }
            } else {
                number_input.value = Math.min(max, Math.max(min, prev_val + amount))
            }
        }
    }

    inc_button.addEventListener("mousedown", validate(-1))
    dec_button.addEventListener("click", validate(1))

    // if we want to disable writing wrong things inside input field
    //number_input.addEventListener("input", validate_int(0))
    //number_input.addEventListener("paste", validate_int(0))
    number_input.addEventListener("change", validate(0))
    //number_input.addEventListener("keypress", validate_int(0))
}
