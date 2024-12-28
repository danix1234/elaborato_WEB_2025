document.getElementById("buy").addEventListener("click", function() {
    fetch(`./api/buy_entire_cart.php`)
        .then(() => location.reload());
})
