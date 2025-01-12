const reviews = window.reviews;
let currentIndex = reviews.length > 3 ? 3 : reviews.length;
const reviewList = document.querySelector("ul.p-0");
const otherReviewButton = document.getElementById("other-review");

otherReviewButton.addEventListener("click", function() {
    if (currentIndex < reviews.length) {
        const review = reviews[currentIndex];
        const reviewItem = document.createElement("li");
        reviewItem.classList.add("d-flex", "align-items-start", "mb-3");
        reviewItem.innerHTML = `
                <img src="${review.immagineProfilo}" class="rounded-circle me-3 user-avatar-size" alt="" />
                <div>
                    <strong>${review.nomeUtente}</strong>
                    <p class="mb-1">${review.votoRecensione}/5
                        ${generateStarRating(review.votoRecensione)}
                        <span class="text-secondary"> Recensito il ${review.dataRecensione}</span>
                    </p>
                    <p class="text-body-secondary mb-0">${review.commento}</p>
                </div>
            `;

        reviewList.appendChild(reviewItem);
        currentIndex++;
    }
    if (currentIndex >= reviews.length) {
        otherReviewButton.disabled = true;
    }
});

function generateStarRating(votoRecensione) {
    const votoInt = Math.floor(votoRecensione);
    const votoDec = (votoRecensione - votoInt) * 10;
    let output = "";
    for (let i = 1; i <= 5; i++) {
        if (i <= votoInt) {
            output += '<span class="bi bi-star-fill text-custom-lgold"></span>';
        } else if (i === votoInt + 1 && votoDec >= 5) {
            output += '<span class="bi bi-star-half text-custom-lgold"></span>';
        } else {
            output += '<span class="bi bi-star text-custom-lgold"></span>';
        }
    }
    return output;
};
