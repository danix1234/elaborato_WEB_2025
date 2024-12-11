const float_inputs = document.getElementsByClassName("button-custom-float")
for (const float_input of float_inputs) {
    let min = 0
    let max = 10000

    // we do some currying
    let validate = function() {
        return function() {
            float_input.value = float_input.value.trim()
            const prev_val = parseFloat(float_input.value)
            if (!prev_val && float_input.value != "0" && !float_input.value.startsWith("0.")) {
                float_input.value = ""
            } else {
                // yeah, i am starting to hate js. Why couldn't we just build the web on lua???
                float_input.value = (Math.trunc(Math.min(max, Math.max(min, prev_val)) * 100) / 100).toFixed(2)
            }
        }
    }

    // if we want to disable writing wrong things inside input field
    //float_input.addEventListener("input", validate_float())
    //float_input.addEventListener("paste", validate_float())
    float_input.addEventListener("change", validate())
    //float_input.addEventListener("keypress", validate_float())
}
