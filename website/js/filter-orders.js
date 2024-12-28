const buttons = document.getElementsByClassName("btn-group-custom-filter")

for (let button of buttons) {
    button.addEventListener("click", function () {
        const filter = button.id;
        const filterTime = document.getElementById("filter-time").value;
        const url = new URL(window.location.href);
        url.searchParams.set("filter", filter);
        url.searchParams.set("filter-time", filterTime);
        window.location.href = url.toString();
    });
}
