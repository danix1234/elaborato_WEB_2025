// update orders
setInterval(function () {
    fetch("api/update-user-orders.php");
}, 1000);

// update notification icon
const notificationLink = document.querySelector('a[title="notifica"]');
function checkNotifications() {
    fetch("api/check-notifications.php")
        .then(response => response.json())
        .then(data => {
            if (data) {
                notificationLink.innerHTML = `
                        <span class="bi bi-bell"></span><span class="position-absolute 
                        translate-middle badge bg-danger border border-light rounded-circle px-1 mt-1"><span 
                        class="visually-hidden">unread messages</span>
                        </span>
                    `;
            } else {
                notificationLink.innerHTML = `<span class="bi bi-bell"></span>`;
            }
        })
        .catch(error => console.error('Error checking notifications:', error));
};

setInterval(checkNotifications, 1000);

// update suggestions
const categoryBar = document.getElementById('categoryBar');
const datalist = document.getElementById('list-suggestion');

categoryBar.addEventListener('change', function () {
    const categoryId = this.value;

    fetch(`api/get-suggestions.php?codCategoria=${categoryId}`)
        .then(response => response.json())
        .then(data => {
            datalist.innerHTML = '';
            data.forEach(suggestion => {
                const option = document.createElement('option');
                option.value = suggestion;
                datalist.appendChild(option);
            });
        })
        .catch(error => console.error('Error fetching suggestions:', error));
})


