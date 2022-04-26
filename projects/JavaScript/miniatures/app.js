const mainImg = document.querySelector(".main img");
const thumbnailContainer = document.querySelector(".thumbnail");
const thumbnails = document.querySelectorAll(".thumbnail img");
const modalButton = document.querySelector("#modal-mode");
const modal = document.querySelector(".modal");
const modalClose = modal.querySelector("i");
const modalImg = modal.querySelector("img");
const slideLeft = modal.querySelector(".fas.fa-arrow-alt-circle-left");
const slideRight = modal.querySelector(".fas.fa-arrow-alt-circle-right");

const changeImg = (main, modalImg, newSrc) => {
   if (modalButton.classList.contains("active")) {
      modal.classList.add("active");
      modalImg.src = newSrc;
   } else {
      main.src = newSrc;
   }
};

const changeSlide = (direction = "right") => {
   let nextSrc;
   let previousThumbnail;
   let nextThumbnail;

   for (let i = 0; i < thumbnails.length; i++) {
      if (modalImg.src === thumbnails[i].src) {
         if (direction === "left") {
            previousThumbnail = thumbnails[i - 1]?.src;
            previousThumbnail
               ? (nextSrc = previousThumbnail)
               : (nextSrc = thumbnails[thumbnails.length - 1].src);
         } else {
            nextThumbnail = thumbnails[i + 1]?.src;
            nextThumbnail
               ? (nextSrc = nextThumbnail)
               : (nextSrc = thumbnails[0].src);
         }
      }
   }

   modalImg.src = nextSrc;
};

const displayImg = (data) => {
   data.forEach((img) => {
      const newImg = document.createElement("img");
      newImg.src = img.download_url;
      thumbnailContainer.appendChild(newImg);
   });
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

slideLeft.addEventListener("click", () => changeSlide("left"));
slideRight.addEventListener("click", () => changeSlide());
