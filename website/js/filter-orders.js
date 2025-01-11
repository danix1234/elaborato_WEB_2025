const buttons = document.getElementsByClassName("btn btn-light");
const buttonFilter = new URLSearchParams(window.location.search).get("filter");
const filterTimeSelect = document.getElementById("filter-time");
const filterTimeForm = document.getElementById("filter-time-form");

for (let i = 0; i < buttons.length; i++) {
    if (buttons[i].id === buttonFilter) {
        buttons[i].classList.add("active");
    }
}

for (let i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener("click", function () {
        const filter = buttons[i].value;
        const filterTime = filterTimeSelect.value;
        const url = new URL(window.location.href);

        if (buttons[i].classList.contains("active")) {
            buttons[i].classList.remove("active");
            url.searchParams.delete("filter");
        } else {
            for (let btn of buttons) {
                btn.classList.remove("active");
            }
            buttons[i].classList.add("active");
            url.searchParams.set("filter", filter);

        }

        url.searchParams.set("filter-time", filterTime);


        //window.location.href = url.toString();

        updateContent(url);
    });
}
filterTimeSelect.addEventListener("change", function () {
    const url = new URL(window.location.href);
    const filter = url.searchParams.get("filter");
    url.searchParams.set("filter-time", filterTimeSelect.value);
    if (filter) {
        url.searchParams.set("filter", filter);
    }
    updateContent(url);
});

function updateContent(url) {
    //update the URL without reloading the page
    history.pushState({}, '', url.toString());

    //fetch and update
    fetch(url.toString())
        .then(response => response.text())
        .then(data => {
            //parse the response and update the content
            const parser = new DOMParser();
            const doc = parser.parseFromString(data, "text/html");
            const newContent = doc.getElementById("orders-container");
            document.getElementById("orders-container").innerHTML = newContent.innerHTML;
        })
        .catch(error => console.error("Error:", error));
}

