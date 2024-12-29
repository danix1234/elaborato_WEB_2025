for (const button of document.getElementsByClassName("button-custom-filter")) {
    button.addEventListener("click", function() {
        let filter = button.id
        fetch(`./api/filter_orders.php?filter=${filter}`)
            .then( () => location.reload())
    })
}
console.log("prova grascie");