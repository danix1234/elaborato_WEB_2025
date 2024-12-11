const number_input = document.getElementById("quantity")
const inc_button = number_input.previousElementSibling
const dec_button = number_input.nextElementSibling

function add(amount) {
    return function() {
        const val = number_input.value
        if (val == "") {
            number_input.value = 1
        }
        if (/^-?\d+$/.test(val)) {
            val_int = parseInt(val)
            number_input.value = val_int + amount
        }
    }
}

inc_button.addEventListener("mousedown", add(-1))
dec_button.addEventListener("click", add(1))

