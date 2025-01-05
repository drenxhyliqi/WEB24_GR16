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
    const targetDate = new Date("January 28, 2025 23:59:59").getTime();
    const countdownTimer = setInterval(function () {
        const now = new Date().getTime();
        const distance = targetDate - now;

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("timer").innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;

        if (distance < 0) {
            clearInterval(countdownTimer);
            document.getElementById("timer").innerHTML = "Oferta ka skaduar!";
        }
    }, 1000);

    // Navigate to contact page
    const getItNow = document.getElementById("get");
    getItNow.addEventListener('click', function () {
        window.location.href = "contact.html";
    });

    // Text typing effect
    const text = "Easy way to find the perfect car with us!";
    let index = 0;
    const element = document.querySelector('.display-5');

    if (element) {
        function typeText() {
            if (index < text.length) {
                element.textContent += text.charAt(index);
                index++;
                setTimeout(typeText, 100);
            }
        }
        typeText(); 
    }

    // Video play/pause button
    const video = document.querySelector("video");
    const playPauseButton = document.querySelector(".playPauseButton");

    if (playPauseButton && video) {
        playPauseButton.addEventListener('click', function () {
            if (video.paused) {
                video.play();
                video.classList.add('playing');
                playPauseButton.innerHTML = '<i class="bi bi-pause"></i>';
            } else {
                video.pause();
                video.classList.remove('playing');
                playPauseButton.innerHTML = '<i class="bi bi-play"></i>';
            }
        });
    } else {
        console.log('Video or Play/Pause button not found!');
    }

    const amountInput = document.getElementById('a');
    const discountInput = document.getElementById('b');
    const resultOutput = document.getElementById('x');

    function calculateDiscount() {
        const amount = parseFloat(amountInput.value);
        const discount = parseFloat(discountInput.value);
        const discountedPrice = amount - (amount * discount / 100);
        resultOutput.value = discountedPrice.toFixed(2);
    }

    amountInput.addEventListener('input', calculateDiscount);
    discountInput.addEventListener('input', calculateDiscount);

    calculateDiscount();
});
