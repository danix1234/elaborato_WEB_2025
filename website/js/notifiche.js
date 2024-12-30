// Seleziona i bottoni tramite ID specifici
const buttonAll = document.getElementById("btn-tutte");
const buttonRead = document.getElementById("btn-gia-lette");
const buttonUnread = document.getElementById("btn-da-leggere");

// Funzione comune per gestire i click sui bottoni
function handleButtonClick(button, filter) {
    const url = new URL(window.location.href);
    const buttons = [buttonAll, buttonRead, buttonUnread];

    // Gestisci lo stato "active" dei bottoni
    if (button.classList.contains("active")) {
        button.classList.remove("active");
        url.searchParams.delete("filter");
    } else {
        buttons.forEach(btn => btn.classList.remove("active"));
        button.classList.add("active");
        url.searchParams.set("filter", filter);
    }

    // Aggiorna il contenuto dinamicamente
    updateContent(url);
}

// Aggiungi event listener ai bottoni
buttonAll.addEventListener("click", () => handleButtonClick(buttonAll, "Tutte"));
buttonRead.addEventListener("click", () => handleButtonClick(buttonRead, "Gia' lette"));
buttonUnread.addEventListener("click", () => handleButtonClick(buttonUnread, "Da leggere"));

// Funzione per aggiornare il contenuto dinamicamente
function updateContent(url) {
    // Aggiorna l'URL senza ricaricare la pagina
    history.pushState({}, '', url.toString());

    // Fetch e aggiornamento dinamico del contenuto
    fetch(url.toString())
        .then(response => response.text())
        .then(data => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(data, "text/html");
            const newContent = doc.getElementById("orders-container");
            document.getElementById("orders-container").innerHTML = newContent.innerHTML;
        })
        .catch(error => console.error("Errore durante l'aggiornamento del contenuto:", error));
}
