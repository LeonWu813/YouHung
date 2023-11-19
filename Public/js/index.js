"use strict";

const navContainer = document.querySelector(".nav_container");
const navItems = document.querySelectorAll(".nav__item");
const navLinkContainer = document.querySelectorAll(".nav__link");
const navDropContainer = document.querySelectorAll(".nav-drop-container");
const navDropUl = document.querySelectorAll(".nav-drop-div");
const lanContainer = document.querySelector(".lan-selector");
const languages = document.querySelectorAll(".language");
const mobNavDropItem = document.querySelector(".mob-drop-item");

/////// Change Language
let currentLanguage;
if (window.location.href.includes("/zh/")) {
  currentLanguage = "zh";
} else {
  currentLanguage = "en";
}

const activeLanguageStyle = function () {
  languages.forEach((lan) => {
    lan.classList.remove("primary");
    lan.dataset.lan == currentLanguage && lan.classList.add("primary");
  });
};
activeLanguageStyle();

addEventListener("click", function (e) {
  const clicked = e.target.closest(".language");
  if (!clicked) return;

  const selectedLan = clicked.dataset.lan;
  if (selectedLan != currentLanguage) {
    const urlSplit = window.location.href.split("/");
    urlSplit[4] = selectedLan;
    window.location.assign(urlSplit.join("/"));
    currentLanguage = selectedLan;
    activeLanguageStyle();
  }
});

///////// Nav
const dropBoolean = [false, false, false, false];
const exist = [false, false, true, false];

const services = {};
const products = {};
const brands = {
  enText: ["BRAND AGENCY", "BRAND SALES"],
  zhText: ["品牌代理", "品牌銷售"],
  url: ["brand-agency-sales.html#agency", "brand-agency-sales.html#sales"],
};
const clients = {};

const navContents = [services, products, brands, clients];

navContainer.addEventListener("mouseover", function (e) {
  const hovered = e.target.closest(".nav__item");
  if (!hovered) return;

  const selectedNav = hovered.dataset.nav;
  navDropContainer.forEach((_, i) => {
    if (i == selectedNav - 1 && !dropBoolean[i] && exist[i]) {
      navContents[i].url.forEach((_, link, arr) => {
        const lan =
          currentLanguage == "en"
            ? navContents[i].enText[link]
            : navContents[i].zhText[link];
        navDropUl[i].insertAdjacentHTML(
          "beforeend",
          `<li class="drop-li">
              <a href="${navContents[i].url[link]}" class="drop-a">${lan}</a>
            </li>`
        );
        if (link != arr.length - 1) {
          navDropUl[i].insertAdjacentHTML(
            "beforeend",
            `<li class="seperate-line"></li>`
          );
        }
      });
      dropBoolean[i] = true;
      navDropUl[i].classList.add("nav-drop-active");
      navLinkContainer[i].style.color = "#376a20";
    }
  });
});

navItems.forEach((nav) =>
  nav.addEventListener("mouseleave", function (e) {
    navDropUl.forEach((navDrop, i) => {
      dropBoolean[i] = false;
      navDrop.classList.remove("nav-drop-active");
      navLinkContainer[i].style.color = "#1a1c18";
      while (navDrop.firstChild) {
        navDrop.removeChild(navDrop.firstChild);
      }
    });
  })
);

let mobDropBoolean = false;
function mobNavDropActive() {
  if (mobDropBoolean) {
    mobNavDropItem.style.display = "none";
  } else {
    mobNavDropItem.style.display = "block";
  }

  mobDropBoolean = !mobDropBoolean;
}

// header scroll
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.querySelector(".nav_container").style.backgroundColor = "#fafaf3";
  } else {
    document.querySelector(".nav_container").style.backgroundColor = "unset";
  }
}

// Slider
const swiper = new Swiper(".swiper", {
  // Optional parameters
  direction: "horizontal",
  loop: true,

  // If we need pagination
  pagination: {
    el: ".pagination",
  },

  navigation: {
    nextEl: ".button-next",
    prevEl: ".button-prev",
  },
  autoplay: {
    delay: 3000,
  },
  effect: "fade",
});

const popUpSection = document.querySelector(".pop-up-section");
const body = document.querySelector("body");

const popUp = function () {
  popUpSection.style.display = "flex";
  body.style.overflow = "hidden";
};
const closePop = function () {
  popUpSection.style.display = "none";
  body.style.overflow = "auto";
};
