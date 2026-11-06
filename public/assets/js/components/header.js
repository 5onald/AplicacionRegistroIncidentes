const menuToggle = document.getElementById("menu-toggle");
const menuDropdown = document.getElementById("menu-dropdown");

// Abrir y cerrar menú
menuToggle.addEventListener("click", () => {

    const isOpen = !menuDropdown.hidden;

    menuDropdown.hidden = isOpen;

    menuToggle.setAttribute("aria-expanded", String(!isOpen));

    menuToggle.setAttribute(
        "aria-label",
        isOpen ? "Abrir menú" : "Cerrar menú"
    );

});

// Cerrar al hacer clic fuera del menú
document.addEventListener("click", (event) => {

    const clickedOutside =
        !menuToggle.contains(event.target) &&
        !menuDropdown.contains(event.target);

    if (clickedOutside) {
        menuDropdown.hidden = true;
        menuToggle.setAttribute("aria-expanded", "false");
        menuToggle.setAttribute("aria-label", "Abrir menú");
    }

});

// Cerrar con la tecla Escape
document.addEventListener("keydown", (event) => {

    if (event.key === "Escape") {
        menuDropdown.hidden = true;
        menuToggle.setAttribute("aria-expanded", "false");
        menuToggle.setAttribute("aria-label", "Abrir menú");
        menuToggle.focus();
    }

});