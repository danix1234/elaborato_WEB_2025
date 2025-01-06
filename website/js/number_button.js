for (const number_input of document.getElementsByClassName("button-custom-quantity")) {
    const inc_button = number_input.previousElementSibling
    const dec_button = number_input.nextElementSibling
    let min_attr = number_input.nextElementSibling.nextElementSibling.innerText
    let max_attr = number_input.nextElementSibling.nextElementSibling.nextElementSibling.innerText
    let previous_attr = number_input.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.innerText
    let min = 0
    let max = 1_000_000
    if (min_attr !== "") {
        tmp = parseInt(min_attr)
        if (min_attr === "0" || tmp) {
            min = tmp
        }
    }
    if (max_attr !== "") {
        tmp = parseInt(max_attr)
        if (max_attr === "0" || tmp) {
            max = tmp
        }
    }
    if (previous_attr !== "") {
        tmp = parseInt(previous_attr)
        if (previous_attr === "0" || tmp) {
            max = Math.max(tmp, max)
        }
    }

    // we do some currying, and make the function local
    let validate = function(amount) {
        return function() {
            const prevval_str = number_input.value
            const prev_val = parseInt(number_input.value)
            if (!prev_val && number_input.value !== "0") {
                if (amount === 0) {
                    number_input.value = ""
                } else {
                    number_input.value = min
                }
            } else {
                number_input.value = Math.min(max, Math.max(min, prev_val + amount))
            }
            if (number_input.value !== prevval_str) {
                number_input.dispatchEvent(new Event('change'))
            }
        }
    }

    function disallowInvalidChars(element) {
        return function() {
            element.value = element.value.replace(/[^0-9]/g, '')
        }
    }

    inc_button.addEventListener("click", validate(-1))
    dec_button.addEventListener("click", validate(1))
    number_input.addEventListener("change", validate(0))

    inc_button.addEventListener("input", disallowInvalidChars(inc_button))
    dec_button.addEventListener("input", disallowInvalidChars(dec_button))
    number_input.addEventListener("input", disallowInvalidChars(number_input))
}
