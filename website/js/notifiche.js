function selezionaTutte() {
    const checkboxes = document.querySelectorAll('.select-checkbox');
    checkboxes.forEach(checkbox => checkbox.checked = true);
}

function filtraNotifiche(filtro) {
    const url = `notifiche.php?filter=${filtro}`;
    window.location.href = url; // Ricarica la pagina con il filtro selezionato
}
