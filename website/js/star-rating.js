
const stars = document.getElementsByClassName("star");
const votoRecensione = document.getElementById("votoRecensione");

for (let i = 0; i < stars.length; i++) {
    
    stars[i].addEventListener("click", function () {
        const value = this.getAttribute("data-value");
        votoRecensione.value = value;
        updateStars(value);
    });

    stars[i].addEventListener("mouseover", function () {
        const value = this.getAttribute("data-value");
        updateStars(value);
    });

    stars[i].addEventListener("mouseout", function () {
        updateStars(votoRecensione.value);
    });
}

function updateStars(value) {
    for (let i = 0; i < stars.length; i++) {
        if (parseInt(stars[i].getAttribute("data-value")) <= parseInt(value)) {
            stars[i].classList.add("bi-star-fill");
            stars[i].classList.remove("bi-star");   
        } else {
            stars[i].classList.add("bi-star");
            stars[i].classList.remove("bi-star-fill");
        }
    }
    
}
