const file_pickers = document.getElementsByClassName("image-custom-preview")
for (const file_picker of file_pickers) {
    image_preview = file_picker.previousElementSibling.previousElementSibling
    file_picker.addEventListener("change", () => {
        const file = file_picker.files[0]
        if (file) {
            image_preview.src = URL.createObjectURL(file)
        }
    })
}
