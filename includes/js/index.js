function toggleDropdown(event) {
  event.stopPropagation(); // Prevent event propagation
  let dropdownMenu = document.getElementById("dropdownMenu");
  dropdownMenu.classList.toggle("hidden");
}

document.addEventListener("click", function (event) {
  let dropdownMenu = document.getElementById("dropdownMenu");
  let userIcon = document.getElementById("userIcon");
  if (
    !dropdownMenu.classList.contains("hidden") &&
    event.target !== dropdownMenu &&
    event.target !== userIcon
  ) {
    dropdownMenu.classList.add("hidden");
  }
});
