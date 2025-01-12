setInterval(function () {
    fetch("api/update-user-orders.php");
}, 10000);

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

setInterval(checkNotifications, 10000);