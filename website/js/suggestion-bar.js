const searchBar = document.getElementById("searchBar");
    const suggestionsContainer = document.getElementById("suggestions");
    const products = window.products;
    console.log(products);

    searchBar.addEventListener("input", function() {
        const query = searchBar.value.toLowerCase();
        suggestionsContainer.innerHTML = "";

        if (query.length > 0) {
            const filteredProducts = products.filter(product => product.toLowerCase().startsWith(query));
            filteredProducts.forEach(product => {
                const suggestionItem = document.createElement("a");
                suggestionItem.classList.add("list-group-item", "list-group-item-action");
                suggestionItem.textContent = product;
                suggestionItem.addEventListener("click", function(e) {
                    e.preventDefault();
                    searchBar.value = product;
                    suggestionsContainer.innerHTML = "";
                });
                suggestionsContainer.appendChild(suggestionItem);
            });
        }
    });

    document.addEventListener("click", function(e) {
        if (!suggestionsContainer.contains(e.target) && e.target !== searchBar) {
            suggestionsContainer.innerHTML = "";
        }
    });