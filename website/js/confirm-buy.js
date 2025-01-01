const confirm = document.getElementById("confirm-button");
const messageContainer = document.getElementById("message-container");
const buttons = document.getElementsByClassName("btn");
let orderId = document.querySelector("div > ul > li:first-child").textContent;
orderId = orderId.match(/(\d+)/)[0];

confirm.addEventListener("click", function () {
    fetch(`./api/confirm-buy.php?orderId=${orderId}`)
        .then(response => response.text())
        .then(data => {
            if (data.includes("Errore")) {
                messageContainer.innerText = data;
                messageContainer.classList.remove("d-none");
                for (let i = 0; i < buttons.length; i++) {
                    buttons[i].classList.add("disabled");
                }
            } else {
                window.location.href = "ordini.php";}
        })
        .catch(error => {
            console.error("Error from confirm-buy.js: ", error);
        });
});