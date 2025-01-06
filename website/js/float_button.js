for (const float_input of document.getElementsByClassName("button-custom-float")) {
    let min = 0
    let max = 10000

    function disallowInvalidChars(element) {
        return function() {
            const cursorStart = element.selectionStart
            const cursorEnd = element.selectionEnd

            let value = element.value.replace(/[^0-9.]/g, '')
            let parts = value.split('.');
            value = parts[0] + (parts.length > 1 ? '.' + parts.slice(1).join('') : '')
            parts = value.split('.')
            value = (parts.length > 1 && parts[1].length > 2) ? (parts[0] + '.' + parts[1].slice(0, 2)) : (value)

            element.value = value
            element.selectionStart = cursorStart
            element.selectionEnd = cursorEnd
        }
    }

    let validate = function() {
        return function() {
            float_input.value = float_input.value.trim()
            const prev_val = parseFloat(float_input.value)
            if (!prev_val && float_input.value !== "0" && !float_input.value.startsWith("0.")) {
                float_input.value = ""
            } else {
                // yeah, i am starting to hate js. Why couldn't we just build the web on lua???
                float_input.value = (Math.trunc(Math.min(max, Math.max(min, prev_val)) * 100) / 100).toFixed(2)
            }
        }
    }

    float_input.addEventListener("change", validate())
    float_input.addEventListener("input", disallowInvalidChars(float_input))

    float_input.setAttribute("inputmode", "decimal")
}
