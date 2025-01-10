/* will call the function every 10_000ms (10 seconds)
the function fetch the api */
setInterval(function () {
    fetch("api/update-user-orders.php");
}, 10000);