for (const float_input of document.getElementsByClassName("button-custom-float")) {
    let min = 0
    let max = 10000

    function disallowInvalidChars(element) {
        return function() {
            let value = element.value.replace(/[^0-9.]/g, '')
            let parts = value.split('.');
            value = parts[0] + (parts.length > 1 ? '.' + parts.slice(1).join('') : '')
            element.value = value
            parts = value.split('.')
            if (parts.length > 1 && parts[1].length > 2) {
                element.value = parts[0] + '.' + parts[1].slice(0, 2);
            }
        }
    }

    float_input.addEventListener("input", disallowInvalidChars(float_input))
}
