const targetDate = new Date("January 28, 2025 23:59:59").getTime();

const countdownTimer = setInterval(function() {
    const now = new Date().getTime();
    const distance = targetDate - now;
    
    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    document.getElementById("timer").innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;
    
    if (distance < 0) {
        clearInterval(countdownTimer);
        document.getElementById("timer").innerHTML = "Offer Expired!";
    }
}, 1000);

const getItNow = document.getElementById("get");
getItNow.addEventListener('click', function () {
  window.location.href = "contact.html";
});

const seeMore = document.getElementById("see");
seeMore.addEventListener('click', function () {
  window.location.href = "product.html";  
});

const text = "Easy way to find the perfect car with us!";
let index = 0;
const element = document.querySelector('.display-5');
function typeText() {
    if (index < text.length) {
        element.textContent += text.charAt(index);
        index++;
        setTimeout(typeText, 100);
    }
}
typeText();

const video = document.querySelector("video");
const playPauseButton = document.querySelector(".playPauseButton");

playPauseButton.addEventListener('click', function() {
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






