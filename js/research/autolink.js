document.addEventListener('DOMContentLoaded', (event) => {
    const link = document.querySelector('#auto-link');
    if(link) {
        window.location.href = link.href;
    }
});