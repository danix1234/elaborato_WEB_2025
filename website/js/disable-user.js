document.getElementById("removeuser").addEventListener("click", function() {
    let userId = new URLSearchParams(window.location.search).get("userId");
    if (userId) {
        window.location.href = `./api/manage_user.php?userId=${userId}&deleteuser=`
    } else {
        alert("No user Id found!");
    }
})
