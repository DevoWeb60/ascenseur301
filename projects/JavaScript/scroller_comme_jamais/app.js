const progressBar = document.querySelector("#progressbar");
const sale = document.querySelector(".sale");

const useProgressBar = () => {
   let totalHeight = document.body.clientHeight;
   let screenHeight = window.innerHeight;
   let reelHeight = totalHeight - screenHeight;
   let scrolled = window.scrollY;
   let calcul = Math.round((scrolled * 100) / reelHeight);

   if (calcul > 100) {
      calcul = 100;
   }

   progressBar.style.width = calcul + "%";
};

window.addEventListener("scroll", () => {
   useProgressBar();
});

window.addEventListener("resize", () => {
   useProgressBar();
});
