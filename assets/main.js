function toggleBackgroundColor() {
  const body = document.body;
  const moonIcon = document.getElementById("bi-moon");
  const sunIcon = document.getElementById("bi-brightness-high");

  if (body.classList.contains("dark-mode")) {
    body.classList.remove("dark-mode");
    moonIcon.classList.remove("d-none");
    sunIcon.classList.add("d-none"); 
  } else {
    body.classList.add("dark-mode");
    moonIcon.classList.add("d-none"); 
    sunIcon.classList.remove("d-none"); 
  }
}
