document.addEventListener('DOMContentLoaded', function () {
    // Warning popup
    const warningElement = document.getElementById('warning');
    if (warningElement) {
        warningElement.addEventListener('click', function (e) {
            e.preventDefault();

            Swal.fire({
                icon: 'warning',
                title: 'Kujdes',
                text: 'Kërkimi i avancuar nuk është i disponueshëm!'
            });
        });
    }

// Countdown timer
const timerElement = document.getElementById("timer");
if (timerElement) {
    const targetDate = new Date("January 28, 2025 23:59:59").getTime();
    const countdownTimer = setInterval(function () {
        const now = new Date().getTime();
        const distance = targetDate - now;

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        timerElement.innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;

        if (distance < 0) {
            clearInterval(countdownTimer);
            timerElement.innerHTML = "Oferta ka perfunduar!";
            setTimeout(timerElement, 3000);
        }
    }, 1000);
}
});
