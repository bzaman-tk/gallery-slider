document.addEventListener("DOMContentLoaded", function () {
  var thumbs = document.querySelectorAll(".bz-nav .swiper-slidebz");

  thumbs.forEach(function (thumb) {
    thumb.addEventListener("click", function () {
      var bzMainWrap = thumb.closest(".bz-main-wrap");
      var bzMain = bzMainWrap.querySelector(".bz-main");

      var mainSrc = thumb.getAttribute("main");
      var img = new Image();
      img.src = mainSrc;
      img.classList.add("active-img");

      bzMain.querySelector("img.active-img").classList.add("previmg");
      bzMain.querySelector("img.previmg").classList.remove("active-img");

      bzMain.appendChild(img);
      var prevImgElement = bzMain.querySelector(".previmg");

      var activeImgElement = bzMain.querySelector(".active-img");

      if (activeImgElement) {
        var currentPosition = -100;
        var targetPosition = 0;

        var animationInterval = setInterval(function () {
          currentPosition += 3;
          activeImgElement.style.right = currentPosition + "%";

          if (currentPosition >= targetPosition) {
            clearInterval(animationInterval);
            activeImgElement.style.right = "0";
            activeImgElement.style.position = "relative";

            if (prevImgElement) {
              prevImgElement.parentNode.removeChild(prevImgElement);
            }

            var imgElements = bzMain.querySelectorAll('img');
            for (var i = 0; i < imgElements.length - 1; i++) {
              imgElements[i].remove();
            }
          }
        }, 16);
      }
    });
  });

  // var elementToClick = document.getElementById("first-thumb");

  // if (elementToClick) {
  //   elementToClick.click();
  // }

  var mainWraps = document.querySelectorAll(".bz-main-wrap");

  mainWraps.forEach(function (mainWrap) {
    var elementToClick = mainWrap.querySelector(".first-thumb > div");
    if (elementToClick) {
      elementToClick.click();
    }
  });

});
