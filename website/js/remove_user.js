document.getElementById("remove").addEventListener("click", function () {
    let userId = new URLSearchParams(window.location.search).get("userId");
    if (userId) {
        fetch(`./api/manage_user.php?userId=${userId}&delete=1`)
            .then(() => location.reload());
    } else {
        alert("Errore: Nessun ID utente trovato.");
    }
});
