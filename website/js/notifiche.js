const allNotifications = document.querySelectorAll(".notification-item");
const btnRead = document.getElementById("btnRead");
const btnUnread = document.getElementById("btnUnread");

// Variabile globale per tracciare il filtro attivo
let activeFilter = null;

// Funzione per filtrare le notifiche
function filtraNotifiche(filter) {
    // Collassa tutti gli accordion
    collapseAllAccordions();

    // Controlla se il filtro richiesto è già attivo
    if (activeFilter === filter) {
        resetContent(allNotifications); // Mostra tutte le notifiche
        activeFilter = null; // Nessun filtro attivo
        updateButtonState(); // Aggiorna lo stato dei bottoni
        return;
    }

    // Imposta il nuovo filtro attivo
    activeFilter = filter;

    // Ripristina tutte le notifiche
    resetContent(allNotifications);

    // Applica il filtro, mostrando solo le notifiche corrispondenti
    allNotifications.forEach(item => {
        if (item.dataset.filter === filter) {
            item.style.display = "block"; // Mostra gli elementi corrispondenti al filtro
        } else {
            item.style.display = "none"; // Nascondi gli elementi che non corrispondono
        }
    });

    // Aggiorna lo stato dei bottoni
    updateButtonState();
}

// Funzione per resettare le notifiche
function resetContent(allNotifications) {
    allNotifications.forEach(item => {
        item.style.display = "block"; // Mostra tutti gli elementi
    });
}

// Funzione per aggiornare lo stato dei bottoni
function updateButtonState() {
    // Rimuove lo stato attivo da entrambi i bottoni
    btnRead.classList.remove("active");
    btnUnread.classList.remove("active");

    // Aggiunge lo stato attivo al bottone corrispondente al filtro attivo
    if (activeFilter === "read") {
        btnRead.classList.add("active");
    } else if (activeFilter === "unread") {
        btnUnread.classList.add("active");
    }
}

// Funzione per collassare tutti gli accordion
function collapseAllAccordions() {
    const accordions = document.querySelectorAll(".accordion-collapse");
    accordions.forEach(accordion => {
        accordion.classList.remove("show");
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

            // Aggiorna visivamente la notifica come "letta"
            const notificationElement = document.getElementById(`accordionExample-${codNotifica}`);
            if (notificationElement) {
                const parentItem = notificationElement.closest('.notification-item');
                parentItem.setAttribute('data-filter', 'read');

                // Nasconde lo span "nuovo" se presente
                const badge = parentItem.querySelector('.badge.bg-custom-blue');
                if (badge) {
                    badge.style.display = "none";
                }
            }
        });
} 
