const number_inputs = document.getElementsByClassName("button-custom-quantity")
for (const number_input of number_inputs) {
    const inc_button = number_input.previousElementSibling
    const dec_button = number_input.nextElementSibling
    let min = 1
    let max = 1000
    max_attr = Math.trunc(Number(number_input.getAttribute("max")))
    if (number_input.getAttribute("min") != null) {
        min = Math.trunc(Number(number_input.getAttribute("min")))
    }
    if (number_input.getAttribute("max") != null) {
        max = Math.trunc(Number(number_input.getAttribute("max")))
        if (max < min) {
            max = min
        }
    }
    let field = { old: "", new: "" }

    // we do some currying
    function add(amount) {
        return function() {
            const prev_val = Math.trunc(Number(number_input.value))
            if (!prev_val && number_input.value != "0") {
                number_input.value = min
            } else {
                number_input.value = Math.min(max, Math.max(min, prev_val + amount))
            }
        }
    }

    inc_button.addEventListener("mousedown", add(-1))
    dec_button.addEventListener("click", add(1))

    // input field validator
    function validate() {
        return function() {
            field.old = field.new

            oldNum = Number(field.old) || field.old == "0"
            newNum = Number(number_input.value) || number_input.value == "0"
            if (!newNum && oldNum) {
                number_input.value = oldNum
            }
            const val = Math.trunc(Number(number_input.value))
            if (val < min) {
                number_input.value = min
            }
            if (val > max) {
                number_input.value = max
            }

            field.new = number_input.value
            console.log(field)
        }
    }

    // if we want to disable writing wrong things inside input field
    number_input.addEventListener("input", validate())
    number_input.addEventListener("paste", validate())
    number_input.addEventListener("change", validate())
    number_input.addEventListener("keypress", validate())
}
