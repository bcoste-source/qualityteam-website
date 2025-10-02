// Lightbox
Array.from(document.querySelectorAll("[data-lightbox]")).forEach((element) => {
  element.onclick = (e) => {
    e.preventDefault();
    basicLightbox.create(`<img src="${element.href}">`).show();
  };
});

// Responsive menu toggle
document.addEventListener("DOMContentLoaded", function () {
  const menuToggle = document.querySelector(".menu-toggle");
  const menu = document.querySelector(".menu");

  console.log("Menu toggle element:", menuToggle);
  console.log("Menu element:", menu);

  if (menuToggle && menu) {
    menuToggle.addEventListener("click", function (e) {
      e.preventDefault();
      e.stopPropagation();

      const isOpen = menuToggle.getAttribute("aria-expanded") === "true";
      console.log("Menu toggle clicked, isOpen:", isOpen);

      menuToggle.setAttribute("aria-expanded", !isOpen);
      menu.classList.toggle("is-open");

      // Prevent body scroll when menu is open
      document.body.style.overflow = !isOpen ? "hidden" : "";
    });

    // Close menu when clicking on a link
    const menuLinks = menu.querySelectorAll("a");
    menuLinks.forEach((link) => {
      link.addEventListener("click", function () {
        menuToggle.setAttribute("aria-expanded", "false");
        menu.classList.remove("is-open");
        document.body.style.overflow = "";
      });
    });

    // Close menu when clicking outside
    document.addEventListener("click", function (e) {
      if (!menu.contains(e.target) && !menuToggle.contains(e.target)) {
        menuToggle.setAttribute("aria-expanded", "false");
        menu.classList.remove("is-open");
        document.body.style.overflow = "";
      }
    });
  } else {
    console.error("Menu toggle or menu element not found");
  }
});
