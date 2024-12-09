function toggleBackgroundColor() {
  const body = document.body;
  const moonIcon = document.getElementById("bi-moon");
  const sunIcon = document.getElementById("bi-brightness-high");

  if (body.style.backgroundColor === "rgb(17, 24, 39)" || body.style.backgroundColor === "") {
    body.style.backgroundColor = "white";
    body.style.color = "#000"; 
    moonIcon.classList.remove("d-none");
    sunIcon.classList.add("d-none");
  } else {
    body.style.backgroundColor = "#111827";
    body.style.color = "#f9f9f9"; 
    moonIcon.classList.add("d-none");
    sunIcon.classList.remove("d-none");
  }
}
