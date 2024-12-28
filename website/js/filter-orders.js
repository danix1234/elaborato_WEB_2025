const buttons = document.getElementsByClassName("btn-group-custom-filter")

for (let i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener("click", function () {
        const filter = buttons[i].id;
        const filterTime = document.getElementById("filter-time").value;
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

        //Update the URL without reloading the page
        history.pushState({}, "", url.toString());

        //Fetch and update the targeted part
        fetch(url.toString())
        .then(response => response.text())
        .then(data => {
            //Parse the response and update the content
            const parser = new DOMParser();
            const doc = parser.parseFromString(data, "text/html");
            const newContent = doc.getElementById("orders-container");
            document.getElementById("orders-container").innerHTML = newContent.innerHTML;
        })
        .catch(error => console.error("Error:", error));
    });
}

