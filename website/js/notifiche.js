const allNotifications = document.querySelectorAll(".notification-item");

/* function leggiTutte() {
    const url = new URL(window.location.href);
    url.searchParams.set('leggiTutte', codNotifica);
    // Richiesta fetch al server
    fetch(url.toString(), { method: 'GET' })
        .then(data => {
            console.log("Risposta dal server:", data);

            // Aggiorna visivamente la notifica come "letta"
            const notificationElement = document.querySelector(`[data-notifica-id="${codNotifica}"]`);
            if (notificationElement) {
                notificationElement.setAttribute('data-filter', 'gia-lette');
                notificationElement.classList.add('read'); // Aggiunge una classe per lo stile visivo
            }
        })
} */


function filtraNotifiche(filter) {
    resetContent(allNotifications)
    allNotifications.forEach(item => {
        if (!filter || item.dataset.filter === filter) {
            item.style.display = "block"; // Mostra l'elemento
        } else {
            item.style.display = "none"; // Nascondi l'elemento
        }
    });
}

function resetContent(allNotifications) {
    allNotifications.forEach(item => {
        item.style.display = "block"; // Mostra tutti gli elementi
    });
}

// Funzione per gestire il click su un pulsante accordion
function leggiNotifica(codNotifica) {
    // Creazione URL con parametro codNotifica
    const url = new URL(window.location.href);
    url.searchParams.set('codNotifica', codNotifica);
    history.pushState({}, '', url.toString());
    // Richiesta fetch al server
    fetch(url.toString(), { method: 'GET' })
        .then(data => {
            console.log("Risposta dal server:", data);

            // Aggiorna visivamente la notifica come "letta"
            const notificationElement = document.querySelector(`[data-notifica-id="${codNotifica}"]`);
            if (notificationElement) {
                notificationElement.setAttribute('data-filter', 'gia-lette');
                notificationElement.classList.add('read'); // Aggiunge una classe per lo stile visivo
            }
        })
}
