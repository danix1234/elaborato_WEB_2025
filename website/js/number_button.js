const number_inputs = document.getElementsByClassName("button-custom-quantity")
for (const number_input of number_inputs) {
    const inc_button = number_input.previousElementSibling
    const dec_button = number_input.nextElementSibling
    let min_attr = number_input.getAttribute("min")
    let max_attr = number_input.getAttribute("max")
    let min = 0
    let max = 10000
    if (min_attr != null) {
        tmp = parseInt(min_attr)
        if (min_attr == "0" || tmp) {
            min = tmp
        }
    }
    if (max_attr != null) {
        tmp = parseInt(max_attr)
        if (max_attr == "0" || tmp) {
            max = tmp
        }
    }

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
