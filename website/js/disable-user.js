for (const btn of document.getElementsByClassName("custom-remove-button")) {
    btn.addEventListener("click", function() {
        const id = this.id
        fetch(`./api/manage_user.php?userId=${id}&toggleuser=true`)
            .then(_ => location.reload())
    })
}
