document.addEventListener("DOMContentLoaded", function () {
  var bzMain = document.querySelector(".bz-main");
  //var imgContainer = bzMain.querySelector('img');
  var thumbs = document.querySelectorAll(".bz-nav .swiper-slidebz");

  thumbs.forEach(function (thumb) {
    thumb.addEventListener("click", function () {
      // Get the main attribute value
      var mainSrc = thumb.getAttribute("main");

      // Create an image element
      var img = new Image();
      img.src = mainSrc;
      img.classList.add("active-img");
      // Clear existing images in bz-main
      //bzMain.innerHTML = '';

      document
        .querySelector(".bz-main img.active-img")
        .classList.add("previmg");
      document
        .querySelector(".bz-main img.previmg")
        .classList.remove("active-img");

      // Append the new image to bz-main
      bzMain.appendChild(img);
      var prevImgElement = document.querySelector(".previmg");
		if (prevImgElement) {
		  prevImgElement.style.opacity = "0";
		  prevImgElement.style.backgroundColor = "white";
		}
      var activeImgElement = document.querySelector(".active-img");

      if (activeImgElement) {
        var currentPosition = -100;
        var targetPosition = 0;

        var animationInterval = setInterval(function () {
          currentPosition += 3; // Adjust the speed of the animation here
          activeImgElement.style.right = currentPosition + "%";

          if (currentPosition >= targetPosition) {
            clearInterval(animationInterval);
            activeImgElement.style.right = "0";
            activeImgElement.style.position = "relative"; // or "absolute", "fixed", etc.
            if (prevImgElement) {
              prevImgElement.parentNode.removeChild(prevImgElement);
            }
			  
var bzMain = document.querySelector('.bz-main');
if (bzMain) {
  var imgElements = bzMain.querySelectorAll('img');
  
  // Remove all img elements except the last one
  for (var i = 0; i < imgElements.length - 1; i++) {
    imgElements[i].remove();
  }
}
			  
			  
          }
        }, 16); // Assuming 60 frames per second (1000ms / 60 frames ≈ 16ms per frame)
      }
    });
  });

  var elementToClick = document.getElementById("first-thumb");

  if (elementToClick) {
    elementToClick.click();
  }
});