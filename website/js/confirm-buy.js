const confirm = document.getElementById("confirm-button");
let orderId = document.querySelector("div > ul > li:first-child").textContent;
orderId = orderId.match(/(\d+)/)[0];

confirm.addEventListener("click", function () {
    console.log("click");
    fetch(`./api/confirm-buy.php?orderId=${orderId}`)
        .then(response => response.text())
        .then(data => {
           console.log(data);
        })
        .catch(error => {
            console.error("Error from confirm-buy.js: ", error);
        });
});