const luneSoleil = document.querySelector(".luneSoleil");
const btnMode = document.querySelector("#btnMode");
const text = document.querySelector(".container p");

const changeMode = () => {
   document.body.classList.toggle("night");

   if (document.body.classList.contains("night")) {
      btnMode.innerText = "Light Mode";
      text.innerText = "Il fait nuit !";
   } else {
      btnMode.innerText = "Dark Mode";
      text.innerText = "Il fait jour !";
   }
};

btnMode.addEventListener("click", changeMode);
document.addEventListener("keydown", (e) => {
   if (e.key === " " || e.key === "Enter") {
      changeMode();
   }
});
