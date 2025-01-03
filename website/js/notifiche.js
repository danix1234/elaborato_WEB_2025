function selezionaTutte() {
    const checkboxes = document.querySelectorAll('.select-checkbox');
    checkboxes.forEach(checkbox => checkbox.checked = true);
}

function resetContent(allNotifications) {
    allNotifications.forEach(item => {
        item.style.display = "block"; // Mostra tutti gli elementi
    });
}

function filtraNotifiche(filter) {
    const allNotifications = document.querySelectorAll(".notification-item");
    resetContent(allNotifications)
    allNotifications.forEach(item => {
        if (!filter || filter === "tutte" || item.dataset.filter === filter) {
            item.style.display = "block"; // Mostra l'elemento
        } else {
            item.style.display = "none"; // Nascondi l'elemento
        }
    });
}

// Funzione per gestire il click su un pulsante accordion
function showAccordion(codNotifica) {
    if (!codNotifica) {
        console.warn('Errore: codNotifica non fornito.');
        return;
    }

    console.log("Invio richiesta per Codice Notifica:", codNotifica);

    // Creazione URL con parametro codNotifica
    const url = new URL('./api/read-notice.php', window.location.origin);
    url.searchParams.set('codNotifica', codNotifica);

    // Richiesta fetch al server
    fetch(url.toString(), { method: 'GET' })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Errore HTTP! Stato: ${response.status}`);
            }
            return response.text();
        })
        .then(data => {
            console.log("Risposta dal server:", data);

            // Aggiorna visivamente la notifica come "letta"
            const notificationElement = document.querySelector(`[data-notifica-id="${codNotifica}"]`);
            if (notificationElement) {
                notificationElement.setAttribute('data-filter', 'gia-lette');
                notificationElement.classList.add('read'); // Aggiunge una classe per lo stile visivo
            }
        })
        .catch(error => {
            console.error("Errore durante l'operazione:", error);
            alert("Si è verificato un errore. Riprova più tardi.");
        });
}
