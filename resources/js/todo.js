const message = document.querySelector("[data-message]");

if (message) {
    setTimeout(() => {
        message.remove();
    }, 15000);
}
