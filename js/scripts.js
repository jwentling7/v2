//--------------------------------------------------------
// Light and Dark mode toggler TODO
//--------------------------------------------------------
// const lightDarkToggler = document.querySelector(".light-dark-toggler");
// let isDark = true;

// function toggleLightDark() {
//   document.querySelector("html").classList.toggle("dark-theme");
//   document.querySelector("html").classList.toggle("light-theme");
// }

// lightDarkToggler.addEventListener("click", toggleLightDark);

//--------------------------------------------------------
// Mobile Menu
//--------------------------------------------------------
const hamburger = document.querySelector(".hamburger");
const mobileMenu = document.querySelector(".site-header__menu");

function toggleMobileMenu() {
  hamburger.classList.toggle("fa-bars");
  hamburger.classList.toggle("fa-times");
  mobileMenu.classList.toggle("site-header__menu--active");
}

hamburger.addEventListener("click", toggleMobileMenu);

//--------------------------------------------------------
// To top scroll button
//--------------------------------------------------------
const toTopBtn = document.querySelector("#to-top-btn");

function scrollToTop() {
  window.scrollTo({ top: 0 });
}

function hideScrollToTop() {
  window.scrollY > 500
    ? toTopBtn.classList.remove("hidden")
    : toTopBtn.classList.add("hidden");
}

window.addEventListener("scroll", hideScrollToTop);
toTopBtn.addEventListener("click", scrollToTop);

//--------------------------------------------------------
// Takes care of the search display functionality
//--------------------------------------------------------
const openButton = document.querySelectorAll(".search-trigger");
const closeButton = document.querySelector(".search-overlay__close");
const searchOverlay = document.querySelector(".search-overlay");
const searchTerm = document.querySelector(".search-term");
const searchResults = document.querySelector(".search-overlay__results");
let isOverlayOpen = false;
let timer;
let isSpinnerVisible = false;
let previousValue;

// openButton and closeButton both call this function
let openOverlay = function () {
  clearTimeout(timer);
  // When opening with "S" key, this will clear the form from that and
  // any previously typed text from when search was opened before
  searchTerm.value = "";

  // Gives just a little time for searchTerm/Results to clear its contents (see above)
  // before displaying to the user, then displays the search field
  setTimeout(() => {
    searchOverlay.classList.toggle("search-overlay--active");
    document.querySelector("html").classList.toggle("no-scroll");
    isOverlayOpen ? (isOverlayOpen = false) : (isOverlayOpen = true);
    searchTerm.focus();
  }, 100);
};

// If the escape key is pressed, the search overlay closes
// If the s key is pressed, the search overlay opens
function keyDispatcher(e) {
  // JQuery you just need this one line: $('input, textarea').is(':focus')
  // Was not sure the best way to go about this in JavaScript so this is what I have :]
  let inputsFocused = [];
  document
    .querySelectorAll("input, textarea")
    .forEach((el, num) => (inputsFocused[num] = el === document.activeElement));

  ((e.key === "Escape" && isOverlayOpen) ||
    (e.key === "s" &&
      !isOverlayOpen &&
      !inputsFocused.some((el) => el === true))) &&
    openOverlay();
}

function displayResults(data) {
  isSpinnerVisible = false;
  searchResults.innerHTML = "";
  searchResults.innerHTML += `
  <h2 class="search-overlay__title title title--medium-large">Blog Posts</h2>
  ${
    data.length
      ? "<div class='posts__box2'>"
      : '<p style="text-align: center;">No results were found.</p>'
  }
    ${data
      .map(
        (item) =>
          `
            <div class="post-item">
              <div class="post-item__img-container">
                <div
                  class="post-item__img"
                  style="background-image: url(${item.image})"
                >
                  <a
                    href="${item.url}"
                    type="img/html"
                    style="
                      display: block;
                      width: 100%;
                      height: 100%;
                      outline: none;
                    "
                  ></a>
                </div>
              </div>
          
              <div class="post-item__info">
                <h3 class="title title--small post-item__title">
                  <a href="${item.url}" type="text/html">${item.title}</a>
                </h3>
                
                <div class="post-item__meta-info">
                    <p>In <a href="${item.categoryUrl}" type="text/html">${item.category}</a> on ${item.date}</p>
                </div>
          
                <div class="post-item__summary">
                  <p>${item.excerpt}</p>
                </div>
              </div>
            </div>
          `
      )
      .join("")}
  ${data.length ? "</div>" : ""} 
`;
}

function getResults() {
  fetch(jwData.root_url + "/wp-json/jw/v1/search?term=" + searchTerm.value)
    .then((res) => res.json())
    .then((data) => {
      displayResults(data.blogPosts);
    })
    .catch(() => console.log("Error"));
}

function userTyping(e) {
  if (searchTerm.value != previousValue && isOverlayOpen) {
    clearTimeout(timer);

    if (searchTerm.value) {
      if (!isSpinnerVisible) {
        searchResults.innerHTML = `
        <div class="spinner spinner__container">
          <svg viewBox="0 0 100 100">
            <defs>
              <filter id="shadow">
                <feDropShadow dx="0" dy="0" stdDeviation="1.5" 
                  flood-color="hsl(300, 70%, 78%)"/>
              </filter>
            </defs>
            <circle class="spinner__circle" style="fill:transparent;stroke:hsl(300, 70%, 78%);stroke-width: 7px;stroke-linecap: round;filter:url(#shadow);" cx="50" cy="50" r="45"/>
          </svg>
        </div>
        <p style="text-align: center;">Spinner by: <a href="https://codepen.io/ABSamma/pen/NWxpmNR" type="text/html" target="_blank" rel="noopener noreferer">Abraham Samma</a></p>
        `;
        isSpinnerVisible = true;
      }

      timer = setTimeout(getResults, 1000);
      previousValue = searchTerm.value;
    } else {
      searchResults.innerHTML = "";
      isSpinnerVisible = false;
    }
  }
}

openButton.forEach((element) => {
  element.addEventListener("click", openOverlay);
});
closeButton.addEventListener("click", openOverlay);
document.addEventListener("keydown", keyDispatcher);
searchTerm.addEventListener("keyup", userTyping);
