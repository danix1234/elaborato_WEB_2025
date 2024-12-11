const number_inputs = document.getElementsByClassName("button-custom-quantity")
for (const number_input of number_inputs) {
    const inc_button = number_input.previousElementSibling
    const dec_button = number_input.nextElementSibling

    //we do some currying
    function add(amount) {
        return function() {
            const prev_val = Number(number_input.value)
            if (!prev_val) {
                number_input.value = 1
            } else {
                number_input.value = Math.max(1, prev_val + amount)
            }
        }
    }

    inc_button.addEventListener("mousedown", add(-1))
    dec_button.addEventListener("click", add(1))
}
