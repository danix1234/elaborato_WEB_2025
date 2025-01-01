// Selezione dei bottoni per il filtro
const buttonAll = document.getElementById("btn-tutte");
const buttonRead = document.getElementById("btn-gia-lette");
const buttonUnread = document.getElementById("btn-da-leggere");
const buttonAllSelected = document.getElementById("btn-seleziona-tutte");
const buttonReadSelecd = document.getElementById("btn-leggi-selezionate");
const accordionButtons = document.querySelectorAll(".accordion-button")

// Funzione per gestire il click sui bottoni
function handleButtonClick(button, filter) {
    const url = new URL(window.location.href);
    const buttons = [buttonAll, buttonRead, buttonUnread];

    // Gestione dello stato "active" per i bottoni
    buttons.forEach(btn => btn.classList.remove("active"));
    if (filter) {
        button.classList.add("active");
        url.searchParams.set("filter", filter);
    } else {
        url.searchParams.delete("filter");
    }

    // Aggiorna il contenuto dinamicamente
    updateContent(url);
}

// Event listener per i bottoni
if (buttonAll) buttonAll.addEventListener("click", () => handleButtonClick(buttonAll, null));
if (buttonRead) buttonRead.addEventListener("click", () => handleButtonClick(buttonRead, "gia-lette"));
if (buttonUnread) buttonUnread.addEventListener("click", () => handleButtonClick(buttonUnread, "da-leggere"));

// Funzione per aggiornare la sezione notifiche dinamicamente
function updateContent(url) {
    // Aggiorna l'URL senza ricaricare la pagina
    history.pushState({}, '', url.toString());

    // Fetch per recuperare le notifiche filtrate
    fetch(url.toString())
        .then(response => response.text())
        .then(data => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(data, "text/html");
            const newContent = doc.querySelector(".container-fluid");

            if (newContent) {
                document.getElementById("notice-container").innerHTML = newContent.innerHTML;
            } else {
                console.error("Contenitore notifiche non trovato nella risposta del server.");
            }
        })
        .catch(error => console.error("Errore durante l'aggiornamento delle notifiche:", error));
}


// Funzione per gestire il click su un pulsante accordion
function showAccordion(button) {
    const codNotifica = button.getAttribute('codNotifica');
    if (!codNotifica) {
        console.warn('codNotifica non trovato per questo bottone:', button);
        return;
    }

    console.log("Codice Notifica trovato:", codNotifica);

    // Creazione URL con parametro codNotifica
    const url = new URL(window.location.href);
    url.searchParams.set('codNotifica', codNotifica);
    history.pushState({}, '', url.toString());
    // Richiesta fetch al server
    fetch(url.toString())
        .then(response => {
            if (!response.ok) {
                throw new Error(`Errore HTTP! Stato: ${response.status}`);
            }
        })
        .catch(error => {
            console.error("Errore durante l'operazione:", error);
            // Mostra un messaggio d'errore all'utente
            alert("Si è verificato un errore. Riprova più tardi.");
        });

    console.log(url.toString())
}

// Aggiunge listener a tutti i pulsanti accordion
document.addEventListener('DOMContentLoaded', () => {
    const accordionButtons = document.querySelectorAll('.accordion-button');

    if (accordionButtons.length === 0) {
        console.error("Nessun pulsante trovato con la classe 'accordion-button'.");
        return;
    }

    accordionButtons.forEach(button => {
        button.addEventListener('click', () => showAccordion(button));
    });
});
