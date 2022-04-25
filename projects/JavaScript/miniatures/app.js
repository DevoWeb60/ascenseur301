const mainImg = document.querySelector(".main img");
const thumbnails = document.querySelectorAll(".thumbnail img");
const modalButton = document.querySelector("#modal-mode");
const modal = document.querySelector(".modal");
const modalClose = modal.querySelector("i");
const modalImg = modal.querySelector("img");

const changeImg = (main, modalImg, newSrc) => {
   if (modalButton.classList.contains("active")) {
      modal.classList.add("active");
      modalImg.src = newSrc;
   } else {
      main.src = newSrc;
   }
};

thumbnails.forEach((thumbnail) => {
   thumbnail.addEventListener("click", () => {
      changeImg(mainImg, modalImg, thumbnail.src);
   });
});

modalClose.addEventListener("click", () => {
   modal.classList.remove("active");
});

modalButton.addEventListener("click", () => {
   modalButton.classList.toggle("active");
   if (modalButton.classList.contains("active")) {
      modalButton.innerText = "Mode popup : Activé";
   } else {
      modalButton.innerText = "Mode popup : Desactivé";
   }
});
