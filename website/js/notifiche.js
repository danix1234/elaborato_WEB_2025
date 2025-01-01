// Selezione dei bottoni per il filtro
const buttonAll = document.getElementById("btn-tutte");
const buttonRead = document.getElementById("btn-gia-lette");
const buttonUnread = document.getElementById("btn-da-leggere");
const accordionButtons = document.querySelectorAll(".accordion-button collapsed")

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
                document.querySelector(".container-fluid").innerHTML = newContent.innerHTML;
            } else {
                console.error("Contenitore notifiche non trovato nella risposta del server.");
            }
        })
        .catch(error => console.error("Errore durante l'aggiornamento delle notifiche:", error));
}

function showaccordion() {
    accordionButtons.forEach(button => {
        button.addEventListener("click", function () {
            const codNotifica = button.getAttribute('codNotifica');
            console.log(codNotifica);
            if (!codNotifica) {
                console.warn('codNotifica non trovato per questo bottone');
                return;
            }
            fetch(`./api/read-notice.php?codNotifica=${codNotifica}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.text();
                })
                .then(data => {
                    console.log("Item fetched:", data);
                    alert("Prodotto aggiunto al carrello!");
                })
                .catch(error => {
                    console.error("Errore durante l'operazione:", error);
                    alert("Errore nell'aggiunta al carrello. Riprova.");
                });
        });
    });
}
