for (const btn of document.getElementsByClassName("custom-remove-button")) {
    console.log(btn)
    btn.addEventListener("click", function() {
        const id = this.id
        fetch(`./api/manage_product.php?productId=${id}&delete=`)
            .then(_ => location.reload())
    })
}
