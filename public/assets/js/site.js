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
