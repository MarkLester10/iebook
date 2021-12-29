window.onscroll = function () {
    fixedNav();
  };

  const navbar = document.getElementById("header");

  function fixedNav() {
    if (window.pageYOffset >= 200) {
      navbar.classList.add("shadow-lg");
    } else {
      navbar.classList.remove("shadow-none");
    }
  }

  const tooltipPopUp = document.querySelector("#popup-tooltip");
(modal = document.querySelector(".modal")),
    (closeBtn = document.querySelector(".close-btn")),
    tooltipPopUp.addEventListener("click", function() {
        modal.classList.add("active");
    }),
    modal.addEventListener("click", function(t) {
        (t.target.classList.contains("close-btn") ||
            t.target.classList.contains("modal")) &&
            modal.classList.remove("active");
    });


