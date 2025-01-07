for (const btn of document.getElementsByClassName("custom-toggle-button")) {
    btn.addEventListener("click", function() {
        const id = this.id
        fetch(`./api/manage_product.php?productId=${id}&toggle=`)
            .then(_ => location.reload())
    })
}
