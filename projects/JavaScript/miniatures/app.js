const mainImg = document.querySelector(".main img");
const thumbnails = document.querySelectorAll(".thumbnail img");

const changeImg = (main, newSrc) => {
   main.src = newSrc;
};

thumbnails.forEach((thumbnail) => {
   thumbnail.addEventListener("click", () => {
      changeImg(mainImg, thumbnail.src);
   });
});
