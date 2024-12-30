document.getElementById("removeuser").addEventListener("click", function () {
    let userId = new URLSearchParams(window.location.search).get("userId");
    if (userId) {
        fetch(`./api/manage_user.php?userId=${userId}&deleteuser=`)
            .then(() => location.reload());
    } else {
        alert("No user Id found!");
    }
})
