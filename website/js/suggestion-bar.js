const searchBar = document.getElementById("searchBar");
const suggestionsContainer = document.getElementById("suggestions");
const products = window.products;

searchBar.addEventListener("input", function () {
    const value = searchBar.value.toLowerCase();
    suggestionsContainer.innerHTML = "";

    if (value.length > 0) {
        const filteredProducts = products.filter(product => product.toLowerCase().startsWith(value));
        filteredProducts.forEach(product => {
            const suggestionItem = document.createElement("a");
            suggestionItem.classList.add("list-group-item", "list-group-item-action");
            suggestionItem.textContent = product;
            suggestionItem.addEventListener("click", function (e) {
                e.preventDefault();
                searchBar.value = product;
                suggestionsContainer.innerHTML = "";
            });
            suggestionsContainer.appendChild(suggestionItem);
        });
    }
});

document.addEventListener("click", function (e) {
    if (!suggestionsContainer.contains(e.target) && e.target !== searchBar) {
        suggestionsContainer.innerHTML = "";
    }
});