"use strict";
document.addEventListener("DOMContentLoaded", () => {
  if (window.lucide) window.lucide.createIcons();
  const menu = document.getElementById("menuToggle"),
    mobile = document.getElementById("mobileNav");
  function closeMenu() {
    if (!menu || !mobile) return;
    mobile.classList.remove("open");
    menu.setAttribute("aria-expanded", "false");
    menu.setAttribute("aria-label", "Open navigation");
  }
  if (menu && mobile) {
    menu.addEventListener("click", () => {
      const opened = mobile.classList.toggle("open");
      menu.setAttribute("aria-expanded", String(opened));
      menu.setAttribute(
        "aria-label",
        opened ? "Close navigation" : "Open navigation",
      );
    });
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") closeMenu();
    });
    document.addEventListener("click", (e) => {
      if (!menu.contains(e.target) && !mobile.contains(e.target)) closeMenu();
    });
  }
  // A bilingual switch for the shared navigation and common CTA labels. Longer page content is English only until professionally translated.
  const translation = {
    Home: "गृहपृष्ठ",
    About: "हाम्रो बारेमा",
    Departments: "विभागहरू",
    Services: "सेवाहरू",
    Doctors: "चिकित्सकहरू",
    Facilities: "सुविधाहरू",
    News: "समाचार",
    Contact: "सम्पर्क",
    "Book Appointment": "अपोइन्टमेन्ट अनुरोध",
    "Request Appointment": "अपोइन्टमेन्ट अनुरोध",
  };
  const langBtn = document.getElementById("languageToggle");
  let nepali = false;
  langBtn?.addEventListener("click", () => {
    nepali = !nepali;
    document.documentElement.lang = nepali ? "ne" : "en";
    document.querySelectorAll(".nav-link").forEach((el) => {
      if (!el.dataset.original) el.dataset.original = el.textContent.trim();
      el.textContent = nepali
        ? translation[el.dataset.original] || el.dataset.original
        : el.dataset.original;
    });
    document
      .querySelectorAll("[data-en][data-ne]")
      .forEach(
        (el) => (el.textContent = nepali ? el.dataset.ne : el.dataset.en),
      );
    langBtn.textContent = nepali ? "नेपाली / EN" : "EN / नेपाली";
  });
  document.querySelectorAll("[data-filter-input]").forEach((input) => {
    const target = document.getElementById(input.dataset.filterInput),
      empty = document.querySelector(
        '[data-empty-for="' + input.dataset.filterInput + '"]',
      );
    if (!target) return;
    input.addEventListener("input", () => {
      const search = input.value.trim().toLocaleLowerCase();
      let found = 0;
      Array.from(target.children).forEach((card) => {
        const ok = card.textContent.toLocaleLowerCase().includes(search);
        card.hidden = !ok;
        if (ok) found++;
      });
      if (empty) empty.hidden = found > 0;
    });
  });
  // Appointment/contact forms POST to Laravel. No mailto interception.
});

/* =========================================
   DESKTOP DROPDOWN HOVER BEHAVIOR
========================================= */

document.addEventListener("DOMContentLoaded", () => {
    const dropdowns = document.querySelectorAll(
        ".ah-desktop-nav .ah-nav-dropdown"
    );

    const desktopQuery = window.matchMedia("(min-width: 992px)");

    dropdowns.forEach((dropdown) => {
        const summary = dropdown.querySelector("summary");

        if (!summary) return;

        // Open when mouse enters
        dropdown.addEventListener("mouseenter", () => {
            if (!desktopQuery.matches) return;

            dropdown.open = true;
        });

        // Close when mouse leaves
        dropdown.addEventListener("mouseleave", () => {
            if (!desktopQuery.matches) return;

            dropdown.open = false;
        });

        // Prevent click from toggling desktop dropdown
        summary.addEventListener("click", (event) => {
            if (!desktopQuery.matches) return;

            event.preventDefault();
        });

        // Close when keyboard focus leaves
        dropdown.addEventListener("focusout", (event) => {
            if (!desktopQuery.matches) return;

            if (!dropdown.contains(event.relatedTarget)) {
                dropdown.open = false;
            }
        });

        // Escape key closes dropdown
        dropdown.addEventListener("keydown", (event) => {
            if (event.key !== "Escape") return;

            dropdown.open = false;
            summary.focus();
        });
    });
});
