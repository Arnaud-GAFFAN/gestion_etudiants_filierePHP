
document.querySelector('form').addEventListener("submit", (e) => {
    e.preventDefault();
    const alert = document.querySelector('.alert');
    setTimeout(() => {
        alert.remove();
    }, 2000)
})

